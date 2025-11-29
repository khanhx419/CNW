<?php
$noidung_json = file_get_contents('data.json');
$DSHoa = json_decode($noidung_json, true);
if ($DSHoa === null) {
    $DSHoa = [];
}
?>