<?php
include_once("controller/cSanPham.php");
$p = new controllerSanPham();

if(isset($_REQUEST['th'])){
    $kq = $p->getAllSanPhamByTH($_REQUEST['th']);
}elseif(isset($_REQUEST['btnSearch'])){
    $kq = $p->getAllSanPhamByName($_REQUEST['txtSearch']);
}else{
    $kq = $p->getAllSanPham();
}
?>

<div class="product-list">

<?php
if(!$kq || $kq->num_rows == 0){
    echo "<p>Không có sản phẩm</p>";
}else{
    while ($r = $kq->fetch_assoc()) {
?>
        <div class="product-item">
            <img src="image/anhsp/<?php echo $r["HinhAnh"]; ?>">

            <h3>
                <a href="index.php?page=chitiet&maSP=<?php echo $r["MaSP"]; ?>">
                    <?php echo $r["TenSP"]; ?>
                </a>
            </h3>

            <p class="price">
                <?php echo number_format($r['Gia'],0,",","."); ?> đ
            </p>

            <a href="index.php?page=chitiet&maSP=<?php echo $r["MaSP"]; ?>" class="btn">
                Xem chi tiết
            </a>
        </div>
<?php
    }
}
?>

</div>

<style>

/* GRID 4 CỘT */
.product-list{
    display:grid;
    grid-template-columns: repeat(4, 1fr);
    gap:20px;
}

/* CARD */
.product-item{
    background:white;
    padding:15px;
    border-radius:12px;
    text-align:center;
    box-shadow:0 4px 10px rgba(0,0,0,0.1);

    height:320px; /* 🔥 fix đều */
    display:flex;
    flex-direction:column;
    justify-content:space-between;

    transition:0.3s;
}

.product-item:hover{
    transform:translateY(-5px);
    box-shadow:0 6px 15px rgba(0,0,0,0.2);
}

/* ẢNH */
.product-item img{
    width:100%;
    height:160px;
    object-fit:cover;
    border-radius:8px;
}

/* TÊN */
.product-item h3{
    font-size:15px;
    height:40px;
    overflow:hidden;
    margin:10px 0;
}

.product-item a{
    text-decoration:none;
    color:#333;
}

.product-item a:hover{
    color:red;
}

/* GIÁ */
.price{
    color:red;
    font-weight:bold;
    font-size:16px;
}

/* BUTTON */
.btn{
    background:#ff5722;
    color:white;
    padding:8px 12px;
    border-radius:5px;
    text-decoration:none;
}

.btn:hover{
    background:#e64a19;
}

/* RESPONSIVE */
<?php
    include_once("controller/cSanPham.php");
    $p = new controllerSanPham();
    
    // Kiểm tra: Nếu là trang chủ (không có tham số lọc) thì chỉ lấy 8
    if(!isset($_GET['MaLoai']) && !isset($_GET['MaTH']) && !isset($_GET['txtSearch'])) {
        $list = $p->getTop8BanChay(); // Gọi hàm có LIMIT 8
    } else {
        $list = $p->getAllSanPham(); // Các trang khác hiện đầy đủ
    }
    
    // Vòng lặp hiển thị giữ nguyên
    if($list){
        while($row = $list->fetch_assoc()){
            // Code hiển thị sản phẩm của bạn...
        }
    }
?>
</style>