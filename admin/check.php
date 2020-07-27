<?php
  session_start();
  require('../dbconnect.php');

  //$_SESSION['join']に何も存在していなかったら（入力画面を経ずにアクセスしてきたら）
  if(!isset($_SESSION['join'])){
    header('Location: index.php');
    exit();
  }

  //$_POSTが空欄ではなかったら = フォームが送信されたら
  if(!empty($_POST)){
  	//登録処理をする
  	$statement = $db->prepare('INSERT INTO books SET title=?, author=?, publisher=?, issue=?, page=?, age=?, description=?, cover=?, pdf=?');
  	$statement->execute(array(
      $_SESSION['join']['title'],
      $_SESSION['join']['author'],
      $_SESSION['join']['publisher'],
      $_SESSION['join']['issue'],
      $_SESSION['join']['page'],
      $_SESSION['join']['age'],
      $_SESSION['join']['description'],
      $_SESSION['join']['cover'],
      $_SESSION['join']['pdf']
    ));
    //登録処理が終わったため入力情報を削除する
  	unset($_SESSION['join']);
    //finish.phpに移動する
  	header('Location: finish.php');
  	exit();
  }
?>

<!DOCTYPE html>
<html>

  <head>
    <meta charset="utf-8">
    <title>登録確認｜産技児童館</title>
    <link rel="stylesheet" href="style.scss">
  </head>

  <body class="adminBg">

    <header>
      <div class="headerInner">
        <div class="headerLeft">
          <a href="index.php">産技児童館</a>
        </div>
        <div class="headerRight">
          <a href="logout.php">ログアウト</a>
        </div>
      </div>
    </header>

    <div class="registerForm">
      <h2>登録確認</h2>
      <form action="" method="post">
        <input type="hidden" name="action" value="submit">
        <dl>
          <dt>書籍名</dt>
          <dd><?php echo htmlspecialchars($_SESSION['join']['title'],ENT_QUOTES); ?></dd>
          <dt>作者</dt>
          <dd><?php echo htmlspecialchars($_SESSION['join']['author'],ENT_QUOTES); ?></dd>
          <dt>出版社</dt>
          <dd><?php echo htmlspecialchars($_SESSION['join']['publisher'],ENT_QUOTES); ?></dd>
          <dt>発行日</dt>
          <dd><?php echo htmlspecialchars($_SESSION['join']['issue'],ENT_QUOTES); ?></dd>
          <dt>ページ数</dt>
          <dd><?php echo htmlspecialchars($_SESSION['join']['page'],ENT_QUOTES); ?></dd>
          <dt>対象年齢</dt>
          <dd><?php echo htmlspecialchars($_SESSION['join']['age'],ENT_QUOTES); ?></dd>
          <dt>説明文</dt>
          <dd><?php echo nl2br(htmlspecialchars($_SESSION['join']['description'],ENT_QUOTES)); ?></dd>
          <dt>表紙画像</dt>
          <dd><img src="../cover/<?php echo htmlspecialchars($_SESSION['join']['cover'],ENT_QUOTES); ?>" width="auto" height="200" alt=""></dd>
          <dt>書籍PDF</dt>
          <dd><?php echo htmlspecialchars($_SESSION['join']['pdf'],ENT_QUOTES); ?></dd>
        </dl>
        <input class="registerButton" type="button" value="書き直す" onclick="location.href='index.php?action=rewrite'">&nbsp;
        <input class="registerButton" type="submit" value="登録する">
      </form>
    </div>

  </body>

</html>
