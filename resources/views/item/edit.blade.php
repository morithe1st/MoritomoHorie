@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>商品編集</h1>
@stop

@section('content')

<!-- エラーメッセージ -->
@if ($errors->any())
<div class="alert alert-danger">
  <ul>
    @foreach ($errors->all() as $error)
    <li>{{ $error }}</li>
    @endforeach
  </ul>
</div>
@endif

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">商品編集</h3>
            <div class="card-tools">
                <div class="input-group input-group-sm">
                    <div class="input-group-append">
                        <a href="{{ url('/items') }}" class="btn btn-secondary">商品一覧に戻る</a>
                    </div>
                </div>
            </div>
        </div>

    <form action="/items/update" method="post" enctype="multipart/form-data">
        @CSRF
        <input class="form-control" type="hidden" name="id" value="{{$item->id}}" >

        <div class="form-group">
            <label for="name">商品名</label>
            <input class="form-control" type="text" name="name" value="{{ old('name',$item->name) }}" >
        </div>

        <div class="form-group">
            <label for="type">商品種別</label>
            <select class="form-control" type="type" name="type" >
                <option value="" {{ old('type', $item->type) == '' ? 'selected' : '' }}>種別を選択してください</option>
                <option value="1" {{ old('type', $item->type) == 1 ? 'selected' : '' }}>テーブル</option>
                <option value="2" {{ old('type', $item->type) == 2 ? 'selected' : '' }}>デスク</option>
                <option value="3" {{ old('type', $item->type) == 3 ? 'selected' : '' }}>チェア・椅子</option>
                <option value="4" {{ old('type', $item->type) == 4 ? 'selected' : '' }}>ソファ</option>
                <option value="5" {{ old('type', $item->type) == 5 ? 'selected' : '' }}>収納家具</option>
                <option value="6" {{ old('type', $item->type) == 6 ? 'selected' : '' }}>ベッド</option>
                <option value="7" {{ old('type', $item->type) == 7 ? 'selected' : '' }}>照明器具</option>
                <option value="8" {{ old('type', $item->type) == 8 ? 'selected' : '' }}>カーテン</option>
                <option value="9" {{ old('type', $item->type) == 9 ? 'selected' : '' }}>ラグ・マットカーペット</option>
                <option value="10" {{ old('type', $item->type) == 10 ? 'selected' : '' }}>ファブリック・クッション</option>
                <option value="11" {{ old('type', $item->type) == 11 ? 'selected' : '' }}>インテリア雑貨</option>
                <option value="12" {{ old('type', $item->type) == 12 ? 'selected' : '' }}>その他</option>
            </select>
        </div>

        <div class="form-group">
            <label for="detail">商品詳細</label>
            <textarea name="detail" class="form-control">{{ old('detail' , $item->detail) }}</textarea>
        </div>

        <div class="form-group">
            <label for="image" >商品画像</label>
                <div class="imageWrap">
                    @if ($item->image)
                    <img src="data:image/jpeg;base64,{{ $item->image }}" alt="商品画像" style="margin-top: 10px;">
                    @else
                        <p>写真は登録されていません</p>
                    @endif
                </div>
                <!-- file形式　  accept="image/jpg"(jpgのみアップロード可能) -->
                <input type="file" class="form-control-file" name="image" accept="image/jpeg,image/jpg" style="margin-top: 10px;">
            </div>

            <!-- 更新ボタン -->
            <button type="submit" class="btn btn-primary"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-repeat" viewBox="0 0 16 16">
            <path d="M11.534 7h3.932a.25.25 0 0 1 .192.41l-1.966 2.36a.25.25 0 0 1-.384 0l-1.966-2.36a.25.25 0 0 1 .192-.41zm-11 2h3.932a.25.25 0 0 0 .192-.41L2.692 6.23a.25.25 0 0 0-.384 0L.342 8.59A.25.25 0 0 0 .534 9z"/>
            <path fill-rule="evenodd" d="M8 3c-1.552 0-2.94.707-3.857 1.818a.5.5 0 1 1-.771-.636A6.002 6.002 0 0 1 13.917 7H12.9A5.002 5.002 0 0 0 8 3zM3.1 9a5.002 5.002 0 0 0 8.757 2.182.5.5 0 1 1 .771.636A6.002 6.002 0 0 1 2.083 9H3.1z"/>
            </svg>更新</button>
            <!-- 削除ボタン -->
            <a href="/items/delete/{{$item->id}}"><button type="button" class="btn btn-danger btn-sm" onclick="return confirm('本当に削除しますか？')" ><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
            <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
            <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
            </svg>削除</button></a>
    </form>
@stop

@section('css')
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
