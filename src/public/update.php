<?php
require('dbc.php');
$id = $_GET['id'];
$title = $_GET['title'];
$impressions = $_GET['impressions'];

$errors = [];
if (empty($title) || empty($impressions)) {
    $errors[] =
        'タイトルまたは感想が入力されていません';
}


$stmt = $pdo->prepare("UPDATE books SET title = :title, impressions = :impressions WHERE id = :id");


$stmt->bindParam( ':id', $id, PDO::PARAM_INT);
$stmt->bindParam( ':title', $title, PDO::PARAM_STR);
$stmt->bindParam( ':impressions', $impressions, PDO::PARAM_STR);

$result = $stmt->execute();

if ($result) {
  echo "書籍の更新が完了しました。";
} else {
  echo "書籍の更新に失敗しました。";
}

?>

<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>書類編集</title>
</head>
 
<body>
  <div>
   <?php if (!empty($errors)): ?>
      <?php foreach ($errors as $error): ?>
        <p><?php echo $error . "\n"; ?></p> 
      <?php endforeach; ?>
      <a href="index.php">トップページへ</a> 
   <?php endif; ?>

   <?php if (empty($errors)): ?>
      <p><a href="index.php">トップページへ</a></p>
   <?php endif; ?>
  </div>
</body> 
</html>