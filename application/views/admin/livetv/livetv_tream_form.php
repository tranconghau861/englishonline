            
            <?=isset($msg)?'<div class="alert alert-danger" role="alert">'. $msg .'</div>':''?>
            
            <h1 class="page-header"><?=extensions($extension)?></h1>
            
			<form method="post" name="adminForm" class="form-horizontal">
				
				<div class="form-group">
					<label class="col-sm-2 control-label">Tên sự kiện</label>
					<div class="col-sm-6">
						<input type="text" class="form-control" name="name" id="txtName" value="<?=htmlentities(@$row->name)?>" required>
					</div>
				</div>		
				<div class="form-group">
					<label class="col-sm-2 control-label">Liên kết </label>
					<div class="col-sm-6">
						<input type="text" class="form-control" name="rtmphost" id="txtRtmphost" value="<?=htmlentities(@$row->rtmphost)?>" required>
					</div>
				</div>	
				
				<div class="form-group">
					<label class="col-sm-2 control-label">Nội dung</label>
					<div class="col-sm-10">
                   		<div class="col-md-2 padding-lr">
							<label>Khung giờ</label>										
							<div class="form-group">								
								<div class="input-group date" id="schedule_time">
								<input type="text" class="form-control datetimepicker" name="schedule_name" id="schedule_name" value="" placeholder="Thời gian">
								<span class="input-group-addon">
									<span class="glyphicon glyphicon-calendar"></span>
								</span>
								</div>
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
										<th style="text-align:center;">Tiêu đề</th>
										<th style="text-align:center;">Nội dụng</th>
										<th style="text-align:center;width:15%; height:35px;">Xóa</th>
									</tr>
								</thead>
								<tbody>
									<tr id="not_avail_player">
										<?php 
											if(!empty($row->intro)){
												
												$schedule = explode(";",$row->intro);
												$total = count($schedule);
												for($i=0;$i < $total;$i++){
													$item = explode("||",$schedule[$i]);
													
													$hp = trim($item[0],' :');						
													$time = str_replace("h",":",$hp);
													$title = isset($item[1]) ? $item[1] : '';
													$content = isset($item[2]) ? str_replace("##","",$item[2]): ''; 
													
													
													$check = trim($schedule[$i], ' ||');
													$value = trim($row->intro, ' || ; ');
													if(!empty($time) && !empty($title)):
													?>
													<tr prop="<?php echo trim($time);?>">
														<td style="text-align:center;padding-left:10px;"><?php echo trim($time);?></td>
														<td style="text-align:center;"><?php echo $title;?></td>
														<td style="text-align:center;"><?php echo $content;?></td>
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
					<input type="hidden" id="hd_player_lst" name='hd_player_lst' value='<?php echo @$row->intro;?>'/>
				</div>
				
				<div class="form-group">
					<label class="col-sm-2 control-label">Hình ảnh</label>
					<div class="col-sm-4">
						<button type="button" class="btn btn-default uploadFile" preview="picture"><i class="fa fa-cloud-upload"></i> Upload</button>
						<div id="picture" class="groupImg"><?php echo @$row->photo ? '<span><i class="fa fa-close deleteImg"></i><img src="'. get_image_link($row->photo) .'" width="50" height="50"><input type="hidden" name="photo" value="'. $row->photo .'"></span>' : ''; ?></div>
					</div>
				</div>
				
				<div class="form-group">
					<label class="col-sm-2 control-label">&nbsp;</label>
					<div class="col-sm-10">
						<label class="text-default"><input type="checkbox" name="publish" value="1" <?=@$row->publish || !isset($row->publish)?'checked':''?>> Kích hoạt</label>
					</div>
				</div>	
				<div class="form-group">
					<label class="col-sm-2 control-label">&nbsp;</label>
					<div class="col-sm-4">
	                    <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Lưu</button>
						<a href="<?=base_url('admin/livetv/livetv_tream/'. $extension)?>" class="btn btn-default"><i class="fa fa-eraser"></i> Huỷ</a>
					</div>
				</div>
            </form>
			<?php $this->load->view('admin/livetv_schedule/livetv_schedule_javascript');?>
        </div>
    </div>
</div>
</body>
</html>