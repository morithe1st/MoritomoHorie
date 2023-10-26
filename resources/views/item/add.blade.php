@extends('adminlte::page')

@section('title', '商品登録')

@section('content_header')
    <h1>商品登録</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-md-10">
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
                    <h3 class="card-title">新規登録</h3>
                    <div class="card-tools">
                        <div class="input-group input-group-sm">
                            <div class="input-group-append">
                                <a href="{{ url('/items') }}" class="btn btn-secondary">商品一覧に戻る</a>
                            </div>
                        </div>
                    </div>
                </div>


                <form action="/items/store" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">商品名</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="名前" value="{{ old('name') }}">
                        </div>

                        <div class="form-group">
                            <label for="type">種別</label>
                                <select name="type" class="form-control" value="{{ old('type') }}">
                                    <option value="" disabled selected>種別を選択してください</option>
                                    <option value="1" @if(old('type') == 1) selected @endif>テーブル</option>
                                    <option value="2" @if(old('type') == 2) selected @endif>デスク</option>
                                    <option value="3" @if(old('type') == 3) selected @endif>チェア・椅子</option>
                                    <option value="4" @if(old('type') == 4) selected @endif>ソファ</option>
                                    <option value="5" @if(old('type') == 5) selected @endif>収納家具</option>
                                    <option value="6" @if(old('type') == 6) selected @endif>ベッド</option>
                                    <option value="7" @if(old('type') == 7) selected @endif>照明器具</option>
                                    <option value="8" @if(old('type') == 8) selected @endif>カーテン</option>
                                    <option value="9" @if(old('type') == 9) selected @endif>ラグ・マット・カーペット</option>
                                    <option value="10" @if(old('type') == 10) selected @endif>ファブリック・クッション</option>
                                    <option value="11" @if(old('type') == 11) selected @endif>インテリア雑貨</option>
                                    <option value="12" @if(old('type') == 12) selected @endif>その他</option>
                                </select>
                            </div>

                        <div class="form-group">
                            <label for="detail">商品詳細</label>
                            <textarea name="detail" class="form-control" placeholder="商品詳細">{{ old('detail') }}</textarea>
                        </div>

                        <div  class="form-group">
                                <label for="image">画像アップロード（jpg／jpeg）</label>
                                <!-- file形式　   -->
                                <input type="file" name="image" accept="image/jpeg,image/jpg"> 
                        </div>
                    </div>

                    <div class="card-footer">

                        <button type="submit" class="btn btn-primary"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle" viewBox="0 0 16 16">
  <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
  <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
</svg> 新規商品登録</button>

                    </div>
                </form>
            </div>
        </div>
    </div>
@stop

@section('css')
@stop

@section('js')
@stop
