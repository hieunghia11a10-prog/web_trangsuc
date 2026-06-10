<?php
include_once("ketnoi.php");

class mDatHang {

    // ===== THÊM ĐƠN HÀNG + CHI TIẾT =====
    function themDonHang($kh, $giohang){
        $p = new clsKetNoi();
        $conn = $p->moKetNoi();

        $tongtien = 0;

        // tính tổng tiền
        foreach($giohang as $sp){
            $tongtien += $sp['gia'] * $sp['soluong'];
        }

        // thêm đơn hàng
        $sql1 = "INSERT INTO donhang(TenKhach, DienThoai, DiaChi, NgayDat, TongTien, TrangThai)
                 VALUES (
                    '{$kh['ten']}',
                    '{$kh['sdt']}',
                    '{$kh['diachi']}',
                    NOW(),
                    '$tongtien',
                    'pending'
                 )";

        if(mysqli_query($conn, $sql1)){
            $order_id = mysqli_insert_id($conn);

            // thêm chi tiết đơn hàng
            foreach($giohang as $sp){
                $sql2 = "INSERT INTO chitietdonhang(MaDH, MaSP, SoLuong, Gia)
                         VALUES (
                            '$order_id',
                            '{$sp['masp']}',
                            '{$sp['soluong']}',
                            '{$sp['gia']}'
                         )";

                mysqli_query($conn, $sql2);
            }

            return $order_id;
        }

        return false;
    }

    // ===== UPDATE TRẠNG THÁI =====
    function updateTrangThai($id, $status){
        $p = new clsKetNoi();
        $conn = $p->moKetNoi();

        $sql = "UPDATE donhang SET TrangThai='$status' WHERE MaDH='$id'";
        return mysqli_query($conn, $sql);
    }

    // ===== LẤY DANH SÁCH =====
    function getAllDonHang(){
        $p = new clsKetNoi();
        $conn = $p->moKetNoi();

        $sql = "SELECT * FROM donhang ORDER BY MaDH DESC";
        return mysqli_query($conn, $sql);
    }
    function getOneDonHang($id){
    $p = new clsKetNoi();
    $conn = $p->moKetNoi();

    $sql = "SELECT * FROM donhang WHERE MaDH='$id'";
    $kq = mysqli_query($conn, $sql);
    return mysqli_fetch_assoc($kq);
}
}
?>