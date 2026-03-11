<!DOCTYPE html>
<html lang="en">
<head>
    <!-- develop branch -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>会員一覧</title>
    <!-- ここに必要に応じてCSSやJavaScriptのリンクを追加 -->
    <style>
        .button {
            display: inline-block;
            padding: 10px 20px;
            margin: 10px;
            background-color: #007bff;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <h1>会員一覧</h1>
    
    <!-- 新規作成ボタン -->
    <a href="{{ url('/users/create') }}" class="button">新規作成</a>

    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>名前</th>
                <th>メールアドレス</th>
                <th>操作</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>
                    <!-- 編集ボタン -->
                    <a href="{{ url('/users/' . $user->id . '/edit') }}" class="button">編集</a>
                    <!-- 削除ボタン -->
                    <form action="{{ url('/users/' . $user->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="button" onclick="return confirm('本当に削除しますか？')">削除</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <!-- ここにページネーションのリンクなどが必要であれば追加 -->

</body>
</html>
