<?php } elseif($step == "qr") { 

if(!isset($_SESSION['MaDH']) || !isset($_SESSION['tongtien'])){
    echo "<h3>Lỗi: Không có dữ liệu thanh toán!</h3>";
    echo "<a href='index.php'>Về trang chủ</a>";
    exit();
}

$maDH = (int)$_SESSION['MaDH'];
$tong = (int)$_SESSION['tongtien'];

$bank = "MBBANK"; 
$stk = "0338322433";

// ✅ THÊM DÒNG NÀY
$noidung = "DH".$maDH;

// tạo QR
$qr = "https://img.vietqr.io/image/{$bank}-{$stk}-compact.png?amount={$tong}&addInfo="
    . urlencode($noidung) . "&t=" . time();

?>
<div class="box">
<h3>Quét mã để thanh toán</h3>

<p><b>Ngân hàng:</b> MB Bank (Quân đội)</p>
<p><b>Số tài khoản:</b> <?= $stk ?></p>

<p>Số tiền: <b><?= number_format($tong) ?> đ</b></p>
<p>Nội dung: <b><?= $noidung ?></b></p>

<img src="<?= $qr ?>" width="300">

<br><br>

<p>👉 Sau khi chuyển khoản, admin sẽ xác nhận đơn hàng</p>

<a href="index.php">Về trang chủ</a>
</div>
<?php } ?>
<style>
body{
    font-family: Arial;
    background: #f5f5f5;
}

/* box giữa */
.box{
    width: 420px;
    margin: 50px auto;
    background: white;
    padding: 25px;
    border-radius: 12px;
    box-shadow: 0 0 12px rgba(0,0,0,0.1);
    text-align: center;
}

/* tiêu đề */
h3{
    margin-bottom: 15px;
}

/* đoạn text */
p{
    margin: 6px 0;
}

/* ảnh QR */
.qr{
    margin-top: 15px;
    border: 6px solid #eee;
    border-radius: 10px;
}

/* link */
a{
    display: inline-block;
    margin-top: 15px;
    padding: 8px 15px;
    background: black;
    color: white;
    text-decoration: none;
    border-radius: 5px;
}

a:hover{
    background: gold;
    color: black;
}
</style>