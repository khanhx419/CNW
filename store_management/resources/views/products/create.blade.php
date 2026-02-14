@extends('layout')

@section('content')
<div class="container mt-4">
    <div class="form-container" style="max-width: 800px; margin: 0 auto;">

        <div class="form-header mb-4">
            <h4>Thêm Mới Sản Phẩm</h4>
            <hr>
        </div>

        @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form action="{{ route('products.store') }}" method="POST">
            @csrf

            <div class="form-group mb-3">
                <label class="fw-bold">Tên sản phẩm<span class="text-danger">*</span></label>
                <input type="text" name="name" class="form-control" required value="{{ old('name') }}"
                    placeholder="Nhập tên...">
                @error('name') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <div class="form-group mb-3">
                <label class="fw-bold">Mô Tả<span class="text-danger">*</span></label>
                <input type="text" name="description" class="form-control" required value="{{ old('description') }}"
                    placeholder="Nhập mô tả...">
                @error('description') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <div class="form-group mb-3">
                <label class="fw-bold">Giá<span class="text-danger">*</span></label>
                <input type="text" name="price" class="form-control" required value="{{ old('price') }}"
                    placeholder="Nhập giá...">
                @error('price') <small class="text-danger">{{ $message }}</small> @enderror
            </div>



            <div class="form-group mb-3">
                <label class="fw-bold">Cửa Hàng<span class="text-danger">*</span></label>
                <select name="store_id" class="form-control" required>
                    <option value="">-- Chọn cửa hàng --</option>
                    @foreach($stores as $store)
                    <option value="{{ $store->id }}" {{ old('member_id') == $store->id ? 'selected' : '' }}>

                        {{ $store->name ?? $store->address ?? 'id cửa hàng: ' . $store->id }}
                    </option>
                    @endforeach
                </select>
                @error('store_id') <small class="text-danger">{{ $message }}</small> @enderror
            </div>


            <div class="mt-4 d-flex justify-content-end gap-2">
                <a href="{{ route('products.index') }}" class="btn btn-secondary me-2">Quay lại</a>
                <button type="submit" class="btn btn-success">Thêm Mới</button>
            </div>
        </form>
    </div>
</div>
@endsection