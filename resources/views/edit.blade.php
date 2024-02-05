<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>会員情報編集</title>
    <!-- ここに必要に応じてCSSやJavaScriptのリンクを追加 -->
</head>
<body>
    <h1>会員情報編集</h1>

    <!-- フォームのアクションは、更新処理を行うルートに設定。PUTメソッドを使用 -->
    <form action="{{ url('/users/' . $user->id) }}" method="post">
        <!-- CSRFトークンを含める -->
        @csrf
        <!-- PUTメソッドを指定するためのディレクティブ -->
        @method('PUT')

        <label for="name">名前:</label><br>
        <input type="text" id="name" name="name" value="{{ $user->name }}" required><br>

        <label for="email">メールアドレス:</label><br>
        <input type="email" id="email" name="email" value="{{ $user->email }}" required><br>

        <!-- パスワードは通常、編集フォームに含めないか、別の処理を行う -->
        <!-- <label for="password">パスワード:</label><br>
        <input type="password" id="password" name="password"><br> -->

        <input type="submit" value="更新">
    </form>
</body>
</html>
