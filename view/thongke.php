<?php
include_once("controller/cThongKe.php");

$c = new controllerThongKe();
$data = $c->getDashboard();

// lấy thêm tuần + tháng
$chartTuan = $c->getTheoTuan();
$chartThang = $c->getTheoThang();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Dashboard</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <style>
        body{
            font-family: Arial;
            background: #f5f6fa;
        }
        .container{
            width: 90%;
            margin: auto;
        }
        .card{
            display: inline-block;
            width: 22%;
            padding: 20px;
            margin: 10px;
            color: white;
            border-radius: 10px;
            text-align: center;
        }
        .sp{ background: #3498db;}
        .dh{ background: #2ecc71;}
        .dt{ background: #e67e22;}
        .kh{ background: #9b59b6;}

        canvas{
            background: white;
            padding: 20px;
            border-radius: 10px;
            margin-bottom: 30px;
        }

        h2{
            margin-top: 40px;
        }
    </style>
</head>

<body>

<div class="container">
    <h1 align="center">📊 Dashboard Trang Sức</h1>

    <!-- THỐNG KÊ -->
    <div class="card sp">
        <h3>Sản phẩm</h3>
        <h2><?= $data['tongSP'] ?></h2>
    </div>

    <div class="card dh">
        <h3>Đơn hàng</h3>
        <h2><?= $data['tongDH'] ?></h2>
    </div>

    <div class="card dt">
        <h3>Doanh thu</h3>
        <h2><?= number_format($data['doanhThu']) ?> đ</h2>
    </div>

    <div class="card kh">
        <h3>Khách hàng</h3>
        <h2><?= $data['khachHang'] ?></h2>
    </div>

    <br><br>

    <!-- ================== BIỂU ĐỒ NGÀY ================== -->
    <h2>📅 Doanh thu theo ngày</h2>
    <canvas id="chartNgay"></canvas>

    <?php
    $labels = [];
    $values = [];

    while($row = $data['chart']->fetch_assoc()){
        $labels[] = $row['NgayDat'];
        $values[] = $row['tong'];
    }
    ?>

    <!-- ================== BIỂU ĐỒ TUẦN ================== -->
    <h2>📆 Doanh thu theo tuần</h2>
    <canvas id="chartTuan"></canvas>

    <?php
    $labelsTuan = [];
    $valuesTuan = [];

    while($row = $chartTuan->fetch_assoc()){
        $labelsTuan[] = "Tuần " . $row['tuan'] . "/" . $row['nam'];
        $valuesTuan[] = $row['tong'];
    }
    ?>

    <!-- ================== BIỂU ĐỒ THÁNG ================== -->
    <h2>📊 Doanh thu theo tháng</h2>
    <canvas id="chartThang"></canvas>

    <?php
    $labelsThang = [];
    $valuesThang = [];

    while($row = $chartThang->fetch_assoc()){
        $labelsThang[] = "Tháng " . $row['thang'] . "/" . $row['nam'];
        $valuesThang[] = $row['tong'];
    }
    ?>

</div>

<script>
// ===== NGÀY =====
new Chart(document.getElementById('chartNgay'), {
    type: 'bar',
    data: {
        labels: <?= json_encode($labels) ?>,
        datasets: [{
            label: 'Doanh thu theo ngày',
            data: <?= json_encode($values) ?>
        }]
    }
});

// ===== TUẦN =====
new Chart(document.getElementById('chartTuan'), {
    type: 'line',
    data: {
        labels: <?= json_encode($labelsTuan) ?>,
        datasets: [{
            label: 'Doanh thu theo tuần',
            data: <?= json_encode($valuesTuan) ?>
        }]
    }
});

// ===== THÁNG =====
new Chart(document.getElementById('chartThang'), {
    type: 'bar',
    data: {
        labels: <?= json_encode($labelsThang) ?>,
        datasets: [{
            label: 'Doanh thu theo tháng',
            data: <?= json_encode($valuesThang) ?>
        }]
    }
});
</script>

</body>
</html>