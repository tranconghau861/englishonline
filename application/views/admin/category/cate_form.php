
<?=isset($msg)?'<div class="alert alert-danger" role="alert">'. $msg .'</div>':''?>

<h1 class="page-header">Category New</h1>

<form method="post" name="adminForm" class="form-horizontal">
    <div class="form-group">
        <label class="col-sm-2 control-label">Tiêu đề</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" name="title" id="txtTitle" value="<?=@$row->title?>" required>
        </div>
    </div>

        <div class="form-group">
            <label class="col-sm-2 control-label">Seo url</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="alias" id="txtSlug" value="<?=@$row->alias?>">
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-2 control-label">Images</label>
            <div class="col-sm-4">
                <button type="button" class="btn btn-default uploadFile" preview="picture"><i class="fa fa-cloud-upload"></i> Upload</button>
                <div id="picture" class="groupImg"><?php echo @$row->photo ? '<span><i class="fa fa-close deleteImg"></i><img src="'. get_image_link($row->photo) .'" width="50" height="50"><input type="hidden" name="photo" value="'. $row->photo .'"></span>' : ''; ?></div>
            </div>
        </div>

    <div class="form-group">
        <label class="col-sm-2 control-label">&nbsp;</label>
        <div class="col-sm-10">
                <p>
                    <label class="radio-inline"><input type="radio" name="status" value="1" <?=@$row->status || !isset($row->status)?'checked':''?>> Xuất bản</label>
                    <label class="radio-inline"><input type="radio" name="status" value="0" <?=@$row->status==0 && isset($row->status)?'checked':''?>> Chờ duyệt</label>
                    <label class="radio-inline"><input type="radio" name="status" value="-1" <?=@$row->status==-1?'checked':''?>> Bản nháp</label>
                </p>

                <label class="checkbox-inline"><input type="checkbox" name="status" value="1" <?=@$row->status || !isset($row->status)?'checked':''?>> Kích hoạt</label>

                    <label class="checkbox-inline"><input type="checkbox" name="home" value="1" <?=@$row->home?'checked':''?>> Trang chủ</label>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-2 control-label">&nbsp;</label>
        <div class="col-sm-4">
            <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Lưu</button>
            <a href="<?=base_url('admin/category/index/')?>" class="btn btn-default"><i class="fa fa-eraser"></i> Huỷ</a>
        </div>
    </div>
</form>
</div>
</div>
</div>
</body>
</html>