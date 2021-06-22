<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Luong</title>
</head>
<body>
    {{-- <form action="{{route('luong.search')}}" method="get">
        <input type="text" name="ten" placeholder="nhap ten">
        <input type="submit" value="Tim">
    </form> --}}
    <table border="1">
        <tr>
            <th>STT</th>
            <th>Ten</th>
            <th>Muc phu cap</th>
            <th>Chuc nang</th>
        </tr>
        @foreach ($luongs as $luong)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$luong->ten}}</td>
                <td>{{$luong->mucluong}}</td>
                <td>
                    <a href="{{route('luong.edit', $luong->id)}}">Sua</a>
                </td>
            </tr>
        @endforeach
    </table>
    <a href="{{route('luong.create')}}">Them luong</a>
</body>
</html>