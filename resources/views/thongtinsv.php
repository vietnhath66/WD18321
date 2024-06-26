<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>THÔNG TIN SINH VIÊN</title>
</head>

<body>
    <h1>THÔNG TIN SINH VIÊN</h1>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>NAME</th>
                <th>interest</th>
                <th>study major</th>
                <th>age</th>
                <th>address</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $value): ?>
                <tr>
                    <td><?= $value['id'] ?></td>
                    <td><?= $value['name'] ?></td>
                    <td><?= $value['interest'] ?></td>
                    <td><?= $value['study major'] ?></td>
                    <td><?= $value['age'] ?></td>
                    <td><?= $value['address'] ?></td>
                </tr>
            <?php endforeach; ?>

        </tbody>
    </table>
</body>

</html>