            
            <?=isset($msg)?'<div class="alert alert-danger" role="alert">'. $msg .'</div>':''?>
            
            <h1 class="page-header"><?=extensions($extension)?></h1>
            
			<form method="post" name="adminForm" class="form-horizontal">
				
				<?php if(in_array($extension, array('category-alphabet'))){
					$category = $this->alphabet->parent('main-alphabet', 0, 1);
				?>
				<div class="form-group">
					<label class="col-sm-2 control-label">Main Alphabet</label>
					<div class="col-sm-3">
	                    <select name="parent" class="form-control">
	                        <option value=""></option>
	                        <?php if($category){ foreach($category as $cat){ if($cat->id!=$row->id){ ?>
	                        <option value="<?=$cat->id?>" <?=$cat->id==@$row->parent?'selected':''?>><?=$cat->alt?></option>
	                        <?php }}} ?>
	                    </select>
					</div>
				</div>
				<?php } ?>
				
				<?php if(in_array($extension, array('alphabet'))){
					$main = $this->alphabet->parent('main-alphabet', 0, 0);
					$ids = $this->alphabet->flatten($main);					
					$category = $this->alphabet->parent('category-alphabet', $ids, 100);
				?>
				<div class="form-group">
					<label class="col-sm-2 control-label">Category Alphabet</label>
					<div class="col-sm-3">
	                    <select name="parent" class="form-control">
	                        <option value=""></option>
	                        <?php if($category){ foreach($category as $cat){ if($cat->id!=$row->id){ ?>
	                        <option value="<?=$cat->id?>" <?=$cat->id==@$row->parent?'selected':''?>><?=$cat->alt?></option>
	                        <?php }}} ?>
	                    </select>
					</div>
				</div>
				<?php } ?>
				
				<div class="form-group">
					<label class="col-sm-2 control-label">Title</label>
					<div class="col-sm-6">
						<input type="text" class="form-control" name="title" id="txtTitle" value="<?=@$row->title?>" required>
					</div>
				</div>
				<?php if(!in_array($extension, array('alphabet'))){ ?>				
				<div class="form-group">
					<label class="col-sm-2 control-label">SEO Url</label>
					<div class="col-sm-6">
						<input type="text" class="form-control" name="alias" id="txtSlug" value="<?=@$row->alias?>">
					</div>
				</div>
				<?php } ?>
				
				<?php if(in_array($extension, array('category-alphabet'))){ ?>
				<div class="form-group">
					<label class="col-sm-2 control-label">Giới thiệu</label>
					<div class="col-sm-6">
                   		<textarea class="form-control" name="intro"><?=@$row->intro?></textarea>
					</div>
				</div>
				<?php } ?>
				
				<?php if(in_array($extension, array('alphabet'))){ ?>
				<div class="repeats">
					<?php
						$i = 0;
						if(@$row->fields){
							$fields = is_array($row->fields) ? $row->fields : unserialize(@$row->fields);
							foreach($fields as $field){
					?>
					<div class="repeat">						
						<div class="form-group">
							<label class="col-sm-2 control-label">Pronounce</label>
							<div class="col-sm-5">
								<input type="text" class="form-control" name="fields[<?=$i?>][content]" value="<?=@$field['content']?>">
							</div>
							<div class="col-sm-1">
								<a href="#" class="btn btn-danger delalphabetbtn"><i class="fa fa-plus"></i> Delete</a>
							</div>
						</div>						
						
					</div>
					<?php $i++; }} ?>
				</div>
				<div class="form-group" id="addtime">
					<label class="col-sm-2 control-label">&nbsp;</label>
					<div class="col-sm-6 text-right">
						<a href="#" class="btn btn-info addalphabet" number="<?=$i?>"><i class="fa fa-plus"></i> Add alphabet</a>
					</div>
				</div>
				<br>
				<?php } ?>
				
				<?php if(in_array($extension, array('alphabet'))){ ?>
				<div class="form-group">
					<label class="col-sm-2 control-label">Note</label>
					<div class="col-sm-6">
                   		<textarea class="form-control" name="intro"><?=@$row->intro?></textarea>
					</div>
				</div>
				<?php } ?>
				
				<?php if(in_array($extension, array('category-alphabet'))){ ?>
				<div class="form-group">
					<label class="col-sm-2 control-label">Images</label>
					<div class="col-sm-4">
						<button type="button" class="btn btn-default uploadFile" preview="picture"><i class="fa fa-cloud-upload"></i> Upload</button>
						<div id="picture" class="groupImg"><?php echo @$row->photo ? '<span><i class="fa fa-close deleteImg"></i><img src="'. get_image_link($row->photo) .'" width="50" height="50"><input type="hidden" name="photo" value="'. $row->photo .'"></span>' : ''; ?></div>
					</div>
				</div>
                <?php } ?>
				
				<div class="form-group">
                    <label class="col-sm-2 control-label">&nbsp;</label>
                    <div class="col-sm-10">
                        <label class="radio-inline"><input type="radio" name="status" value="1" <?=@$row->status || !isset($row->status)?'checked':''?>> Publish</label>
                        <label class="radio-inline"><input type="radio" name="status" value="0" <?=@$row->status==0 && isset($row->status)?'checked':''?>> UnPublish</label>   
                    </div>
                </div> 
				
				
				<?php if(in_array($extension, array('main-alphabet', 'category-alphabet'))){ ?>
				<div class="form-group">
					<label class="col-sm-2 control-label">Keywords</label>
					<div class="col-sm-6">
						<input type="text" class="form-control" name="tag" value="<?=@$row->tag?>">
					</div>
				</div>
				<?php } ?>
				
				<?php if(in_array($extension, array('main-alphabet', 'category-alphabet'))){ ?>
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
				
				<div class="form-group">
					<label class="col-sm-2 control-label">&nbsp;</label>
					<div class="col-sm-4">
	                    <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Lưu</button>
						<a href="<?=base_url('admin/alphabet/index/'. $extension)?>" class="btn btn-default"><i class="fa fa-eraser"></i> Huỷ</a>
					</div>
				</div>
            </form>
        </div>
    </div>
</div>
</body>
</html>