<?php
$file_path = __DIR__ . "/65HTTT_Danh_sach_diem_danh.csv";
$data = [];
if (file_exists($file_path)) {
    if (($handle = fopen($file_path, "r")) !== false) {
        while (($row = fgetcsv($handle, 1000, ",")) !== false) {
            $data[] = $row;
        }

        fclose($handle);
    }
} else {
    die("Không tìm thấy tệp CSV!");
}
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Hiển thị dữ liệu CSV</title>
    <style>
        body { font-family: Arial; padding: 20px; background: #f4f4f4; }
        table {
            border-collapse: collapse;
            width: 100%;
            background: #fff;
        }
        th, td {
            padding: 8px 12px;
            border: 1px solid #ccc;
        }
        th {
            background: #2c3e50;
            color: white;
        }
        tr:nth-child(even) { background: #f9f9f9; }
    </style>
</head>
<body>

<h2>Dữ liệu từ tệp CSV</h2>

<table>
    <?php if (!empty($data)): ?>
        <tr>
            <?php foreach ($data[0] as $header): ?>
                <th><?php echo htmlspecialchars($header); ?></th>
            <?php endforeach; ?>
        </tr>

        <?php for ($i = 1; $i < count($data); $i++): ?>
            <tr>
                <?php foreach ($data[$i] as $cell): ?>
                    <td><?php echo htmlspecialchars($cell); ?></td>
                <?php endforeach; ?>
            </tr>
        <?php endfor; ?>

    <?php else: ?>
        <tr><td>Không có dữ liệu!</td></tr>
    <?php endif; ?>
</table>

</body>
</html>
