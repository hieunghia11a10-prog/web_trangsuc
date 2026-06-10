<?php
include_once("ketnoi.php");

class mBaiviet {

   function getAll() {
    $p = new clsKetNoi();
    $conn = $p->moKetNoi();

    $sql = "SELECT * FROM baiviet WHERE TrangThai = 1 ORDER BY MaBV DESC";
    return $conn->query($sql);
}

    function getById($id) {
        $p = new clsKetNoi();
        $conn = $p->moKetNoi();
        $sql = "SELECT * FROM baiviet WHERE MaBV = $id";
        return $conn->query($sql);
    }

    function insert($tieude, $noidung, $hinhanh) {
        $p = new clsKetNoi();
        $conn = $p->moKetNoi();
        $sql = "INSERT INTO baiviet(TieuDe, NoiDung, HinhAnh, NgayDang, TrangThai)
                VALUES ('$tieude', '$noidung', '$hinhanh', NOW(), 1)";
        return $conn->query($sql);
    }

    function update($id, $tieude, $noidung, $hinhanh) {
        $p = new clsKetNoi();
        $conn = $p->moKetNoi();

        $sql = "UPDATE baiviet 
                SET TieuDe='$tieude', NoiDung='$noidung', HinhAnh='$hinhanh'
                WHERE MaBV=$id";

        return $conn->query($sql);
    }

    function delete($id) {
        $p = new clsKetNoi();
        $conn = $p->moKetNoi();

        $sql = "UPDATE baiviet SET TrangThai = 0 WHERE MaBV = $id";
        return $conn->query($sql);
    }
}
?>