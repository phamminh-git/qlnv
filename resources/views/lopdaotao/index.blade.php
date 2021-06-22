<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Danh sach lop dao tao</title>
</head>
<body>
    <form action="{{route('lopdaotao.search')}}" method="get">
        <input type="text" name="ten" placeholder="nhap ten">
        <input type="submit" value="Tim">
    </form>
    <table border="1">
        <tr>
            <th>STT</th>
            <th>Ten</th>
            <th>Ngay bat dau</th>
            <th>Mo ta</th>
            <th>Chuc nang</th>
        </tr>
        @foreach ($lopdaotaos as $lopdaotao)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$lopdaotao->ten}}</td>
                <td>{{$lopdaotao->ngaybatdau}}</td>
                <td>{{$lopdaotao->mota}}</td>
                <td>
                    <a href="{{route('lopdaotao.edit', $lopdaotao->id)}}">Sua</a>
                    <a href="{{route('lopdaotao.themnhanvien', $lopdaotao->id)}}">Them nhan vien</a>
                </td>
            </tr>
        @endforeach
    </table>
    <a href="{{route('lopdaotao.create')}}">Them lopdaotao</a>
</body>
</html>