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
    <title>EDIT</title>
</head>
<body>
    <h3>Sửa thông tin</h3>

    <a class="btn btn-warning" href="{{ route ('users.listUsers')}}">Back</a>

    <form action="{{ route('users.updateUsers', $users->id)}}" method="post">
        @csrf

        <div class="mb-3">
            <label class="col-sm-1 col-form-label">Name</label>
            <input class="col-sm-2" type="text" value="{{ $users->name }}" name="nameUsers">
        </div>

        <div class="mb-3">
            <label class="col-sm-1 col-form-label">Email</label>
            <input class="col-sm-2" type="email" value="{{ $users->email }}" name="emailUsers">
        </div>

        <div class="mb-3">
            <label class="col-sm-1 col-form-label">Age</label>
            <input class="col-sm-2" type="text" value="{{ $users->tuoi }}" name="tuoiUsers">
        </div>

        <div class="mb-3">
            <label class="col-sm-1 col-form-label">Phong ban</label>
            <select class="col-sm-2" value="{{ $users->phongban_id }}" name="phongbanUsers">
                @foreach ($phongban as $value)
                <option value="{{ $value->id }}">{{ $value->ten_donvi }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-success">Submit</button>
    </form>

</body>
</html>