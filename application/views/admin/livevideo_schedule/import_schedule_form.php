            
            <?=isset($msg)?'<div class="alert alert-danger" role="alert">'. $msg .'</div>':''?>
            
            <h1 class="page-header"><?=extensions($extension)?></h1>
            
			<form method="post" name="adminForm" class="form-horizontal">
				
				<div class="form-group">
					<label class="col-sm-2 control-label">File mẫu</label>
					<div class="col-sm-4">
						<p class="form-control-static">
							<a href="<?=base_url('upload/file/livetv_schedule_30_01_2016.xls')?>"><i class="fa fa-cloud-download"></i> Tải xuống</a>
						</p>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label">File Lịch phát sóng</label>
					<div class="col-sm-6">
						<button type="button" class="btn btn-default uploadFile" preview="excel"><i class="fa fa-cloud-upload"></i> Upload</button>
						<div id="excel" class="groupImg"><?php echo @$row->photo ? '<span class="excel"><i class="fa fa-close deleteImg"></i> <a href="'. get_image_link($row->photo) .'">'. $row->photo .'</a> <input type="hidden" name="file" value="'. $row->photo .'"></span>' : ''; ?></div>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label">&nbsp;</label>
					<div class="col-sm-4">
	                    <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Lưu</button>
						<a href="<?=base_url('admin/livetv_schedule/index/'. $extension)?>" class="btn btn-default"><i class="fa fa-eraser"></i> Huỷ</a>
					</div>
				</div>
            </form>
        </div>
    </div>
</div>
</body>
</html>