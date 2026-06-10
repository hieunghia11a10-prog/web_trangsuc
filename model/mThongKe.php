<?php
include_once("ketnoi.php");

class modelThongKe {

    public function getTongSanPham(){
        $p = new clsKetNoi();
        $con = $p->moKetNoi();
        $sql = "SELECT COUNT(*) as tong FROM sanpham";
        $kq = $con->query($sql);
        $row = $kq->fetch_assoc();
        return $row['tong'];
    }

    public function getTongDonHang(){
        $p = new clsKetNoi();
        $con = $p->moKetNoi();
        $sql = "SELECT COUNT(*) as tong FROM donhang";
        $kq = $con->query($sql);
        $row = $kq->fetch_assoc();
        return $row['tong'];
    }

    public function getDoanhThu(){
        $p = new clsKetNoi();
        $con = $p->moKetNoi();
        $sql = "SELECT SUM(TongTien) as doanhthu FROM donhang WHERE TrangThai='paid'";
        $kq = $con->query($sql);
        $row = $kq->fetch_assoc();
        return $row['doanhthu'] ?? 0;
    }

    public function getKhachHang(){
        $p = new clsKetNoi();
        $con = $p->moKetNoi();
        $sql = "SELECT COUNT(DISTINCT DienThoai) as tong FROM donhang";
        $kq = $con->query($sql);
        $row = $kq->fetch_assoc();
        return $row['tong'];
    }

    public function getDoanhThuTheoNgay(){
        $p = new clsKetNoi();
        $con = $p->moKetNoi();
        $sql = "SELECT NgayDat, SUM(TongTien) as tong 
                FROM donhang 
                WHERE TrangThai='paid'
                GROUP BY NgayDat";
        return $con->query($sql);
    }
    public function getDoanhThuTheoTuan(){
    $p = new clsKetNoi();
    $con = $p->moKetNoi();

    $sql = "SELECT 
                YEAR(NgayDat) AS nam,
                WEEK(NgayDat, 1) AS tuan,
                SUM(TongTien) AS tong
            FROM donhang
            WHERE TrangThai='paid'
            GROUP BY nam, tuan
            ORDER BY nam, tuan";

    $kq = $con->query($sql);
    $p->dongKetNoi($con);
    return $kq;
}
public function getDoanhThuTheoThang(){
    $p = new clsKetNoi();
    $con = $p->moKetNoi();

    $sql = "SELECT 
                YEAR(NgayDat) AS nam,
                MONTH(NgayDat) AS thang,
                SUM(TongTien) AS tong
            FROM donhang
            WHERE TrangThai='paid'
            GROUP BY nam, thang
            ORDER BY nam, thang";

    $kq = $con->query($sql);
    $p->dongKetNoi($con);
    return $kq;
}
}
?>