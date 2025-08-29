<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>ファイル表示フォーム</title>
</head>
<body>
    <h2>ファイル名を入力してください</h2>
    <form action="view.php" method="POST">
        <label for="filename">ファイル名：</label>
        <input type="text" name="filename" id="filename">
        <button type="submit">表示</button>
    </form>
</body>
</html>
