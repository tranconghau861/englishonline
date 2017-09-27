            
            <?=isset($msg)?'<div class="alert alert-danger" role="alert">'. $msg .'</div>':''?>
            
            <h1 class="page-header"><?=extensions($extension)?></h1>
            
			<form method="post" name="adminForm" class="form-horizontal">
				
				<div class="form-group">
					<label class="col-sm-2 control-label">Tên phát thanh</label>
					<div class="col-sm-6">
						<input type="text" class="form-control" name="name" id="txtName" value="<?=htmlentities(@$row->name)?>" required>
					</div>
				</div>	
				<div class="form-group">
					<label class="col-sm-2 control-label">Link video</label>
					<div class="col-sm-6">
						<input type="text" class="form-control" name="link_livevideo" id="link_livevideo" value="<?=htmlentities(@$row->link_livevideo)?>" required>
					</div>
				</div>				
				<div class="form-group">
					<label class="col-sm-2 control-label">Giới thiệu</label>
					<div class="col-sm-6">
                   		<textarea class="form-control" name="intro"><?=@$row->intro?></textarea>
					</div>
				</div>               
				

				<div class="form-group">
					<label class="col-sm-2 control-label">Hình ảnh</label>
					<div class="col-sm-4">
						<button type="button" class="btn btn-default uploadFile" preview="picture"><i class="fa fa-cloud-upload"></i> Upload</button>
						<div id="picture" class="groupImg"><?php echo @$row->photo ? '<span><i class="fa fa-close deleteImg"></i><img src="'. get_image_link($row->photo) .'" width="50" height="50"><input type="hidden" name="photo" value="'. $row->photo .'"></span>' : ''; ?></div>
					</div>
				</div>
							
				
				<div class="form-group">
					<label class="col-sm-2 control-label">Thứ tự sắp xếp</label>
					<div class="col-sm-3">
						<input type="text" class="form-control" name="sort_order" value="<?=@$row->sort_order!=0?$row->sort_order:''?>">
					</div>
				</div>
				
				<div class="form-group">
					<label class="col-sm-2 control-label">&nbsp;</label>
					<div class="col-sm-10">
						<label class="text-default"><input type="checkbox" name="is_hot" value="1" <?=@$row->is_hot || !isset($row->is_hot)?'checked':''?>> Hot</label>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label">Ngày phát sóng</label>
					<div class="col-sm-6">
                   		<div class="input-group date" id="schedule_date">
						<input type="text" class="form-control datetimepicker" name="schedule_date" value="<?=(!empty($row->schedule_date))?$row->schedule_date:''?>" placeholder="Ngày phát sóng">
						<span class="input-group-addon">
							<span class="glyphicon glyphicon-calendar"></span>
						</span>
					</div>
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
						<a href="<?=base_url('admin/radio/index/'. $extension)?>" class="btn btn-default"><i class="fa fa-eraser"></i> Huỷ</a>
					</div>
				</div>
            </form>
        </div>
    </div>
</div>
</body>
</html>