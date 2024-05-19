<?php
require('dbc.php');

$id = isset($_GET['id']) ? $_GET['id'] : '';

if (!$id) {
  die('IDが指定されていません');
}

$stmt = $pdo->prepare("DELETE FROM books WHERE id = :id");
$stmt->bindParam(':id', $id, PDO::PARAM_INT);
$result = $stmt->execute();

if ($result) {
  echo "書籍を削除しました";
} else {
  echo "書籍の削除に失敗しました";
}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>データ削除</title>
</head>
<body>
  <p><a href="index.php">書類一覧に戻る</a></p>
</body>
</html>