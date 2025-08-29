<?php
session_start();

// トークン検証
if (!isset($_POST['csrf_token'], $_SESSION['csrf_token'])) {
    die('CSRFトークンが見つかりません。');
}

if (!hash_equals($_SESSION['csrf_token'], $_POST['csrf_token'])) {
    die('CSRFトークンが一致しません。');
}

// トークンが一致した場合の処理
$message = htmlspecialchars($_POST['message']);
echo "メッセージを受け取りました: " . $message;

// トークンを使い捨てにする場合（推奨）
unset($_SESSION['csrf_token']);
