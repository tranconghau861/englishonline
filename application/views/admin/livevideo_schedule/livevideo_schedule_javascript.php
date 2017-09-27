<script type="text/javascript">
	
	function ViewLiveVideoSchedule($date, $div, $url, $extension) 
	{				
		$(".table-bordered tbody tr td .schedule").each(function( index ){
			$( this).css({'display':'none'});
		});
		
		$.ajax({
			url:  $url,
			data:{date:$date, extension:$extension},
			type:"POST",
			dataType:"html",
			beforeSend:function(){
				
			},
			success:function(obj){  
				
				$( '#'+$div).css({'display':'block'});
				
				$('#'+$div).html(obj);   
				
			}
		});
	} 

	function addPlayerList()
	{
		var name = $('#schedule_name').val();
		
		var content = $('#schedule_content').val();
		
		if(name =="" && content==""){
			
			if($.trim(name)==""){
				
				$('#schedule_name').css({'border':'1px solid red'});
			
			}
			if($.trim(content)==""){

				$('#schedule_content').css({'border':'1px solid red'});

			} 
			
		}else{
			addAPlayer(name);
		}
		
	}
	
	function addAPlayer(name){

		var display_player_lst="<tr prop='"+name+"'>";

		display_player_lst+="<td style='text-align:center;padding-left:10px;'>"+$('#schedule_name').val()+"</td>";
		
		display_player_lst+="<td style='text-align:center;'>"+$('#schedule_title').val()+"</td>";

		display_player_lst+="<td style='text-align:center;'>"+$('#schedule_content').val()+"</td>";

		display_player_lst+="<td style='text-align:center'><button type='button' style='line-height:30px;margin-bottom:3px;margin-top:3px;' class='button'>Xóa</button></td>";

		display_player_lst+="</tr>";
		
		$('#addedplayerlst table tbody #not_avail').remove();

		$('#addedplayerlst table tbody').append(display_player_lst);

		$("#addedplayerlst table tbody").find("tr[prop='"+name+"']").find("button").click(function(){

			removeAddedPlayer(name);            

		});
		
		$content = $('#schedule_content').val();
		
		$lcontent = ($content =="") ? '##' :  $content;
		
		document.getElementById('hd_player_lst').value+=

			$('#schedule_name').val()+'^'+
			
			$('#schedule_title').val()+'^'+

			$lcontent +'~~';        

			$('#schedule_name').val("");
			
			$('#schedule_title').val("");

			$('#schedule_content').val("");

	}
	function arr_diff (a1, a2) {

		var a = [], diff = [];

		for (var i = 0; i < a1.length; i++) {
			a[a1[i]] = true;
		}

		for (var i = 0; i < a2.length; i++) {
			if (a[a2[i]]) {
				delete a[a2[i]];
			} else {
				a[a2[i]] = true;
			}
		}

		for (var k in a) {
			diff.push(k);
		}

		return diff;
	};
	
	function removeattr(time, value, data)
	{
		$('#addedplayerlst table tbody').find("tr[prop='"+time+"']").remove();
		
		var res = data.split(" || ; ");
		
		var hd_player_lst ='';
		
		var a1 = [value];
		var a2 = res;
		
		var values = arr_diff(a1, a2);
		
		var total = values.length;
		
		for(var i=0; i<total; i++){
		
			hd_player_lst += values[i].replace(" || ", "^") +'~~';
		
		}
		
		$("#hd_player_lst").val(hd_player_lst);
	}
	
	function removeAddedPlayer(name){

		var hd_player_lst=$("#hd_player_lst").val().split("|");

		var added_player;

		for(var i=0;i<hd_player_lst.length;i++){

			added_player=hd_player_lst[i].split("^");

			if(added_player[0]==name){                

				hd_player_lst=$("#hd_player_lst").val().replace(hd_player_lst[i]+"|","");

				$("#hd_player_lst").val(hd_player_lst);

				$('#addedplayerlst table tbody').find("tr[prop='"+name+"']").remove();

				break;

			}

		}

		if($.trim($("#hd_player_lst").val())==""){

			$('#addedplayerlst table tbody').append("<tr id='not_avail_player'><td colspan='4' style='padding-left:10px;color:#FFFFFF;'><i>Hiện chưa có cầu thủ nào</i></td></tr>");

		}        

	}  
	
</script>