<?php require 'DSHoa.php'; ?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Các loài hoa đẹp</title>
    <style>
        table { width: 100%; border-collapse: collapse; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
        img { width: 50px; height: auto; }
    </style>
</head>
<body>

    <h1>Danh sách các loài hoa</h1>
    <a href="add.php"><button>+ Thêm hoa mới</button></a>
    <br><br>

    <table>
        <thead>
            <tr>
                <th>Tên hoa</th>
                <th>Hình ảnh</th>
                <th>Mô tả</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($DSHoa as $key => $hoa): ?>
                <tr>
                    <td><?php echo $hoa['ten']; ?></td>
                    <td><img src="images/<?php echo $hoa['hinh']; ?>"></td>
                    <td>
                        <?php echo $hoa['mota']; ?>
                    </td> <td>
                        <a href="edit.php?id=<?php echo $key; ?>">Sửa</a> | 
                        <a href="delete.php?id=<?php echo $key; ?>">Xóa</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

</body>
</html>