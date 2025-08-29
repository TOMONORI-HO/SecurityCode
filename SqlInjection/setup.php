<?php
$db = new PDO('sqlite:users.db');

// テーブル作成
$db->exec("CREATE TABLE IF NOT EXISTS users (
    id INTEGER PRIMARY KEY,
    name TEXT NOT NULL,
    email TEXT NOT NULL
)");

// 初期データ挿入（重複防止のため一度削除）
$db->exec("DELETE FROM users");

$users = [
    ['name' => '山田太郎', 'email' => 'taro@example.com'],
    ['name' => '鈴木花子', 'email' => 'hanako@example.com'],
    ['name' => '佐藤健',   'email' => 'sato@example.com']
];

$stmt = $db->prepare("INSERT INTO users (name, email) VALUES (:name, :email)");
foreach ($users as $user) {
    $stmt->execute([
        ':name' => $user['name'],
        ':email' => $user['email']
    ]);
}

echo "データベースと初期データを作成しました。";
?>
