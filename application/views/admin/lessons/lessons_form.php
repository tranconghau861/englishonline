            
            <?=isset($msg)?'<div class="alert alert-danger" role="alert">'. $msg .'</div>':''?>
            
            <h1 class="page-header"><?=extensions($extension)?></h1>
            
            <form method="post" name="adminForm" class="form-horizontal">
			
                <?php if(in_array($extension, array('category-lessons'))){ ?>
				<div class="form-group">
                    <label class="col-sm-2 control-label">Title</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="title" id="txtTitle" value="<?=htmlentities(@$row->title)?>" required>
                    </div>
                </div>
                <?php } ?>
				
                <?php if(in_array($extension, array('category-lessons'))){ ?>
                <div class="form-group">
                    <label class="col-sm-2 control-label">SEO Url</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="alias" id="txtSlug" value="<?=@$row->alias?>">
                    </div>
                </div>
                <?php } ?>
                
				<?php if(in_array($extension, array('category-lessons'))){ ?>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Level</label>
                    <div class="col-sm-3">
                        <select name="id_level" class="form-control">
                            <option value=""></option>
                            <option value="1" <?=@$row->id_level=='1'?'selected':''?>>Level 1</option>
                            <option value="2" <?=@$row->id_level=='2'?'selected':''?>>Level 2</option>
                            <option value="3" <?=@$row->id_level=='3'?'selected':''?>>Level 3</option>
                        </select>
                    </div>
                </div>
                <?php } ?>
				
				<?php if(in_array($extension, array('category-lessons'))){ ?>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Intro</label>
                    <div class="col-sm-6">
                        <textarea class="form-control" name="intro"><?=@$row->intro?></textarea>
                    </div>
                </div>
				<?php } ?>
				
								
				<?php if(in_array($extension, array('lessons'))){
                    $parent = $this->lessons->parents('category-lessons');
                ?>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Category Lessons</label>
                    <div class="col-sm-3">
                        <select name="parent" class="form-control">
                            <option value=""></option>
                            <?php if($parent){ foreach($parent as $pa){ ?>
                            <option value="<?=$pa->id?>" <?=$pa->id==@$row->parent?'selected':''?>><?=$pa->title?></option>
                            <?php }} ?>
                        </select>
                    </div>
                </div>
                <?php } ?>
				
				<?php if(in_array($extension, array('lessons'))){ ?>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Author</label>
                    <div class="col-sm-3">
                        <select name="id_author" class="form-control">
                            <option value=""></option>
                            <option value="1" <?=@$row->id_author=='1'?'selected':''?>>James</option>
                            <option value="2" <?=@$row->id_author=='2'?'selected':''?>>Lisa</option>
                        </select>
                    </div>
                </div>
                <?php } ?>
                
                <?php if(in_array($extension, array('lessons'))){ ?>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Content</label>
                    <div class="col-sm-10">
                        <textarea class="form-control" name="content"><?=@$row->content?></textarea>
                    </div>
                </div>
                <?php } ?>
				
				<div class="form-group">
                    <label class="col-sm-2 control-label">Files Video</label>
                    <div class="col-sm-3">
                        <input type="text" class="form-control" name="files_video" value="<?=@$row->files_video?$row->files_video:'file.mp3'?>">
                    </div>
                </div>
                
                <?php if(in_array($extension, array('category-lessons'))){ ?>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Images</label>
                    <div class="col-sm-4">
                        <button type="button" class="btn btn-default uploadFile" preview="picture"><i class="fa fa-cloud-upload"></i> Upload</button>
                        <div id="picture" class="groupImg"><?php echo @$row->photo ? '<span><i class="fa fa-close deleteImg"></i><img src="'. get_image_link($row->photo) .'" width="50" height="50"><input type="hidden" name="photo" value="'. $row->photo .'"></span>' : ''; ?></div>
                    </div>
                </div>
                <?php } ?> 

				<div class="form-group">
					<label class="col-sm-2 control-label">Ordering</label>
					<div class="col-sm-3">
						<input type="text" class="form-control" name="ordering" value="<?=@$row->ordering!=0?$row->ordering:''?>">
					</div>
				</div>
                				
				<div class="form-group">
                    <label class="col-sm-2 control-label">&nbsp;</label>
                    <div class="col-sm-10">
                        <label class="radio-inline"><input type="radio" name="status" value="1" <?=@$row->status || !isset($row->status)?'checked':''?>> Publish</label>
                        <label class="radio-inline"><input type="radio" name="status" value="0" <?=@$row->status==0 && isset($row->status)?'checked':''?>> UnPublish</label>   
                    </div>
                </div>               
                
                <?php if(in_array($extension, array('category-lessons'))){ ?>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Keywords</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="tag" value="<?=@$row->tag?>">
                    </div>
                </div>
                <?php } ?>
                
                <?php if(in_array($extension, array('category-lessons'))){ ?>
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
                
                <?php if(in_array($extension, array('category-lessons'))){ ?>
                <div class="repeats">
                    <?php
                        $i = 0;
                        if(@$row->fields){
                            $fields = is_array($row->fields) ? $row->fields : unserialize(@$row->fields);
                            foreach($fields as $field){
                    ?>
                    <div class="repeat">
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Thời gian</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="fields[<?=$i?>][time]" value="<?=@$field['time']?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Mô tả</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="fields[<?=$i?>][content]" value="<?=@$field['content']?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Liên kết</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="fields[<?=$i?>][link]" value="<?=@$field['link']?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">&nbsp;</label>
                            <div class="col-sm-6">
                                <a href="#" class="btn btn-danger deltimebtn"><i class="fa fa-plus"></i> Xoá nội dung</a>
                            </div>
                        </div>
                    </div>
                    <?php $i++; }} ?>
                </div>
                <div class="form-group" id="addtime">
                    <label class="col-sm-2 control-label">&nbsp;</label>
                    <div class="col-sm-6 text-right">
                        <a href="#" class="btn btn-info addtimebtn" number="<?=$i?>"><i class="fa fa-plus"></i> Thêm nội dung</a>
                    </div>
                </div>
                <br>
                <?php } ?>
                
                <div class="form-group">
                    <label class="col-sm-2 control-label">&nbsp;</label>
                    <div class="col-sm-4">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save</button>
                        <a href="<?=base_url('admin/lessons/index/'. $extension)?>" class="btn btn-default"><i class="fa fa-eraser"></i> Cancel</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>