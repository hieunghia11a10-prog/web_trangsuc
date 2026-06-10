<?php
include_once("controller/cBaiviet.php");

$p = new cBaiviet();
$id = $_GET["id"];

$data = $p->getById($id)->fetch_assoc();

if(isset($_POST["btn"])){
    $tieude = $_POST["tieude"];
    $noidung = $_POST["noidung"];

    $hinhanh = $_FILES["hinhanh"]["name"];

    if($hinhanh != ""){
        move_uploaded_file($_FILES["hinhanh"]["tmp_name"], "img/".$hinhanh);
    } else {
        $hinhanh = $data["HinhAnh"];
    }

    $p->update($id, $tieude, $noidung, $hinhanh);

    header("Location: admin.php?type=baiviet");
}
?>

<form method="post" enctype="multipart/form-data">
    <input type="text" name="tieude" value="<?php echo $data["TieuDe"]; ?>"><br><br>

    <textarea name="noidung"><?php echo $data["NoiDung"]; ?></textarea><br><br>

    <img src="img/<?php echo $data["HinhAnh"]; ?>" width="100"><br><br>

    <input type="file" name="hinhanh"><br><br>

    <button name="btn">Cập nhật</button>
</form>
<style>
    body{
    background: #f4f6f9;
    font-family: Arial, sans-serif;
}

/* canh giữa form */
form{
    width: 500px;
    margin: 50px auto;
    background: #fff;
    padding: 25px;
    border-radius: 12px;
    box-shadow: 0 5px 15px rgba(0,0,0,0.1);
}

/* input + textarea */
input[type="text"], textarea{
    width: 100%;
    padding: 10px;
    margin-top: 5px;
    border: 1px solid #ccc;
    border-radius: 8px;
    outline: none;
    transition: 0.3s;
}

/* focus đẹp hơn */
input[type="text"]:focus, textarea:focus{
    border-color: #007bff;
}

/* textarea */
textarea{
    height: 120px;
    resize: none;
}

/* ảnh */
img{
    display: block;
    margin: 10px auto;
    border-radius: 10px;
    border: 1px solid #ddd;
    padding: 5px;
}

/* file input */
input[type="file"]{
    margin-top: 10px;
}

/* nút */
button{
    width: 100%;
    padding: 12px;
    background: #007bff;
    color: white;
    border: none;
    border-radius: 8px;
    font-size: 16px;
    cursor: pointer;
    transition: 0.3s;
}

/* hover nút */
button:hover{
    background: #0056b3;
}
</style>