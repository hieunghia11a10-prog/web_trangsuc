<?php
ob_start(); // 🔥 QUAN TRỌNG
include_once("controller/cbaiviet.php");

$p = new cBaiviet();

// Kiểm tra ID
if(!isset($_GET['id'])){
    header("Location: admin.php?page=quanly&type=baiviet");
    exit();
}

$id = $_GET['id'];

// XỬ LÝ XÓA (PHẢI ĐẶT TRƯỚC HTML)
if(isset($_POST["btnXoa"])){
    $p->delete($id);

    header("Location: admin.php?page=quanly&type=baiviet");
    exit();
}

// Lấy dữ liệu
$bv = $p->getById($id);

if(!$bv || $bv->num_rows == 0){
    header("Location: admin.php?page=quanly&type=baiviet");
    exit();
}

$r = $bv->fetch_assoc();
$tieude = $r["TieuDe"];
$hinhanh = $r["HinhAnh"];
?>

<style>
.container{
    width: 500px;
    margin: 50px auto;
    background: white;
    padding: 30px;
    border-radius: 10px;
    text-align: center;
    box-shadow: 0 0 10px rgba(0,0,0,0.1);
}
.btn{
    padding: 10px 20px;
    margin: 10px;
    border: none;
    cursor: pointer;
}
.btn-danger{
    background: red;
    color: white;
}
.btn-secondary{
    background: gray;
    color: white;
}
</style>

<div class="container">

<h2>XÁC NHẬN ẨN BÀI VIẾT</h2>

<p>Bạn có chắc muốn ẩn bài viết:</p>

<h3 style="color:red;"><?php echo $tieude; ?></h3>

<img src="image/<?php echo $hinhanh; ?>" width="120">

<form method="post">
    <input type="submit" name="btnXoa" value="Xóa" class="btn btn-danger">
    <a href="admin.php?page=quanly&type=baiviet" class="btn btn-secondary">Hủy</a>
</form>

</div>