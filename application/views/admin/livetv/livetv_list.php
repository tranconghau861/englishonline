            <h1 class="page-header"><?=extensions($extension)?></h1>

			<div class="row">
				<div class="col-md-8">
					<form class="form-inline" method="get">
						<div class="input-group">
							
							<?php /*if($category){ ?>
							<div class="input-group-btn">
								<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="filter-category-name">Danh mục</span> <span class="caret"></span></button>
								<ul class="dropdown-menu">
			                        <?php foreach($category as $cat){ ?>
			                        <li><a href="#" id="<?=$cat->id?>" class="filter-category"><?=$cat->alt?></a></li>
			                        <?php } ?>
									<li role="separator" class="divider"></li>
									<li><a href="#" id="" class="filter-category">Tất cả</a></li>
								</ul>
							</div>
							<input type="hidden" name="cid" class="filter-category-result" value="">
							<?php } */?>
							
							<input type="text" class="form-control textbox" name="s" value="<?=$s?>" placeholder="Từ khoá">
							<span class="input-group-btn">
								<button type="submit" class="btn btn-primary">Tìm</button>
							</span>
						</div>
					</form>
				</div>
				<div class="col-md-4 button">
		            <a href="<?=base_url('admin/livetv/form/'. $extension)?>" class="btn btn-success"><i class="fa fa-plus"></i> Thêm</a>
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
								<!--th>Danh mục</th-->
								<?php if($islang && in_array($extension, $modlang)){ ?>
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
			                        /*
									$ncate = '';
									foreach($category as $cat){
										$ncate .=  ($cat->id==$row->media_category_id) ? $cat->title : ''; 
									}
									*/
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
								<!--td>
			                        <?php /*echo $ncate*/ ?>
		                        </td-->
		                        
								<?php if($islang && in_array($extension, $modlang)){ ?>
		                        <th class="text-center"><a href="<?=base_url('admin/livetv/language/'. $extension .'/'. $row->id)?>" data-toggle="tooltip" data-placement="top" title="Làm một bản dịch sang tiếng Anh"><img src="<?=base_url('assets/admin/images/en.png')?>"></a></th>
								<?php } ?>
								
		                        <td class="text-center"><?=(!empty($row->date)) ? nice_date($row->date, 'm/d/Y') : ''?></td>
		                        
		                        
		                        
		                        <td class="text-center"><?=$row->publish?'<i class="fa fa-check" data-toggle="tooltip" data-placement="top" title="Kích hoạt"></i>':''?></td>
		                        
		                        <td class="text-center">
			                        <a href="<?=base_url('admin/livetv/form/'. $extension .'/'. $row->id)?>" data-toggle="tooltip" data-placement="top" title="Sửa"><i class="fa fa-pencil"></i></a> &nbsp; 
			                        <a href="<?=base_url('admin/livetv/delete/'. $extension .'/'. $row->id)?>" data-toggle="tooltip" data-placement="top" title="Xoá"><i class="fa fa-trash-o"></i></a> &nbsp; 
			                        <a href="<?=base_url('admin/livetv/copy/'. $extension .'/'. $row->id)?>" data-toggle="tooltip" data-placement="top" title="Copy"><i class="fa fa-copy"></i></a>
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