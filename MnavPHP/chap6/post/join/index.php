<?php

  require('../../dbconnect.php');

  ini_set('display_errors', 1);
  error_reporting(E_ALL);

  session_start();
  if(!empty($_POST)){
    // エラー項目の確認
    if($_POST['name'] == ''){
      $error['name'] = 'blank';
      // ↑「error」という配列を作る必要がある。
    }
    if($_POST['email'] == ''){
      $error['email'] = 'blank';
    }
    if($_POST['password'] < 4){
      $error['password'] = 'length';
    }
    if($_POST['password'] == ''){
      $error['password'] = 'blank';
    }

    if(empty($error)){
      // 画像をアップロードする
      $image = date('YmdHis').$_FILES['image']['name'];
      move_uploaded_file($_FILES['image']['name'],'../member_picture'.$image);
      $_SESSION['join'] = $_POST;
      $_SESSION['join']['image'] = $image;
      header('Location: check.php');
      exit();
    }

    $fileName = $_FILES['image']['name'];
    if(!empty($fileName)){
      $ext = substr($fileName,-3);
      if($ext != 'jpg' && $ext != 'gif'){
        $error['image'] = 'type';
      }
    }

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
  <link rel="stylesheet" href="../../style.css">
  <link rel="stylesheet" href="../../bootstrap.min.css">
</head>
<body>
  <div id="wrap">
    <div id="head">
      <h2>登録フォーム</h2>
    </div>
    <div id="content">
      <p>次にフォームに必要事項をご入力ください。</p>
      <form action="" methods="post" enctype="multipart/form-data">
        <dl>
          <dt>ニックネーム<span class="required">必須</span></dt>
          <dd>
            <input type="text" class="" name="name" size="35" maxlength="225" value="<?php echo htmlspecialchars($_POST['name'],ENT_QUOTES); ?>">
            <?php if($error['name'] == 'blank'): ?>
              <p class="error">* ニックネームを入力してください</p>
            <?php endif; ?>
          </dd>

          <dt>メールアドレス<span class="required">必須</span></dt>
          <dd>
            <input type="text" class="" name="email" size="35" maxlength="225" value="<?php echo htmlspecialchars($_POST['email'],ENT_QUOTES); ?>">
            <?php if($error['email'] == 'blank'): ?>
              <p class="error">* メールアドレスを入力してください</p>
            <?php endif; ?>
          </dd>

          <dt>パスワード<span class="required">必須</span></dt>
          <dd>
            <input type="password" class="" name="password" size="10" maxlength="20" value="<?php echo htmlspecialchars($_POST['password'],ENT_QUOTES); ?>">
            <?php if($error['password'] == 'blank'): ?>
              <p class="error">* パスワードを入力してください</p>
            <?php endif; ?>
            <?php if($error['password'] == 'length'): ?>
              <p class="error">* パスワードは4文字以上で入力してください</p>
            <?php endif; ?>
          </dd>

          <dt>写真など</dt>
          <dd>
            <input type="file" class="" name="image" size="35" maxlength="">
            <?php if($error['image'] == 'type'): ?>
              <p class="error">* 写真などは「.gif」または「.jpg」の画像を指定してください</p>
            <?php endif; ?>
            <?php if(!empty($error)): ?>
              <p class="error">* 恐れ入りますが、画像を改めて指定してください</p>
            <?php endif; ?>
          </dd>

        </dl>
        <div><input type="submit" value="入力内容を確認する"></div>
      </form>
    </div>
  </div>
</body>
</html>
