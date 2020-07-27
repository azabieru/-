<?php
  //カッコ内のファイルを読み込む
  require('../dbconnect.php');

  //セッションをスタートする
  session_start();
   //削除するボタンが押されたら
   if(isset($_POST['update_1Button'])){
     //delete-finish.phpに移動する
     header('Location: delete-finish.php');
     exit();
   }
  ?>
<!DOCTYPE html>
<html>

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

  <head>
    <meta charset="utf-8">
    <title>ログイン｜産技児童館</title>
    <link rel="stylesheet" href="style.css">
  </head>

  <body class="loginBg">

    <div class="loginBox">
      <h1>産技児童館</h1>
          <input class="update_1Button" type="submit" value="書籍新規登録">
          <input class="edit_1Button" type="submit" value="書籍編集">
      </div>

  </body>

</html>
