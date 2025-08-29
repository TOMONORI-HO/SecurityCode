<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>安全なコマンド実行フォーム</title>
</head>
<body>
    <h2>コマンドを選択してください</h2>
    <form action="run.php" method="POST">
        <select name="command">
            <option value="ls">ls</option>
            <option value="whoami">whoami</option>
            <option value="date">date</option>
        </select>
        <button type="submit">実行</button>
    </form>
</body>
</html>
