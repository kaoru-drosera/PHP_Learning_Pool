<?php
ini_set('display_errors', 1);
error_reporting(E_ALL & ~E_NOTICE);
session_start();
require('dbconnect.php');
if(isset($_SESSION['id']) && $_SESSION['time'] + 3600 > time()){
  // ログインしている
  $_SESSION['time'] = time();
  $members = $db->prepare('SELECT * FROM members WHERE id=?');
  $members->execute(array($_SESSION['id']));
  $member = $members->fetch();
} else {
    // ログインしていない
    header('Location: login.php');
    exit();
  }

  // 投稿を記録する
  if (!empty($_POST)) {
  	if ($_POST['message'] != '') {

  		$message = $db->prepare('INSERT INTO posts SET member_id=?, message=?, reply_post_id=?,created=NOW()');
  		$message->execute(array(
  			$member['id'],
  			$_POST['message'],
        (int)$_POST['reply_post_id']
        // ↑$_POSTの前に「(int)」を加えたらできた!?

        // ちなみに、エラーコードは以下の通り。
        // 全文
        // Uncaught PDOException: SQLSTATE[HY000]: General error: 1366 Incorrect integer value: '' for column 'reply_post_id' at row 1 in /Applications/MAMP/htdocs/PHP_Learning_Pool/MnavPHP/chap6/post/index.php:26 Stack trace: #0 /Applications/MAMP/htdocs/PHP_Learning_Pool/MnavPHP/chap6/post/index.php(26): PDOStatement->execute(Array) #1 {main} thrown in /Applications/MAMP/htdocs/PHP_Learning_Pool/MnavPHP/chap6/post/index.php on line 26
        // 要約
        // Uncaught PDOException: SQLSTATE[HY000]: General error: 1366 Incorrect integer value:
        // 以上。「値が入っていないことでこのエラーが出た時、
        // データ型が『数値』の場合」にはこれを使うといいかも
  		));
  		header('Location: index.php'); exit();
  	}
  }
  // 投稿を取得する
  $posts = $db->query('SELECT m.name, m.picture, p.* FROM members m, posts p WHERE m.id=p.member_id ORDER BY p.created DESC');

  // 返信の場合
  if(isset($_REQUEST['res'])){
    $response = $db->prepare('SELECT m.name, m.picture, p.* FROM members m, posts p WHERE m.id=p.member_id and p.id=? ORDER BY p.created DESC');
    $response->execute(array($_REQUEST['res']));
    $table = $response->fetch();
    $message = '@'.$table['name'].'  '.$table['message'];
  }
  // htmlspecialcharsのショートカット
  function h($value){
    return htmlspecialchars($value,ENT_QUOTES);
  }
  // 正規表現を使って、本文中のURLにリンクを設定させる
  function makeLink($value){
    return mb_ereg_replace("(https?)(://[[:alnum:]\+\$\;\?\.%,!#~*/:@&=_-]+)",'<a href="\1\2" target="_blank">\1\2</a>',$value);
    // ↑これまんま漫画に出てくる「わけのわからないセリフ」の表現に見えたぞ
    // ＝全然わからん
  }

 ?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>やっと始まり第6章.php</title>
  <meta name="description" content="">
  <meta name="keywords" content="">
  <meta name="author" content="">
  <link rel="shortcut icon" href="/favicon.ico" type="image/vnd.microsoft.ico">
  <link rel="apple-touch-icon-precomposed" href="/favicon-152.png">
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <style type="text/css">
    a{
      text-decoration: none;
    }
  </style>
  <div id="wrap">
    <div id="head">
      <h1>ひとこと掲示板</h1>
    </div><!-- #head  -->
    <div id="content">
      <form action="index.php" method="post">
        <dl>
          <dt><?php echo h($member['name']); ?>さん、メッセージをどうぞ</dt>
          <dd>
      		<textarea name="message" cols="50" rows="5"><?php echo h($message); ?></textarea>
          <input type="hidden" name="reply_post_id" value="<?php echo h($_REQUEST['res']); ?>">
      		</dd>
        </dl>
        <div>
          <input type="submit" value="投稿する" />
        </div>
      </form>

    <?php foreach($posts as $post): ?>
      <div class="msg">
        <img src="member_picture/<?php echo h($post['picture']); ?>" alt="<?php echo h($post['name']); ?>" witdh="48" height="48">
        <p><a href="view.php?id=<?php echo h($post['id']) ?>"><?php echo makeLink(h($post['message'])); ?></a><span class="name">  (<?php echo h($post['name']); ?>)</span>  [<a href="index.php?res=<?php echo h($post['id']); ?>">返信</a>]</p>
        <p class="day"><?php echo h($post['created']); ?>
          <?php if($post['reply_post_id'] > 0): ?>
            <a href="view.php?id=<?php echo h($post['reply_post_id']); ?>">返信元のメッセージ</a>
          <?php endif; ?>
          <?php if($_SESSION['id'] == $post['member_id']): ?>
            [<a href="delete.php?id=<?php echo h($post['id']); ?>" style="color: #f33;">削除</a>]
          <?php endif; ?>
        </p>
      </div><!--  .msg -->
    <?php endforeach; ?>
    </div><!-- #content  -->
  </div><!-- #wrap  -->
</body>
</html>
