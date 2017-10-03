window.jQuery || document.write('<script src="'+http+'/theme/js/jquery.js"><\/script>');
window.vars={

	error_info:new Array(),

	count_error:0,

	message:''

};
$(function () {
	
	//test for invoking it
	$('.modal-note-player').click(function(){					
		$('#myModalNotePlayer').modal('show');
	});
	$('.modal-note-team').click(function(){					
		$('#myModalNoteTeam').modal('show');
	});
	
	$('.modal-promotion').click(function(){					
		$('#myModPromotion').modal('show');
	});
	
	
	
})


function submitCreateTeam($value)
{
	switch($value)
	{
		case 1:
			$("#divInfor").css({'display':'none'});
            $("#divInforTeam").show("slide",{ 'direction': 'left' }, 500);
		break;
	}
}

function submitNewPersonalInfo(obj)
{    	
	
	if($(obj).attr("id") =='btnCreateNewTeam' || $(obj).attr("id") =='btnJoinTeam'){
			
		validBasicPersonalInfoFrm(obj);
		
	}else{

		//slideRegistration(obj);
	}
	
}
function slideRegistration(obj){

	switch($(obj).attr("id")){
		
		case "btnViewPersonalInfo":

			$("#frmpersonalinfo").show("slide",{ 'direction': 'left' }, 500);

			$("#tabs").hide("slide",{ 'direction': 'left' }, 500);

			break;

		/*
		case "btnCreateNewTeam":

			$("#frmpersonalinfo").hide("slide",{ 'direction': 'left' }, 500);

			$("#tabs").show("slide",{ 'direction': 'left' }, 500);

			break;
			

		case "btnViewPersonalInfoJoinTeam":

			$("#frmpersonalinfo").show("slide",{ 'direction': 'left' }, 500);

			$("#frmjointeaminfo").hide("slide",{ 'direction': 'left' }, 500);
			
			$("#intro_register_general").show("slide",{ 'direction': 'left' }, 500);
			

			break;

		case "btnJoinTeam":

			$("#frmpersonalinfo").hide("slide",{ 'direction': 'left' }, 500);

			$("#frmjointeaminfo").show("slide",{ 'direction': 'left' }, 500);

			break;  
		*/

	}

	return false;

}	
function validBasicPersonalInfoFrm(obj)
{	
	
	$('form#form-signup-infor').submit();

}

function completeReg(obj){

	$('form#form-signup').submit();

}

//signupteamform-player_name

function validEmail(email){

	var regEx=new RegExp(/^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/);

	if (regEx.test(email)) {

		return true;

	}
	else
		return false;

}   

function validPhoneNo(phoneNo){

	var regEx=new RegExp(/^[0-9]{8,}$/);

	return regEx.test(phoneNo);

}  
	
function validAddPlayerFrm($email, $phone){

	vars.message="";

	vars.count_error=0;       

	if($.trim($("#signupteamform-player_name").val())=="")
	{

		vars.message+="Bạn chưa nhập tên cầu thủ."+"<br/>";

		vars.count_error++;

	}
	
	if($("#signupteamform-player_email").val() =='')
	{		
		vars.message+="Nhập vào email."+"<br/>";

		vars.count_error++;

	} 

	if(!validEmail($("#signupteamform-player_email").val()))
	{		
		vars.message+="Email không hợp lệ."+"<br/>";

		vars.count_error++;

	}  
	
	// so sanh voi email cau thu doi truong

	if($.trim($('#signupteamform-player_email').val())!=""){

		if($('#signupteamform-player_email').val()== $email){

			vars.message+="Email đã được sử dụng cho đội trưởng."+"<br/>";

			vars.count_error++;

		}

	} 

	if($("#signupteamform-player_phone").val() =='')
	{		
		vars.message+="Nhập vào phone."+"<br/>";

		vars.count_error++;

	} 

	if(!validPhoneNo($("#signupteamform-player_phone").val()))
	{		
		vars.message+="Email không hợp lệ."+"<br/>";

		vars.count_error++;

	}  

	// so sanh voi so dien thoai dang ky doi truong

	if($.trim($('#signupteamform-player_phone').val())!=""){

		
		if($('#signupteamform-player_phone').val()==$phone){

			vars.message+="Số điện thoại đã được sử dụng cho đội trưởng."+"<br/>";

			vars.count_error++;

		}

	}        

}   
function addPlayerList(){          

	validAddPlayerFrm($("#signupteamform-email").val(), $("#signupteamform-phone").val());

	var count_error=vars.count_error;

	var message=vars.message;

	var allowed_number_of_members=2; //số cầu thủ đăng ký tối đa

	if($('#addedplayerlst table tr').length>allowed_number_of_members){

		count_error++;

		message+='Mỗi đội bóng chỉ được nhận tối đa {max_number} thành viên.';

	}        

	if(count_error>0){

		alert(message);          

	}
	else{

		//var added_player_lst=$("#hd_player_lst").val().split("|");           

		var email_to_add=$("#signupteamform-player_email").val();

		var phone_number_to_add=$("#signupteamform-player_phone").val();

		data_available_player_lst=$("#hd_player_lst").val().split(",");

		for(var i=0;i<data_available_player_lst.length;i++){

			var player_info=data_available_player_lst[i].toString().split("^");

			if($.trim(email_to_add)!=""){

				if(email_to_add==player_info[1]){

					vars.message+="Email đã được sử dụng.";

					vars.count_error++;

				}

			}

			if($.trim(phone_number_to_add)!=""){

				if(phone_number_to_add==player_info[2]){

					vars.message+="Số điện thoại đã được sử dụng.";

					vars.count_error++;

				}

			}

			if(vars.count_error>0)

				break;
		}
		
		if(vars.count_error>0){

			
			
			alert(vars.message); 

		}else{
			
			var url= http + '/player/checkemailphone';

			var data_to_post={};

			data_to_post["player_phone"]=$("#signupteamform-player_phone").val();

			data_to_post["player_email"]=$("#signupteamform-player_email").val();  		

			var csrfToken = $('meta[name="csrf-token"]').attr("content");
			
			data_to_post["_csrf"] = csrfToken;

			$.ajax({

				type: 'POST',

				url: url,

				data:data_to_post,

				dataType:'json',

				success: function(result) {

					if(result.rs==0){

						var message="";

						var cnt=0;                                

						if(result.error_email!=undefined&&$.trim(result.error_email)!=""){

							message+=result.error_email+"<br/>";

							cnt++;

						}

						if(result.error_phone_number!=undefined&&$.trim(result.error_phone_number)!=""){

							message+=result.error_phone_number+"<br/>";

							cnt++;

						}                                

						if(cnt>0){						

							alert(message);

						}
						else{

							

							if($.trim($("#hd_player_lst").val())==""){

								$("#not_avail_player").remove();

							}

							addAPlayer($("#signupteamform-player_email").val());

						}

					}                     

				},

				error: function() {

					alert('Lỗi hệ thống. Vui lòng thử lại sau.');


				}

			}); 
			

		}

	}

} 

