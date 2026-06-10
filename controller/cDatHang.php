<?php
include_once("model/mDatHang.php");

class cDatHang {

    // ===== BƯỚC 1: NHẬP THÔNG TIN =====
    // function xuLyDatHang() {
    //     $step = "thongtin";
    //     include_once("view/datHang.php");
    // }

    // ===== BƯỚC 2: XÁC NHẬN =====
    function xuLyXacNhan() {

        $_SESSION['khachhang'] = $_POST;

        $step = "xacnhan";
        include_once("view/datHang.php");
    }

    // ===== BƯỚC 3: THANH TOÁN QR =====
    function thanhToanQR(){
    // 1. ƯU TIÊN LẤY DỮ LIỆU TỪ FORM "MUA NGAY" (POST)
    if(isset($_POST['masp'])){   
        $giohang = [
            [
                'masp' => $_POST['masp'],
                'tensp' => $_POST['tensp'],
                'gia' => $_POST['gia'],
                'hinhanh' => $_POST['hinhanh'],
                'soluong' => $_POST['soluong'] 
            ]
        ];
        // Lưu tạm vào session để nếu user quay lại hoặc reload trang không bị mất
        $_SESSION['tmp_muangay'] = $giohang;
    } 
    // 2. NẾU KHÔNG CÓ POST, KIỂM TRA SESSION TẠM (Dành cho lúc chuyển bước)
    else if(isset($_SESSION['tmp_muangay'])){
        $giohang = $_SESSION['tmp_muangay'];
    }
    // 3. CUỐI CÙNG MỚI LẤY GIỎ HÀNG CHÍNH
    else if(isset($_SESSION['giohang'])){
        $giohang = $_SESSION['giohang'];
    } else {
        echo "<script>alert('Giỏ hàng trống!'); window.location='index.php';</script>";
        return;
    }

    $model = new mDatHang();
    
    // Kiểm tra nếu chưa có thông tin khách hàng thì bắt nhập (tránh lỗi lấy thông tin cũ)
    if(!isset($_SESSION['khachhang'])){
        $step = "thongtin";
        include_once("view/datHang.php");
        return;
    }

    $maDH = $model->themDonHang($_SESSION['khachhang'], $giohang);
    
    if($maDH){
        $_SESSION['MaDH'] = $maDH;
        $tong = 0;
        foreach($giohang as $sp){
            $tong += $sp['gia'] * $sp['soluong'];
        }
        $_SESSION['tongtien'] = $tong;
        
        // Xóa dữ liệu tạm sau khi đặt hàng thành công
        unset($_SESSION['tmp_muangay']);

        $step = "qr";
        include_once("view/datHang.php");
    }
}
function xuLyDatHang() {
    // Ưu tiên 1: Nếu người dùng nhấn "Mua ngay" từ trang chi tiết
    if(isset($_POST['masp'])){
        $ds_sanpham = [
            [
                'masp'    => $_POST['masp'],
                'tensp'   => $_POST['tensp'],
                'gia'     => $_POST['gia'],
                'hinhanh' => $_POST['hinhanh'],
                'soluong' => $_POST['soluong'] // Lấy số lượng vừa nhập ở ô qty
            ]
        ];
        // Lưu tạm vào session riêng để phục vụ bước xác nhận tiếp theo
        $_SESSION['mua_ngay_temp'] = $ds_sanpham;
    } 
    // Ưu tiên 2: Nếu đang ở bước xác nhận của "Mua ngay"
    else if(isset($_SESSION['mua_ngay_temp'])){
        $ds_sanpham = $_SESSION['mua_ngay_temp'];
    }
    // Ưu tiên 3: Nếu nhấn "Đặt hàng" từ trang Giỏ hàng
    else if(isset($_SESSION['giohang'])){
        $ds_sanpham = $_SESSION['giohang'];
        unset($_SESSION['mua_ngay_temp']); // Xóa mua ngay nếu quay lại giỏ hàng
    }

    $step = "thongtin";
    // Truyền biến $ds_sanpham sang View thay vì dùng trực tiếp $_SESSION['giohang']
    include_once("view/datHang.php");
}
}

?>