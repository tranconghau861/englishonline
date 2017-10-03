			<h1 class="page-header">Dashboard</h1>
			
            <div class="home">
	            <div class="row placeholders">
	                <div class="col-sm-3">
	                    <div class="placeholder color-1">
	                        <div class="num"><?=$user?></div>
	                        <div class="name"><i class="fa fa-users"></i> Thành viên</div>
	                    </div>
	                </div>
	                <div class="col-sm-3">
	                    <div class="placeholder color-4">
	                        <div class="num"><?=$video?></div>
	                        <div class="name"><i class="fa fa-file-video-o"></i> Video</div>
	                    </div>
	                </div>
	                <div class="col-sm-3">
	                    <div class="placeholder color-3">
	                        <div class="num"><?=$news?></div>
	                        <div class="name"><i class="fa fa-edit"></i> Tin tức - Sự kiện</div>
	                    </div>
	                </div>
	                <div class="col-sm-3">
	                    <div class="placeholder color-5">
	                        <div class="num"><?=$banner?></div>
	                        <div class="name"><i class="fa fa-adn"></i> Banner</div>
	                    </div>
	                </div>
	            </div>
	            <div class="row">
	                <div class="col-sm-6">
						<div class="panel panel-default panel-2">
							<div class="panel-heading"><i class="fa fa-file-video-o"></i> Video mới nhất</div>
					        <div class="table-responsive">
					            <table class="table table-bordered table-no-bold">
					                <thead>
					                    <tr>
					                        <th class="text-center" width="3%">#</th>
					                        <th>Tiêu đề</th>
					                        <th class="text-center" width="20%">Ngày đăng</th>
					                        <th>&nbsp;</th>
					                    </tr>
					                </thead>
					                <tbody>
					                <?php
					                    if($videos){
					                        $i = 1;
					                        foreach($videos as $row){
					                ?>
					                    <tr>
					                        <td class="text-center"><?=$i?></td>
					                        <td><?=$row->title?></td>
					                        <td class="text-center"><?=(int) $row->created ? nice_date($row->created, 'm/d/Y \<b\r\>H:i') : ''?></td>
					                        <td class="text-center">
						                        <?php echo @$row->photo ? '<a href="'. get_image_link($row->photo) .'" class="manific-image"><img src="'. get_image_link($row->photo) .'" width="50" height="50"></a>' : ''; ?>
					                        </td>
					                    </tr>
					                <?php $i++; }} ?>
					                </tbody>
					            </table>
					        </div>
						</div>
	                </div>
	                <div class="col-sm-6">
						<div class="panel panel-default panel-1">
							<div class="panel-heading"><i class="fa fa-edit"></i> Tin tức mới nhất</div>
					        <div class="table-responsive">
					            <table class="table table-bordered table-no-bold">
					                <thead>
					                    <tr>
					                        <th class="text-center" width="3%">#</th>
					                        <th>Tiêu đề</th>
					                        <th width="20%" class="text-center">Ngày đăng</th>
					                        <th>&nbsp;</th>
					                    </tr>
					                </thead>
					                <tbody>
					                <?php
					                    if($newss){
					                        $i = 1;
					                        foreach($newss as $row){
					                ?>
					                    <tr>
					                        <td class="text-center"><?=$i?></td>
					                        <td><?=$row->title?></td>
					                        <td class="text-center"><?=(int) $row->created ? nice_date($row->created, 'm/d/Y \<b\r\>H:i') : ''?></td>
					                        <td class="text-center">
						                        <?php echo @$row->photo ? '<a href="'. get_image_link($row->photo) .'" class="manific-image"><img src="'. get_image_link($row->photo) .'" width="50" height="50"></a>' : ''; ?>
					                        </td>
					                    </tr>
					                <?php $i++; }} ?>
					                </tbody>
					            </table>
					        </div>
						</div>
					</div>
	            </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>