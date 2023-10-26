@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>ようこそ　商品管理システムへ</h1>
@stop

@section('content')
    <p>こちらはインテリア商品管理システムです。</p>
    <p>サイドバーから行いたい作業を実施してください。</p>
@stop

@section('css')
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
