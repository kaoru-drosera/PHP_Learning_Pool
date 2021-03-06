<?php
ini_set("display_errors",1);
error_reporting(E_ALL & ~E_NOTICE);
 ?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>webページを作成するにあたっての知識(?)</title>
  <meta name="description" content="">
  <meta name="keywords" content="">
  <meta name="author" content="">
  <link rel="shortcut icon" href="/favicon.ico" type="image/vnd.microsoft.ico">
  <link rel="apple-touch-icon-precomposed" href="/favicon-152.png">
  <link rel="stylesheet" href="">
</head>
<body>
  <style>
  *{
    /* margin: 0; */
  }
  .table1 thead th{
    background-color: black;
    color: white;
  }
  .form1{
    background-color: darkgray;
  }
  .input[type="submit"]{
    border: none;
    font-size: 16px;
  }
  .pdg{
    padding-top: 50px;
  }
  .gaiyo{
    background-color: rgb(255, 227, 227);
  }
  .zissyou{
    background-color:rgb(219, 255, 0) ;
  }
  .imgwrap{
    max-width: 800px;
    width: 100%;
  }
  .imgwrap img{
    width: 100%;
  }

  /* @charset "UTF-8"; */
  div{
    margin :1em;
  }
  li{
    list-style-type: none;
    margin-bottom: 1em;
  }
  ol > li{
    list-style-type: decimal;
    margin-bottom : 0;
  }
  a{
    color: #5e78c1;
    text-decolation: none;
  }
  a:hover {
    color :#b04188;
    text-decoration: underline;
  }
  .error{
    color: #f00;
  }


  </style>
    <div class="main-contents">
      <h2>HTTPの基礎知識</h2>
      <p>※$_POSTを使う解説は長く複雑になるので、</p>
      <p>「hello1-8-2.7-1_util.php」からはまとめて記述はせずファイルで分けます。</p>
      <p class="pdg"></p><!--  .pdg -->
      <h3>入力された値が数値かどうか、0でないかどうか</h3>
      <p>次の例では入力された合計金額と人数から割り勘を計算する。</p>
      <p>割り算の計算では、入力値が数値でなければならず、また、人数が0人の時は割り算がエラーになる。</p>
      <p>そこでこのようなエラーが起きないように入力値をチェックする。</p>
      <p>フォームに入力された値に問題がなければ計算結果を表示するが、</p>
      <p>エラーがあったならばエラーの内容をリストに表示する。</p>
      <p>p276の画像欲しい。</p>
      <p class="pdg"></p><!--  .pdg -->

      <p class="pdg"></p><!--  .pdg -->
      <h3>合計金額と人数を入力するフォームを作る</h3>
      <p>「割り勘する」で実行するコードは長文につき後での紹介である。</p>
      <p class="pdg"></p><!--  .pdg -->
      <p>「割り勘する」ボタンで呼ばれるのはこの「hello1-8-2.7-4_warikan.php」である。</p>
      <p>goukeiテキストフィールドとninzuテキストフィードの値を$_POSTから取り出してチェックし、</p>
      <p>割り勘のような計算結果を表示する。</p>
      <p class="pdg"></p><!--  .pdg -->
      <p>もし入力値にエラーがあれば、計算を行わずにエラーメッセージを表示する。</p>
      <p>エラーのあるなしをエラーフラグで管理するのではなく、エラーメッセージを配列に登録していく方法を使っている。</p>
      <p>↓ ようやっとのコードの表示だ。</p>
      <a href="hello1-8-2.7-4_warikan_codeKaisetsu.php">コードを見る</a>












      <p class="pdg"></p><!--  .pdg -->
      <p class="pdg"></p><!--  .pdg -->
      <p class="pdg"></p><!--  .pdg -->
      <p class="pdg"></p><!--  .pdg -->
      <p class="pdg"></p><!--  .pdg -->

    </div><!--  .main-contents -->
</body>
</html>
