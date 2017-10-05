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

                <?php if(isset($params['categorys-newss']) || isset($params['newss'])){ ?>
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

                <?php if(isset($params['category']) || isset($params['tags'])){ ?>
                    <li <?=$arg2=='category' && in_array($arg4, array('category', 'tags')) ? ' class="active"' : ''?>><a href="#" class="toggle"><i class="fa fa-angle-down"></i> Category</a>
                        <ul>
                            <?php if(isset($params['category'])){ ?>
                                <li<?=$arg2=='category' && $arg4 == 'category' ? ' class="active"' : ''?>><a href="<?=base_url('admin/category/index/')?>"><i class="fa fa-list"></i> Category</a></li>
                            <?php } ?>

                            <?php if(isset($params['tags'])){ ?>
                                <li<?=$arg2=='tags' && $arg4 == 'tags' ? ' class="active"' : ''?>><a href="<?=base_url('admin/tags/index/')?>"><i class="fa fa-file-video-o"></i> Tags</a></li>
                            <?php } ?>
                        </ul>
                    </li>
                <?php } ?>

                <li<?=$arg2=='user' && $arg3=='profile' ? ' class="active"' : ''?>><a href="<?=base_url('admin/user/profile')?>"><i class="fa fa-cog"></i> Thay đổi thông tin</a></li>

                <li><a href="<?=base_url('admin/home/clear_cache')?>"><i class="fa fa-trash"></i> Xoá cache</a></li>

                <li><a href="<?=base_url('admin/home/logout')?>"><i class="fa fa-sign-out"></i> Đăng xuất</a></li>
            </ul>
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">