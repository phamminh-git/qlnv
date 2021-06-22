<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <title>Danh sach ngay cong</title>
</head>
<body>
    <form action="{{route('ngaycong.xem')}}" method="post">
        @csrf
        <input type="hidden" name="idnhanvien" value="{{$idnhanvien}}" id="idnhanvien">
        <select name="thang" id="thang">
            <option value="1">Thang 1</option>
            <option value="2">Thang 2</option>
            <option value="3">Thang 3</option>
            <option value="4">Thang 4</option>
            <option value="5">Thang 5</option>
            <option value="6">Thang 6</option>
            <option value="7">Thang 7</option>
            <option value="8">Thang 8</option>
            <option value="9">Thang 9</option>
            <option value="10">Thang 10</option>
            <option value="11">Thang 11</option>
            <option value="12">Thang 12</option>
        </select>
        <select name="nam" id="nam">
            @for ($i = $oldyear; $i <=$newyear ; $i++)
            <option value="{{$i}}">Nam {{$i}}</option>
            @endfor
        </select>
        <input type="submit" value="Xem" id="submit">
    <table border="1" id="table">
        <tr>
            <th>STT</th>
            <th>Ngay</th>
        </tr>
    </table>
</body>
<script>
    // import axios from 'axios';
    var submit=document.getElementById("submit");
    submit.onclick=function(event){
        event.preventDefault();
        var thang=document.getElementById("thang");
        var nam=document.getElementById("nam");
        var idnhanvien=document.getElementById('idnhanvien');
        axios.post('http://127.0.0.1:8000/ngaycong/getngaycong',{
            idnhanvien: idnhanvien.value,
            thang: thang.value,
            nam: nam.value,
        })
        .then(function (response){
            var data=response.data;
            console.log(data);
            var td=document.querySelectorAll('#table tr td');
            // console.log(tr);
            td.remove();
            // var table=document.getElementById('table');
            // table.deleteRow();
            data.forEach(function(element, i){
                let table=document.getElementById('table');
                let row=table.insertRow();
                let cell1 = row.insertCell(0);
                let cell2 = row.insertCell(1);
                cell1.innerHTML = i+1;
                cell2.innerHTML = element.ngay;
            });
            
        });
    }
</script>
</html>