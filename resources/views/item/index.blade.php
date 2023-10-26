@extends('adminlte::page')

@section('title', '商品一覧')

@section('content_header')
    <h1>商品一覧</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">商品一覧</h3>
                    <div class="card-tools">
                        <div class="input-group input-group-sm">
                            <div class="input-group-append">
                                <a href="{{ url('items/add') }}" class="btn btn-default">商品登録</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>商品名</th>
                                <th>種別</th>
                                <th>更新日時</th>
                                <th>商品編集</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($items as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>
                                    @switch($item->type)
                                    @case(1)
                                    テーブル
                                    @break
                                    @case(2)
                                    デスク
                                    @break
                                    @case(3)
                                    チェア・椅子
                                    @break
                                    @case(4)
                                    ソファ
                                    @break
                                    @case(5)
                                    収納家具
                                    @break
                                    @case(6)
                                    ベッド
                                    @break
                                    @case(7)
                                    照明器具
                                    @break
                                    @case(8)
                                    カーテン
                                    @break
                                    @case(9)
                                    ラグ・マット・カーペット
                                    @break
                                    @case(10)
                                    ファブリック・クッション
                                    @break
                                    @case(11)
                                    インテリア雑貨
                                    @break
                                    @case(12)
                                    その他
                                    @break
                                    @endswitch
                                    </td>
                                    <td>{{ $item->updated_at->format('Y年m月d日') }}</td>
                                    <td><button type="button" class="btn btn-primary" onclick="location.href='/items/edit/{{$item->id}}'"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
                                        <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z"/>
                                        </svg> 編集 </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@stop

@section('css')
@stop

@section('js')
@stop
