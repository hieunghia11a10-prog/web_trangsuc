<?php
    class clsKetNoi{
        public function moKetNoi(){
            // Các thông số kết nối từ InfinityFree của bạn
            $servername = "sql303.infinityfree.com"; // MySQL Hostname từ ảnh
            $username = "if0_40962784";            // MySQL Username từ ảnh
            $password = "lKa8y08UOZWQnod";         // Mật khẩu bạn vừa cung cấp
            $dbname = "if0_40962784_trangsuc";     // Tên database bạn đã tạo

            // Thực hiện kết nối
            $con = mysqli_connect($servername, $username, $password, $dbname);
            
            // Kiểm tra kết nối và thiết lập tiếng Việt
            if($con){
                mysqli_set_charset($con, "utf8");
            } else {
                die("Kết nối thất bại: " . mysqli_connect_error());
            }
            
            return $con;
        }

        public function dongKetNoi($con){
            if($con){
                mysqli_close($con);
            }
        }
    }
?>