
            <?=isset($msg)?'<div class="alert alert-danger" role="alert">'. $msg .'</div>':''?>
            
            <h1 class="page-header">Ý kiến bạn đọc</h1>
            
			<form method="post" name="adminForm" class="form-horizontal">
				
				<?php if($topic){ ?>
				<div class="form-group">
					<label class="col-sm-2 control-label">Topic</label>
					<div class="col-sm-6">
						<input type="text" class="form-control" disabled="" value="<?=$topic->title?>">
						<input type="hidden" name="oid" value="<?=$topic->id?>">
					</div>
				</div>
				<?php } ?>
				
				<?php if($comment){ ?>
				<div class="form-group">
					<label class="col-sm-2 control-label">Trả lời cho</label>
					<div class="col-sm-6">
						<input type="text" class="form-control" disabled="" value="<?=$comment->name?>">
						<input type="hidden" name="parent" value="<?=$comment->id?>">
					</div>
				</div>
				<?php } ?>
				
				<div class="form-group">
					<label class="col-sm-2 control-label">Họ tên</label>
					<div class="col-sm-6">
						<input type="text" class="form-control" name="name" value="<?=$row->name?>">
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label">Email</label>
					<div class="col-sm-6">
						<input type="email" class="form-control" name="email" value="<?=$row->email?>">
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label">Ý kiến</label>
					<div class="col-sm-10">
                   		<textarea class="form-control" name="message" rows="8" required><?=@$row->message?></textarea>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label">Lượt quan tâm</label>
					<div class="col-sm-2">
						<input type="text" class="form-control" name="sum_like" value="<?=@$row->sum_like?>">
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label">&nbsp;</label>
					<div class="col-sm-2">
						<label class="checkbox-inline">
							<input type="checkbox" name="status" value="1" <?=@$row->status || !isset($row->status) ? 'checked' : ''?>> Kích hoạt
						</label>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label">&nbsp;</label>
					<div class="col-sm-4">
	                    <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Lưu</button>
						<a href="<?=base_url('admin/comment')?>" class="btn btn-default"><i class="fa fa-eraser"></i> Huỷ</a>
					</div>
				</div>
            </form>
        </div>
    </div>
</div>
</body>
</html>