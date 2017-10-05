
<?=isset($msg)?'<div class="alert alert-danger" role="alert">'. $msg .'</div>':''?>

<h1 class="page-header"><?=extensions($extension)?></h1>

<form method="post" name="adminForm" class="form-horizontal">
    <div class="form-group">
        <label class="col-sm-2 control-label">Tiêu đề</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" name="title" id="txtTitle" value="<?=@$row->title?>" required>
        </div>
    </div>

    <?php if(!in_array($extension, array('cat', 'ad', 'video-item', 'relax-item', 'about', 'link'))){ ?>
        <div class="form-group">
            <label class="col-sm-2 control-label">Seo url</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="alias" id="txtSlug" value="<?=@$row->alias?>">
            </div>
        </div>
    <?php } ?>

    <?php if(in_array($extension, array('banner', 'ad', 'video', 'relax', 'link'))){ ?>
        <div class="form-group">
            <label class="col-sm-2 control-label">Liên kết</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="link" value="<?=@$row->link?>">
            </div>
        </div>
    <?php } ?>

    <div class="form-group">
        <label class="col-sm-2 control-label">Intro</label>
        <div class="col-sm-6">
            <textarea class="form-control" name="intro"><?=@$row->intro?></textarea>
        </div>
    </div>

    <?php if(in_array($extension, array('video', 'relax', 'career', 'about', 'notice'))){ ?>
        <div class="form-group">
            <label class="col-sm-2 control-label">Description</label>
            <div class="col-sm-10">
                <textarea class="form-control summernote" name="content"><?=@$row->content?></textarea>
            </div>
        </div>
    <?php } ?>

    <?php if(!in_array($extension, array('video-item', 'relax-item'))){ ?>
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
            <?php if(in_array($extension, array('newss', 'video', 'relax'))){ ?>
                <p>
                    <label class="radio-inline"><input type="radio" name="status" value="1" <?=@$row->status || !isset($row->status)?'checked':''?>> Xuất bản</label>
                    <label class="radio-inline"><input type="radio" name="status" value="0" <?=@$row->status==0 && isset($row->status)?'checked':''?>> Chờ duyệt</label>
                    <label class="radio-inline"><input type="radio" name="status" value="-1" <?=@$row->status==-1?'checked':''?>> Bản nháp</label>
                </p>

                <?php if(in_array($extension, array('newss', 'video'))){ ?>
                    <p>
                        <label class="checkbox-inline"><input type="checkbox" name="hot" value="1" <?=@$row->hot?'checked':''?>> Tin HOT</label>
                        <label class="checkbox-inline"><input type="checkbox" name="featured" value="1" <?=@$row->featured?'checked':''?>> Tin Nổi bật</label>
                        <?php if(in_array($extension, array('video'))){ ?>
                            <label class="checkbox-inline"><input type="checkbox" name="special" value="1" <?=@$row->special?'checked':''?>> Video Đặc sắc</label>
                        <?php } ?>

                    </p>
                <?php } ?>

            <?php } else { ?>

                <label class="checkbox-inline"><input type="checkbox" name="status" value="1" <?=@$row->status || !isset($row->status)?'checked':''?>> Kích hoạt</label>

                <?php if(in_array($extension, array('category-video', 'category'))){ ?>
                    <label class="checkbox-inline"><input type="checkbox" name="home" value="1" <?=@$row->home?'checked':''?>> Trang chủ</label>
                <?php } ?>

            <?php } ?>
        </div>
    </div>

    <?php if(in_array($extension, array('ad'))){ ?>
        <div class="form-group">
            <label class="col-sm-2 control-label">Vị trí</label>
            <div class="col-sm-3">
                <select name="position" class="form-control">
                    <option value=""></option>
                    <option value="top" <?=@$row->position=='top'?'selected':''?>>Trên</option>
                    <option value="left" <?=@$row->position=='left'?'selected':''?>>Trái</option>
                    <option value="right" <?=@$row->position=='right'?'selected':''?>>Phải</option>
                    <option value="bottom" <?=@$row->position=='bottom'?'selected':''?>>Dưới</option>
                </select>
            </div>
        </div>
    <?php } ?>

    <?php if(in_array($extension, array('category-radio', 'category', 'category-video', 'category-relax'))){
        $categorys = $this->category->parent($extension);
        ?>
        <div class="form-group">
            <label class="col-sm-2 control-label">Danh mục cha</label>
            <div class="col-sm-3">
                <select name="parent" class="form-control">
                    <option value=""></option>
                    <?php if($categorys){ foreach($categorys as $cat){ if($cat->id!=$row->id){ ?>
                        <option value="<?=$cat->id?>" <?=$cat->id==@$row->parent?'selected':''?>><?=$cat->alt?></option>
                    <?php }}} ?>
                </select>
            </div>
        </div>
    <?php } ?>

    <?php if(in_array($extension, array('newss', 'video', 'relax'))){
        $categorys = $this->newss->parent('categorys-'. $extension);
        ?>
        <div class="form-group">
            <label class="col-sm-2 control-label">Danh mục</label>
            <div class="col-sm-3">
                <select name="parent" class="form-control">
                    <option value=""></option>
                    <?php if($categorys){ foreach($categorys as $cat){ ?>
                        <option value="<?=$cat->id?>" <?=$cat->id==@$row->parent?'selected':''?>><?=$cat->alt?></option>
                    <?php }} ?>
                </select>
            </div>
        </div>
    <?php } ?>

    <?php if(in_array($extension, array('video-item'))){
        $parent = $this->newss->parents('video');
        ?>
        <div class="form-group">
            <label class="col-sm-2 control-label">Video</label>
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

    <?php if(in_array($extension, array('relax-item'))){
        $parent = $this->newss->parents('relax');
        ?>
        <div class="form-group">
            <label class="col-sm-2 control-label">Giải trí</label>
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

    <?php if(in_array($extension, array('video-item', 'relax-item'))){
        $fields = @is_array($row->fields) ? $row->fields : @unserialize($row->fields);
        ?>
        <div class="form-group">
            <label class="col-sm-2 control-label">Timeslot</label>
            <div class="col-sm-3">
                <input type="text" name="fields[timeslot]" class="form-control" value="<?=@$fields['timeslot']?>">
            </div>
        </div>
    <?php } ?>

    <?php if(in_array($extension, array('newss', 'video', 'relax', 'notice'))){ ?>
        <div class="form-group">
            <label class="col-sm-2 control-label">Ngày xuất bản</label>
            <div class="col-sm-3">
                <div class="input-group date" id="date_from">
                    <input type="text" class="form-control" name="date_from" value="<?=(int)@$row->date_from?date('d/m/Y', strtotime($row->date_from)):''?>" placeholder="Bắt đầu">
                    <span class="input-group-addon">
		                        <span class="glyphicon glyphicon-calendar"></span>
		                    </span>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="input-group date" id="date_to">
                    <input type="text" class="form-control" name="date_to" value="<?=(int)@$row->date_to?date('d/m/Y', strtotime($row->date_to)):''?>" placeholder="Kết thúc">
                    <span class="input-group-addon">
		                        <span class="glyphicon glyphicon-calendar"></span>
		                    </span>
                </div>
            </div>
        </div>
    <?php } ?>

    <?php if(in_array($extension, array('newss'))){ ?>
        <div class="form-group">
            <label class="col-sm-2 control-label">Tin liên quan</label>
            <div class="col-sm-6">
                <input type="text" id="field-related" class="form-control" value="" placeholder="Nhập từ cần tìm">
                <div class="field-related-result <?=@$row->fields ? '' : 'hidden'?>">
                    <?php if(@$row->fields){
                        $fields = is_array($row->fields) ? $row->fields : unserialize(@$row->fields);
                        foreach($fields['related'] as $key => $val){
                            $newss = $this->newss->item($val);
                            ?>
                            <div class="checkbox"><label><input type="checkbox" value="<?=$val?>" name="fields[related][<?=$key?>]" checked> <?=$newss->title?></label></div>
                        <?php }} ?>
                </div>
            </div>
        </div>
    <?php } ?>

    <?php if(in_array($extension, array('about'))){ ?>
        <div class="form-group">
            <label class="col-sm-2 control-label">Bố cục</label>
            <div class="col-sm-3">
                <select name="type" class="form-control" id="fieldtype">
                    <option value="about-info" <?=@$row->type=='about-info'?'selected':''?>>Kiểu 1</option>
                    <option value="about-history" <?=@$row->type=='about-history'?'selected':''?>>Kiểu 2</option>
                    <option value="about-achievement" <?=@$row->type=='about-achievement'?'selected':''?>>Kiểu 3</option>
                    <option value="about-mission" <?=@$row->type=='about-mission'?'selected':''?>>Kiểu 4</option>
                </select>
            </div>
        </div>
        <!--
				<div class="repeats">
					<?php
        $i = 0;
        if(@$row->fields){
            $fields = is_array($row->fields) ? $row->fields : unserialize(@$row->fields);
            foreach($fields as $field){
                ?>
					<div class="repeat">
						<div class="form-group">
							<label class="col-sm-2 control-label">Tiêu đề</label>
							<div class="col-sm-9">
								<input type="text" class="form-control" name="fields[<?=$i?>][name]" value="<?=@$field['name']?>">
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">Hình ảnh</label>
							<div class="col-sm-9">
								<button type="button" class="btn btn-default uploadFile" preview="imgrepeat<?=$i?>" number="<?=$i?>"><i class="fa fa-cloud-upload"></i> Upload</button>
								<div id="imgrepeat<?=$i?>" class="groupImg"><?php echo @$field['photo'] ? '<span><i class="fa fa-close deleteImg"></i><img src="'. get_image_link($field['photo']) .'" width="50" height="50"><input type="hidden" name="fields['. $i .'][photo]" value="'. $field['photo'] .'"></span>' : ''; ?></div>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">Nội dung</label>
							<div class="col-sm-9">
	                   			<textarea class="form-control" name="fields['+ number +'][content]" rows="5"><?=@$field['content']?></textarea>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">&nbsp;</label>
							<div class="col-sm-9">
								<a href="#" class="btn btn-danger delfieldbtn"><i class="fa fa-plus"></i> Xoá field</a>
							</div>
						</div>
					</div>
					<?php $i++; }} ?>
				</div>
				<div class="form-group <?=$i ? '' : 'hidden'?>" id="addfield">
					<label class="col-sm-2 control-label">&nbsp;</label>
					<div class="col-sm-10 text-right">
						<a href="#" class="btn btn-info addfieldbtn" number="<?=$i?>"><i class="fa fa-plus"></i> Thêm field</a>
					</div>
				</div>
				<br>
-->
    <?php } ?>

    <?php if(in_array($extension, array('__'))){ ?>
        <div class="form-group">
            <label class="col-sm-2 control-label">Thư viện ảnh</label>
            <div class="col-sm-4">
                <button type="button" class="btn btn-default uploadFile" preview="gallery"><i class="fa fa-cloud-upload"></i> Upload</button>
                <div id="gallery" class="groupImg">
                    <?php if(@$row->gallery){
                        $gallery = is_array($row->gallery) ? $row->gallery : unserialize(@$row->gallery);
                        foreach($gallery as $g){ echo '<span><i class="fa fa-close deleteImg"></i><img src="'. get_image_link($g) .'" width="50" height="50"><input type="hidden" name="gallery[]" value="'. $g .'"></span>'; }} ?>
                </div>
            </div>
        </div>
    <?php } ?>

    <?php if(in_array($extension, array('newss', 'career', 'video', 'relax', 'notice'))){ ?>
        <div class="form-group">
            <label class="col-sm-2 control-label">Từ khoá</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="tag" value="<?=@$row->tag?>">
            </div>
        </div>
    <?php } ?>

    <?php if(in_array($extension, array('newss', 'career', 'video', 'relax', 'notice'))){ ?>
        <div class="form-group">
            <label class="col-sm-2 control-label">SEO từ khoá</label>
            <div class="col-sm-6">
                <textarea class="form-control" name="keywords"><?=@$row->keywords?></textarea>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">SEO giới thiệu</label>
            <div class="col-sm-6">
                <textarea class="form-control" name="description"><?=@$row->description?></textarea>
            </div>
        </div>
    <?php } ?>

    <?php if(!in_array($extension, array('newss', 'career', 'video', 'relax', 'about', 'notice'))){ ?>
        <div class="form-group">
            <label class="col-sm-2 control-label">Thứ tự sắp xếp</label>
            <div class="col-sm-3">
                <input type="text" class="form-control" name="ordering" value="<?=@$row->ordering!=0?$row->ordering:''?>">
            </div>
        </div>
    <?php } ?>

    <?php if(in_array($extension, array('video', 'relax'))){ ?>
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
            <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Lưu</button>
            <a href="<?=base_url('admin/category/index/'. $extension)?>" class="btn btn-default"><i class="fa fa-eraser"></i> Huỷ</a>
        </div>
    </div>
</form>
</div>
</div>
</div>
</body>
</html>