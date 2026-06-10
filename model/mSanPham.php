<?php

    include_once("ketnoi.php");
    class modelSanPham{
        public function selectAllSanPham(){
            $p = new clsKetNoi();
            $con = $p->moKetNoi();
            $sql = "select * from sanpham where TrangThai = 1";
            $kq = $con->query($sql);
            $p->dongKetNoi($con);
            return $kq;
        }

        public function selectOneSanPham($maSP){
            $p = new clsKetNoi();
            $con = $p->moKetNoi();
            $sql = "select * from sanpham s join loaisanpham t on s.MaLoai = t.MaLoai where s.MaLoai = '$maSP'";
            $kq = $con->query($sql);
            $p->dongKetNoi($con);
            return $kq;
        }

        public function selectAllSanPhamByTH($ml){
            $p = new clsKetNoi();
            $con = $p->moKetNoi();
            $sql = "select * from sanpham s join loaisanpham l on s.MaLoai = l.MaLoai where s.MaLoai = $ml";
            $kq = $con->query($sql);
            $p->dongKetNoi($con);
            return $kq;
        }
        public function selectAllSanPhamByName($name){
            $p = new clsKetNoi();
            $con = $p->moKetNoi();
            $sql = "select * from sanpham s join thuonghieu t on s.MaTH = t.MaTH where TenSP like N'%$name%'";
            $kq = $con->query($sql);
            $p->dongKetNoi($con);
            return $kq;
        }

       public function updateSanPham($maSP,$tenSP,$gia,$hinh,$maloai){

    $p = new clsKetNoi();
    $con = $p->moKetNoi();

    $sql = "UPDATE sanpham 
            SET TenSP = N'$tenSP',
                Gia = '$gia',
                HinhAnh = '$hinh',
                MaLoai  = '$maloai'
            WHERE MaSP = '$maSP'";

    $kq = $con->query($sql);

    $p->dongKetNoi($con);

    return $kq;

}

            public function selectChiTietSanPham($maSP){
            
            $p = new clsKetNoi();
            $con = $p->moKetNoi();

            $truyvan = "SELECT s.*, t.*
                        FROM sanpham s 
                        JOIN loaisanpham t ON s.MaLoai = t.MaLoai
                        WHERE s.MaSP = $maSP";

            $kq = $con->query($truyvan);

            $p->dongKetNoi($con);

            return $kq;
        }
    
        public function themsanpham( $tenSP, $gia, $hinh,$mota,$maloai){
        $p = new clsketnoi();
        $con = $p->moKetNoi();
         $sql = "INSERT INTO sanpham (TenSP, Gia, HinhAnh, MoTa, MaLoai)
            VALUES ('$tenSP', '$gia', '$hinh', '$mota', '$maloai')";
    
        $kq = mysqli_query($con,$sql);
        $p ->dongKetNoi($con);
        return $kq;
    }
    
 public function delete($id) {
    $p = new clsKetNoi();
    $conn = $p->moKetNoi();

    $sql = "UPDATE baiviet SET TrangThai = 0 WHERE MaBV = $id";
    return $conn->query($sql);
}

 public function getTop8BanChay(){
   $p = new clsKetNoi();
    $con = $p->moKetNoi();
    // Quan trọng nhất là LIMIT 8 để khống chế số lượng
    $sql = "SELECT * FROM sanpham WHERE TrangThai = 1 ORDER BY MaSP DESC LIMIT 8";
    $kq = $con->query($sql);
    $p->dongKetNoi($con);
    return $kq;
}
 public function searchSanPham($tukhoa){
    $p = new clsKetNoi();
    $conn = $p->moKetNoi();

    $sql = "SELECT * FROM sanpham 
            WHERE TenSP LIKE N'%$tukhoa%'";

    return mysqli_query($conn, $sql);
}
public function delete1($id) {
    $p = new clsKetNoi();
    $conn = $p->moKetNoi();

    // XÓA MỀM ĐÚNG
    $sql = "UPDATE sanpham SET TrangThai = 0 WHERE MaSP = $id";

    $kq = $conn->query($sql);
    $p->dongKetNoi($conn);

    return $kq;
}
    }

?>