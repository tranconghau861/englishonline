            <h1 class="page-header"><?=extensions($extension)?></h1>

			<div class="row">
				<div class="col-md-8">
					<form class="form-inline" method="get">
						<div class="input-group">
							<input type="text" class="form-control textbox" name="s" value="<?=$s?>" placeholder="Từ khoá">
							<span class="input-group-btn">
								<button type="submit" class="btn btn-primary">Tìm</button>
							</span>
						</div>
					</form>
				</div>
				<div class="col-md-4 button">
		            <a href="<?=base_url('admin/livevideo/form/'. $extension)?>" class="btn btn-success"><i class="fa fa-plus"></i> Thêm</a>
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
		                        <th width="8%">Hình</th>
								<th>Tiêu đề</th>
								<th width="9%" class="text-center">Phát lại</th>
								<th width="9%" class="text-center">Ngày phát sóng</th>
								<?php if($islang && in_array($extension, $modlang)){ ?>
		                        <th width="3%">&nbsp;</th>
								<?php } ?>
								<?php if($extension =='radiovideo'):?>
								<th>Danh mục</th>
								<?php endif;?>
		                        <th width="9%" class="text-center">Ngày đăng</th>		                        
		                        <th width="3%"></th>
		                        <th width="8%"></th>
		                    </tr>
		                </thead>
		                <tbody>
		                <?php
		                    if($rows){
		                        $i = 1;
		                        foreach($rows as $row){
			                       $parent = $this->node->item($row->parent);
		                ?>
		                    <tr>
			                    <td class="text-center"><input type="checkbox" name="id[]" value="<?=$row->id?>"></td>
		                        <td class="text-center"><?=$i?></td>
		                        <td class="text-center">
			                        <?php echo @$row->photo ? '<a href="'. get_image_link($row->photo) .'" class="manific-image"><img src="'. get_image_link($row->photo) .'" width="50" height="50"></a>' : ''; ?>
		                        </td>
		                        <td>
			                        <?php echo $row->name; ?>
		                        </td>
		                        <td>
			                        <?php echo $row->video_time; ?>
		                        </td>
								<td>
			                        <?php echo nice_date($row->schedule_date, 'm/d/Y'); ?>
		                        </td>
								
								<?php if($islang && in_array($extension, $modlang)){ ?>
		                        <th class="text-center"><a href="<?=base_url('admin/livevideo/language/'. $extension .'/'. $row->id)?>" data-toggle="tooltip" data-placement="top" title="Làm một bản dịch sang tiếng Anh"><img src="<?=base_url('assets/admin/images/en.png')?>"></a></th>
								<?php } ?>
								<?php if($extension =='radiovideo'):?>
								<td>
			                        <span class="text-danger"><?=$parent->title?></span>
		                        </td>
								<?php endif;?>
		                        <td class="text-center"><?=(!empty($row->date)) ? nice_date($row->date, 'm/d/Y') : ''?></td>
		                        
		                        
		                        
		                        <td class="text-center"><?=$row->publish?'<i class="fa fa-check" data-toggle="tooltip" data-placement="top" title="Kích hoạt"></i>':''?></td>
		                        
		                        <td class="text-center">
			                        <p>
			                        <a href="<?=base_url('admin/livevideo/form/'. $extension .'/'. $row->id)?>" data-toggle="tooltip" data-placement="top" title="Sửa"><i class="fa fa-pencil"></i></a> &nbsp; 
			                        <a href="<?=base_url('admin/livevideo/delete/'. $extension .'/'. $row->id)?>" data-toggle="tooltip" data-placement="top" title="Xoá" class="delrow"><i class="fa fa-trash-o"></i></a> &nbsp; 
			                        <a href="<?=base_url('admin/livevideo/copy/'. $extension .'/'. $row->id)?>" data-toggle="tooltip" data-placement="top" title="Copy"><i class="fa fa-copy"></i></a>
			                        </p>
			                        <p>
			                        <?php  
			                        	$ext = ($extension=='livevideo') ? 'xem-truyen-hinh' : 'xem-phat-thanh';
			                        ?>
										<a href="<?=base_url('livetv/preview/'. $row->alias . '/'.$extension)?>" data-toggle="tooltip" data-placement="top" title="Xem trước" target='_blank'><i class="fa fa-search"></i></a>
									</p>
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