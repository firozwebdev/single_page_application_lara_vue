<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
<form action="excel-import" method="post" enctype="multipart/form-data">
    <label for="">Upload Excel File</label>
    <input type="file" name="file">
    <input type="submit" value="submit">
    {{ csrf_field() }}
</form>
</body>
</html>