<?php
error_reporting(0);
ob_start(); // QUAN TRỌNG
session_start();

if(!isset($_SESSION["dangnhap"])){
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Trang quản trị</title>

    <style>
        .adminLayout{
            display:flex;
            gap:20px;
        }

        .adminMenu{
            width:220px;
            background:#eee;
            padding:15px;
            border-radius:5px;
        }

        .adminMenu ul{
            list-style:none;
            padding:0;
            margin:0;
        }

        .adminMenu li{
            background:#ddd;
            margin-bottom:8px;
            padding:10px;
        }

        .adminMenu a{
            text-decoration:none;
            color:black;
        }

        .adminMenu a:hover{
            color:red;
        }

        .adminContent{
            flex:1;
            background:white;
            padding:20px;
            border-radius:5px;
        }
    </style>
</head>

<body>

<div class="adminLayout">

    <!-- MENU -->
    <div class="adminMenu">
        <ul>
            <li><a href="?page=quanly&type=thuonghieu">Loại Sản Phẩm</a></li>
            <li><a href="?page=quanly&type=sanpham">Quản lý sản phẩm</a></li>
            <li><a href="?page=quanly&action=insert">Thêm sản phẩm</a></li>
            <li><a href="?page=quanly&type=donhang">Quản lý đơn hàng</a></li>
            <li><a href="?page=quanly&type=baiviet">Quản lý bài viết</a></li>
        </ul>
    </div>

    <!-- CONTENT -->
    <div class="adminContent">

    <?php

    // LOẠI SẢN PHẨM
    if(isset($_REQUEST['type']) && $_REQUEST['type']=='thuonghieu'){
        include_once("view/adthuonghieu.php");

    // SẢN PHẨM
    }elseif(isset($_REQUEST['type']) && $_REQUEST['type']=='sanpham'){
        include_once("view/adsanpham.php");

    // BÀI VIẾT - DANH SÁCH
    }elseif(isset($_REQUEST['type']) && $_REQUEST['type']=='baiviet' && !isset($_REQUEST['action'])){
        include_once("view/danhsachBaiViet.php");
    // THÊM BÀI VIẾT
    }elseif(isset($_REQUEST['type']) && $_REQUEST['type']=='baiviet' && $_REQUEST['action']=='insert'){
        include_once("view/themBaiViet.php");

    // SỬA BÀI VIẾT
    }elseif(isset($_REQUEST['type']) && $_REQUEST['type']=='baiviet' && $_REQUEST['action']=='sua'){
        include_once("view/suaBaiViet.php");

    // XÓA MỀM BÀI VIẾT
    }elseif(isset($_REQUEST['type']) && $_REQUEST['type']=='baiviet' && $_REQUEST['action']=='xoa'){
        include_once("view/xoabaiviet.php");

    // KHÔI PHỤC BÀI VIẾT (nếu bạn có làm)
    }elseif(isset($_REQUEST['type']) && $_REQUEST['type']=='baiviet' && $_REQUEST['action']=='restore'){
        include_once("view/baiviet/restore.php");

    // CẬP NHẬT SẢN PHẨM
    }elseif(isset($_REQUEST['action']) && $_REQUEST['action']=='update'){
        include_once("view/suasanpham.php");

    // XÓA SẢN PHẨM
    }elseif(isset($_REQUEST['action']) && $_REQUEST['action']=='delete'){
        include_once("view/xoasanpham.php");

    // THÊM SẢN PHẨM
    }elseif(isset($_REQUEST['action']) && $_REQUEST['action']=='insert'){
        include_once("view/themsanpham.php");

    // ĐƠN HÀNG
    }elseif(isset($_REQUEST['type']) && $_REQUEST['type']=='donhang'){
        include_once("view/adDonHang.php");

    // MẶC ĐỊNH
    }else{
        echo "<h2>Trang quản lý</h2>";
        echo "<p>Chọn chức năng bên trái để quản lý.</p>";
    }

    ?>

    </div>

</div>

</body>
</html>