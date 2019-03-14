<!DOCTYPE html>
<html lang="ja" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title> by ep47</title>
  </head>
  <body>
    <h1>レシピ一覧</h1>

    <?php
    $user = "uzuki";
    $pass = "YZJAoDkBp2y3gA7x";
    $recipe_name = $_POST['recipe_name'];
    $howto = $_POST['howto'];
    $category = (int) $_POST['category'];
    $difficulty = (int) $_POST['difficulty'];
    $budget = (int) $_POST['budget'];
    try {
      if (empty($_POST['id'])) throw new Exception('ID不正');
      $id = (int) $_POST['id'];
      $dbh = new PDO('mysql:host=localhost;dbname=db1_by_impressPHP;charset=utf8', $user, $pass);//"charset=utf8"を忘れずに
      $dbh->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
      $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $sql = "UPDATE recipes SET recipe_name = ?, category = ?, difficulty = ?, budget = ?, howto = ? WHERE id = ?";
      $stmt = $dbh->prepare($sql);
      $stmt->bindValue(1, $recipe_name, PDO::PARAM_STR);
      $stmt->bindValue(2, $category, PDO::PARAM_INT);
      $stmt->bindValue(3, $difficulty, PDO::PARAM_INT);
      $stmt->bindValue(4, $budget, PDO::PARAM_INT);
      $stmt->bindValue(5, $howto, PDO::PARAM_STR);
      $stmt->bindValue(6, $id, PDO::PARAM_INT);
      $stmt->execute();
      $dbh = null;
      echo "ID:" . htmlspecialchars($id,ENT_QUOTES,'UTF-8') . "レシピの更新が完了しました。";
    } catch (Exception $e) {
      echo "エラー発生: " . htmlspecialchars($e->getMessage(), ENT_QUOTES, 'UTF-8') . "<br>";
      die();
    }
    ?>

  </body>
</html>


<!-- http://localhost:8888/impressPHP/MY_flie/chap3/edit.php?id=2 (例) -->
<!-- 「http://localhost:8888/impressPHP/MY_flie/chap3/edit.php」の後ろに、
「?id=X」を入力しないとページは開けない。
XはデータベースにあるデータのIDの番号を入力すること。
例として、データベース内に9のレシピが登録されていたとする。
その場合、1~9までの数字をIDとして使えることになる。 -->
