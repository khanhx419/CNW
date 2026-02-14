@extends('layout')

@section('content')
<div class="form-container">
    <form action="{{ route('products.update', $product->id) }}" method="POST">
        @csrf
        @method('PUT') <div class="form-header">
            <h4>Cập sản phẩm: {{ $product->id }}</h4>
        </div>

        <div class="form-group mb-3">
            <label class="fw-bold">Tên sản phẩm<span class="text-danger">*</span></label>
            <input type="text" name="name" class="form-control" required value="{{ old('name', $product->name) }}"
                placeholder="Nhập tên...">
            @error('name') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="form-group mb-3">
            <label class="fw-bold">Mô Tả<span class="text-danger">*</span></label>
            <input type="text" name="description" class="form-control" required
                value="{{ old('description', $product->description) }}" placeholder="Nhập mô tả...">
            @error('description') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="form-group mb-3">
            <label class="fw-bold">Giá<span class="text-danger">*</span></label>
            <input type="text" name="price" class="form-control" required value="{{ old('price', $product->price) }}"
                placeholder="Nhập giá...">
            @error('price') <small class="text-danger">{{ $message }}</small> @enderror
        </div>



        <div class="form-group mb-3">
            <label class="fw-bold">Cửa Hàng<span class="text-danger">*</span></label>
            <select name="store_id" class="form-control" required>
                <option value="">-- Chọn cửa hàng --</option>
                @foreach($stores as $store)
                <option value="{{ $store->id }}"
                    {{ old('member_id', $store->store_id) == $store->id ? 'selected' : '' }}>

                    {{ $store->name ?? $store->address ?? 'id cửa hàng: ' . $store->id }}
                </option>
                @endforeach
            </select>
            @error('store_id') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="mt-4">
            <a href="{{ route('products.index') }}" class="btn btn-secondary">Quay lại</a>
            <button type="submit" class="btn btn-success">Cập nhật</button>
        </div>
    </form>
</div>
@endsection