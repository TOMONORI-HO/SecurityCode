<?php
$id = $_POST['id'] ?? '';

$db = new PDO('sqlite:users.db');
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// プレースホルダを使った安全なクエリ
$stmt = $db->prepare("SELECT * FROM users WHERE id = :id");
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$stmt->execute();

$user = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>検索結果</title>
</head>
<body>
    <h2>検索結果</h2>
    <?php if ($user): ?>
        <p>ID：<?php echo htmlspecialchars($user['id'], ENT_QUOTES, 'UTF-8'); ?></p>
        <p>名前：<?php echo htmlspecialchars($user['name'], ENT_QUOTES, 'UTF-8'); ?></p>
        <p>メール：<?php echo htmlspecialchars($user['email'], ENT_QUOTES, 'UTF-8'); ?></p>
    <?php else: ?>
        <p>該当するユーザーが見つかりませんでした。</p>
    <?php endif; ?>
</body>
</html>
