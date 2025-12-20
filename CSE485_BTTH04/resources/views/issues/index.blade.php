<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Quản lý sự cố phòng thực hành</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <style>
    body {
        color: #566787;
        background: #f5f5f5;
        font-family: 'Varela Round', sans-serif;
        font-size: 13px;
    }

    .table-responsive {
        margin: 30px 0;
    }

    .table-wrapper {
        background: #fff;
        padding: 20px 25px;
        border-radius: 3px;
        min-width: 1000px;
        box-shadow: 0 1px 1px rgba(0, 0, 0, .05);
    }

    .table-title {
        padding-bottom: 15px;
        background: #435d7d;
        color: #fff;
        padding: 16px 30px;
        min-width: 100%;
        margin: -20px -25px 10px;
        border-radius: 3px 3px 0 0;
    }

    .table-title h2 {
        margin: 5px 0 0;
        font-size: 24px;
    }

    .table-title .btn-group {
        float: right;
    }

    .table-title .btn {
        color: #fff;
        float: right;
        font-size: 13px;
        border: none;
        min-width: 50px;
        border-radius: 2px;
        border: none;
        outline: none !important;
        margin-left: 10px;
    }

    .table-title .btn i {
        float: left;
        font-size: 21px;
        margin-right: 5px;
    }

    .table-title .btn span {
        float: left;
        margin-top: 2px;
    }

    table.table tr th,
    table.table tr td {
        border-color: #e9e9e9;
        padding: 12px 15px;
        vertical-align: middle;
    }

    /* table.table tr th:first-child { width: 60px; } */
    table.table tr th:last-child {
        width: 100px;
    }

    table.table-striped tbody tr:nth-of-type(odd) {
        background-color: #fcfcfc;
    }

    table.table-striped.table-hover tbody tr:hover {
        background: #f5f5f5;
    }

    table.table th i {
        font-size: 13px;
        margin: 0 5px;
        cursor: pointer;
    }

    table.table td:last-child i {
        opacity: 0.9;
        font-size: 22px;
        margin: 0 5px;
    }

    table.table td a {
        font-weight: bold;
        color: #566787;
        display: inline-block;
        text-decoration: none;
        outline: none !important;
    }

    table.table td a:hover {
        color: #2196F3;
    }

    table.table td a.edit {
        color: #FFC107;
    }

    table.table td a.delete {
        color: #F44336;
    }

    table.table td i {
        font-size: 19px;
    }

    .pagination {
        float: right;
        margin: 0 0 5px;
    }

    .hint-text {
        float: left;
        margin-top: 10px;
        font-size: 13px;
    }

    /* Modal styles */
    .modal .modal-dialog {
        max-width: 400px;
    }

    .modal .modal-header,
    .modal .modal-body,
    .modal .modal-footer {
        padding: 20px 30px;
    }

    .modal .modal-content {
        border-radius: 3px;
        font-size: 14px;
    }

    .modal .modal-footer {
        background: #ecf0f1;
        border-radius: 0 0 3px 3px;
    }

    .modal .modal-title {
        display: inline-block;
    }

    .modal .form-control {
        border-radius: 2px;
        box-shadow: none;
        border-color: #dddddd;
    }

    .modal textarea.form-control {
        resize: vertical;
    }

    .modal .btn {
        border-radius: 2px;
        min-width: 100px;
    }

    .modal form label {
        font-weight: normal;
    }
    </style>
    <script>
    $(document).ready(function() {
        $('[data-toggle="tooltip"]').tooltip();
    });
    </script>
</head>