function addAPlayer(email){

	var display_player_lst="<tr prop='"+email+"'>";

	display_player_lst+="<td style='text-align:left;padding-left:10px;color:#FFFFFF;'>"+$('#player_name').val()+"</td>";

	display_player_lst+="<td style='text-align:center;color:#FFFFFF;'>"+$('#player_email').val()+"</td>";

	display_player_lst+="<td style='text-align:center;color:#FFFFFF;'>"+$('#player_phone_number').val()+"</td>";

	display_player_lst+="<td style='text-align:center'><button type='button' style='line-height:22px;margin-bottom:3px;' class='button'>Xóa</button></td>";

	display_player_lst+="</tr>";

	$('#addedplayerlst table tbody').append(display_player_lst);

	$("#addedplayerlst table tbody").find("tr[prop='"+email+"']").find("button").click(function(){

		removeAddedPlayer(email);            

	});
	
	document.getElementById('hd_player_lst').value+=

		$('#signupteamform-player_name').val()+'^'+

		$('#signupteamform-player_email').val()+'^'+

		$('#signupteamform-player_phone').val()+'|';        

	$('#signupteamform-player_name').val("");

	$('#signupteamform-player_email').val("");

	$('#signupteamform-player_phone').val("");

}  

function removeAddedPlayer(email){

	var hd_player_lst=$("#hd_player_lst").val().split("|");

	var added_player;

	for(var i=0;i<hd_player_lst.length;i++){

		added_player=hd_player_lst[i].split("^");

		if(added_player[1]==email){                

			hd_player_lst=$("#hd_player_lst").val().replace(hd_player_lst[i]+"|","");

			$("#hd_player_lst").val(hd_player_lst);

			$('#addedplayerlst table tbody').find("tr[prop='"+email+"']").remove();

			break;

		}

	}

	if($.trim($("#hd_player_lst").val())==""){

		$('#addedplayerlst table tbody').append("<tr id='not_avail_player'><td colspan='4' style='padding-left:10px;color:#FFFFFF;'><i>Hiện chưa có cầu thủ nào</i></td></tr>");

	}        

}  


$(function(){
	/*var s = document.getElementsByTagName('script')[0];	
	
	var node = document.createElement('script');
	node.type = 'text/javascript';
	node.async = true;
	node.src = http + "/theme/js/jquery.js";
	s.parentNode.insertBefore(node, s);

	var node = document.createElement('script');
	node.type = 'text/javascript';
	node.async = true;
	node.src = http + "themes/front/js/user/jQuery.objFunction.js";
	s.parentNode.insertBefore(node, s);	
	
	var node = document.createElement('script');
	node.type = 'text/javascript';
	node.async = true;
	node.src = http + "themes/front/js/user/jQuery.objError.js";
	s.parentNode.insertBefore(node, s);	
	
	var node = document.createElement('script');
	node.type = 'text/javascript';
	node.async = true;
	node.src = http + "themes/front/js/user/jQuery.objDefine.js";
	s.parentNode.insertBefore(node, s);
	
	var node = document.createElement('script');
	node.type = 'text/javascript';
	node.async = true;
	node.src = http + "themes/front/js/user/jQuery.objTemplates.js";
	s.parentNode.insertBefore(node, s);	
	*/
	
});