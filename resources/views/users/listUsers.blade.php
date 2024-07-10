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
    <title>Danh sách người dùng</title>
</head>
<body>
    <h3>Danh sách sinh viên</h3>

    <a class="btn btn-success" href="{{ route ('users.addUsers')}}">Add</a>

    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Age</th>
                <th>Phong ban</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php $counter = 1; ?>
            @foreach($listUsers as $value)

            <tr>
                <td>{{ $counter++ }}</td>
                <td>{{ $value->name }}</td>
                <td>{{ $value->email }}</td>
                <td>{{ $value->tuoi }}</td>
                <td>{{ $value->ten_donvi }}</td>
                <td>
                    <a class="btn btn-primary" href="{{ route('users.editUsers', $value->id)}}">Edit</a>
                    <a class="btn btn-danger" href="{{ route('users.deleteUsers', $value->id)}}"
                    onclick="return confirm('Are you sure you want to delete?')">Delete</a>
                </td>
            </tr>

            @endforeach
        </tbody>
    </table>
</body>
</html>