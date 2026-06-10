<?php
if(!isset($step)){
    $step = "thongtin";
}
?>

<style>
body {
    font-family: Arial, sans-serif;
    background: #f5f5f5;
}

.checkout-container {
    max-width: 600px;
    margin: 30px auto;
    background: #fff;
    padding: 25px;
    border-radius: 10px;
    box-shadow: 0 2px 10px rgba(0,0,0,0.1);
}

.checkout-title {
    text-align: center;
    font-size: 24px;
    margin-bottom: 20px;
    font-weight: bold;
}

.form-group {
    margin-bottom: 15px;
}

.form-group label {
    display: block;
    font-weight: 600;
    margin-bottom: 5px;
}

.form-group input {
    width: 100%;
    padding: 10px;
    border: 1px solid #ddd;
    border-radius: 6px;
}

.btn-primary {
    width: 100%;
    padding: 12px;
    background: #007bff;
    color: #fff;
    border: none;
    border-radius: 6px;
    font-size: 16px;
    cursor: pointer;
}

.info-box {
    background: #f9f9f9;
    padding: 15px;
    border-radius: 8px;
    margin-bottom: 15px;
}

.total {
    font-size: 18px;
    font-weight: bold;
    color: #e53935;
}
</style>

<div class="checkout-container">

<h2 class="checkout-title">🛒 Đặt hàng</h2>

<?php if($step == "thongtin") { ?>

<!-- ===== NHẬP THÔNG TIN ===== -->
<form method="post" action="index.php?page=xacNhan">

    <div class="form-group">
        <label>Họ và tên</label>
        <input type="text" name="ten" required>
    </div>

    <div class="form-group">
        <label>Số điện thoại</label>
        <input type="text" name="sdt" required>
    </div>

    <div class="form-group">
        <label>Địa chỉ</label>
        <input type="text" name="diachi" required>
    </div>

    <button class="btn-primary">Xác nhận</button>

</form>

<?php } elseif($step == "xacnhan") { 

// ===== LƯU KHÁCH HÀNG =====
$_SESSION['khachhang'] = [
    'ten' => $_POST['ten'],
    'sdt' => $_POST['sdt'],
    'diachi' => $_POST['diachi']
];

$kh = $_SESSION['khachhang'];

// ===== GIỎ HÀNG =====
if(!isset($_SESSION['giohang']) || count($_SESSION['giohang']) == 0){
    echo "<h3>Không có sản phẩm!</h3>";
    return;
}

$giohang = $_SESSION['giohang'];
$tong = 0;
?>

<h3>📦 Thông tin đơn hàng</h3>

<div class="info-box">
    <p><b>👤 Tên:</b> <?= $kh['ten'] ?></p>
    <p><b>📞 SĐT:</b> <?= $kh['sdt'] ?></p>
    <p><b>📍 Địa chỉ:</b> <?= $kh['diachi'] ?></p>
</div>

<div class="info-box">

<?php foreach($giohang as $sp){ 
    $thanhtien = $sp['gia'] * $sp['soluong'];
    $tong += $thanhtien;
?>

<p><b>🛍️ <?= $sp['tensp'] ?></b></p>
<p>🔢 SL: <?= $sp['soluong'] ?></p>

<hr>

<?php } ?>

<p class="total">💰 Tổng tiền: <?= number_format($tong) ?> đ</p>

</div>

<form method="post" action="index.php?page=thanhToanQR">
    <button class="btn-primary">Thanh toán QR</button>
</form>

<?php } elseif($step == "qr") { 

$tong = 0;
foreach($_SESSION['giohang'] as $sp){
    $tong += $sp['gia'] * $sp['soluong'];
}

$maDH = rand(1000,9999);
$_SESSION['MaDH'] = $maDH;
$_SESSION['tongtien'] = $tong;

$bank = "MB";
$stk = "0338322433";
$noidung = "DH".$maDH;

$qr = "https://img.vietqr.io/image/$bank-$stk-compact.png?amount=$tong&addInfo=$noidung";
?>

<h3>📱 Thanh toán QR</h3>

<div class="info-box">
    <p><b>💰 Số tiền:</b> <?= number_format($tong) ?> đ</p>
    <p><b>📝 Nội dung:</b> <?= $noidung ?></p>
</div>

<div style="text-align:center;">
    <img src="<?= $qr ?>" width="250">
</div>
<p style="text-align:center; margin-top:15px; color:#555;">
👉 Sau khi chuyển khoản, hệ thống sẽ xử lý đơn hàng
</p>

<a href="index.php" style="display:block;text-align:center;margin-top:10px;">
← Về trang chủ
</a>

<?php } ?>

</div>