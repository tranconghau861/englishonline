            
            <?=isset($msg)?'<div class="alert alert-danger" role="alert">'. $msg .'</div>':''?>
            
            <h1 class="page-header"><?=extensions($extension)?></h1>
            
			<form method="post" name="adminForm" class="form-horizontal">
				<div class="form-group">
					<label class="col-sm-2 control-label">Nội dung</label>
					<div class="col-sm-10">
                   		
						<div class='formfield'>
							<table width="100%" border="1" cellpadding="" cellspacing="10" bordercolor="#dadada" >
								<thead class="heading">
									<tr>
										<th style="text-align:center;width:15%; height:35px;">Khung giờ</th>
										<th style="text-align:center;">Tiêu đề</th>
										<th style="text-align:center;">Nội dụng</th>
										<th style="text-align:center;width:15%; height:35px;">Xóa</th>
									</tr>
								</thead>
								<tbody>
									<tr id="not_avail_player">
										<?php 
											if(!empty($row->content)){
												$schedule = explode(";",$row->content);
												$total = count($schedule);
												for($i=0;$i < $total;$i++){
													$item = explode("||",$schedule[$i]);													
													$time =  explode(":",$item[0]);
													$h = (isset($time[0])) ? $time[0] : ''; 
													$p = (isset($time[1])) ? $time[1] : '';
													$time = $h . ':' . $p; 
													$check = trim($schedule[$i], ' ||');
													$value = trim($row->content, ' || ; ');
													if(!empty($time) && !empty($p)):
													?>
													<tr prop="<?php echo trim($time);?>">
														<td style="text-align:center;padding-left:10px;"><?php echo trim($time);?></td>
														<td style="text-align:center;"><?php echo $item[1];?></td>
														<td style="text-align:center;"><?php echo $item[2];?></td>
														<td style="text-align:center">
															<button type="button" onclick='removeattr("<?php echo trim($time);?>","<?php echo $check;?>","<?php echo $value;?>")' style="line-height:30px;margin-bottom:3px;margin-top:3px;" class="button">Xóa</button>
														</td>
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
						</div>
					</div>
					
				</div>
				
				<div class="form-group">
					<label class="col-sm-2 control-label">Nội dung EN</label>
					<div class="col-sm-10">
                   		<div class="col-md-2 padding-lr">
							<label>Khung giờ</label>													
							<div class="form-group">
								<input id="schedule_name" class="form-control" placeholder="Khung giờ" type="text">
							</div>									
						</div>						
						<div class="col-md-3 padding-lr">
							<label>Tiêu đề</label>													
							<div class="form-group">
								<input id="schedule_title" class="form-control" placeholder="Tiêu đề" type="text">
							</div>									
						</div>
						<div class="col-md-6 padding-lr">
							<label>Nội dụng</label>													
							<div class="form-group">
								<input id="schedule_content" class="form-control" placeholder="Nội dụng" type="text">
							</div>									
						</div>
						<div class="col-md-1">
							<label>&nbsp;</label>													
							<div class="form-group">
								<button class="button" style="height:35px;" type="button" id="btnaddplayer" onclick="addPlayerList()">Thêm</button>
							</div>												
						</div>
						
						<div class='formfield' id="addedplayerlst">
							<table width="100%" border="1" cellpadding="" cellspacing="10" bordercolor="#dadada" >
								<thead class="heading">
									<tr>
										<th style="text-align:center;width:15%; height:35px;">Khung giờ</th>
										<th style="text-align:center;">Tiều đề</th>
										<th style="text-align:center;">Nội dụng</th>
										<th style="text-align:center;width:15%; height:35px;">Xóa</th>
									</tr>
								</thead>
								<tbody>
									<tr id="not_avail_player">
										<?php 
											if(!empty($row->content_en)){
												$schedule = explode(";",$row->content_en);
												$total = count($schedule);
												for($i=0;$i < $total;$i++){
													$item = explode("||",$schedule[$i]);													
													$time =  explode(":",$item[0]);
													$h = (isset($time[0])) ? $time[0] : ''; 
													$p = (isset($time[1])) ? $time[1] : '';
													$time = $h . ':' . $p; 
													$check = trim($schedule[$i], ' ||');
													$value = trim($row->content_en, ' || ; ');
													if(!empty($time) && !empty($p)):
													?>
													<tr prop="<?php echo trim($time);?>">
														<td style="text-align:center;padding-left:10px;"><?php echo trim($time);?></td>
														<td style="text-align:center;"><?php echo $item[1];?></td>
														<td style="text-align:center;"><?php echo $item[2];?></td>
														<td style="text-align:center">
															<button type="button" onclick='removeattr("<?php echo trim($time);?>","<?php echo $check;?>","<?php echo $value;?>")' style="line-height:30px;margin-bottom:3px;margin-top:3px;" class="button">Xóa</button>
														</td>
													</tr>
													<?php
													endif;
												}
										?>
										
										<?php }else{?>
										<td id="not_avail" colspan="4" style="text-align:left;">
											<i>Hiện chưa có lịch phát sóng nào</i>
										</td>
										<?php } ?>
									</tr>
								</tbody>
							</table> 
						</div>
					</div>
					<input type="hidden" id="hd_player_lst" name='hd_player_lst' value='<?php echo @$row->content_en;?>'/>
				</div>
				
				<div class="form-group">
					<label class="col-sm-2 control-label">&nbsp;</label>
					<div class="col-sm-4">
	                    <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Lưu</button>
						<a href="<?=base_url('admin/radio_schedule/index/'. $extension)?>" class="btn btn-default"><i class="fa fa-eraser"></i> Huỷ</a>
					</div>
				</div>
            </form>
			<?php $this->load->view('admin/radio_schedule/radio_schedule_javascript');?>
        </div>
    </div>
</div>
</body>
</html>