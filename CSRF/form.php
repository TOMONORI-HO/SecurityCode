<?php
session_start();

// トークン生成（初回のみ）
if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}
?>

<form action="submit.php" method="POST">
    <input type="text" name="message" placeholder="メッセージを入力">
    <input type="hidden" name="csrf_token" value="<?php echo htmlspecialchars($_SESSION['csrf_token']); ?>">
    <button type="submit">送信</button>
</form>
