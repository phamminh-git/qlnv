<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Nhan vien</title>
</head>
<body>
    @if (!isset($diemdanh))
    <form action="{{route('nhanvien.search')}}" method="get">
        <input type="text" name="ten" placeholder="nhap ten">
        <input type="submit" value="Tim">
    </form>
    @endif
    @if (isset($diemdanh))
            <form action="{{route('ngaycong.save')}}" method="post">
                @csrf
    @endif
    <table border="1">
        <tr>
            <th>STT</th>
            <th>Ten</th>
            <th>Gioi Tinh</th>
            <th>Dia Chi</th>
            <th>So dien thoai</th>
            <th>Email</th>
            <th>Chuc nang</th>
        </tr>
        
        @foreach ($nhanviens as $nhanvien)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$nhanvien->ten}}</td>
                <td>{{$nhanvien->gioiTinh}}</td>
                <td>{{$nhanvien->diaChi}}</td>
                <td>{{$nhanvien->sdt}}</td>
                <td>{{$nhanvien->email}}</td>
                <td>
                    @if (!isset($diemdanh))
                    <a href="{{route('nhanvien.edit', $nhanvien->id)}}">Sua</a>
                    @else
                    <input type="checkbox" name="idnhanvien[]" value="{{$nhanvien->id}}">
                    @endif
                    
                </td>
            </tr>
        @endforeach
        
    </table>
    @if (isset($diemdanh))
    <input type="submit" value="Diem danh"></form>
    @endif
    @if (!isset($diemdanh))
    <a href="{{route('nhanvien.create')}}">Them nhanvien</a>
    @endif
</body>
</html>