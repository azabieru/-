<?php require('login-check.php'); ?>

<?php
  if(isset($_REQUEST['id']) && is_numeric($_REQUEST['id'])){
    $id = $_REQUEST['id'];
    $books = $db->prepare('SELECT * FROM books WHERE id=?');
    $books->execute(array($id));
    $book = $books->fetch();
  }
?>
<?php
 //削除するボタンが押されたら
 if(isset($_POST['delete'])){

   //削除処理をする
   $statement = $db->prepare('DELETE FROM books WHERE id=?');
   $statement->execute(array($id));
   //delete-finish.phpに移動する
   header('Location: delete-finish.php');
   exit();
 }
?>


<script>
function confirm_test() { // 削除ボタンをクリックした場合
   document.getElementById('popup').style.display = 'block';
   return false;
}
function okfunc() { // OKをクリックした場合
   document.contactform.submit();
}
function nofunc() { // キャンセルをクリックした場合
   document.getElementById('popup').style.display = 'none';
}
</script>

<div >
<div id="popup" style="width: 200px;display: none;padding: 30px 20px;border: 2px solid #000;margin: auto;">
   削除しますか?<br />
   <button id="ok" onclick="okfunc()">OK</button>
   <button id="no" onclick="nofunc()">キャンセル</button>
</div>

<!DOCTYPE html>
<html>

  <head>
    <meta charset="utf-8">
    <title>登録削除｜産技児童館</title>
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
      <h2>登録削除</h2>
      <form action="" method="post">
        <dl>
          <dt>書籍名</dt>
          <dd><?php echo $book['title']; ?></dd>
          <dt>作者</dt>
          <dd><?php echo $book['author']; ?></dd>
          <dt>出版社</dt>
          <dd><?php echo $book['publisher']; ?></dd>
          <dt>発行日</dt>
          <dd><?php echo $book['issue']; ?></dd>
          <dt>ページ数</dt>
          <dd><?php echo $book['page']; ?></dd>
          <dt>対象年齢</dt>
          <dd><?php echo $book['age']; ?></dd>
          <dt>説明文</dt>
          <dd><?php echo nl2br($book['description']); ?></dd>
          <dt>表紙画像</dt>
          <dd><img src="../cover/<?php echo $book['cover']; ?>" width="auto" height="200" alt=""></dd>
          <dt>書籍PDF</dt>
          <dd><?php echo $book['pdf']; ?></dd>
        </dl>
        <input class="registerButton" type="button" value="トップに戻る" onclick="location.href='index.php'">&nbsp;
        <input class="registerButton" type="submit" value="削除する" name="delete">
      </form>
    </div>

  </body>

</html>
