<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
      crossorigin="anonymous"
    />
    <title>ADD</title>
</head>
<body>
<div class="container">

        <h3>Thêm mới</h3>

    <a class="btn btn-warning" href="{{ route ('product.listProduct')}}">Back</a>

    <form action="{{ route ('product.updateProduct', $product->id)}}" method="post">
        @csrf

        <div class="form-group mb-3">
            <label class="col-sm-1 col-form-label">Name</label>
            <input class="col-sm-2" type="text" value="{{ $product->name }}" name="nameProduct">
        </div>

        <div class="mb-3">
            <label class="col-sm-1 col-form-label">Phong ban</label>
            <select class="col-sm-2" value="{{ $product->category_id }}" name="categoryProduct">
                @foreach ($category as $value)
                <option value="{{ $value->id }}">{{ $value->category_name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label class="col-sm-1 col-form-label">Price</label>
            <input class="col-sm-2" type="text" value="{{ $product->price }}" name="priceProduct">
        </div>

        <div class="mb-3">
            <label class="col-sm-1 col-form-label">View</label>
            <input class="col-sm-2" type="text" value="{{ $product->view }}" name="viewProduct">
        </div>
        
        <button type="submit" class="btn btn-success">Submit</button>
    </form>
</div>
</body>
</html>