<?php
$arg2 = $this->uri->segment(2);
$arg3 = $this->uri->segment(3);
$arg4 = $this->uri->segment(4);
$config = $this->setting->items();
$admin = $this->session->userdata('admin');
$params = $admin['params'];

?><!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Admin CMS - <?=$config['title']?></title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="shortcut icon" href="<?= base_url() ?>assets/client/images/favicons/favicon.ico" type="image/x-icon">
<link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Roboto:400,700">
<link rel="stylesheet" href="<?=base_url()?>assets/admin/css/bootstrap.min.css">
<link rel="stylesheet" href="<?=base_url()?>assets/admin/css/bootstrap-theme.min.css">
<link rel="stylesheet" href="<?=base_url()?>assets/admin/css/bootstrap-datetimepicker.min.css">
<link rel="stylesheet" href="<?=base_url()?>assets/admin/css/font-awesome.min.css">
<link rel="stylesheet" href="<?=base_url()?>assets/admin/css/summernote.css">
<link rel="stylesheet" href="<?=base_url()?>assets/admin/css/magnific-popup.css">
<link rel="stylesheet" href="<?=base_url()?>assets/admin/css/style.css">
<script>var base_url = '<?=base_url()?>';</script>
<script src="<?=base_url()?>assets/admin/js/jquery-2.1.4.min.js"></script>
<script src="<?=base_url()?>assets/admin/js/bootstrap.min.js"></script>
<script src="<?=base_url()?>assets/admin/js/moment.min.js"></script>
<script src="<?=base_url()?>assets/admin/js/bootstrap-datetimepicker.min.js"></script>
<script src="<?=base_url()?>assets/admin/js/summernote.js"></script>
<script src="<?=base_url()?>assets/admin/js/summernote-vi-VN.js"></script>
<script src="<?=base_url()?>assets/admin/js/jquery.magnific-popup.js"></script>
<script src="<?=base_url()?>assets/admin/js/script.js"></script>
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body>
<div class="header navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar">
                <span class="sr-only">Trình đơn </span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="<?=base_url('admin')?>">ADMINISTRATOR</a>
        </div>
        <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="<?=base_url()?>" target="_blank"><i class="fa fa-external-link"></i> <?=$config['title']?></a></li>
                <li><a href="<?=base_url('admin/home/clear_cache')?>"><i class="fa fa-trash"></i> Xoá cache</a></li>
                <li><a href="<?=base_url('admin/home/logout')?>"><i class="fa fa-sign-out"></i> Thoát</a></li>
            </ul>
        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">

            <ul class="nav nav-sidebar">
                <li<?=$arg2=='' ? ' class="active"' : ''?>><a href="<?=base_url('admin')?>"><i class="fa fa-home"></i> Dashboard</a></li>

                <?php if(isset($params['setting'])){ ?>
                <li<?=$arg2=='setting' ? ' class="active"' : ''?>><a href="<?=base_url('admin/setting')?>"><i class="fa fa-cogs"></i> Cài đặt</a></li>
                <?php } ?>

                <?php if(isset($params['user_group']) || isset($params['user'])){ ?>
                <li<?=in_array($arg2, array('user_group', 'user')) ? ' class="active"' : ''?>><a href="#" class="toggle"><i class="fa fa-angle-down"></i> Thành viên</a>
                	<ul>
						<?php if(isset($params['user_group'])){ ?>
						<li<?=$arg2=='user_group' ? ' class="active"' : ''?>><a href="<?=base_url('admin/user_group')?>"><i class="fa fa-users"></i> Nhóm thành viên</a></li>
						<?php } ?>

						<?php if(isset($params['user'])){ ?>
						<li<?=$arg2=='user' && !$arg3=='profile' ? ' class="active"' : ''?>> <a href="<?=base_url('admin/user')?>"> <i class="fa fa-user"></i> Thành viên</a></li>
						<?php } ?>
                	</ul>
                </li>
                <?php } ?>

                <?php if(isset($params['category-video']) || isset($params['video']) || isset($params['video-item']) || isset($params['video-episode'])){ ?>
                <li <?=$arg2=='node' && in_array($arg4, array('category-video', 'video', 'video-item', 'video-episode')) ? ' class="active"' : ''?>><a href="#" class="toggle"><i class="fa fa-angle-down"></i> Video</a>
                	<ul>
						<?php if(isset($params['category-video'])){ ?>
						<li<?=$arg2=='node' && $arg4 == 'category-video' ? ' class="active"' : ''?>><a href="<?=base_url('admin/node/index/category-video')?>"><i class="fa fa-list"></i> Danh mục</a></li>
						<?php } ?>

						<?php if(isset($params['video'])){ ?>
						<li<?=$arg2=='node' && $arg4 == 'video' ? ' class="active"' : ''?>><a href="<?=base_url('admin/node/index/video')?>"><i class="fa fa-file-video-o"></i> Video</a></li>
						<?php } ?>
                	</ul>
                </li>
                <?php } ?>

				<?php if(isset($params['category-lessons']) || isset($params['lessons']) ){ ?>
                <li <?=$arg2=='lessons' && in_array($arg4, array('category-lessons', 'lessons')) ? ' class="active"' : ''?>><a href="#" class="toggle"><i class="fa fa-angle-down"></i> Lessons</a>
                	<ul>
						<?php if(isset($params['category-lessons'])){ ?>
						<li<?=$arg2=='lessons' && $arg4 == 'category-lessons' ? ' class="active"' : ''?>><a href="<?=base_url('admin/lessons/index/category-lessons')?>"><i class="fa fa-list"></i> Category Lessons</a></li>
						<?php } ?>

						<?php if(isset($params['lessons'])){ ?>
						<li<?=$arg2=='lessons' && $arg4 == 'lessons' ? ' class="active"' : ''?>><a href="<?=base_url('admin/lessons/index/lessons')?>"><i class="fa fa-file-video-o"></i> Lessons</a></li>
						<?php } ?>
                	</ul>
                </li>
                <?php } ?>

                <?php if(isset($params['categorys-newss']) || isset($params['newss']) ){ ?>
                    <li <?=$arg2=='newss' && in_array($arg4, array('categorys-newss', 'newss')) ? ' class="active"' : ''?>><a href="#" class="toggle"><i class="fa fa-angle-down"></i> News</a>
                        <ul>
                            <?php if(isset($params['categorys-newss'])){ ?>
                                <li<?=$arg2=='newss' && $arg4 == 'categorys-newss' ? ' class="active"' : ''?>><a href="<?=base_url('admin/newss/index/categorys-newss')?>"><i class="fa fa-list"></i> Category News</a></li>
                            <?php } ?>

                            <?php if(isset($params['newss'])){ ?>
                                <li<?=$arg2=='newss' && $arg4 == 'newss' ? ' class="active"' : ''?>><a href="<?=base_url('admin/newss/index/newss')?>"><i class="fa fa-file-video-o"></i> News</a></li>
                            <?php } ?>
                        </ul>
                    </li>
                <?php } ?>

                    <li><a href="#" class="toggle"><i class="fa fa-angle-down"></i> Category</a>
                        <ul>
                                <li><a href="<?=base_url('admin/category/index/')?>"><i class="fa fa-list"></i> Category</a></li>

                                <li><a href="<?=base_url('admin/tags/index/')?>"><i class="fa fa-file-video-o"></i> Tags</a></li>
                        </ul>
                    </li>

				<?php if(isset($params['category-noun']) || isset($params['noun']) ){ ?>
                <li <?=$arg2=='noun' && in_array($arg4, array('category-noun', 'noun')) ? ' class="active"' : ''?>><a href="#" class="toggle"><i class="fa fa-angle-down"></i> Noun</a>
                	<ul>
						<?php if(isset($params['category-noun'])){ ?>
						<li<?=$arg2=='noun' && $arg4 == 'category-noun' ? ' class="active"' : ''?>><a href="<?=base_url('admin/noun/index/category-noun')?>"><i class="fa fa-list"></i> Category Noun</a></li>
						<?php } ?>

						<?php if(isset($params['noun'])){ ?>
						<li<?=$arg2=='noun' && $arg4 == 'noun' ? ' class="active"' : ''?>><a href="<?=base_url('admin/noun/index/noun')?>"><i class="fa fa-file-video-o"></i> Noun</a></li>
						<?php } ?>
                	</ul>
                </li>
                <?php } ?>

				<?php if(isset($params['main-alphabet']) || isset($params['category-alphabet']) || isset($params['alphabet']) ){ ?>
                <li <?=$arg2=='alphabet' && in_array($arg4, array('main-alphabet', 'category-alphabet', 'alphabet')) ? ' class="active"' : ''?>><a href="#" class="toggle"><i class="fa fa-angle-down"></i> Alphabet</a>
                	<ul>
						<?php if(isset($params['main-alphabet'])){ ?>
						<li<?=$arg2=='alphabet' && $arg4 == 'main-alphabet' ? ' class="active"' : ''?>><a href="<?=base_url('admin/alphabet/index/main-alphabet')?>"><i class="fa fa-list"></i> Main Alphabet</a></li>
						<?php } ?>

						<?php if(isset($params['category-alphabet'])){ ?>
						<li<?=$arg2=='alphabet' && $arg4 == 'category-alphabet' ? ' class="active"' : ''?>><a href="<?=base_url('admin/alphabet/index/category-alphabet')?>"><i class="fa fa-list"></i> Category Alphabet</a></li>
						<?php } ?>

						<?php if(isset($params['alphabet'])){ ?>
						<li<?=$arg2=='alphabet' && $arg4 == 'alphabet' ? ' class="active"' : ''?>><a href="<?=base_url('admin/alphabet/index/alphabet')?>"><i class="fa fa-file-video-o"></i> Alphabet</a></li>
						<?php } ?>
                	</ul>
                </li>
                <?php } ?>

                <?php if(isset($params['category-news']) || isset($params['news'])){ ?>
                <li<?=$arg2=='node' && in_array($arg4, array('category-news', 'news')) ? ' class="active"' : ''?>><a href="#" class="toggle"><i class="fa fa-angle-down"></i> Tin tức - Sự kiện</a>
                	<ul>
						<?php if(isset($params['category-news'])){ ?>
						<li<?=$arg2=='node' && $arg4 == 'category-news' ? ' class="active"' : ''?>><a href="<?=base_url('admin/node/index/category-news')?>"><i class="fa fa-list"></i> Danh mục</a></li>
						<?php } ?>

						<?php if(isset($params['news'])){ ?>
						<li<?=$arg2=='node' && $arg4 == 'news' ? ' class="active"' : ''?>><a href="<?=base_url('admin/node/index/news')?>"><i class="fa fa-newspaper-o"></i> Tin tức - Sự kiện</a></li>
						<?php } ?>
                	</ul>
                </li>
                <?php } ?>

                <?php if(isset($params['category-relax']) || isset($params['relax']) || isset($params['relax-item'])){ ?>
                <li <?=$arg2=='node' && in_array($arg4, array('category-relax', 'relax', 'relax-item', 'relax-episode')) ? ' class="active"' : ''?>><a href="#" class="toggle"><i class="fa fa-angle-down"></i> Giải trí trên KTV</a>
                	<ul>
						<?php if(isset($params['category-relax'])){ ?>
						<li<?=$arg2=='node' && $arg4 == 'category-relax' ? ' class="active"' : ''?>><a href="<?=base_url('admin/node/index/category-relax')?>"><i class="fa fa-list"></i> Danh mục</a></li>
						<?php } ?>

						<?php if(isset($params['relax'])){ ?>
						<li<?=$arg2=='node' && $arg4 == 'relax' ? ' class="active"' : ''?>><a href="<?=base_url('admin/node/index/relax')?>"><i class="fa fa-file-video-o"></i> Giải trí</a></li>
						<?php } ?>
                	</ul>
                </li>
                <?php } ?>

                <?php if(isset($params['about'])){ ?>
                <li<?=$arg2=='node' && $arg4 == 'about' ? ' class="active"' : ''?>><a href="<?=base_url('admin/node/index/about')?>"><i class="fa fa-edit"></i> Giới thiệu</a></li>
                <?php } ?>

                <?php if(isset($params['banner'])){ ?>
                <li<?=$arg2=='node' && $arg4 == 'banner' ? ' class="active"' : ''?>><a href="<?=base_url('admin/node/index/banner')?>"><i class="fa fa-adn"></i> Banner</a></li>
                <?php } ?>

                <?php if(isset($params['ad'])){ ?>
                <li<?=$arg2=='node' && $arg4 == 'ad' ? ' class="active"' : ''?>><a href="<?=base_url('admin/node/index/ad')?>"><i class="fa fa-adn"></i> Quảng cáo</a></li>
                <?php } ?>

                <?php if(isset($params['notice'])){ ?>
                <li<?=$arg2=='node' && $arg4 == 'notice' ? ' class="active"' : ''?>><a href="<?=base_url('admin/node/index/notice')?>"><i class="fa fa-bell-o"></i> Thông báo</a></li>
                <?php } ?>

                <?php if(isset($params['career'])){ ?>
                <li<?=$arg2=='node' && $arg4 == 'career' ? ' class="active"' : ''?>><a href="<?=base_url('admin/node/index/career')?>"><i class="fa fa-sitemap"></i> Tuyển dụng</a></li>
                <?php } ?>

                <?php if(isset($params['link'])){ ?>
                <li<?=$arg2=='node' && $arg4 == 'link' ? ' class="active"' : ''?>><a href="<?=base_url('admin/node/index/link')?>"><i class="fa fa-link"></i> Liên kết website</a></li>
                <?php } ?>

                <?php if(isset($params['livetv']) || isset($params['livetv_schedule']) || isset($params['livetv_tream'])){ ?>
				<li <?= in_array($arg2, array('livetv', 'livetv_schedule')) && in_array($arg4, array('livetv', 'livetv_schedule', 'livetv_tream')) ? ' class="active"' : ''?>><a href="#" class="toggle"><i class="fa fa-angle-down"></i> Kênh KTV</a>
                	<ul>
						<?php if(isset($params['livetv'])){ ?>
						<li <?=$arg2=='livetv' && $arg4 == 'livetv' ? ' class="active"' : ''?>><a href="<?=base_url('admin/livetv/index/livetv')?>"><i class="fa fa-file-video-o"></i> Kênh KTV</a></li>
						<?php } ?>

						<?php if(isset($params['livetv_schedule'])){ ?>
						<li <?=$arg2=='livetv_schedule' && $arg4 == 'livetv_schedule' ? ' class="active"' : ''?>><a href="<?=base_url('admin/livetv_schedule/index/livetv_schedule')?>"><i class="fa fa-list"></i> Lịch phát sóng</a></li>
						<?php } ?>

						<?php if(isset($params['livetv_tream'])){ ?>
						<li <?=$arg2=='livetv' && $arg4 == 'livetv_tream' ? ' class="active"' : ''?>><a href="<?=base_url('admin/livetv/livetv_tream/livetv_tream')?>"><i class="fa fa-file-video-o"></i> Stream sự kiện</a></li>
						<?php } ?>
                	</ul>
                </li>
                <?php } ?>


                <?php if(isset($params['livevideo']) ){ ?>
				<li <?= in_array($arg4, array('livevideo'))  ? ' class="active"' : ''?>><a href="#" class="toggle"><i class="fa fa-angle-down"></i> Video truyền hình</a>
                	<ul>
						<?php if(isset($params['livevideo'])){ ?>
                        <li <?=$arg2=='livevideo' && $arg4 == 'livevideo' ? ' class="active"' : ''?>><a href="<?=base_url('admin/livevideo/index/livevideo')?>"><i class="fa fa-file-video-o"></i> Video truyền hình</a></li>
                        <?php } ?>

                	</ul>
                </li>
                <?php } ?>

				<?php if(isset($params['radio']) || isset($params['radio_schedule']) || isset($params['livevideo'])  || isset($params['note']) ){ ?>
				<li <?= in_array($arg2, array('radio', 'radio_schedule', 'livevideo', 'node')) && in_array($arg4, array('radio','radio_schedule','radiovideo','category-radio')) ? ' class="active"' : ''?>><a href="#" class="toggle"><i class="fa fa-angle-down"></i> Đài phát thanh</a>
                	<ul>

						<?php if(isset($params['radio'])){ ?>
						<li <?=$arg2=='radio' && $arg4 == 'radio' ? ' class="active"' : ''?>><a href="<?=base_url('admin/radio/index/radio')?>"><i class="fa fa-file-video-o"></i> Đài phát thanh</a></li>
						<?php } ?>

						<?php if(isset($params['radio_schedule'])){ ?>
						<li <?=$arg2=='radio_schedule' && $arg4 == 'radio_schedule' ? ' class="active"' : ''?>><a href="<?=base_url('admin/radio_schedule/index/radio_schedule')?>"><i class="fa fa-list"></i> Lịch phát thanh</a></li>
						<?php } ?>

						<?php if(isset($params['category-radio'])){ ?>
						<li <?php echo ($arg2=='node' && $arg4=='category-radio') ? 'class="active"' : '';?>><a href="<?=base_url('admin/node/index/category-radio')?>"><i class="fa fa-list"></i> Danh mục phát thanh</a></li>
						<?php } ?>

						<?php if(isset($params['livevideo'])){ ?>
						<li <?=$arg2=='livevideo' && $arg4 == 'radiovideo' ? ' class="active"' : ''?>><a href="<?=base_url('admin/livevideo/index/radiovideo')?>"><i class="fa fa-file-video-o"></i> Video phát thanh</a></li>
						<?php } ?>

                	</ul>
                </li>
                <?php } ?>

                <?php if(isset($params['comment'])){ ?>
                <li<?=$arg2=='comment' ? ' class="active"' : ''?>><a href="<?=base_url('admin/comment')?>"><i class="fa fa-comments-o"></i> Ý kiến bạn đọc</a></li>
                <?php } ?>


                <li<?=$arg2=='user' && $arg3=='profile' ? ' class="active"' : ''?>><a href="<?=base_url('admin/user/profile')?>"><i class="fa fa-cog"></i> Thay đổi thông tin</a></li>

                <li><a href="<?=base_url('admin/home/clear_cache')?>"><i class="fa fa-trash"></i> Xoá cache</a></li>

                <li><a href="<?=base_url('admin/home/logout')?>"><i class="fa fa-sign-out"></i> Đăng xuất</a></li>
            </ul>
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">