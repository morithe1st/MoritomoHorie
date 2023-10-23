<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>ユーザー一覧</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

</head>
<body>
    <!--  -->
    <div class="container">
    <div>
        <h1 class="center-block bg-success text-white text-center" style="auto">ユーザー一覧 <small>USER LIST</small></h1>
    </div>
    <div>
        <h4 class="center-block bg-warning  text-white bg-dark" style="auto">総件数{{ $users -> total() }}件</h4>
    </div>
        <!-- ↓↓ログイン中のユーザーの名前を取得して表示する↓  -->
        @auth
        <p class="bg-light text-dark">現在ログイン中のユーザー:<strong>{{ Auth::user()->name }}({{ Auth::user()->email }})</strong>さん</p>
        @endauth

        <div>
        <table class="table table-striped">
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


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

</body>
</html>