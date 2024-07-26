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
        <h4 class="text-primary mb-4">Chi tiết sản phẩm</h4>
        <a href="{{ route('admin.products.listProducts') }}" class="btn btn-info mb-3">Quay lại</a>
        <form action="{{ route('admin.products.addPostProducts') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="nameProduct">Tên sản phẩm</label>
                <input type="text" name="nameProduct" id="nameProduct" class="form-control" value="{{ $products->name }}"
                    disabled>
            </div>
            <div class="mb-3">
                <label for="priceProduct">Giá sản phẩm</label>
                <input type="text" name="priceProduct" id="priceProduct" class="form-control"
                    value="{{ $products->price }}$" disabled>
            </div>
            <div class="mb-3">
                <label for="imgProducts">Ảnh</label>
                <img src="{{ asset($products->img) }}" alt="" class="img-product form-control">
            </div>
        </form>
    </div>
@endsection

@push('scp')
@endpush
