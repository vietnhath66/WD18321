<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }} ">
    @stack('stl')
    <title>Document</title>
</head>

@push('stl')
@endpush

<div class="row mt-5 main-web">
    @if (session('message'))
        <div class="text-danger">{{ session('message') }}</div>
    @endif
    <div class="col-md-4 offset-md-4">
        <h5 class="text-center">Nhập thông tin đăng nhập</h5>
        <form action="{{ route('postLogin') }}" method="post">
            <div class="mb-3">
                <label for="" class="form-label">Email</label>
                <input type="email" name="email" class="form-control" id="" />
            </div>
            <div class="mb-3">
                <label class="form-label">Password</label>
                <input type="password" name="password" class="form-control" />
            </div>
            <div class="mb-3">
                <span>Chưa có tài khoản? </span>
                <a href="">Đăng ký!</a>
            </div>
            <button type="submit" class="btn btn-primary">Login</button>
        </form>
    </div>
</div>

@push('scp')
@endpush

<body>

</body>
<script src="{{ asset('assets/js/bootstrap.bundle.min.js') }} "></script>
@stack('scp')

</html>
