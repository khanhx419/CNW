<?php
$file_path = 'data.json';
$json_cu = file_get_contents($file_path);
$DSHoa = json_decode($json_cu, true);
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $hoa_can_sua = $DSHoa[$id];
} else {
    header("Location: admin.php");
    exit();
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $DSHoa[$id] = [
        'ten' => $_POST['ten'],
        'mota' => $_POST['mota'],
        'hinh' => $_POST['hinh']
    ];
    $json_moi = json_encode($DSHoa, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    file_put_contents($file_path, $json_moi);
    echo "<script>alert('Cập nhật thành công!'); window.location.href='admin.php';</script>";
    exit();
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Sửa thông tin hoa</title>
</head>
<body>
    <h1>Sửa thông tin: <?php echo $hoa_can_sua['ten']; ?></h1>

    <form action="" method="POST">
        <p>
            <label>Tên hoa:</label><br>
            <input type="text" name="ten" value="<?php echo $hoa_can_sua['ten']; ?>" required style="width: 300px;">
        </p>
        
        <p>
            <label>Mô tả:</label><br>
            <textarea name="mota" required style="width: 300px; height: 100px;"><?php echo $hoa_can_sua['mota']; ?></textarea>
        </p>
        
        <p>
            <label>Tên file ảnh:</label><br>
            <input type="text" name="hinh" value="<?php echo $hoa_can_sua['hinh']; ?>" required style="width: 300px;">
        </p>

        <button type="submit">Cập nhật</button>
        <a href="admin.php">Hủy bỏ</a>
    </form>
</body>
</html>