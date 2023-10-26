@extends('adminlte::page')

@section('title', 'UserList')

@section('content_header')
    <h1>ユーザー一覧</h1>
@stop

@section('content')
<div>
    <div>
        <h4 class="center-block bg-warning  text-white bg-dark" style="auto">総件数{{ $users -> total() }}件</h4>
    </div>
        <!-- ↓↓ログイン中のユーザーの名前を取得して表示する↓  -->
        @auth
        <p class="bg-light text-dark">現在ログイン中のユーザー:<strong>{{ Auth::user()->name }}({{ Auth::user()->email }})</strong>さん</p>
        @endauth

        @if(session('message'))
                <div class="alert alert-success">{{session('message')}}</div>
            @endif
            
        <div>
        <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">ユーザー一覧</h3>
                </div>
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap">
                        <thead>
                            <tr>
                                <th>ユーザーID</th>
                                <th>名前</th>
                                <th>メールアドレス</th>
                                <th>権限</th>
                                <th>更新日</th>
                                <th>ユーザー編集</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $user)
                    <tr>
                        <td>{{$user->id}}</td>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>@if($user->role === 1)
                                利用者
                            @else 
                                管理者
                            @endif
                        </td>
                        <td>{{ $user->updated_at->format('Y年m月d日') }}</td>
                        <td><button type="button" class="btn btn-primary" onclick="location.href='/user/edit/{{$user->id}}'"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
  <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z"/>
</svg> 編集 </button></td>
                    </tr>
                @endforeach
                        </tbody>
                    </table>
                    {!! $users->render() !!}
                </div>
            </div>
        </div>
    </div>

@stop

@section('css')
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
