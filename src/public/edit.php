<?php
require('dbc.php');

$id = isset($_GET['id']) ? $_GET['id'] : '';

if (!$id) {
  die('IDが指定されていません');
}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>データ更新</title>
</head>
<body>
  <form action="update.php" method="get">
    <input type="hidden" name="id" value="<?php echo $id; ?>">
    <label for="" name="title">タイトル</label>
    <input type="text" name="title"><br>
    <label for="" name="inmpressions">感想</label>
    <input type="text" name="impressions"><br>

    <button type="submit">更新</button>
  </form>
</body>
</html>