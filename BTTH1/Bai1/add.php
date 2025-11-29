<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $hoa_moi = [
        'ten' => $_POST['ten'],
        'mota' => $_POST['mota'],
        'hinh' => $_POST['hinh']
    ];
    $file_path = 'data.json';
    $json_cu = file_get_contents($file_path);
    $DSHoa = json_decode($json_cu, true);
    $DSHoa[] = $hoa_moi;
    $json_moi = json_encode($DSHoa, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    file_put_contents($file_path, $json_moi);
    echo "<h3 style='color: green'>Đã thêm hoa: " . $_POST['ten'] . " thành công!</h3>";
    echo "<a href='admin.php'>Quay lại trang quản trị</a>";
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Thêm hoa mới</title>
</head>
<body>
    <h1>Nhập thông tin loài hoa mới</h1>
    
    <form action="" method="POST">
        <p>
            <label>Tên hoa:</label><br>
            <input type="text" name="ten" required style="width: 300px;">
        </p>
        
        <p>
            <label>Mô tả:</label><br>
            <textarea name="mota" required style="width: 300px; height: 100px;"></textarea>
        </p>
        
        <p>
            <label>Tên file ảnh (ví dụ: hoa-hong.jpg):</label><br>
            <input type="text" name="hinh" required style="width: 300px;">
        </p>

        <button type="submit" style="padding: 10px 20px;">Lưu lại</button>
    </form>
</body>
</html>