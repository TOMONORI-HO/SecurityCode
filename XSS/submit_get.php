<?php
$nickname = $_GET['nickname'] ?? '';

// XSS対策：HTMLに出力する前にエスケープ
$safe_nickname = htmlspecialchars($nickname, ENT_QUOTES, 'UTF-8');
?>

<!DOCTYPE html>
<html>
<head><meta charset="UTF-8"><title>結果</title></head>
<body>
    <p>こんにちは、<?php echo $safe_nickname; ?>さん！</p>
</body>
</html>
