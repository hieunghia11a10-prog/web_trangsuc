<?php
include_once("model/mThongKe.php");

class controllerThongKe {

    public function getDashboard(){
        $m = new modelThongKe();

        return [
            "tongSP" => $m->getTongSanPham(),
            "tongDH" => $m->getTongDonHang(),
            "doanhThu" => $m->getDoanhThu(),
            "khachHang" => $m->getKhachHang(),
            "chart" => $m->getDoanhThuTheoNgay()
        ];
    }

    public function getDoanhThuTheoTuan(){
    $p = new clsKetNoi();
    $con = $p->moKetNoi();

    $sql = "SELECT YEAR(NgayDat) as nam, WEEK(NgayDat) as tuan, SUM(TongTien) as tong
            FROM donhang
            GROUP BY nam, tuan
            ORDER BY nam, tuan";

    $kq = $con->query($sql);
    $p->dongKetNoi($con);
    return $kq;
}

public function getDoanhThuTheoThang(){
    $p = new clsKetNoi();
    $con = $p->moKetNoi();

    $sql = "SELECT YEAR(NgayDat) as nam, MONTH(NgayDat) as thang, SUM(TongTien) as tong
            FROM donhang
            GROUP BY nam, thang
            ORDER BY nam, thang";

    $kq = $con->query($sql);
    $p->dongKetNoi($con);
    return $kq;
}
public function getTheoTuan(){
    $m = new modelThongKe();
    return $m->getDoanhThuTheoTuan();
}

public function getTheoThang(){
    $m = new modelThongKe();
    return $m->getDoanhThuTheoThang();
}
}

?>