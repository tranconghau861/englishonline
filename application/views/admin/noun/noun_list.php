            <h1 class="page-header"><?=extensions($extension)?></h1>
            <div class="row">
                <div class="col-md-8">
                    <form class="form-inline" method="get">
                        <div class="input-group">
                            <?php if($category){ ?>
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
                            <?php } ?>
                            <div class="input-group-btn">
                                <input type="text" class="form-control textbox" name="s" value="<?=$s?>" placeholder="Từ khoá">
                            </div>
                            <div class="input-group-btn">
                                <span class="input-group-btn">
                                    <button type="submit" class="btn btn-primary">Tìm</button>
                                </span>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-md-4 button">
                    <?php if(isset($admin['params'][$extension]['add'])){ ?>
                    <a href="<?=base_url('admin/noun/form/'. $extension)?>" class="btn btn-success"><i class="fa fa-plus"></i> Thêm</a>
                    <?php } ?>
                    <?php if(isset($admin['params'][$extension]['delete'])){ ?>
                    <button class="btn btn-danger" id="btDelete"><i class="fa fa-trash-o"></i> Xoá</button>
                    <?php } ?>
                </div>
            </div><br>
            <form method="post" name="adminForm">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th width="3%" class="text-center"><input type="checkbox" id="chkAll"></th>
                                <th width="3%" class="text-center">#</th>
                                <th>Title</th>
                                <th>Type</th>
                                <?php if($islang && in_array($extension, $modlang)){ ?>
                                <th width="3%" class="text-center">&nbsp;</th>
                                <?php } ?>
                                <th width="10%" class="text-center">By Post</th>
                                <th width="9%" class="text-center">Date</th>
                                <th width="3%" class="text-center"></th>
                                <th width="8%"></th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                            if($rows){
                                $i = 1;
                                foreach($rows as $row){
                                    $parent = $this->noun->item($row->parent);
                        ?>
                            <tr>
                                <td class="text-center"><input type="checkbox" name="id[]" value="<?=$row->id?>"></td>
                                <td class="text-center"><?=$i?></td>
                                <td>
                                    <?=$row->title?><br/>
                                    <?php if(in_array($extension, array('noun'))  &&  $parent){ ?>
                                        <span class="text-muted">Category:</span> <span class="text-danger"><?=$parent->title?></span>
                                    <?php } ?>
                                    
                                </td>
                                <td>
                                    <?php
                                        echo ($row->id_type == 1) ? "1000 most common pharses" : "1500 most common words";
                                    ?>
                                </td>
                                <?php if($islang && in_array($extension, $modlang)){ ?>
                                <th class="text-center"><a href="<?=base_url('admin/node/language/'. $extension .'/'. $row->id)?>" data-toggle="tooltip" data-placement="top" title="Làm một bản dịch sang tiếng Anh"><img src="<?=base_url('assets/admin/images/en.png')?>"></a></th>
                                <?php } ?>
                                <td class="text-center"><?=$this->user->item($row->uid)->name?></td>
                                <td class="text-center"><?=(int) $row->created ? nice_date($row->created, 'd/m/Y \<\b\r\>H:i') : ''?></td>
                                <td class="text-center">
                                    <?php
                                        if(in_array($extension, array('noun'))){
                                            if($row->status == 1){
                                                echo '<i class="fa fa-check" data-toggle="tooltip" data-placement="top" title="Xuất bản"></i>';
                                            }
                                            else if($row->status == -1){
                                                echo '<i class="fa fa-recycle" data-toggle="tooltip" data-placement="top" title="Bản nháp"></i>';
                                            }
                                            else {
                                                echo '<i class="fa fa-minus-circle" data-toggle="tooltip" data-placement="top" title="Chờ duyệt"></i>';
                                            }
                                        }
                                        else {
                                            if($row->status){
                                                echo '<i class="fa fa-check" data-toggle="tooltip" data-placement="top" title="Kích hoạt"></i>';
                                            }
                                        }
                                    ?>
                                </td>
                                <td class="text-center">
                                    <p>
                                        <?php if(isset($admin['params'][$extension]['edit'])){ ?>
                                        <a href="<?=base_url('admin/noun/form/'. $extension .'/'. $row->id)?>" data-toggle="tooltip" data-placement="top" title="Sửa"><i class="fa fa-pencil"></i></a> &nbsp; 
                                        <?php } ?>
                                        <?php if(isset($admin['params'][$extension]['delete'])){ ?>
                                        <a href="<?=base_url('admin/noun/delete/'. $extension .'/'. $row->id)?>" data-toggle="tooltip" data-placement="top" title="Xoá" class="delrow"><i class="fa fa-trash-o"></i></a> &nbsp; 
                                        <?php } ?>
                                        <?php if(isset($admin['params'][$extension]['add']) || isset($admin['params'][$extension]['edit'])){ ?>
                                        <a href="<?=base_url('admin/noun/copy/'. $extension .'/'. $row->id)?>" data-toggle="tooltip" data-placement="top" title="Copy"><i class="fa fa-copy"></i></a>
                                        <?php } ?>
                                    </p>
                                    <p>
                                        <?php if(isset($admin['params'][$extension]['edit'])){ ?>
                                        <a href="<?=base_url('admin/noun/status/'. $extension .'/'. $row->id .'/1')?>" data-toggle="tooltip" data-placement="top" title="Xuất bản"><i class="fa fa-refresh"></i></a> &nbsp; 
                                        <?php } ?>
                                        <?php if(isset($admin['params'][$extension]['edit'])){ ?>
                                        <a href="<?=base_url('admin/noun/status/'. $extension .'/'. $row->id .'/0')?>" data-toggle="tooltip" data-placement="top" title="Chờ duyệt"><i class="fa fa-arrow-circle-o-down"></i></a> &nbsp;
                                        <?php } ?>
                                        <a href="<?=base_url($extension .'/preview/'. $row->alias)?>" data-toggle="tooltip" data-placement="top" title="Xem trước" target='_blank'><i class="fa fa-search"></i></a>
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