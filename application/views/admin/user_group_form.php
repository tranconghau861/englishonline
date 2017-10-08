
            <?=isset($msg)?'<div class="alert alert-danger" role="alert">'. $msg .'</div>':''?>
            
            <h1 class="page-header">Nhóm thành viên</h1>
            
			<form method="post" name="adminForm" class="form-horizontal">
				<div class="form-group">
					<label class="col-sm-2 control-label">Tên</label>
					<div class="col-sm-6">
						<input type="text" class="form-control" name="name" value="<?=@$row->name?>" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label">Phân quyền</label>
					<div class="col-sm-6">
						<div class="table-responsive">
							<table class="table table-bordered">
								<thead>
									<tr>
										<th>Mô đun</th>
										<th width="15%" class="text-center">
											<label>
												<input type="checkbox" id="chkAdd"> Thêm
											</label>
										</th>
										<th width="15%" class="text-center">
											<label>
												<input type="checkbox" id="chkEdit"> Sửa
											</label>
										</th>
										<th width="15%" class="text-center">
											<label>
												<input type="checkbox" id="chkDelete"> Xoá
											</label>
										</th>
									</tr>
								</thead>
								<tbody>
								<?php $params = @unserialize($row->params); ?>
									<tr>
										<td>Cài đặt</td>
										<td class="text-center"></td>
										<td class="text-center"><input class="chkEditVal" type="checkbox" name="params[setting][edit]" value="1" <?=@$params['setting']['edit'] ? 'checked' : ''?>></td>
										<td class="text-center"></td>
									</tr>
									<tr>
										<td>Nhóm thành viên</td>
										<td class="text-center"><input class="chkAddVal" type="checkbox" name="params[user_group][add]" value="1" <?=@$params['user_group']['add'] ? 'checked' : ''?>></td>
										<td class="text-center"><input class="chkEditVal" type="checkbox" name="params[user_group][edit]" value="1" <?=@$params['user_group']['edit'] ? 'checked' : ''?>></td>
										<td class="text-center"><input class="chkDeleteVal" type="checkbox" name="params[user_group][delete]" value="1" <?=@$params['user_group']['delete'] ? 'checked' : ''?>></td>
									</tr>
									<tr>
										<td>Thành viên</td>
										<td class="text-center"><input class="chkAddVal" type="checkbox" name="params[user][add]" value="1" <?=@$params['user']['add'] ? 'checked' : ''?>></td>
										<td class="text-center"><input class="chkEditVal" type="checkbox" name="params[user][edit]" value="1" <?=@$params['user']['edit'] ? 'checked' : ''?>></td>
										<td class="text-center"><input class="chkDeleteVal" type="checkbox" name="params[user][delete]" value="1" <?=@$params['user']['delete'] ? 'checked' : ''?>></td>
									</tr>
                                    <tr>
                                        <td>Categorys News</td>
                                        <td class="text-center"><input class="chkAddVal" type="checkbox" name="params[categorys-newss][add]" value="1" <?=@$params['categorys-newss']['add'] ? 'checked' : ''?>></td>
                                        <td class="text-center"><input class="chkEditVal" type="checkbox" name="params[categorys-newss][edit]" value="1" <?=@$params['categorys-newss']['edit'] ? 'checked' : ''?>></td>
                                        <td class="text-center"><input class="chkDeleteVal" type="checkbox" name="params[categorys-newss][delete]" value="1" <?=@$params['categorys-newss']['delete'] ? 'checked' : ''?>></td>
                                    </tr>
                                    <tr>
                                        <td>News</td>
                                        <td class="text-center"><input class="chkAddVal" type="checkbox" name="params[newss][add]" value="1" <?=@$params['newss']['add'] ? 'checked' : ''?>></td>
                                        <td class="text-center"><input class="chkEditVal" type="checkbox" name="params[newss][edit]" value="1" <?=@$params['newss']['edit'] ? 'checked' : ''?>></td>
                                        <td class="text-center"><input class="chkDeleteVal" type="checkbox" name="params[newss][delete]" value="1" <?=@$params['newss']['delete'] ? 'checked' : ''?>></td>
                                    </tr>
                                    <tr>
                                        <td>Category</td>
                                        <td class="text-center"><input class="chkAddVal" type="checkbox" name="params[category][add]" value="1" <?=@$params['category']['add'] ? 'checked' : ''?>></td>
                                        <td class="text-center"><input class="chkEditVal" type="checkbox" name="params[category][edit]" value="1" <?=@$params['category']['edit'] ? 'checked' : ''?>></td>
                                        <td class="text-center"><input class="chkDeleteVal" type="checkbox" name="params[category][delete]" value="1" <?=@$params['category']['delete'] ? 'checked' : ''?>></td>
                                    </tr>
                                    <tr>
                                        <td>Tags</td>
                                        <td class="text-center"><input class="chkAddVal" type="checkbox" name="params[tag][add]" value="1" <?=@$params['tag']['add'] ? 'checked' : ''?>></td>
                                        <td class="text-center"><input class="chkEditVal" type="checkbox" name="params[tag][edit]" value="1" <?=@$params['tag']['edit'] ? 'checked' : ''?>></td>
                                        <td class="text-center"><input class="chkDeleteVal" type="checkbox" name="params[tag][delete]" value="1" <?=@$params['tag']['delete'] ? 'checked' : ''?>></td>
                                    </tr>
									
								</tbody>
							</table>
						</div>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label">&nbsp;</label>
					<div class="col-sm-2">
						<label class="text-default">
							<input type="checkbox" name="status" value="1" <?=@$row->status || !isset($row->status) ? 'checked' : ''?>> Kích hoạt
						</label>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label">&nbsp;</label>
					<div class="col-sm-6">
	                    <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Lưu</button>
						<a href="<?=base_url('admin/user_group')?>" class="btn btn-default"><i class="fa fa-eraser"></i> Huỷ</a>
					</div>
				</div>
            </form>
        </div>
    </div>
</div>
</body>
</html>