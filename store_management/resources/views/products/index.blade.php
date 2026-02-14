@extends('layout')

@section('content')
<div class="table-responsive">
    <div class="table-wrapper">
        <div class="table-title">
            <div class="row">
                <div class="col-sm-6">
                    <h2>Quản lý <b>Cửa Hàng</b></h2>
                </div>
                <div class="col-sm-6">
                    <a href="{{ route('products.create') }}" class="btn btn-success">
                        <i class="material-icons">&#xE147;</i> <span>Thêm Mới</span>
                    </a>
                </div>
            </div>
        </div>

        @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Tên sản phẩm</th>
                    <th>Mô Tả</th>
                    <th>Giá</th>
                    <th>Tên cửa hàng</th>
                    <th>Ngày tạo</th>
                    <th>Hành Động</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->description }}</td>
                    <td>{{ $item->price }}</td>
                    <td>{{ $item->store_id }}</td>
                    <td>{{ $item->created_at }}</td>
                    <td>
                        <a href="{{ route('products.edit', $item->id) }}" class="edit">
                            <i class="material-icons" data-toggle="tooltip" title="Sửa">&#xE254;</i>
                        </a>
                        <a href="#deleteEmployeeModal-{{ $item->id }}" class="delete" data-toggle="modal">
                            <i class="material-icons" data-toggle="tooltip" title="Xóa">&#xE872;</i>
                        </a>

                        <div id="deleteEmployeeModal-{{ $item->id }}" class="modal fade">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <form action="{{ route('products.destroy', $item->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <div class="modal-header">
                                            <h4 class="modal-title">Xóa bản ghi</h4>
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-hidden="true">&times;</button>
                                        </div>
                                        <div class="modal-body">
                                            <p>Bạn có chắc muốn xóa bản ghi ID: <b>{{ $item->id }}</b> không?</p>
                                            <p class="text-warning"><small>Hành động này không thể hoàn tác.</small></p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default"
                                                data-dismiss="modal">Hủy</button>
                                            <input type="submit" class="btn btn-danger" value="Xóa">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <div class="clearfix">
            <div class="hint-text">
                Hiển thị <b>{{ $products->count() }} / {{ $products->total() }}</b> bản ghi
            </div>
            <div class="pagination">
                {{ $products->links('pagination::bootstrap-4') }}
            </div>
        </div>
    </div>
</div>
@endsection