@extends('admin.layouts.view')

@push('stl')
@endpush

@section('main')
    <div class="p-4" style="min-height: 800px;">
        <h4 class="text-primary mb-4">Thêm sản phẩm</h4>
        <a href="{{ route('admin.products.listProducts') }}" class="btn btn-info mb-3">Quay lại</a>
        <form action="{{ route('admin.products.addPostProducts') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="nameProduct">Tên sản phẩm</label>
                <input type="text" name="nameProduct" id="nameProduct" class="form-control">
            </div>
            <div class="mb-3">
                <label for="priceProduct">Giá sản phẩm</label>
                <input type="text" name="priceProduct" id="priceProduct" class="form-control">
            </div>
            <div class="mb-3">
                <label for="imgProduct">Ảnh</label>
                <input type="file" name="imgProduct" id="imgProduct" class="form-control" accept="/image">
            </div>
            <button class="btn btn-success" type="submit">Thêm mới</button>
        </form>
    </div>
@endsection

@push('scp')
@endpush
