            <?php $this->load->helper('text');?>
			<h1 class="page-header"><?=extensions($extension)?></h1>

			<div class="row">
				<div class="col-md-8">
					<!--form class="form-inline" method="get">
						<div class="input-group">
							
							<?php if($category){ ?>
							<div class="input-group-btn">
								<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="filter-category-name">Danh mục</span> <span class="caret"></span></button>
								<ul class="dropdown-menu">
			                        <?php foreach($category as $cat){ ?>
			                        <li><a href="#" id="<?=$cat->id?>" class="filter-category"><?=$cat->name?></a></li>
			                        <?php } ?>
									<li role="separator" class="divider"></li>
									<li><a href="#" id="" class="filter-category">Tất cả</a></li>
								</ul>
							</div>
							<input type="hidden" name="cid" class="filter-category-result" value="">
							<?php } ?>
							
							
							<span class="input-group-btn">
								<button type="submit" class="btn btn-primary">Tìm</button>
							</span>
						</div>
					</form-->
				</div>
				<div class="col-md-4 button">
					<!--a title="Import lịch phát sóng" href="<?=base_url('admin/radio_schedule/import/'. $extension)?>" class="btn btn-success"><i class="fa fa-plus"></i> Import</a-->
		            <a href="<?=base_url('admin/radio_schedule/form/'. $extension)?>" class="btn btn-success"><i class="fa fa-plus"></i> Thêm</a>
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
								<th>Lịch phát thanh</th>
								<th>Xem</th>
								<?php if($islang ){ ?>
		                        <th width="3%">&nbsp;</th>
								<?php } ?>
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
										
		                ?>
		                    <tr>
			                    <td class="text-center"><input type="checkbox" name="id[]" value="<?=$row->id?>"></td>
		                        <td class="text-center"><?=$i?></td>
								
								<td>
									<?php echo word_limiter($row->content, 20);?>
									<div class='schedule' id="schedule_<?php echo $row->schedule_date;?>"></div>
								</td>
								<td>
									<a href="javascript:void(0)" onclick="ViewLiveVideoSchedule('<?php echo $row->schedule_date;?>','schedule_<?php echo $row->schedule_date;?>','<?=base_url('admin/'.$extension.'/getschedule')?>','<?php echo $extension;?>')" data-toggle="tooltip" data-placement="top" title="Xem trước" ><i class="fa fa-eye"></i></a>
								</td>		                        
								<?php if($islang){ ?>
		                        <th class="text-center"><a href="<?=base_url('admin/'.$extension.'/language/'. $extension .'/'. $row->id)?>" data-toggle="tooltip" data-placement="top" title="Làm một bản dịch sang tiếng Anh"><img src="<?=base_url('assets/admin/images/en.png')?>"></a></th>
								<?php } ?>								
		                        <td class="text-center"><?=(!empty($row->schedule_date)) ? nice_date($row->schedule_date, 'd/m/Y') : ''?></td>
		                        <td class="text-center"><?=$row->publish?'<i class="fa fa-check" data-toggle="tooltip" data-placement="top" title="Kích hoạt"></i>':''?></td>
		                        
		                        <td class="text-center">
			                        <a href="<?=base_url('admin/'.$extension.'/form/'. $extension .'/'. $row->id)?>" data-toggle="tooltip" data-placement="top" title="Sửa"><i class="fa fa-pencil"></i></a> &nbsp; 
			                        <a href="<?=base_url('admin/'.$extension.'/delete/'. $extension .'/'. $row->id)?>" data-toggle="tooltip" data-placement="top" title="Xoá" class="delrow"><i class="fa fa-trash-o"></i></a> &nbsp; 			                        
									
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
		<?php $this->load->view('admin/'.$extension.'/'.$extension.'_javascript');?>
    </div>
</div>
</body>
</html>