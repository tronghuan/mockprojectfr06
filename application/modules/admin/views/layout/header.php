<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Trang quản trị </title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>public/css/admin/style.css" />
</head>
<body>
<div id="banner">&nbsp;</div>
<div id="menu"><h1>Trang quản lý</h1></div>
<div id="main">
    <div id="left">
        <div class="category">
            <h1>MENU CHỨC NĂNG</h1>
            <ul>
                <li><a href="<?php echo base_url('admin/user/listuser');?>">Quản lý thành viên</a></li>
                <li><a href="<?php echo base_url('admin/cate/listcate');?>">Quản lý chuyên mục</a></li>
                <li><a href="<?php echo base_url('admin/product/listproduct');?>">Quản lý sản phẩm</a></li>
                <li><a href="<?php echo base_url('admin/bran/listbran');?>">Quản lý nhãn hiệu</a></li>
                <li><a href="<?php echo base_url('admin/order/listorder');?>">Quản lý đơn hàng </a></li>
                <li><a href="<?php echo base_url('admin/config');?>">Quản lý cấu hình </a></li>
                <li><a href="<?php echo base_url('admin/comment/listcomment');?>">Quản lý comment </a></li>
            </ul>
        </div>
        <div class="category" style="margin-top:10px; border-top:1px solid #CCC; background:#FFF;">
            <p>Chào bạn:
                <?php if(session_id() == '') {
                    session_start();
                };
                // print_r($_SESSION['user']);
                echo  isset($_SESSION['user']['username']) ?  $_SESSION['user']['username'] : "";
                ?></p>
            <p><a href=' <?php echo base_url("admin/user/logout") ?> '>Đăng xuất</a></p>

        </div>
    </div>
