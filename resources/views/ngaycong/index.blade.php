<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ngaycong</title>
</head>
<body>
    <form action="{{route('ngaycong.save')}}" method="post">
        <input type="text" name="ten">
        <input type="submit" value="submit">
    </form>
</body>
</html>