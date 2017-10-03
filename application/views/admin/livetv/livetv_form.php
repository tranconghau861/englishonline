            <?=isset($msg)?'<div class="alert alert-danger" role="alert">'. $msg .'</div>':''?>
            <h1 class="page-header"><?=extensions($extension)?></h1>
            <form method="post" name="adminForm" class="form-horizontal">
                <div class="form-group">
                    <label class="col-sm-2 control-label">Mã kênh</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="code" id="txtCode" value="<?=htmlentities(@$row->code)?>" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Tên kênh</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="name" id="txtName" value="<?=htmlentities(@$row->name)?>" required>
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
                <!--div class="form-group">
                    <label class="col-sm-2 control-label">Danh mục</label>
                    <div class="col-sm-3">
                        <select name="media_category_id" class="form-control">
                            <option value=""></option>
                            <?php /*if($category){ foreach($category as $cat){ ?>
                            <option value="<?=$cat->id?>" <?=$cat->id==@$row->media_category_id?'selected':''?>><?=$cat->title?></option>
                            <?php }}*/ ?>
                        </select>
                    </div>
                </div-->
                <div class="form-group">
                    <label class="col-sm-2 control-label">Rtmp Host</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="rtmphost" id="txtRtmphost" value="<?=htmlentities(@$row->rtmphost)?>" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Http Host</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="httphost" id="txtHttphost" value="<?=htmlentities(@$row->httphost)?>" required>
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
                        <label class="text-default"><input type="checkbox" name="is_message" value="1" <?=@$row->is_message || !isset($row->is_message)?'checked':''?>>Hiển thị thông báo</label>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Thông báo</label>
                    <div class="col-sm-6">
                        <textarea class="form-control" name="message"><?=@$row->message?></textarea>
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
                        <a href="<?=base_url('admin/livetv/index/'. $extension)?>" class="btn btn-default"><i class="fa fa-eraser"></i> Huỷ</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>