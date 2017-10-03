
			<h1 class="page-header">Ý kiến bạn đọc</h1>

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
		            <a href="<?=base_url('admin/comment/form')?>" class="btn btn-success"><i class="fa fa-plus"></i> Thêm</a>
		            <button class="btn btn-danger" id="btDelete"><i class="fa fa-trash-o"></i> Xoá</button>
				</div>
			</div><br>
			
			<form method="post" name="adminForm">
				<div class="table-responsive">
		            <table class="table table-bordered">
		                <thead>
		                    <tr>
			                    <th width="3%" class="text-center"><input type="checkbox" id="chkAll"></th>
		                        <th width="3%" class="text-center">#</th>
		                        <th width="20%">Họ tên</th>
		                        <th>Ý kiến</th>
		                        <th width="9%" class="text-center">Ngày đăng</th>
		                        <th width="9%" class="text-center">Ip</th>
		                        <th width="3%"></th>
		                        <th width="6%"></th>
		                    </tr>
		                </thead>
		                <tbody>
		                <?php
		                    if($rows){
		                        $i = 1;
		                        foreach($rows as $row){
			                        
			                        $topic = $this->node->item($row->oid);
			                        if($topic){
				                        $arg = '';
				                        if($topic->extension == 'news'){
					                        $arg = 'tin-tuc/' . $topic->alias;
				                        }
				                        $link = site_url($arg);
			                        }
		                ?>
		                    <tr>
			                    <td class="text-center"><input type="checkbox" name="id[]" value="<?=$row->id?>"></td>
		                        <td class="text-center"><?=$i?></td>
		                        <td>
			                        <?=$row->name?><br>
			                        <span class="text-muted">Email:</span>
			                        <span class="text-primary"><?=mailto($row->email)?></span>
		                        </td>
		                        <td>
			                        <?php if($topic){ ?>
			                        <a href="<?=$link?>" data-toggle="tooltip" data-placement="top" title="<?=$topic->title?>"><?=$topic->title?></a><br>
			                        <?php } ?>
				                    
				                    <?=parse_smileys(nl2br($row->message), base_url('assets/smileys/'))?>
		                        </td>
		                        <td class="text-center"><?=(int) $row->created ? nice_date($row->created, 'd/m/Y\<\b\r\>H:i') : ''?></td>
		                        <td class="text-center"><?=$row->ip?></td>
		                        <td class="text-center"><?=$row->status ? '<i class="fa fa-check color-status" data-toggle="tooltip" data-placement="top" title="Kích hoạt"></i>' : ''?></td>
		                        <td class="text-center">
			                        <a href="<?=base_url('admin/comment/form/'. $row->id)?>" data-toggle="tooltip" data-placement="top" title="Sửa"><i class="fa fa-pencil"></i></a> &nbsp; 
			                        <a href="<?=base_url('admin/comment/delete/'. $row->id)?>" data-toggle="tooltip" data-placement="top" title="Xoá" class="delrow"><i class="fa fa-trash-o"></i></a>
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