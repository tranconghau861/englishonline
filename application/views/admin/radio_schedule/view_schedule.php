<table width="100%" border="1" cellpadding="" cellspacing="10" bordercolor="#dadada" >
		<thead class="heading">
			<tr>
				<th style="text-align:center;width:15%; height:35px;">Khung giờ</th>
				<th style="text-align:center;">Tiêu đề</th>
				<th style="text-align:center;">Nội dụng</th>				
			</tr>
		</thead>
		<tbody>
			<tr id="not_avail_player">
				<?php 
					if(!empty($schedule->content)){
						
						$schedule = explode(";",$schedule->content);
						$total = count($schedule);
						for($i=0;$i < $total;$i++){
							$item = explode("||",$schedule[$i]);
							
							$hp = trim($item[0],' :');						
							$time = str_replace("h",":",$hp);
							$title = isset($item[1]) ? $item[1] : '';
							$content = isset($item[2]) ? str_replace("##","",$item[2]) : ''; 
							
							if(!empty($time) && !empty($title)):
							?>
							<tr prop="<?php echo trim($time);?>">
								<td style="text-align:center;padding-left:10px;"><?php echo trim($time);?></td>
								<td style="text-align:center;"><?php echo $title;?></td>
								<td style="text-align:center;"><?php echo $content;?></td>
								
							</tr>
							<?php
							endif;
						}
				?>
				
				<?php }else{?>
				<td id="not_avail" colspan="3" style="text-align:left;">
					<i>Hiện chưa có lịch phát sóng nào</i>
				</td>
				<?php } ?>
			</tr>
		</tbody>
	</table> 