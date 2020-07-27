<?php require('login-check.php'); ?>

<!DOCTYPE html>
<html>

  <head>
    <meta charset="utf-8">
    <title>変更完了｜産技児童館</title>
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
      <h2>変更完了</h2>
      <p>変更が完了しました</p>
      <input class="registerButton" type="button" value="トップに戻る" onclick="location.href='index.php'">
    </div>

  </body>

</html>
