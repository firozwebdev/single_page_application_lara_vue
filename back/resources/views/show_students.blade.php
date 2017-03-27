<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
        <h1>List of all Students</h1>
        <table>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Address</th>
            </tr>
            @foreach($students as $student)
                <tr>
                    <td>{{ $student->name }}</td>
                    <td>{{ $student->email }}</td>
                    <td>{{ $student->address }}</td>
                </tr>
            @endforeach

        </table>
</body>
</html>