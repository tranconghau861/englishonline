

function getnumber(obj){
	var str = obj.val().replace(/ /g, "");
	for(var i = 0; i < str.length; i++){
		var temp = str.substring(i, i + 1);
		if(!(temp == "." || (temp >= 0 && temp <=9))){
			obj.focus();
			return str.substring(0, i);
		}
	}
	return str;
};

function autonumber(obj){
	var strTemp = getnumber(obj);
	if(strTemp.length <= 3)
		return strTemp;
	strResult = "";
	for(var i = 0; i < strTemp.length; i++)
		strTemp = strTemp.replace("", "");
	for(var i = strTemp.length; i>=0; i--){
		if(strResult.length > 0 && (strTemp.length - i -1) % 3 == 0)
			strResult = "" + strResult;
		strResult = strTemp.substring(i, i + 1) + strResult;
	}
	return strResult;
};


function ChangeToSlug(title)
{
    var slug;
    slug = title.toLowerCase();
    slug = slug.replace(/á|à|ả|ạ|ã|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ/gi, 'a');
    slug = slug.replace(/é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ/gi, 'e');
    slug = slug.replace(/i|í|ì|ỉ|ĩ|ị/gi, 'i');
    slug = slug.replace(/ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ/gi, 'o');
    slug = slug.replace(/ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự/gi, 'u');
    slug = slug.replace(/ý|ỳ|ỷ|ỹ|ỵ/gi, 'y');
    slug = slug.replace(/đ/gi, 'd');
    slug = slug.replace(/\“|\”|\’|\`|\~|\!|\@|\#|\||\$|\%|\^|\&|\*|\(|\)|\+|\=|\,|\.|\/|\?|\>|\<|\'|\"|\:|\;|_/gi, '');
    slug = slug.replace(/ /gi, "-");
    slug = slug.replace(/\-\-\-\-\-/gi, '-');
    slug = slug.replace(/\-\-\-\-/gi, '-');
    slug = slug.replace(/\-\-\-/gi, '-');
    slug = slug.replace(/\-\-/gi, '-');
    slug = '@' + slug + '@';
    slug = slug.replace(/\@\-|\-\@|\@/gi, '');
    return slug;
}

function submitUpload(preview, number) {
    $.ajax({
      url: base_url +"admin/home/upload_file",
      type: "POST",
      data: new FormData(document.getElementById("fileinfo")),
      dataType: 'json',
      enctype: 'multipart/form-data',
      processData: false,
      contentType: false,
      cache: false,
    }).done(function( json ) {
	    if(json.res){
		    if(preview == 'imgrepeat'+ number){
		    	$('#'+ preview).html('<span><i class="fa fa-close deleteImg"></i><img src="'+ json.msg +'" width="50" height="50"><input type="hidden" name="fields['+ number +'][photo]" value="'+ json.name +'"></span>');
		    }
		    else if(preview == 'picture'){
		    	$('#'+ preview).html('<span><i class="fa fa-close deleteImg"></i><img src="'+ json.msg +'" width="50" height="50"><input type="hidden" name="photo" value="'+ json.name +'"></span>');
		    }
		    else if(preview == 'excel'){
		    	$('#'+ preview).html('<span class="excel"><i class="fa fa-close deleteImg"></i> <a href="'+ json.msg +'">'+ json.name +'</a> <input type="hidden" name="photo" value="'+ json.name +'"></span>');
		    }
		    else{
		    	$('#'+ preview).append('<span><i class="fa fa-close deleteImg"></i><img src="'+ json.msg +'" width="50" height="50"><input type="hidden" name="gallery[]" value="'+ json.name +'"></span>');
		    }
	    }
	    else{
		    alert(json.msg);
	    }
	    $('#fileinfo').remove();
    });
    return false;
}

function sendFile(me, file) {
    data = new FormData();
    data.append("fileimg", file);
    $.ajax({
	    url: base_url +"admin/home/upload_file",
        data: data,
        dataType: 'json',
        type: "POST",
        cache: false,
        contentType: false,
        processData: false,
        success: function(json) {
            me.summernote('insertImage', json.msg, json.name);
        }
    });
}

function ViewSchedule($date, $div, $url) 
{				
	$(".table-bordered tbody tr td .schedule").each(function( index ){
		$( this).css({'display':'none'});
	});
	
	$.ajax({
		url:  $url,
		data:{date:$date},
		type:"GET",
		dataType:"html",
		beforeSend:function(){
			
		},
		success:function(obj){  
			
			$( '#'+$div).css({'display':'block'});
			
			$('#'+$div).html(obj);   
			
		}
	});
} 

$(function(){
	$(document).on('keyup', '.price', function() {
		var str = autonumber($(this));
		$(this).val(str);
	});

	$("#txtTitle").keyup(function () {
		$("#txtSlug").val( ChangeToSlug($(this).val()) );
	});
	

	$("#field-related").keyup(function () {
		var v = $(this).val();
		
		$.ajax({
			type: 'post',
			url: base_url +'admin/node/filter',
			data: { title: v },
			dataType: 'json',
			success: function(json){
				$('.field-related-result').html(json.html).removeClass('hidden');
			}
		});
	});
	
	$('#chkAll').click(function(){
		var me = $(this);
		$('input[name*=\'id\']').prop('checked', me.prop('checked'));
	});
	
	$('#chkAdd').click(function(){
		var me = $(this);
		$('.chkAddVal').prop('checked', me.prop('checked'));
	});
	
	$('#chkEdit').click(function(){
		var me = $(this);
		$('.chkEditVal').prop('checked', me.prop('checked'));
	});
	
	$('#chkDelete').click(function(){
		var me = $(this);
		$('.chkDeleteVal').prop('checked', me.prop('checked'));
	});
	
	$('#btDelete').click(function(){
		var id = '';
		$("input[name^=id]").each(function() {
			if( $(this).prop('checked') ){
				id = $(this).val();
			}
		});
		
		if( !id ) {
			alert('Vui lòng chọn một');
		}
		else {
			if(confirm('Bạn có chắc muốn xoá?')){
				document.adminForm.submit();
			}
		}
	});
	
	$("body").delegate(".delrow", "click", function(e) {
		e.preventDefault();
		if(confirm('Bạn có chắc muốn xoá?')){
			location = $(this).attr('href');
		}
	});

	$("body").delegate(".deleteImg", "click", function() {
		var me = $(this);
		var name = me.parents('span').find('input').val();
		$.post(base_url +'admin/home/delete_file', 'name='+ name, function(){
			me.parents('span').remove();
		});
	});
	
	$("body").delegate(".uploadFile", "click", function() {
		var preview = $(this).attr('preview');
		var number = $(this).attr('number');
		$('body').append('<form method="post" id="fileinfo" name="fileinfo" onsubmit="return submitUpload(\''+ preview +'\', \''+ number +'\');" class="hidden"><input type="file" name="fileimg" id="fileimg" /><input type="submit" value="Upload" /></form>');
		$('#fileimg').trigger('click');
		$('#fileimg').change(function (e) {
			$('#fileinfo').submit();
		});
	});
	
	$('.summernote').summernote({
        height: 350,
        lang: 'vi-VN',
		callbacks: {
			onImageUpload: function(files) {
				sendFile($('.summernote'), files[0]);
			}
		},
		toolbar: [
			['height', ['style', 'color']],
			//['fontname', ['fontname', 'fontsize']],
			['font', ['bold', 'italic', 'underline', 'clear']],
		 	['style', ['strikethrough', 'superscript', 'subscript', 'hr']],
			['para', ['ul', 'ol', 'paragraph']],
			['table', ['table', 'undo', 'redo']],
	        ['insert', ['link', 'picture', 'video']],
	        ['view', ['fullscreen', 'codeview']]
		]
    });
	
	$('.manific-image').magnificPopup({
		type: 'image',
		closeOnContentClick: true,
		mainClass: 'mfp-img-mobile',
		image: {
			verticalFit: true
		}
	});
	
	$('[data-toggle="tooltip"]').tooltip();
	
	$('.toggle').click(function(e){
		e.preventDefault();
		$(this).next('ul').slideToggle();
	});
	
	
    $('#date_from').datetimepicker({
	    format: 'DD/MM/YYYY'
    });
    $('#date_to').datetimepicker({
        useCurrent: false,
	    format: 'DD/MM/YYYY'
    });
    $("#date_from").on("dp.change", function (e) {
        $('#date_to').data("DateTimePicker").minDate(e.date);
    });
    $("#date_to").on("dp.change", function (e) {
        $('#date_from').data("DateTimePicker").maxDate(e.date);
    });
	$('#schedule_date').datetimepicker({
        useCurrent: false,
        format: 'DD-MM-YYYY'
    });
    $('#schedule_time').datetimepicker({
        useCurrent: false,
        format: 'mm:ss'
    });
	
	$('.filter-category').click(function(e){
		e.preventDefault();
		var name = $(this).text();
		var parent = $(this).attr('id');
		$('.filter-category-name').text(name);
		$('.filter-category-result').val(parent);
	});
	
/*
	$('#fieldtype').change(function(){
		var t = parseInt($(this).val());
		if(t > 2){
			$('#addfield').removeClass('hidden');
		}
		else{
			$('#addfield').addClass('hidden');
		}
	});
*/
	
	$("body").delegate(".delfieldbtn", "click", function(e) {
		e.preventDefault();
		$(this).parents('.repeat').remove();
	});
	
	$('.addfieldbtn').click(function(e){
		e.preventDefault();
		var number = parseInt($(this).attr('number'));
		
		var html = '<div class="repeat">\
						<div class="form-group">\
							<label class="col-sm-2 control-label">Tiêu đề</label>\
							<div class="col-sm-9">\
								<input type="text" class="form-control" name="fields['+ number +'][name]" value="">\
							</div>\
						</div>\
						<div class="form-group">\
							<label class="col-sm-2 control-label">Hình ảnh</label>\
							<div class="col-sm-9">\
								<button type="button" class="btn btn-default uploadFile" preview="imgrepeat'+ number +'" number="'+ number +'"><i class="fa fa-cloud-upload"></i> Upload</button>\
								<div id="imgrepeat'+ number +'" class="groupImg"></div>\
							</div>\
						</div>\
						<div class="form-group">\
							<label class="col-sm-2 control-label">Nội dung</label>\
							<div class="col-sm-9">\
	                   			<textarea class="form-control" name="fields['+ number +'][content]" rows="5"></textarea>\
							</div>\
						</div>\
						<div class="form-group">\
							<label class="col-sm-2 control-label">&nbsp;</label>\
							<div class="col-sm-9">\
								<a href="#" class="btn btn-danger delfieldbtn"><i class="fa fa-plus"></i> Xoá field</a>\
							</div>\
						</div>\
					</div>';
		
		$('.repeats').append(html);
		
		$(this).attr('number', number + 1)
	});
	
	
	$("body").delegate(".deltimebtn", "click", function(e) {
		e.preventDefault();
		$(this).parents('.repeat').remove();
	});
	
	$('.addtimebtn').click(function(e){
		e.preventDefault();
		var number = parseInt($(this).attr('number'));
		
		var html = '<div class="repeat">\
						<div class="form-group">\
							<label class="col-sm-2 control-label">Thời gian</label>\
							<div class="col-sm-6">\
								<input type="text" class="form-control" name="fields['+ number +'][time]" value="">\
							</div>\
						</div>\
						<div class="form-group">\
							<label class="col-sm-2 control-label">Mô tả</label>\
							<div class="col-sm-6">\
								<input type="text" class="form-control" name="fields['+ number +'][content]" value="">\
							</div>\
						</div>\
						<div class="form-group">\
							<label class="col-sm-2 control-label">Liên kết</label>\
							<div class="col-sm-6">\
								<input type="text" class="form-control" name="fields['+ number +'][link]" value="">\
							</div>\
						</div>\
						<div class="form-group">\
							<label class="col-sm-2 control-label">&nbsp;</label>\
							<div class="col-sm-6">\
								<a href="#" class="btn btn-danger deltimebtn"><i class="fa fa-plus"></i> Xoá nội dung</a>\
							</div>\
						</div>\
					</div>';
		
		$('.repeats').append(html);
		
		$(this).attr('number', number + 1)
	});
	
	$("body").delegate(".delalphabetbtn", "click", function(e) {
		e.preventDefault();
		$(this).parents('.repeat').remove();
	});
	
	$('.addalphabet').click(function(e){
		e.preventDefault();
		var number = parseInt($(this).attr('number'));
		
		var html = '<div class="repeat">\
						<div class="form-group">\
							<label class="col-sm-2 control-label">Pronounce</label>\
							<div class="col-sm-5">\
								<input type="text" class="form-control" name="fields['+ number +'][content]" value="">\
							</div>\
							<div class="col-sm-1">\
								<a href="#" class="btn btn-danger delalphabetbtn"><i class="fa fa-plus"></i> Delete</a>\
							</div>\
						</div>\
					</div>';
		
		$('.repeats').append(html);
		
		$(this).attr('number', number + 1)
	});
	
	
});