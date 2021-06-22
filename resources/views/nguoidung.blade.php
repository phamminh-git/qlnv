@extends('layouts.app')
<script type="application/javascript">
    var nhanvien=JSON.parse('@json($nhanvien)');
</script>

@section('content')
<trangchunv-component></trangchunv-component>
@endsection
