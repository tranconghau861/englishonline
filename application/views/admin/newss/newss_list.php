<!--<h1 class="page-header">--><?//= extensions($extension) ?><!--</h1>-->

<div class="row">
    <div class="col-md-8">
        <form class="form-inline" method="get">
            <div class="input-group">

                <?php if ($categorys) { ?>
                    <div class="input-group-btn">
                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false"><span
                                    class="filter-category-name">Danh mục</span> <span class="caret"></span></button>
                        <ul class="dropdown-menu">
                            <?php foreach ($categorys as $cat) { ?>
                                <li><a href="#" id="<?= $cat->id ?>" class="filter-category"><?= $cat->alt ?></a></li>
                            <?php } ?>
                            <li role="separator" class="divider"></li>
                            <li><a href="#" id="" class="filter-category">Tất cả</a></li>
                        </ul>
                    </div>
                    <input type="hidden" name="cid" class="filter-category-result" value="">
                <?php } ?>

                <div class="input-group-btn">
                    <input type="text" class="form-control textbox" name="s" value="<?= $s ?>" placeholder="Từ khoá">
                </div>

                <div class="input-group-btn">
								<span class="input-group-btn">
									<button type="submit" class="btn btn-primary">Tìm</button>
								</span>
                </div>
            </div>

            <?php if (in_array($extension, array('newss', 'video', 'relax', 'notice', 'career'))) { ?>
                <div class="input-group" style='margin-top:10px;'>
                    <div class="input-group-btn">
                        <div class="input-group date" id="date_from" style='width:50%;'>
                            <input type="text" class="form-control" name="date_from"
                                   value="<?= (int)@$date_from ? $date_from : '' ?>" placeholder="Bắt đầu">
                            <span class="input-group-addon">
										<span class="glyphicon glyphicon-calendar"></span>
									</span>
                        </div>
                        <div class="input-group date" id="date_to" style='width:50%; padding:5px;'>
                            <input type="text" class="form-control datetimepicker" name="date_to"
                                   value="<?= (int)@$date_to ? $date_to : '' ?>" placeholder="Kết thúc">
                            <span class="input-group-addon">
										<span class="glyphicon glyphicon-calendar"></span>
									</span>
                        </div>
                    </div>

                    <div class="input-group-btn">
								<span class="input-group-btn">
									<button type="submit" class="btn btn-primary">Tìm</button>
								</span>
                    </div>
                </div>
            <?php } ?>

        </form>
    </div>
    <div class="col-md-4 button">
        <?php if (isset($admin['params'][$extension]['add'])) { ?>
            <a href="<?= base_url('admin/newss/form/' . $extension) ?>" class="btn btn-success"><i
                        class="fa fa-plus"></i> Thêm</a>
        <?php } ?>

        <?php if (isset($admin['params'][$extension]['delete'])) { ?>
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

                <th>Tiêu đề</th>

                <?php if ($islang && in_array($extension, $modlang)) { ?>
                    <th width="3%" class="text-center">&nbsp;</th>
                <?php } ?>

                <?php if (in_array($extension, array('newss', 'video', 'relax', 'notice', 'career'))) { ?>
                    <th width="10%" class="text-center">Đăng bởi</th>
                <?php } ?>

                <?php if (in_array($extension, array('categorys-newss', 'category-video', 'category-relax'))) { ?>
                    <th width="7%" class="text-center">Thứ tự</th>
                <?php } ?>

                <?php if (!in_array($extension, array('video-item', 'relax-item'))) { ?>
                    <th width="8%" class="text-center">Hình ảnh</th>
                <?php } ?>

                <?php if (!in_array($extension, array('categorys-newss', 'category-video', 'category-relax'))) { ?>
                    <th width="9%" class="text-center">Ngày đăng</th>
                <?php } ?>

                <?php if (in_array($extension, array('newss', 'video', 'relax', 'about', 'notice', 'career'))) { ?>
                    <th width="3%" class="text-center"><i class="fa fa-eye" data-toggle="tooltip" data-placement="top"
                                                          title="Lượt xem"></i></th>
                <?php } ?>

                <th width="3%" class="text-center"></th>

                <th width="8%"></th>
            </tr>
            </thead>
            <tbody>
            <?php
            if ($rows) {
                $i = 1;
                foreach ($rows as $row) {
                    $parent = $this->newss->item($row->parent);
                    ?>
                    <tr>
                        <td class="text-center"><input type="checkbox" name="id[]" value="<?= $row->id ?>"></td>

                        <td class="text-center"><?= $i ?></td>

                        <td>
                            <?php
                            if ($parent && in_array($extension, array('categorys-newss', 'category-video', 'category-relax'))) {
                                echo $parent->title . '&nbsp; <i class="fa fa-long-arrow-right text-danger"></i> &nbsp;';
                            }
                            ?>

                            <?= $row->title ?><br/>

                            <?php if (in_array($extension, array('newss', 'video', 'relax')) && $parent) { ?>
                                <span class="text-muted">Chuyên mục:</span> <span
                                        class="text-danger"><?= $parent->title ?></span>
                            <?php } ?>

                            <?php if ((int)$row->date_from || (int)$row->date_to): ?><br>
                                <span class="text-muted">Ngày xuất bản:</span>
                                <span class="text-success">
										<?= (int)$row->date_from ? date('d/m/Y', strtotime($row->date_from)) : '' ?>
                                        <?= (int)$row->date_from && (int)$row->date_to ? ' - ' : '' ?>
                                        <?= (int)$row->date_to ? date('d/m/Y', strtotime($row->date_to)) : '' ?>
									</span>
                            <?php endif; ?>

                            <?php if (in_array($extension, array('ad'))) { ?>
                                <span class="text-muted">Vị trí:</span>
                                <span class="text-danger">
										<?php
                                        $ads = array(
                                            '' => '',
                                            'top' => 'Trên',
                                            'left' => 'Trái',
                                            'right' => 'Phải',
                                            'bottom' => 'Dưới',
                                        );
                                        echo $ads[$row->position];
                                        ?>
										</span>
                            <?php } ?>
                        </td>

                        <?php if ($islang && in_array($extension, $modlang)) { ?>
                            <th class="text-center"><a
                                        href="<?= base_url('admin/node/language/' . $extension . '/' . $row->id) ?>"
                                        data-toggle="tooltip" data-placement="top"
                                        title="Làm một bản dịch sang tiếng Anh"><img
                                            src="<?= base_url('assets/admin/images/en.png') ?>"></a></th>
                        <?php } ?>

                        <?php if (in_array($extension, array('newss', 'video', 'relax', 'notice', 'career'))) { ?>
                            <td class="text-center"><?= $this->user->item($row->uid)->name ?></td>
                        <?php } ?>

                        <?php if (in_array($extension, array('categorys-newss', 'category-video', 'category-relax'))) { ?>
                            <td class="text-center"><?= $row->ordering ?></td>
                        <?php } ?>

                        <?php if (!in_array($extension, array('video-item', 'relax-item'))) { ?>
                            <td class="text-center">
                                <?php echo @$row->photo ? '<a href="' . get_image_link($row->photo) . '" class="manific-image"><img src="' . get_image_link($row->photo) . '" width="50" height="50"></a>' : ''; ?>
                            </td>
                        <?php } ?>

                        <?php if (!in_array($extension, array('categorys-newss', 'category-video', 'category-relax'))) { ?>
                            <td class="text-center"><?= (int)$row->created ? nice_date($row->created, 'd/m/Y \<\b\r\>H:i') : '' ?></td>
                        <?php } ?>

                        <?php if (in_array($extension, array('newss', 'video', 'relax', 'about', 'notice', 'career'))) { ?>
                            <td class="text-center"><?= $row->sum_view ? $row->sum_view : '' ?></td>
                        <?php } ?>

                        <td class="text-center">
                            <?php
                            if (in_array($extension, array('newss', 'video', 'relax', 'notice', 'career'))) {
                                if ($row->status == 1) {
                                    echo '<i class="fa fa-check" data-toggle="tooltip" data-placement="top" title="Xuất bản"></i>';
                                } else if ($row->status == -1) {
                                    echo '<i class="fa fa-recycle" data-toggle="tooltip" data-placement="top" title="Bản nháp"></i>';
                                } else {
                                    echo '<i class="fa fa-minus-circle" data-toggle="tooltip" data-placement="top" title="Chờ duyệt"></i>';
                                }
                            } else {
                                if ($row->status) {
                                    echo '<i class="fa fa-check" data-toggle="tooltip" data-placement="top" title="Kích hoạt"></i>';
                                }
                            }
                            ?>
                        </td>

                        <td class="text-center">
                            <p>
                                <?php if (isset($admin['params'][$extension]['edit'])) { ?>
                                    <a href="<?= base_url('admin/newss/form/' . $extension . '/' . $row->id) ?>"
                                       data-toggle="tooltip" data-placement="top" title="Sửa"><i
                                                class="fa fa-pencil"></i></a> &nbsp;
                                <?php } ?>

                                <?php if (isset($admin['params'][$extension]['delete'])) { ?>
                                    <a href="<?= base_url('admin/newss/delete/' . $extension . '/' . $row->id) ?>"
                                       data-toggle="tooltip" data-placement="top" title="Xoá" class="delrow"><i
                                                class="fa fa-trash-o"></i></a> &nbsp;
                                <?php } ?>

                                <?php if (isset($admin['params'][$extension]['add']) || isset($admin['params'][$extension]['edit'])) { ?>
                                    <a href="<?= base_url('admin/newss/copy/' . $extension . '/' . $row->id) ?>"
                                       data-toggle="tooltip" data-placement="top" title="Copy"><i
                                                class="fa fa-copy"></i></a>
                                <?php } ?>
                            </p>

                            <?php if (in_array($extension, array('newss', 'video', 'relax', 'notice', 'career'))) { ?>
                                <p>
                                    <?php if (isset($admin['params'][$extension]['edit'])) { ?>
                                        <a href="<?= base_url('admin/newss/status/' . $extension . '/' . $row->id . '/1') ?>"
                                           data-toggle="tooltip" data-placement="top" title="Xuất bản"><i
                                                    class="fa fa-refresh"></i></a> &nbsp;
                                    <?php } ?>

                                    <?php if (isset($admin['params'][$extension]['edit'])) { ?>
                                        <a href="<?= base_url('admin/newss/status/' . $extension . '/' . $row->id . '/0') ?>"
                                           data-toggle="tooltip" data-placement="top" title="Chờ duyệt"><i
                                                    class="fa fa-arrow-circle-o-down"></i></a> &nbsp;
                                    <?php } ?>

                                    <a href="<?= base_url($extension . '/preview/' . $row->alias) ?>"
                                       data-toggle="tooltip" data-placement="top" title="Xem trước" target='_blank'><i
                                                class="fa fa-search"></i></a>
                                </p>
                            <?php } ?>

                        </td>
                    </tr>
                    <?php $i++;
                }
            } ?>
            </tbody>
        </table>
    </div>
</form>
<div class="row">
    <div class="col-md-6">
        <?= $pagination ?>
    </div>
    <div class="col-md-6 text-right">
        Tổng cộng: <?= $total ?>
    </div>
</div>
