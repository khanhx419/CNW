@extends('layouts.app')

@section('content')
<div style="margin-top: 20px;">
    <h3>Thêm Sinh Viên Mới</h3>

    <form action="{{ route('sinhvien.store') }}" method="POST">
        @csrf <div style="margin-bottom: 10px;">
            <label>Tên sinh viên:</label>
            <input type="text" name="ten_sinh_vien" required placeholder="Nhập tên...">
        </div>

        <div style="margin-bottom: 10px;">
            <label>Email:</label>
            <input type="email" name="email" required placeholder="Nhập email...">
        </div>

        <button type="submit">Thêm</button>
    </form>

    <hr>

    <h3>Danh Sách Sinh Viên</h3>
    <table border="1" cellpadding="10" cellspacing="0" style="width: 100%; border-collapse: collapse;">
        <thead>
            <tr>
                <th>ID</th>
                <th>Tên Sinh Viên</th>
                <th>Email</th>
                <th>Ngày tạo</th>
            </tr>
        </thead>
        <tbody>
            @foreach($danhSachSV as $sv)
            <tr>
                <td>{{ $sv->id }}</td>
                <td>{{ $sv->ten_sinh_vien }}</td>
                <td>{{ $sv->email }}</td>
                <td>{{ $sv->created_at }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection