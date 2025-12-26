<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SinhVien; // Import Model

class SinhVienController extends Controller
{
    // Hiển thị danh sách
    public function index()
    {
        $danhSachSV = SinhVien::all(); // Lấy tất cả dữ liệu
        return view('sinhvien.list', compact('danhSachSV'));
    }

    // Lưu dữ liệu mới
    public function store(Request $request)
    {
        // Lấy dữ liệu từ form và lưu vào DB
        SinhVien::create($request->all());
        // Chuyển hướng về trang danh sách
        return redirect()->route('sinhvien.index');
    }
}
