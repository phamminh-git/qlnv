@extends('layouts.app')
<script type="application/javascript">
    var nhanvien=JSON.parse('@json($nhanvien)');
</script>
@section('content')
<trangchukt-component></trangchukt-component>
@endsection
