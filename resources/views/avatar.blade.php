<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="{{route('avatar')}}" method="post" enctype="multipart/form-data">
        @csrf
        <label for="myfile">Select a file:</label>
        <input type="file" id="myfile" name="myfile" required="true">
        <input type="submit" value="Them anh">
    </form>
</body>
</html>