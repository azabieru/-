<?php
  //カッコ内のファイルを読み込む
  require('../dbconnect.php');

  //セッションをスタートする
  session_start();

  //$_POSTが空欄ではなかったら = フォームが送信されたら
  if(!empty($_POST)){
    //ログイン処理
    //ユーザIDとパスワードが空欄ではなかったら
    if($_POST['userid'] != '' && $_POST['password'] != ''){
      $login = $db->prepare('SELECT * FROM admin WHERE userid=? AND password=?');
      $login->execute(array(
        $_POST['userid'],
        sha1($_POST['password'])
      ));
      //レコードを取り出して変数（$admin）に格納する
      $admin = $login->fetch();

      //入力された内容が$adminと同じだったら
      if($admin){
        //ログイン成功
        //idと現在の時刻をセッションに格納する
        //index.phpに移動する
        //移動後は以降のプログラムが実行されないようにする
        $_SESSION['id'] = $admin['id'];
        $_SESSION['time'] = time();
        header('Location: index.php');
        exit();
      }else{
        //ログイン失敗
        //$error['login']に'failed'という文字を代入する
        $error['login'] = 'failed';
      }
    }else{
      //ユーザIDかパスワードが空欄だったら
      //$error['login']に'blank'という文字を代入する
      $error['login'] = 'blank';
    }
  }
?>

<!DOCTYPE html>
<html>

  <head>
    <meta charset="utf-8">
    <title>ログイン｜産技児童館</title>
    <link rel="stylesheet" href="style.scss">
  </head>

  <body class="loginBg">

    <div class="loginBox">
      <div class="loginBoxInner">
        <div class="holder">
    <div class="first"></div>
    <div class="second"></div>
    <div class="third"></div>
    <div class="txt"
    <div class='box'>
  <div class='wave -one'></div>
  <div class='wave -two'></div>
  <div class='wave -three'></div>
  <div class='title'></div>
</div>
<div class='box'>
<div class='wave -one'></div>
<div class='wave -two'></div>
<div class='wave -three'></div>
<div class='title'>産技児童館</div>
</div>
    </div>
  </div>
        <div class="Picture">
        <form action="" method="post">
          <!-- htmlspecialchars関数 = HTMLタグの効果を打ち消す（安全な値に加工する） -->
          <input class="loginText" type="text" name="userid" placeholder="ユーザID" value="<?php echo htmlspecialchars($_POST['userid'],ENT_QUOTES); ?>">
          <input class="loginText" type="password" name="password" placeholder="パスワード" value="<?php echo htmlspecialchars($_POST['password'],ENT_QUOTES); ?>">
            <!-- $error['login']が'blank'だったら -->
            <?php if($error['login'] == 'blank'): ?>
              <p class="error">ユーザIDとパスワードを入力してください</p>
            <?php endif; ?>
            <!-- $error['login']が'failed'だったら -->
            <?php if($error['login'] == 'failed'): ?>
              <p class="error">ログインに失敗しました<br>正しく記入してください</p>
            <?php endif; ?>
          <input class="loginButton" type="submit" value="ログイン">
        </form>
      </div>
    </div>
    </div>

  </body>

</html>
