<?php
	$admin = $this->session->userdata('admin');
	$arg2 = $this->uri->segment(2);
	$arg3 = $this->uri->segment(3);
	$config = $this->setting->items();
	
?><!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Admin CMS - <?=$config['title']?></title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="icon" type="image/png" href="<?=base_url()?>assets/admin/images/favicon.png">
<link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Roboto:400,700">
<link rel="stylesheet" href="<?=base_url()?>assets/admin/css/bootstrap.min.css">
<link rel="stylesheet" href="<?=base_url()?>assets/admin/css/bootstrap-theme.min.css">
<link rel="stylesheet" href="<?=base_url()?>assets/admin/css/font-awesome.min.css">
<link rel="stylesheet" href="<?=base_url()?>assets/admin/css/style.css">
<script src="<?=base_url()?>assets/admin/js/jquery-2.1.4.min.js"></script>
<script src="<?=base_url()?>assets/admin/js/bootstrap.min.js"></script>
<script src="<?=base_url()?>assets/admin/js/script.js"></script>
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body class="login">
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-4 col-sm-offset-4">
	        <div class="main">
	            <form name="adminForm" method="post" class="form-signin" role="form">
	                <h2 class="form-signin-heading">ĐĂNG NHẬP HỆ THỐNG</h2>
	                <?= isset($msg) ? '<p class="text-danger">'. $msg .'</p>' : '' ?>
	                <p><input type="text" class="form-control" name="username" placeholder="Tài khoản" value="" required autofocus></p>
	                <input type="password" class="form-control" name="password" placeholder="Mật khẩu" value="" required>
	                <button class="btn btn-lg btn-primary btn-block" type="submit">Đăng nhập</button>
	            </form>
	        </div>
	        <p class="back"><i class="fa fa-reply"></i> <a href="<?=base_url()?>">Trang chủ</a></p>
        </div>
    </div>
</div>
</body>
</html>