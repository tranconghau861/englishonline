
            <?=isset($msg)?'<div class="alert alert-danger" role="alert">'. $msg .'</div>':''?>
            
            <h1 class="page-header">Thay đổi thông tin</h1>
            
			<form method="post" name="adminForm" class="form-horizontal">
				<div class="form-group">
					<label class="col-sm-2 control-label">Họ</label>
					<div class="col-sm-6">
						<input type="text" class="form-control" name="firstname" value="<?=@$row->firstname?>" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label">Tên</label>
					<div class="col-sm-6">
						<input type="text" class="form-control" name="lastname" value="<?=@$row->lastname?>" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label">Tài khoản</label>
					<div class="col-sm-6">
						<input type="text" class="form-control" name="username" value="<?=@$row->username?>" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label">Mật khẩu</label>
					<div class="col-sm-6">
						<input type="password" class="form-control" name="password">
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label">Email</label>
					<div class="col-sm-6">
						<input type="email" class="form-control" name="email" value="<?=@$row->email?>" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label">&nbsp;</label>
					<div class="col-sm-6">
	                    <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Cập nhật</button>
					</div>
				</div>
            </form>
        </div>
    </div>
</div>
</body>
</html>