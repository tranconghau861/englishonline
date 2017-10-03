
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
										<td>Danh mục Video</td>
										<td class="text-center"><input class="chkAddVal" type="checkbox" name="params[category-video][add]" value="1" <?=@$params['category-video']['add'] ? 'checked' : ''?>></td>
										<td class="text-center"><input class="chkEditVal" type="checkbox" name="params[category-video][edit]" value="1" <?=@$params['category-video']['edit'] ? 'checked' : ''?>></td>
										<td class="text-center"><input class="chkDeleteVal" type="checkbox" name="params[category-video][delete]" value="1" <?=@$params['category-video']['delete'] ? 'checked' : ''?>></td>
									</tr>									
									<tr>
										<td>Video</td>
										<td class="text-center"><input class="chkAddVal" type="checkbox" name="params[video][add]" value="1" <?=@$params['video']['add'] ? 'checked' : ''?>></td>
										<td class="text-center"><input class="chkEditVal" type="checkbox" name="params[video][edit]" value="1" <?=@$params['video']['edit'] ? 'checked' : ''?>></td>
										<td class="text-center"><input class="chkDeleteVal" type="checkbox" name="params[video][delete]" value="1" <?=@$params['video']['delete'] ? 'checked' : ''?>></td>
									</tr>
									<tr>
										<td>Category Lessons</td>
										<td class="text-center"><input class="chkAddVal" type="checkbox" name="params[category-lessons][add]" value="1" <?=@$params['category-lessons']['add'] ? 'checked' : ''?>></td>
										<td class="text-center"><input class="chkEditVal" type="checkbox" name="params[category-lessons][edit]" value="1" <?=@$params['category-lessons']['edit'] ? 'checked' : ''?>></td>
										<td class="text-center"><input class="chkDeleteVal" type="checkbox" name="params[category-lessons][delete]" value="1" <?=@$params['category-lessons']['delete'] ? 'checked' : ''?>></td>
									</tr>
									<tr>
										<td>Lessons</td>
										<td class="text-center"><input class="chkAddVal" type="checkbox" name="params[lessons][add]" value="1" <?=@$params['lessons']['add'] ? 'checked' : ''?>></td>
										<td class="text-center"><input class="chkEditVal" type="checkbox" name="params[lessons][edit]" value="1" <?=@$params['lessons']['edit'] ? 'checked' : ''?>></td>
										<td class="text-center"><input class="chkDeleteVal" type="checkbox" name="params[lessons][delete]" value="1" <?=@$params['lessons']['delete'] ? 'checked' : ''?>></td>
									</tr>
									<tr>
										<td>Category Noun</td>
										<td class="text-center"><input class="chkAddVal" type="checkbox" name="params[category-noun][add]" value="1" <?=@$params['category-noun']['add'] ? 'checked' : ''?>></td>
										<td class="text-center"><input class="chkEditVal" type="checkbox" name="params[category-noun][edit]" value="1" <?=@$params['category-noun']['edit'] ? 'checked' : ''?>></td>
										<td class="text-center"><input class="chkDeleteVal" type="checkbox" name="params[category-noun][delete]" value="1" <?=@$params['category-noun']['delete'] ? 'checked' : ''?>></td>
									</tr>
									<tr>
										<td>Noun</td>
										<td class="text-center"><input class="chkAddVal" type="checkbox" name="params[noun][add]" value="1" <?=@$params['noun']['add'] ? 'checked' : ''?>></td>
										<td class="text-center"><input class="chkEditVal" type="checkbox" name="params[noun][edit]" value="1" <?=@$params['noun']['edit'] ? 'checked' : ''?>></td>
										<td class="text-center"><input class="chkDeleteVal" type="checkbox" name="params[noun][delete]" value="1" <?=@$params['noun']['delete'] ? 'checked' : ''?>></td>
									</tr>
									
									<tr>
										<td>Main Alphabet</td>
										<td class="text-center"><input class="chkAddVal" type="checkbox" name="params[main-alphabet][add]" value="1" <?=@$params['main-alphabet']['add'] ? 'checked' : ''?>></td>
										<td class="text-center"><input class="chkEditVal" type="checkbox" name="params[main-alphabet][edit]" value="1" <?=@$params['main-alphabet']['edit'] ? 'checked' : ''?>></td>
										<td class="text-center"><input class="chkDeleteVal" type="checkbox" name="params[main-alphabet][delete]" value="1" <?=@$params['main-alphabet']['delete'] ? 'checked' : ''?>></td>
									</tr>
									<tr>
										<td>Category Alphabet</td>
										<td class="text-center"><input class="chkAddVal" type="checkbox" name="params[category-alphabet][add]" value="1" <?=@$params['category-alphabet']['add'] ? 'checked' : ''?>></td>
										<td class="text-center"><input class="chkEditVal" type="checkbox" name="params[category-alphabet][edit]" value="1" <?=@$params['category-alphabet']['edit'] ? 'checked' : ''?>></td>
										<td class="text-center"><input class="chkDeleteVal" type="checkbox" name="params[category-alphabet][delete]" value="1" <?=@$params['category-alphabet']['delete'] ? 'checked' : ''?>></td>
									</tr>
									<tr>
										<td>Alphabet</td>
										<td class="text-center"><input class="chkAddVal" type="checkbox" name="params[alphabet][add]" value="1" <?=@$params['alphabet']['add'] ? 'checked' : ''?>></td>
										<td class="text-center"><input class="chkEditVal" type="checkbox" name="params[alphabet][edit]" value="1" <?=@$params['alphabet']['edit'] ? 'checked' : ''?>></td>
										<td class="text-center"><input class="chkDeleteVal" type="checkbox" name="params[alphabet][delete]" value="1" <?=@$params['alphabet']['delete'] ? 'checked' : ''?>></td>
									</tr>
									
									<tr>
										<td>Danh mục Tin tức - Sự kiện</td>
										<td class="text-center"><input class="chkAddVal" type="checkbox" name="params[category-news][add]" value="1" <?=@$params['category-news']['add'] ? 'checked' : ''?>></td>
										<td class="text-center"><input class="chkEditVal" type="checkbox" name="params[category-news][edit]" value="1" <?=@$params['category-news']['edit'] ? 'checked' : ''?>></td>
										<td class="text-center"><input class="chkDeleteVal" type="checkbox" name="params[category-news][delete]" value="1" <?=@$params['category-news']['delete'] ? 'checked' : ''?>></td>
									</tr>
									<tr>
										<td>Tin tức - Sự kiện</td>
										<td class="text-center"><input class="chkAddVal" type="checkbox" name="params[news][add]" value="1" <?=@$params['news']['add'] ? 'checked' : ''?>></td>
										<td class="text-center"><input class="chkEditVal" type="checkbox" name="params[news][edit]" value="1" <?=@$params['news']['edit'] ? 'checked' : ''?>></td>
										<td class="text-center"><input class="chkDeleteVal" type="checkbox" name="params[news][delete]" value="1" <?=@$params['news']['delete'] ? 'checked' : ''?>></td>
									</tr>
									<tr>
										<td>Danh mục giải trí</td>
										<td class="text-center"><input class="chkAddVal" type="checkbox" name="params[category-relax][add]" value="1" <?=@$params['category-relax']['add'] ? 'checked' : ''?>></td>
										<td class="text-center"><input class="chkEditVal" type="checkbox" name="params[category-relax][edit]" value="1" <?=@$params['category-relax']['edit'] ? 'checked' : ''?>></td>
										<td class="text-center"><input class="chkDeleteVal" type="checkbox" name="params[category-relax][delete]" value="1" <?=@$params['category-relax']['delete'] ? 'checked' : ''?>></td>
									</tr>
									<tr>
										<td>Giải trí</td>
										<td class="text-center"><input class="chkAddVal" type="checkbox" name="params[relax][add]" value="1" <?=@$params['relax']['add'] ? 'checked' : ''?>></td>
										<td class="text-center"><input class="chkEditVal" type="checkbox" name="params[relax][edit]" value="1" <?=@$params['relax']['edit'] ? 'checked' : ''?>></td>
										<td class="text-center"><input class="chkDeleteVal" type="checkbox" name="params[relax][delete]" value="1" <?=@$params['relax']['delete'] ? 'checked' : ''?>></td>
									</tr>
									<tr>
										<td>Giới thiệu</td>
										<td class="text-center"><input class="chkAddVal" type="checkbox" name="params[about][add]" value="1" <?=@$params['about']['add'] ? 'checked' : ''?>></td>
										<td class="text-center"><input class="chkEditVal" type="checkbox" name="params[about][edit]" value="1" <?=@$params['about']['edit'] ? 'checked' : ''?>></td>
										<td class="text-center"><input class="chkDeleteVal" type="checkbox" name="params[about][delete]" value="1" <?=@$params['about']['delete'] ? 'checked' : ''?>></td>
									</tr>
									<tr>
										<td>Banner</td>
										<td class="text-center"><input class="chkAddVal" type="checkbox" name="params[banner][add]" value="1" <?=@$params['banner']['add'] ? 'checked' : ''?>></td>
										<td class="text-center"><input class="chkEditVal" type="checkbox" name="params[banner][edit]" value="1" <?=@$params['banner']['edit'] ? 'checked' : ''?>></td>
										<td class="text-center"><input class="chkDeleteVal" type="checkbox" name="params[banner][delete]" value="1" <?=@$params['banner']['delete'] ? 'checked' : ''?>></td>
									</tr>
									<tr>
										<td>Quảng cáo</td>
										<td class="text-center"><input class="chkAddVal" type="checkbox" name="params[ad][add]" value="1" <?=@$params['ad']['add'] ? 'checked' : ''?>></td>
										<td class="text-center"><input class="chkEditVal" type="checkbox" name="params[ad][edit]" value="1" <?=@$params['ad']['edit'] ? 'checked' : ''?>></td>
										<td class="text-center"><input class="chkDeleteVal" type="checkbox" name="params[ad][delete]" value="1" <?=@$params['ad']['delete'] ? 'checked' : ''?>></td>
									</tr>
									<tr>
										<td>Thông báo</td>
										<td class="text-center"><input class="chkAddVal" type="checkbox" name="params[notice][add]" value="1" <?=@$params['notice']['add'] ? 'checked' : ''?>></td>
										<td class="text-center"><input class="chkEditVal" type="checkbox" name="params[notice][edit]" value="1" <?=@$params['notice']['edit'] ? 'checked' : ''?>></td>
										<td class="text-center"><input class="chkDeleteVal" type="checkbox" name="params[notice][delete]" value="1" <?=@$params['notice']['delete'] ? 'checked' : ''?>></td>
									</tr>
									<tr>
										<td>Tuyển dụng</td>
										<td class="text-center"><input class="chkAddVal" type="checkbox" name="params[career][add]" value="1" <?=@$params['career']['add'] ? 'checked' : ''?>></td>
										<td class="text-center"><input class="chkEditVal" type="checkbox" name="params[career][edit]" value="1" <?=@$params['career']['edit'] ? 'checked' : ''?>></td>
										<td class="text-center"><input class="chkDeleteVal" type="checkbox" name="params[career][delete]" value="1" <?=@$params['career']['delete'] ? 'checked' : ''?>></td>
									</tr>
									<tr>
										<td>Liên kết website</td>
										<td class="text-center"><input class="chkAddVal" type="checkbox" name="params[link][add]" value="1" <?=@$params['link']['add'] ? 'checked' : ''?>></td>
										<td class="text-center"><input class="chkEditVal" type="checkbox" name="params[link][edit]" value="1" <?=@$params['link']['edit'] ? 'checked' : ''?>></td>
										<td class="text-center"><input class="chkDeleteVal" type="checkbox" name="params[link][delete]" value="1" <?=@$params['link']['delete'] ? 'checked' : ''?>></td>
									</tr>
									<tr>
										<td>Kênh truyền hình</td>
										<td class="text-center"><input class="chkAddVal" type="checkbox" name="params[livetv][add]" value="1" <?=@$params['livetv']['add'] ? 'checked' : ''?>></td>
										<td class="text-center"><input class="chkEditVal" type="checkbox" name="params[livetv][edit]" value="1" <?=@$params['livetv']['edit'] ? 'checked' : ''?>></td>
										<td class="text-center"><input class="chkDeleteVal" type="checkbox" name="params[livetv][delete]" value="1" <?=@$params['livetv']['delete'] ? 'checked' : ''?>></td>
									</tr>
									<tr>
										<td>Lịch phát sóng</td>
										<td class="text-center"><input class="chkAddVal" type="checkbox" name="params[livetv_schedule][add]" value="1" <?=@$params['livetv_schedule']['add'] ? 'checked' : ''?>></td>
										<td class="text-center"><input class="chkEditVal" type="checkbox" name="params[livetv_schedule][edit]" value="1" <?=@$params['livetv_schedule']['edit'] ? 'checked' : ''?>></td>
										<td class="text-center"><input class="chkDeleteVal" type="checkbox" name="params[livetv_schedule][delete]" value="1" <?=@$params['livetv_schedule']['delete'] ? 'checked' : ''?>></td>
									</tr>
									<tr>
										<td>Treaming sự kiện</td>
										<td class="text-center"><input class="chkAddVal" type="checkbox" name="params[livetv_tream][add]" value="1" <?=@$params['livetv_tream']['add'] ? 'checked' : ''?>></td>
										<td class="text-center"><input class="chkEditVal" type="checkbox" name="params[livetv_tream][edit]" value="1" <?=@$params['livetv_tream']['edit'] ? 'checked' : ''?>></td>
										<td class="text-center"><input class="chkDeleteVal" type="checkbox" name="params[livetv_tream][delete]" value="1" <?=@$params['livetv_tream']['delete'] ? 'checked' : ''?>></td>
									</tr>
									
									<tr>
										<td>Video truyền hình</td>
										<td class="text-center"><input class="chkAddVal" type="checkbox" name="params[livevideo][add]" value="1" <?=@$params['livevideo']['add'] ? 'checked' : ''?>></td>
										<td class="text-center"><input class="chkEditVal" type="checkbox" name="params[livevideo][edit]" value="1" <?=@$params['livevideo']['edit'] ? 'checked' : ''?>></td>
										<td class="text-center"><input class="chkDeleteVal" type="checkbox" name="params[livevideo][delete]" value="1" <?=@$params['livevideo']['delete'] ? 'checked' : ''?>></td>
									</tr>
									<tr>
										<td>Danh mục phát thanh</td>
										<td class="text-center"><input class="chkAddVal" type="checkbox" name="params[category-radio][add]" value="1" <?=@$params['category-radio']['add'] ? 'checked' : ''?>></td>
										<td class="text-center"><input class="chkEditVal" type="checkbox" name="params[category-radio][edit]" value="1" <?=@$params['category-radio']['edit'] ? 'checked' : ''?>></td>
										<td class="text-center"><input class="chkDeleteVal" type="checkbox" name="params[category-radio][delete]" value="1" <?=@$params['category-radio']['delete'] ? 'checked' : ''?>></td>
									</tr>
									<tr>
										<td>Video phát thanh</td>
										<td class="text-center"><input class="chkAddVal" type="checkbox" name="params[radiovideo][add]" value="1" <?=@$params['radiovideo']['add'] ? 'checked' : ''?>></td>
										<td class="text-center"><input class="chkEditVal" type="checkbox" name="params[radiovideo][edit]" value="1" <?=@$params['radiovideo']['edit'] ? 'checked' : ''?>></td>
										<td class="text-center"><input class="chkDeleteVal" type="checkbox" name="params[radiovideo][delete]" value="1" <?=@$params['radiovideo']['delete'] ? 'checked' : ''?>></td>
									</tr>
									
									
									<tr>
										<td>Phát thanh</td>
										<td class="text-center"><input class="chkAddVal" type="checkbox" name="params[radio][add]" value="1" <?=@$params['radio']['add'] ? 'checked' : ''?>></td>
										<td class="text-center"><input class="chkEditVal" type="checkbox" name="params[radio][edit]" value="1" <?=@$params['radio']['edit'] ? 'checked' : ''?>></td>
										<td class="text-center"><input class="chkDeleteVal" type="checkbox" name="params[radio][delete]" value="1" <?=@$params['radio']['delete'] ? 'checked' : ''?>></td>
									</tr>
									
									<tr>
										<td>Lịch phát thanh</td>
										<td class="text-center"><input class="chkAddVal" type="checkbox" name="params[radio_schedule][add]" value="1" <?=@$params['radio_schedule']['add'] ? 'checked' : ''?>></td>
										<td class="text-center"><input class="chkEditVal" type="checkbox" name="params[radio_schedule][edit]" value="1" <?=@$params['radio_schedule']['edit'] ? 'checked' : ''?>></td>
										<td class="text-center"><input class="chkDeleteVal" type="checkbox" name="params[radio_schedule][delete]" value="1" <?=@$params['radio_schedule']['delete'] ? 'checked' : ''?>></td>
									</tr>
									
									<tr>
										<td>Ý kiến bạn đọc</td>
										<td class="text-center"><input class="chkAddVal" type="checkbox" name="params[comment][add]" value="1" <?=@$params['comment']['add'] ? 'checked' : ''?>></td>
										<td class="text-center"><input class="chkEditVal" type="checkbox" name="params[comment][edit]" value="1" <?=@$params['comment']['edit'] ? 'checked' : ''?>></td>
										<td class="text-center"><input class="chkDeleteVal" type="checkbox" name="params[comment][delete]" value="1" <?=@$params['comment']['delete'] ? 'checked' : ''?>></td>
									</tr>

                                <tr>
                                    <td>Categorys News</td>
                                    <td class="text-center"><input class="chkAddVal" type="checkbox" name="params[categorys-newss][add]" value="1" <?=@$params['comment']['add'] ? 'checked' : ''?>></td>
                                    <td class="text-center"><input class="chkEditVal" type="checkbox" name="params[categorys-newss][edit]" value="1" <?=@$params['comment']['edit'] ? 'checked' : ''?>></td>
                                    <td class="text-center"><input class="chkDeleteVal" type="checkbox" name="params[categorys-newss][delete]" value="1" <?=@$params['comment']['delete'] ? 'checked' : ''?>></td>
                                </tr>

                                <tr>
                                    <td>News</td>
                                    <td class="text-center"><input class="chkAddVal" type="checkbox" name="params[newss][add]" value="1" <?=@$params['comment']['add'] ? 'checked' : ''?>></td>
                                    <td class="text-center"><input class="chkEditVal" type="checkbox" name="params[newss][edit]" value="1" <?=@$params['comment']['edit'] ? 'checked' : ''?>></td>
                                    <td class="text-center"><input class="chkDeleteVal" type="checkbox" name="params[newss][delete]" value="1" <?=@$params['comment']['delete'] ? 'checked' : ''?>></td>
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