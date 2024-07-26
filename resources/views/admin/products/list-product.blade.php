@extends('admin.layouts.view')

@push('stl')
    <style>
        .img-product {
            width: 80px;
            height: 80px;
            object-fit: cover;
        }
    </style>
@endpush

@section('main')
    <div class="p-4" style="min-height: 800px;">
        @if (session('message'))
            <div class="alert alert-primary" role="alert">
                {{ session('message') }}
            </div>
        @endif
        <h4 class="text-primary mb-4">Danh sách sản phẩm</h4>
        <a href="{{ route('admin.products.addProducts') }}" class="btn btn-info">Thêm mới</a>
        <table class="table mt-3">
            <thead>
                <tr>
                    <th scope="col">STT</th>
                    <th scope="col">Tên sản phẩm</th>
                    <th scope="col">Giá sản phẩm</th>
                    <th scope="col">Ảnh</th>
                    <th scope="col">Hành động</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $key => $value)
                    <tr>
                        <td scope="row">{{ $key + 1 }}</td>
                        <td>{{ $value->name }}</td>
                        <td class="text-danger">{{ $value->price }}$</td>
                        <td>
                            <img class="img-product" src="{{ asset($value->img) }}">
                        </td>
                        <td>
                            <a href="{{ route('admin.products.detailProducts', $value->product_id) }}"
                                class="btn btn-success">Detail</a>
                            <a href="{{ route('admin.products.editProducts', $value->product_id) }}"
                                class="btn btn-warning">Edit</a>
                            <a class="btn btn-danger btn-delete" data-bs-toggle="modal" data-bs-target="#deleteModel"
                                data-bs-id="{{ $value->product_id }}">Delete</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $products->links('pagination::bootstrap-5') }}
    </div>

    <!-- Modal -->
    <div class="modal fade" id="deleteModel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header" for="deleteModelLabel">
                    <h5 class="modal-title" id="deleteModelLabel">Cảnh báo!!!</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="" method="post" id="formDetele">
                    @method('delete')
                    @csrf
                    <div class="modal-body">
                        Bạn có muốn xoá sản phẩm này không???
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                        <button type="submit" class="btn btn-primary">Xác nhận xoá</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('scp')
    <script>
        var deleteModal = document.getElementById('deleteModel')
        deleteModal.addEventListener('show.bs.modal', function(event) {
            var button = event.relatedTarget
            var id = button.getAttribute('data-bs-id')
            let formDetele = document.getElementById('formDetele')
            formDetele.setAttribute('action', '{{ route('admin.products.deleteProducts') }}?idProduct=' + id)
        })
    </script>
@endpush
