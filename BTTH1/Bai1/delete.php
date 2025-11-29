<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $file_path = 'data.json';
    $json_cu = file_get_contents($file_path);
    $DSHoa = json_decode($json_cu, true);
    if (isset($DSHoa[$id])) {
        unset($DSHoa[$id]);
        $DSHoa = array_values($DSHoa);
        $json_moi = json_encode($DSHoa, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
        file_put_contents($file_path, $json_moi);
    }
}

header("Location: admin.php");
exit();
?>