<!DOCTYPE html>
<html lang="vi">
<head>
<meta charset="UTF-8">
<title>PHT Chương 2 - PHP Căn Bản</title>
</head>
<body>
<h1>Kết quả PHP Căn Bản</h1>
<?php
// BẮT ĐẦU CODE PHP CỦA BẠN TẠI ĐÂY// TODO 1: Khai báo 3 biến
    $ho_ten = "Lê Tuấn Khanh";
    $diem_tb = 7;
    $co_di_hoc_chuyen_can = true;
// TODO 2: In ra thông tin sinh viên
    echo "Họ tên: $ho_ten. Điểm: $diem_tb";
    echo "<br>";
// (Lưu ý: Phải in ra cả thẻ <br> để xuống dòng trong HTML)
// TODO 3: Viết cấu trúc IF/ELSE IF/ELSE (2.2)
// Dựa vào $diem_tb, in ra xếp loại:
    if($diem_tb >= 8.5 && $co_di_hoc_chuyen_can == true){
        echo "Xếp loại: Giỏi";
    }
    else if($diem_tb >= 6.5 && $co_di_hoc_chuyen_can == true){
        echo "Xếp loại: Khá";
    }
    else if($diem_tb >= 5.0 && $co_di_hoc_chuyen_can == true){
        echo "Xếp loại: Trung bình";
    }
    else{
        echo "Xếp loại: Yếu (Cần cố gắng thêm!)";
    }
    echo "<br>";
// Gợi ý: Dùng toán tử && (AND)
// TODO 4: Viết 1 hàm đơn giản (2.3)
// Tên hàm: chaoMung()
function chaoMung() {
    echo "Chúc mừng bạn đã hoàn thành PHT Chương 2!";
}
// Hàm này không có tham số, chỉ cần `echo "Chúc mừng bạn đã hoàn thành PHT
//Chương 2!"`
// TODO 5: Gọi hàm bạn vừa tạo
// Gợi ý: Gõ tên hàm và dấu ();
    chaoMung();
// KẾT THÚC CODE PHP CỦA BẠN TẠI ĐÂY
?></body>
</html>