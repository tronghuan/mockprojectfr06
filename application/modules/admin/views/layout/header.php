<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Trang quản trị </title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>public/css/admin/style.css">
</head>
<body>
<div id="container">
    <div id="banner">&nbsp;</div>
    <div id="menu"><h1>Trang quản lý</h1></div>
    <div id="main">
        <div id="left">
            <div class="category">
                <h1>MENU CHỨC NĂNG</h1>
                <ul>
                    <li><a href="<?php echo base_url(); ?>index.php/admin/user/listuser">Quản
                            lý thành viên</a></li>
                    <li><a href="<?php echo base_url(); ?>index.php?module=admin&controller=brand&action=index">Quản lý chuyên mục</a></li>
                    <li><a href="#">Quản lý sản phẩm</a></li>
                    <li><a href="<?php echo base_url(); ?>index.php/admin/brand/search">Quản lý nhãn hiệu</a></li>
                    <li><a href="#">Quản lý đơn hàng </a></li>
                    <li><a href="#">Quản lý cấu hình </a></li>
                    <li><a href="#">Quản lý comment </a></li>
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
                <p><a href=' <?php echo base_url("index.php/admin/user/login") ?> '>Đăng xuất</a></p>
            </div>

        </div>