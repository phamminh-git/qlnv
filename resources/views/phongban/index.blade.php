<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PhongBan</title>
</head>
<body>
    <form action="{{route('phong.search')}}" method="get">
        <input type="text" name="ten" placeholder="nhap ten">
        <input type="submit" value="Tim">
    </form>
    <table border="1">
        <tr>
            <th>STT</th>
            <th>Ten</th>
            <th>Chuc nang</th>
        </tr>
        @foreach ($phongs as $phong)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$phong->ten}}</td>
                <td>
                    <a href="{{route('phong.edit', $phong->id)}}">Sua</a>
                    <a href="{{route('phong.delete', $phong->id)}}">Xoa</a>
                </td>
            </tr>
        @endforeach
    </table>
    <a href="{{route('phong.create')}}">Them phong</a>
</body>
</html>