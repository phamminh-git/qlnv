<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Them Phong Ban</title>
</head>
<body>
    <form action="{{route('phong.store')}}" method="post">
        @csrf
        <table>
            <tr>
                <td></td>
                <td><input type="hidden" name="id" @if (isset($phong))
                    value="{{$phong->id}}"
                @endif></td>
            </tr>
            <tr>
                <td><label for="ten">Nhập tên</label></td>
                <td><input type="text" name="ten" @if (isset($phong))
                    value="{{$phong->ten}}"
                    @endif></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" value="them"></td>
            </tr>
        </table>
    </form>
</body>
</html>