<?php
include_once("model/mBaiviet.php");

$m = new mBaiviet();
$ds = $m->getAll();
?>
<!DOCTYPE html>
<html lang="vi">
<head>
<meta charset="UTF-8">
<title>Bài viết</title>

<style>

/* BODY */
body{
    margin:0;
    font-family:Arial;
    background:#f5f5f5;
}

/* TITLE */
.title{
    text-align:center;
    color:gold;
    padding:20px;
}

/* CONTAINER */
.container{
    width:90%;
    max-width:1200px;
    margin:auto;
    display:flex;
    gap:20px;
}

/* LEFT - DANH SÁCH BÀI */
.left{
    width:70%;
}

/* RIGHT - SIDEBAR */
.right{
    width:30%;
}

/* CARD BÀI VIẾT */
.post{
    background:white;
    margin-bottom:20px;
    border-radius:10px;
    overflow:hidden;
    box-shadow:0 0 10px #ccc;
}

.post img{
    width:100%;
    height:200px;
    object-fit:cover;
}

.post-content{
    padding:15px;
}

.post h3{
    margin:0;
    color:#333;
}

.post p{
    color:#666;
}

.btn{
    display:inline-block;
    padding:8px 15px;
    background:gold;
    color:black;
    text-decoration:none;
    border-radius:5px;
    margin-top:10px;
}

/* SIDEBAR */
.box{
    background:white;
    padding:15px;
    margin-bottom:20px;
    border-radius:10px;
    box-shadow:0 0 10px #ccc;
}

.box h4{
    margin-top:0;
}

/* RESPONSIVE */
@media(max-width:768px){
    .container{
        flex-direction:column;
    }

    .left, .right{
        width:100%;
    }
}

</style>
</head>

<body>

<h1 class="title">BÀI VIẾT VỀ TRANG SỨC</h1>

<div class="container">

<!-- LEFT -->
<div class="left">

<?php
if($ds && $ds->num_rows > 0){
    while($row = $ds->fetch_assoc()){
?>
    <div class="post">
        <img src="image/banner/<?php echo $row['HinhAnh']; ?>">
        <div class="post-content">
            <h3><?php echo $row['TieuDe']; ?></h3>
            <p>
                <?php 
                // cắt nội dung cho gọn
                echo substr($row['NoiDung'],0,120)."...";
                ?>
            </p>

            <!-- <a href="index.php?page=chitietbaiviet&id=<?php echo $row['MaBV']; ?>" class="btn">
                Xem chi tiết
            </a> -->
        </div>
    </div>
<?php
    }
}else{
    echo "<p>Không có bài viết nào</p>";
}
?>

</div>

<!-- RIGHT -->
<div class="right">

<div class="box">
    <h4>🔥 Bài viết nổi bật</h4>
    <ul>
        <li>Trang sức phong thủy</li>
        <li>Xu hướng 2026</li>
        <li>Cách bảo quản vàng bạc</li>
    </ul>
</div>

<div class="box">
    <h4>📞 Liên hệ</h4>
    <p>Hotline: 0900000000</p>
    <p>Email: luxury@gmail.com</p>
</div>

</div>

</div>

</body>
</html>
<!-- 
<h1 class="title"><?php echo $row['tieude']; ?></h1>

<img src="image/<?php echo $row['hinhanh']; ?>" class="main-img">

<div class="content">
<?php echo $row['noidung']; ?>
</div> -->