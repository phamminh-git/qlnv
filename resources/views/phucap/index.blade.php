<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="{{route('phucap.search')}}" method="get">
        <input type="text" name="ten" placeholder="nhap ten">
        <input type="submit" value="Tim">
    </form>
    <table border="1">
        <tr>
            <th>STT</th>
            <th>Ten</th>
            <th>Muc phu cap</th>
            <th>Chuc nang</th>
        </tr>
        @foreach ($phucaps as $phucap)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$phucap->ten}}</td>
                <td>{{$phucap->mucphucap}}</td>
                <td>
                    <a href="{{route('phucap.edit', $phucap->id)}}">Sua</a>
                    <a href="{{route('phucap.delete', $phucap->id)}}">Xoa</a>
                </td>
            </tr>
        @endforeach
    </table>
    <a href="{{route('phucap.create')}}">Them phucap</a>
</body>
</html>