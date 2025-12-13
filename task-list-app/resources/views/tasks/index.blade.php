@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1>Danh sách Task</h1>
    <a href="{{ route('tasks.create') }}" class="btn btn-primary">Thêm mới</a>
</div>

@if (session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif

<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>Tiêu đề</th>
            <th>Mô tả</th>
            <th>Trạng thái</th>
            <th>Hành động</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($tasks as $task)
        <tr>
            <td>{{ $task->id }}</td>
            <td>{{ $task->title }}</td>
            <td>{{ $task->description }}</td>
            <td>
                @if($task->completed)
                <span class="badge bg-success">Hoàn thành</span>
                @else
                <span class="badge bg-secondary">Chưa hoàn thành</span>
                @endif
            </td>
            <td>
                <a href="{{ route('tasks.show', $task->id) }}" class="btn btn-info btn-sm text-white">Xem</a>

                <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-warning btn-sm">Sửa</a>

                <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" style="display: inline-block;"
                    onsubmit="return confirm('Bạn có chắc chắn muốn xóa không?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm">Xóa</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection