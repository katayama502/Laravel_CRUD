<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>会員登録</title>
    <!-- ここに必要に応じてCSSやJavaScriptのリンクを追加 -->
</head>
<body>
    <h1>会員登録</h1>

    <!-- フォームのアクションは、ユーザー情報を保存するルートに設定 -->
    <form action="{{ url('/users') }}" method="post">
        <!-- CSRFトークンを含める -->
        @csrf

        <label for="name">名前:</label><br>
        <input type="text" id="name" name="name" required><br>

        <label for="email">メールアドレス:</label><br>
        <input type="email" id="email" name="email" required><br>

        <label for="password">パスワード:</label><br>
        <input type="password" id="password" name="password" required><br>

        <input type="submit" value="登録">
    </form>
</body>
</html>
