			<h1 class="page-header">Thành viên</h1>

			<div class="row">
				<div class="col-md-6">
					<form class="form-inline" method="get">
						<div class="input-group">
							<input type="text" class="form-control textbox" name="s" value="<?=$s?>" placeholder="Từ khoá">
							<span class="input-group-btn">
								<button type="submit" class="btn btn-primary">Tìm</button>
							</span>
						</div>
					</form>
				</div>
				<div class="col-md-6 button">
		            <a href="<?=base_url('admin/user/form')?>" class="btn btn-success"><i class="fa fa-plus"></i> Thêm</a>
		            <button class="btn btn-danger" id="btDelete"><i class="fa fa-trash-o"></i> Xoá</button>
				</div>
			</div><br>
			
			<form method="post" name="adminForm">
				<div class="table-responsive">
		            <table class="table table-bordered">
		                <thead>
		                    <tr>
			                    <th width="3%"><input type="checkbox" id="chkAll"></th>
		                        <th width="3%">#</th>
		                        <th>Tên</th>
		                        <th>Tài khoản</th>
		                        <th>Email</th>
		                        <th width="12%">Nhóm</th>
		                        <th width="3%"></th>
		                        <th width="6%"></th>
		                    </tr>
		                </thead>
		                <tbody>
		                <?php
		                    if($rows){
		                        $i = 1;
		                        foreach($rows as $row){
			                        $user_group = $this->user_group->item($row->gid);
		                ?>
		                    <tr>
			                    <td><input type="checkbox" name="id[]" value="<?=$row->id?>"></td>
		                        <td><?=$i?></td>
		                        <td><?=$row->name?></td>
		                        <td><?=$row->username?></td>
		                        <td><?=$row->email?></td>
		                        <td><?=$row->gid ? $user_group->name : 'Thành viên'?></td>
		                        <td class="text-center"><?=$row->status ? '<i class="fa fa-check" data-toggle="tooltip" data-placement="top" title="Kích hoạt"></i>' : ''?></td>
		                        <td class="text-center">
			                        <a href="<?=base_url('admin/user/form/'. $row->id)?>" data-toggle="tooltip" data-placement="top" title="Sửa"><i class="fa fa-pencil"></i></a> &nbsp; 
			                        <a href="<?=base_url('admin/user/delete/'. $row->id)?>" data-toggle="tooltip" data-placement="top" title="Xoá" class="delrow"><i class="fa fa-trash-o"></i></a>
			                    </td>
		                    </tr>
		                <?php $i++; }} ?>
		                </tbody>
		            </table>
				</div>
			</form>
			<div class="row">
				<div class="col-md-6">
					<?=$pagination?>
				</div>
				<div class="col-md-6 text-right">
					Tổng cộng: <?=$total?>
				</div>
			</div>
        </div>
    </div>
</div>
</body>
</html>