<body>
    <div class="container-xl">
        <div class="table-responsive">
            <div class="table-wrapper">
                <div class="table-title">
                    <div class="row">
                        <div class="col-sm-6">
                            <h2>Quản lý <b>Sự cố</b></h2>
                        </div>
                        <div class="col-sm-6">
                            <a href="#addIssueModal" class="btn btn-success" data-toggle="modal"><i
                                    class="material-icons">&#xE147;</i> <span>Thêm sự cố</span></a>
                        </div>
                    </div>
                </div>

                @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
                @endif

                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>Mã</th>
                            <th>Tên máy tính</th>
                            <th>Người báo cáo</th>
                            <th>Thời gian</th>
                            <th>Mức độ</th>
                            <th>Trạng thái</th>
                            <th>Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($issues as $issue)
                        <tr>
                            <td>{{ $issue->id }}</td>
                            <td>{{ $issue->computer->computer_name }}<br><small
                                    class="text-muted">{{ $issue->computer->model }}</small></td>
                            <td>{{ $issue->reported_by }}</td>
                            <td>{{ \Carbon\Carbon::parse($issue->reported_date)->format('d/m/Y H:i') }}</td>
                            <td>
                                @if($issue->urgency == 'High') <span class="badge badge-danger">High</span>
                                @elseif($issue->urgency == 'Medium') <span class="badge badge-warning">Medium</span>
                                @else <span class="badge badge-success">Low</span> @endif
                            </td>
                            <td>{{ $issue->status }}</td>
                            <td>
                                <a href="#editIssueModal-{{ $issue->id }}" class="edit" data-toggle="modal"><i
                                        class="material-icons" data-toggle="tooltip" title="Sửa">&#xE254;</i></a>
                                <a href="#deleteIssueModal-{{ $issue->id }}" class="delete" data-toggle="modal"><i
                                        class="material-icons" data-toggle="tooltip" title="Xóa">&#xE872;</i></a>
                            </td>
                        </tr>

                        <div id="editIssueModal-{{ $issue->id }}" class="modal fade">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <form action="{{ route('issues.update', $issue->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <div class="modal-header">
                                            <h4 class="modal-title">Sửa thông tin sự cố</h4>
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-hidden="true">&times;</button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label>Máy tính</label>
                                                <select name="computer_id" class="form-control" required>
                                                    @foreach($computers as $computer)
                                                    <option value="{{ $computer->id }}"
                                                        {{ $issue->computer_id == $computer->id ? 'selected' : '' }}>
                                                        {{ $computer->computer_name }} ({{ $computer->model }})
                                                    </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>Người báo cáo</label>
                                                <input type="text" name="reported_by" value="{{ $issue->reported_by }}"
                                                    class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label>Thời gian</label>
                                                <input type="datetime-local" name="reported_date"
                                                    value="{{ \Carbon\Carbon::parse($issue->reported_date)->format('Y-m-d\TH:i') }}"
                                                    class="form-control" required>
                                            </div>
                                            <div class="form-group">
                                                <label>Mức độ</label>
                                                <select name="urgency" class="form-control" required>
                                                    <option value="Low"
                                                        {{ $issue->urgency == 'Low' ? 'selected' : '' }}>Low</option>
                                                    <option value="Medium"
                                                        {{ $issue->urgency == 'Medium' ? 'selected' : '' }}>Medium
                                                    </option>
                                                    <option value="High"
                                                        {{ $issue->urgency == 'High' ? 'selected' : '' }}>High</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>Trạng thái</label>
                                                <select name="status" class="form-control" required>
                                                    <option value="Open"
                                                        {{ $issue->status == 'Open' ? 'selected' : '' }}>Open</option>
                                                    <option value="In Progress"
                                                        {{ $issue->status == 'In Progress' ? 'selected' : '' }}>In
                                                        Progress</option>
                                                    <option value="Resolved"
                                                        {{ $issue->status == 'Resolved' ? 'selected' : '' }}>Resolved
                                                    </option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>Mô tả</label>
                                                <textarea name="description" class="form-control"
                                                    required>{{ $issue->description }}</textarea>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <input type="button" class="btn btn-default" data-dismiss="modal"
                                                value="Hủy">
                                            <input type="submit" class="btn btn-info" value="Lưu">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <div id="deleteIssueModal-{{ $issue->id }}" class="modal fade">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <form action="{{ route('issues.destroy', $issue->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <div class="modal-header">
                                            <h4 class="modal-title">Xóa sự cố</h4>
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-hidden="true">&times;</button>
                                        </div>
                                        <div class="modal-body">
                                            <p>Bạn có chắc chắn muốn xóa sự cố của máy
                                                <b>{{ $issue->computer->computer_name }}</b> không?
                                            </p>
                                            <p class="text-warning"><small>Hành động này không thể hoàn tác.</small></p>
                                        </div>
                                        <div class="modal-footer">
                                            <input type="button" class="btn btn-default" data-dismiss="modal"
                                                value="Hủy">
                                            <input type="submit" class="btn btn-danger" value="Xóa">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        @endforeach
                    </tbody>
                </table>

                <div class="clearfix">
                    <div class="hint-text">Hiển thị <b>{{ $issues->count() }}</b> trên tổng số
                        <b>{{ $issues->total() }}</b> bản ghi
                    </div>
                    <div class="pagination">
                        {{ $issues->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="addIssueModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{ route('issues.store') }}" method="POST">
                    @csrf
                    <div class="modal-header">
                        <h4 class="modal-title">Thêm sự cố mới</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Máy tính</label>
                            <select name="computer_id" class="form-control" required>
                                @foreach($computers as $computer)
                                <option value="{{ $computer->id }}">{{ $computer->computer_name }}
                                    ({{ $computer->model }})</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Người báo cáo</label>
                            <input type="text" name="reported_by" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Thời gian</label>
                            <input type="datetime-local" name="reported_date" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Mức độ</label>
                            <select name="urgency" class="form-control" required>
                                <option value="Low">Low</option>
                                <option value="Medium">Medium</option>
                                <option value="High">High</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Trạng thái</label>
                            <select name="status" class="form-control" required>
                                <option value="Open">Open</option>
                                <option value="In Progress">In Progress</option>
                                <option value="Resolved">Resolved</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Mô tả chi tiết</label>
                            <textarea name="description" class="form-control" required></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="button" class="btn btn-default" data-dismiss="modal" value="Hủy">
                        <input type="submit" class="btn btn-success" value="Thêm">
                    </div>
                </form>
            </div>
        </div>
    </div>

</body>

</html>