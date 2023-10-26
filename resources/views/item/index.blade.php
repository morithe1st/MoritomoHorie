@extends('adminlte::page')

@section('title', '商品一覧')

@section('content_header')
    <h1>商品一覧・検索</h1>
@stop

@section('content')

<div>
    <h4 class="center-block bg-warning  text-white bg-dark" style="auto">商品総件数{{ $items -> total() }}件</h4>
</div>
    <div class="row">
        
        @if(session('message'))
            <div class="alert alert-success"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-info-circle" viewBox="0 0 16 16">
            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
            <path d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/>
            </svg> {{session('message')}}</div>
        @endif

        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">商品検索</h3>
                        <form method="GET" action="/items/search">
                        @csrf
                        <div class="form-group">
                            <input name="keyword" type="text" placeholder="キーワードを入力してください" class="form-control mb-1">

                            <select class="form-control" id="category-id" name="category_id">
                                <option value="0">種別を選択してください</option>
                                <option value="1">テーブル</option>
                                <option value="2">デスク</option>
                                <option value="3">チェア・椅子</option>
                                <option value="4">ソファ</option>
                                <option value="5">収納家具</option>
                                <option value="6">ベッド</option>
                                <option value="7">照明器具</option>
                                <option value="8">カーテン</option>
                                <option value="9">ラグ・マット・カーペット</option>
                                <option value="10">ファブリック・クッション</option>
                                <option value="11">インテリア雑貨</option>
                                <option value="12">その他</option>
                            </select>
                        <div class="text-center mt-3">
                            <!-- 検索ボタン -->
                            <button type="submit" class="btn btn-primary"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                            <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                            </svg> 検索</button>
                            <div class="input-group-append">
                                <a href="{{ url('/items') }}" class="btn btn-secondary">検索フィルタ解除</a>
                            </div>
                        </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">商品一覧</h3>
                    <div class="card-tools">
                        <div class="input-group input-group-sm">
                            <div class="input-group-append">
                                        <button type="button" class="btn btn-success" onclick="location.href='/items/add'"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle" viewBox="0 0 16 16">
  <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
  <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
</svg> 商品登録 </button>
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
                                <th>商品詳細</th>
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
                                    <td>{{ Str::limit($item->detail , 50) }}</td>
                                    <td>{{ $item->updated_at->format('Y年m月d日') }}</td>
                                    <td>
                                        <button type="button" class="btn btn-primary" onclick="location.href='/items/edit/{{$item->id}}'"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
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
