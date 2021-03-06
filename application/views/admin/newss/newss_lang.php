<?= isset($msg) ? '<div class="alert alert-danger" role="alert">' . $msg . '</div>' : '' ?>

<h1 class="page-header"><?= extensions($extension) ?>: Tiếng Anh</h1>

<form method="post" name="adminForm" class="form-horizontal">
    <div class="form-group">
        <label class="col-sm-2 control-label">Nguồn</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" value="<?= @$row->title ?>" readonly>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-2 control-label">Tiêu đề</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" name="title_en" value="<?= @$row->title_en ?>" required>
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-2 control-label">Giới thiệu</label>
        <div class="col-sm-6">
            <textarea class="form-control" name="intro_en"><?= @$row->intro_en ?></textarea>
        </div>
    </div>

    <?php if (in_array($extension, array('news', 'video', 'career', 'notice', 'about'))) { ?>
        <div class="form-group">
            <label class="col-sm-2 control-label">Nội dung</label>
            <div class="col-sm-10">
                <textarea class="form-control summernote" name="content_en"><?= @$row->content_en ?></textarea>
            </div>
        </div>
    <?php } ?>

    <div class="form-group">
        <label class="col-sm-2 control-label">&nbsp;</label>
        <div class="col-sm-4">
            <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Lưu</button>
            <a href="<?= base_url('admin/news/index/' . $extension) ?>" class="btn btn-default"><i
                        class="fa fa-eraser"></i> Huỷ</a>
        </div>
    </div>
</form>
