@extends('layouts.app')
<script type="application/javascript">
    var nhanvien=JSON.parse('@json($nhanvien)');
</script>
@section('content')
<trangchuql-component></trangchuql-component>
@endsection
