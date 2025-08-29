<?php
// ホワイトリストで許可されたコマンドのみ実行
$allowed_commands = ['ls', 'whoami', 'date'];
$input = $_POST['command'] ?? '';

if (!in_array($input, $allowed_commands, true)) {
    die("許可されていないコマンドです。");
}

// コマンドを安全に構築
$command = escapeshellcmd($input);

// system() の実行例（出力は直接表示される）
echo "<h2>system() の結果：</h2><pre>";
system($command);
echo "</pre>";

// shell_exec() の実行例（出力を文字列として取得）
echo "<h2>shell_exec() の結果：</h2><pre>";
$output = shell_exec($command);
echo htmlspecialchars($output, ENT_QUOTES, 'UTF-8');
echo "</pre>";
?>
