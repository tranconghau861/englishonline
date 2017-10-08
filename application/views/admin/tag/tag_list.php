<h1 class="page-header">Tags List</h1>

<div class="row">
    <div class="col-md-8">
        <form class="form-inline" method="get">
            <div class="input-group">
                <div class="input-group-btn">
                    <input type="text" class="form-control textbox" name="s" value="<?= $s ?>" placeholder="Từ khoá">
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
        <a href="<?= base_url('admin/tag/form/') ?>" class="btn btn-success"><i
           class="fa fa-plus"></i> Thêm</a>
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

                    <th>Tiêu đề</th>

                    <th width="3%" class="text-center">hiển thị</th>

                    <th width="8%"></th>
                </tr>
            </thead>
            <tbody>
            <?php
                if ($rows) {
                    $i = 1;
                    foreach ($rows as $row) {
                        ?>
                        <tr>
                            <td class="text-center"><input type="checkbox" name="id[]" value="<?= $row->id ?>"></td>

                            <td class="text-center"><?= $i ?></td>

                            <td>
                                <?= $row->title ?>
                            </td>

                            <td class="text-center">
                                <?php
                                    if ($row->status == 1) {
                                        echo '<i class="fa fa-check" data-toggle="tooltip" data-placement="top"
                                                 title="Xuất bản"></i>';
                                    } else if ($row->status == -1) {
                                        echo '<i class="fa fa-recycle" data-toggle="tooltip" data-placement="top" 
                                                 title="Bản nháp"></i>';
                                    } else {
                                        echo '<i class="fa fa-minus-circle" data-toggle="tooltip" data-placement="top" 
                                                 title="Chờ duyệt"></i>';
                                    }
                                ?>
                            </td>

                            <td class="text-center">
                            <p>
                                <a href="<?= base_url('admin/tag/form/' . $row->id) ?>"
                                   data-toggle="tooltip" data-placement="top" title="Sửa"><i
                                   class="fa fa-pencil"></i></a> &nbsp;

                                <a href="<?= base_url('admin/tag/delete/' . $row->id) ?>"
                                   data-toggle="tooltip" data-placement="top" title="Xoá" class="delrow"><i
                                   class="fa fa-trash-o"></i></a> &nbsp;

                                <a href="<?= base_url('admin/tag/copy/' . $row->id) ?>"
                                   data-toggle="tooltip" data-placement="top" title="Copy"><i
                                   class="fa fa-copy"></i></a>
                            </p>

                            <p>
                                <a href="<?= base_url('admin/tag/status/' . $row->id . '/1') ?>"
                                   data-toggle="tooltip" data-placement="top" title="Xuất bản"><i
                                   class="fa fa-refresh"></i></a> &nbsp;

                                <a href="<?= base_url('admin/tag/status/' . $row->id . '/0') ?>"
                                   data-toggle="tooltip" data-placement="top" title="Chờ duyệt"><i
                                   class="fa fa-arrow-circle-o-down"></i></a> &nbsp;

                                <a href="<?= base_url('/preview/' . $row->alias) ?>"
                                   data-toggle="tooltip" data-placement="top" title="Xem trước" target='_blank'><i
                                   class="fa fa-search"></i></a>
                            </p>
                        </tr>
                        <?php $i++;
                    }
                }
            ?>
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
