<?php

include_once("controller/cSanPham.php");
$p = new controllerSanPham();

// ===== KIỂM TRA GIỎ HÀNG =====
if(!isset($_SESSION["giohang"]) || count($_SESSION["giohang"])==0){
    echo "<h2>Giỏ hàng của bạn đang trống</h2>";
    return;
}

$tong = 0;
?>

<h2>🛒 Giỏ hàng</h2>

<table border="1" width="100%" cellpadding="10">

<tr>
    <th>Mã SP</th>
    <th>Hình ảnh</th>
    <th>Tên sản phẩm</th>
    <th>Giá</th>
    <th>Số lượng</th>
    <th>Thành tiền</th>
    <th>Xóa</th>
</tr>

<?php
foreach($_SESSION["giohang"] as $key => $sp){

    // ===== LẤY DỮ LIỆU MỚI TỪ DB =====
    $kq = $p->getChiTietSanPham($sp["masp"]);
    $row = $kq->fetch_assoc();

    $gia = $row["Gia"];
    $ten = $row["TenSP"];
    $hinh = $row["HinhAnh"];

    // ===== LƯU LẠI VÀO SESSION (FIX LỖI DAT HANG) =====
    $_SESSION["giohang"][$key]["gia"] = $gia;
    $_SESSION["giohang"][$key]["tensp"] = $ten;
    $_SESSION["giohang"][$key]["hinhanh"] = $hinh;

    $thanhtien = $gia * $sp["soluong"];
    $tong += $thanhtien;
?>

<tr>
    <td><?= $sp["masp"] ?></td>

    <td style="text-align:center">
        <img src="image/anhsp/<?= $hinh ?>" width="100"
             onerror="this.src='image/no-image.png'">
    </td>

    <td><?= $ten ?></td>

    <td><?= number_format($gia,0,",",".") ?> đ</td>

    <td><?= $sp["soluong"] ?></td>

    <td><?= number_format($thanhtien,0,",",".") ?> đ</td>

    <td>
        <a href="index.php?page=xoagiohang&id=<?= $key ?>"
           onclick="return confirm('Xóa sản phẩm này?')">
           Xóa
        </a>
    </td>
</tr>

<?php } ?>

<tr>
    <td colspan="5"><b>Tổng tiền</b></td>
    <td colspan="2"><b><?= number_format($tong,0,",",".") ?> đ</b></td>
</tr>

</table>

<!-- ===== NÚT ĐẶT HÀNG ===== -->
<div style="margin-top:20px; text-align:right;">

<form method="post" action="index.php?page=datHang">
    <button class="btn-buy">
        🛍️ Đặt hàng
    </button>
</form>

</div>

<style>
.btn-buy{
    background:#ff5722;
    color:white;
    padding:12px 25px;
    border:none;
    border-radius:5px;
    font-size:16px;
    font-weight:bold;
    cursor:pointer;
}

.btn-buy:hover{
    background:#e64a19;
    transform:scale(1.05);
    transition:0.2s;
}
</style>