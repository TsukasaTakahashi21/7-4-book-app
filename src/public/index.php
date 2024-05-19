<?php
require('dbc.php');

$title = isset($_GET['title']) ? $_GET['title'] : '';
$impressions = isset($_GET['impressions']) ? $_GET['impressions'] : '';

$sql = "SELECT * FROM books";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$books = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>書籍アプリ</title>
</head>
<body>
  <!-- 書籍一覧の表示 -->
  <a href="create.php">書籍を追加</a>
  <table border="1" width="800" bgcolor= #EEEEEE>
    <tr>
      <th>タイトル</th>
      <th>感想</th>
      <th>作成日時</th>
      <th>編集</th>
      <th>削除</th>
    </tr>
    <?php foreach ($books as $book): ?>
      <tr>
      <td><?php echo htmlspecialchars($book['title'], ENT_QUOTES, 'UTF-8'); ?></td>
        <td><?php echo htmlspecialchars($book['impressions'], ENT_QUOTES, 'UTF-8'); ?></td>
        <td><?php echo htmlspecialchars($book['created_at'], ENT_QUOTES, 'UTF-8'); ?></td>
        <td><a href="edit.php?id=<?php echo htmlspecialchars($book['id'], ENT_QUOTES, 'UTF-8'); ?>">編集</a></td>
        <td><a href="delete.php?id=<?php echo htmlspecialchars($book['id'], ENT_QUOTES, 'UTF-8'); ?>">削除</a></td>
      </tr>
    <?php endforeach; ?>
  </table>
</body>
</html>