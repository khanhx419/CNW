@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">
        <h2>Thêm mới Task</h2>
    </div>
    <div class="card-body">
        <form action="{{ route('tasks.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Tiêu đề:</label>
                <input type="text" class="form-control" id="title" name="title" required>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Mô tả:</label>
                <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
            </div>

            <div class="mb-3">
                <label for="long_description" class="form-label">Mô tả chi tiết:</label>
                <textarea class="form-control" id="long_description" name="long_description" rows="5"></textarea>
            </div>

            <div class="form-check mb-3">
                <input type="checkbox" class="form-check-input" id="completed" name="completed" value="1">
                <label class="form-check-label" for="completed">Đã hoàn thành</label>
            </div>

            <button type="submit" class="btn btn-primary">Lưu</button>
            <a href="{{ route('tasks.index') }}" class="btn btn-secondary">Quay lại</a>
        </form>
    </div>
</div>
@endsection