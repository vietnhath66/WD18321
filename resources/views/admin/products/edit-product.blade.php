@extends('admin.layouts.view')

@push('stl')
    <style>
        .img-product {
            width: 150px;
            height: 150px;
            object-fit: cover;
        }
    </style>
@endpush

@section('main')
    <div class="p-4" style="min-height: 800px;">
        <h4 class="text-primary mb-4">Sửa sản phẩm</h4>
        <a href="{{ route('admin.products.listProducts') }}" class="btn btn-info mb-3">Quay lại</a>
        <form action="{{ route('admin.products.editPatchProducts', $products->product_id) }}" method="post"
            enctype="multipart/form-data">
            @method('patch')
            @csrf
            <div class="mb-3">
                <label for="nameProduct">Tên sản phẩm</label>
                <input type="text" name="nameProduct" id="nameProduct" class="form-control"
                    value="{{ $products->name }}">
            </div>
            <div class="mb-3">
                <label for="priceProduct">Giá sản phẩm</label>
                <input type="text" name="priceProduct" id="priceProduct" class="form-control"
                    value="{{ $products->price }}">
            </div>
            <div class="mb-3">
                <label for="imgProduct">Ảnh</label>
                <img src="{{ asset($products->img) }}" alt="" class="img-product mb-3">
                <input type="file" name="imgProduct" id="imgProduct" class="form-control">
            </div>
            <button class="btn btn-success">Xác nhận</button>
        </form>
    </div>
@endsection

@push('scp')
@endpush
