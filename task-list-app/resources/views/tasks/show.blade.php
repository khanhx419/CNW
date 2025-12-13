@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">
        <h2>Chi tiết Task</h2>
    </div>
    <div class="card-body">
        <h3 class="card-title">{{ $task->title }}</h3>

        <div class="mb-3">
            <strong>Mô tả:</strong>
            <p>{{ $task->description }}</p>
        </div>

        <div class="mb-3">
            <strong>Mô tả chi tiết:</strong>
            <p>{{ $task->long_description ?: 'Không có mô tả chi tiết.' }}</p>
        </div>

        <div class="mb-3">
            <strong>Trạng thái:</strong>
            @if($task->completed)
            <span class="badge bg-success">Hoàn thành</span>
            @else
            <span class="badge bg-warning text-dark">Chưa hoàn thành</span>
            @endif
        </div>

        <div class="mb-3 text-muted">
            <small>Ngày tạo: {{ $task->created_at }}</small><br>
            <small>Cập nhật lần cuối: {{ $task->updated_at }}</small>
        </div>

        <a href="{{ route('tasks.index') }}" class="btn btn-secondary">Quay lại danh sách</a>
        <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-warning">Sửa</a>
    </div>
</div>
@endsection