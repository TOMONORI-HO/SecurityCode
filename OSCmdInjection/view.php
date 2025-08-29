<?php
// ユーザー入力を取得
$filename = $_POST['filename'] ?? '';

// 入力バリデーション（英数字・アンダースコア・ドットのみ許可）
if (!preg_match('/^[a-zA-Z0-9_\-\.]+$/', $filename)) {
    die("不正なファイル名です。");
}

// ファイルの存在チェック（任意）
$filepath = __DIR__ . "/files/" . $filename;
if (!file_exists($filepath)) {
    die("ファイルが存在しません。");
}

// 引数を安全にエスケープ
$safe_filename = escapeshellarg($filepath);

// OSコマンドを安全に構築
$command = "cat " . $safe_filename;

// 実行（出力取得）
$output = shell_exec($command);

// 出力をHTMLに安全に表示（XSS対策）
echo "<h2>ファイルの内容：</h2>";
echo "<pre>" . htmlspecialchars($output, ENT_QUOTES, 'UTF-8') . "</pre>";
?>
