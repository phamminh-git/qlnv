<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Lop Dao Tao</title>
</head>
<body>
    <form action="{{route('lopdaotao.store')}}" method="post">
        @csrf
        <table>
            <tr>
                <td></td>
                <td><input type="hidden" name="id" @if (isset($lopdaotao))
                    value="{{$lopdaotao->id}}"
                @endif></td>
            </tr>
            <tr>
                <td><label for="ten">Nhập tên</label></td>
                <td><input type="text" name="ten" @if (isset($lopdaotao))
                    value="{{$lopdaotao->ten}}"
                    @endif></td>
            </tr>
            <tr>
                <td><label for="ngaybatdau">Nhập ngày bắt đầu</label></td>
                <td><input type="date" name="ngaybatdau" @if (isset($lopdaotao))
                    value="{{$lopdaotao->ngaybatdau}}"
                    @endif></td>
            </tr>
            <tr>
                <td><label for="mota">Nhập mo ta</label></td>
                <td><input type="text" name="mota" @if (isset($lopdaotao))
                    value="{{$lopdaotao->mota}}"
                    @endif></td>
            </tr>
        </table>
        <table border="1">
            <tr>
                <th>STT</th>
                <th>Ten</th>
                <th>Gioi Tinh</th>
                <th>Dia Chi</th>
                <th>So dien thoai</th>
                <th>Email</th>
                <th>#</th>
                
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
                        <input type="checkbox" name="idnhanvien[]" value="{{$nhanvien->id}}">
                    </td>
                </tr>
            @endforeach
        </table>

        <input type="submit" value="them">
    </form>
</body>
</html>