<?php
include_once("controller/cBaiviet.php");

$p = new cBaiviet();
$list = $p->getAll();
?>

<h2>Quản lý bài viết</h2>

<a href="?page=quanly&type=baiviet&action=insert">➕ Thêm bài viết</a>
<table border="1" width="100%" cellpadding="5">
<tr>
    <th>ID</th>
    <th>Tiêu đề</th>
    <th>Hình</th>
    <th>Ngày đăng</th>
    <th>Hành động</th>
</tr>

<?php
while($row = $list->fetch_assoc()){
?>
<tr>
    <td><?php echo $row["MaBV"]; ?></td>
    <td><?php echo $row["TieuDe"]; ?></td>
   <td style="text-align: center;">
    <img src="image/<?php echo $row["HinhAnh"]; ?>" width="80">
</td>
    <td><?php echo $row["NgayDang"]; ?></td>
    <td>
        <a href="?type=baiviet&action=sua&id=<?php echo $row["MaBV"]; ?>">Sửa</a> |
        <a href="?type=baiviet&action=xoa&id=<?php echo $row["MaBV"]; ?>" 
           onclick="return confirm('Xóa?')">Xóa</a>
    </td>
</tr>
<?php } ?>

</table>