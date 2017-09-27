            <?=isset($msg)?'<div class="alert alert-danger" role="alert">'. $msg .'</div>':''?>
            <h1 class="page-header"><?=extensions($extension)?></h1>
            <form method="post" name="adminForm" class="form-horizontal">
                <?php if(in_array($extension, array('noun'))){ ?>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Type</label>
                    <div class="col-sm-10">
                        <label class="radio-inline">
                            <input type="radio" name="id_type" value="1" <?= ($row->id_type == 1) ?'checked':'checked'?>> 1000 most common pharses
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="id_type" value="2" <?= ($row->id_type == 2) ?'checked':''?>> 1500 most common words
                        </label>
                    </div>
                </div>
                <?php } ?>
                <?php if(in_array($extension, array('noun'))){
                    $category = $this->noun->parent('category-noun');
                ?>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Category Noun</label>
                    <div class="col-sm-3">
                        <select name="parent" class="form-control">                            
                            <?php if($category){ foreach($category as $cat){ if($cat->id!=$row->id){ ?>
                            <option value="<?=$cat->id?>" <?=$cat->id==@$row->parent?'selected':''?>><?=$cat->alt?></option>
                            <?php }}} ?>
                        </select>
                    </div>
                </div>
                <?php } ?>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Tiêu đề</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="title" id="txtTitle" value="<?=htmlentities(@$row->title)?>" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">SEO Url</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="alias" id="txtSlug" value="<?=@$row->alias?>">
                    </div>
                </div>
				<div class="form-group">
                    <label class="col-sm-2 control-label">Files Video</label>
                    <div class="col-sm-3">
                        <input type="text" class="form-control" name="files_video" value="<?=@$row->files_video?$row->files_video:''?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">&nbsp;</label>
                    <div class="col-sm-10">
                        <label class="radio-inline"><input type="radio" name="status" value="1" <?=@$row->status || !isset($row->status)?'checked':''?>> Publish</label>
                        <label class="radio-inline"><input type="radio" name="status" value="0" <?=@$row->status==0 && isset($row->status)?'checked':''?>> UnPublish</label>   
                    </div>
                </div>
                <?php /*if(in_array($extension, array('noun'))){ ?>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Keywords</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="tag" value="<?=@$row->tag?>">
                    </div>
                </div>
                <?php } ?>
                <?php if(in_array($extension, array('noun'))){ ?>
                <div class="form-group">
                    <label class="col-sm-2 control-label">SEO Keywords</label>
                    <div class="col-sm-6">
                        <textarea class="form-control" name="keywords"><?=@$row->keywords?></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">SEO Description</label>
                    <div class="col-sm-6">
                        <textarea class="form-control" name="description"><?=@$row->description?></textarea>
                    </div>
                </div>
                <?php } ?>
                <?php if(!in_array($extension, array('noun'))){ ?>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Ordering</label>
                    <div class="col-sm-3">
                        <input type="text" class="form-control" name="ordering" value="<?=@$row->ordering!=0?$row->ordering:''?>">
                    </div>
                </div>
                <?php } */?>
                <div class="form-group">
                    <label class="col-sm-2 control-label">&nbsp;</label>
                    <div class="col-sm-4">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Lưu</button>
                        <a href="<?=base_url('admin/noun/index/'. $extension)?>" class="btn btn-default"><i class="fa fa-eraser"></i> Huỷ</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>