<?php
require('dbc.php');
$title = isset($_GET['title']) ? $_GET['title'] : '';
$impressions = isset($_GET['impressions']) ? $_GET['impressions'] : '';

// エラーメッセージの表示
$errors = [];
if (empty($title) || empty($impressions)) {
  $errors[] = 'タイトルまたは感想が入力されていません';
}

// データをDBに保存
if (empty($errors)) {
  $sql = "INSERT INTO books (title, impressions) VALUES (:title, :impressions)";
  $stmt = $pdo->prepare($sql);
  $stmt->bindValue(':title', $title, PDO::PARAM_STR);
  $stmt->bindValue(':impressions', $impressions, PDO::PARAM_STR);
  $stmt->execute();
  header('Location: index.php');
  exit();
}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>本を登録</title>
</head>
<body>
  <?php if (!empty($errors)): ?>
    <?php foreach($errors as $error): ?>
      <p><?php echo $error."\n"; ?></p>
    <?php endforeach; ?>
    <a href="index.php">トップページへ</a>
  <?php endif; ?>
</body>
</html>