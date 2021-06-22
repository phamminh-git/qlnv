<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Nhan vien</title>
</head>
<body>
    <table border="1">
        <tr>
            <th>STT</th>
            <th>Ten</th>
            <th>Gioi Tinh</th>
            <th>Dia Chi</th>
            <th>So dien thoai</th>
            <th>Email</th>
        </tr>
        @foreach ($nhanviens as $nhanvien)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$nhanvien->ten}}</td>
                <td>{{$nhanvien->gioiTinh}}</td>
                <td>{{$nhanvien->diaChi}}</td>
                <td>{{$nhanvien->sdt}}</td>
                <td>{{$nhanvien->email}}</td>
            </tr>
        @endforeach
    </table>
</body>
</html>