<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>p78_入力フォーム</title>
</head>
<body>
  <p>入力フォーム</p>
  <p>…で、こざい</p>
  <form class="form1" action="receive.php" method="post">
    food name:<input type="text" name="recipeName" required><br>
    category:
    <select class="" name="category">
      <option value="">select</option>
      <option value="1">Japanese</option>
      <option value="2">Western</option>
      <option value="3">chinese cuisine</option>
    </select>
    <br>
    difficulty:
      <input type="radio" name="difficulty" value="1">easy
      <input type="radio" name="difficulty" value="2">normal
      <input type="radio" name="difficulty" value="3">difficlt
    <br>
    budget:
      <input type="number" min="1" max="9999" name="budget" value="">￥
    <br>
    How to cook:
      <textarea name="howto" rows="4" cols="40" maxlength="150"></textarea>
    <br>
      <input type="submit" value="submit">
    <br>
  </form>
</body>
</html>

<!-- 以上、体験版はここまで！
本編は：
/Applications/MAMP/htdocs
で！ -->
<!-- URL:http://localhost:8888/impressPHP/MY_flie/chap2/index2-1.php -->
