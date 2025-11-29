<?php
    require 'DSHoa.php';
    foreach ($DSHoa as $hoa){
        echo "<h2>" . $hoa['ten'] . "</h2>";
        echo "<img src='images/" . $hoa['hinh'] . "' alt='" . $hoa['ten'] . "' style='width:200px;height:auto;'/>";
        echo "<p>" . $hoa['mota'] . "</p>";
    }
?>