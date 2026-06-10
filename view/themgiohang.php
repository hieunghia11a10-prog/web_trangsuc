<?php
session_start();

// ===== KIỂM TRA DỮ LIỆU =====
if(!isset($_POST["masp"]) || !isset($_POST["soluong"])){
    header("Location: ../index.php?page=sanpham");
    exit();
}

$masp = $_POST["masp"];
$soluong = (int)$_POST["soluong"];

if($soluong <= 0){
    $soluong = 1;
}

// ===== KHỞI TẠO GIỎ HÀNG =====
if(!isset($_SESSION["giohang"])){
    $_SESSION["giohang"] = [];
}

// ===== KIỂM TRA SẢN PHẨM ĐÃ CÓ CHƯA =====
$found = false;

foreach($_SESSION["giohang"] as &$sp){
    if($sp["masp"] == $masp){
        $sp["soluong"] += $soluong; // 👉 cộng số lượng
        $found = true;
        break;
    }
}

// ===== NẾU CHƯA CÓ → THÊM MỚI =====
if(!$found){
    $_SESSION["giohang"][] = [
        "masp" => $masp,
        "soluong" => $soluong
    ];
}

// ===== CHUYỂN TRANG =====
header("Location: ../index.php?page=giohang");
exit();
?>