



<?php require('login-check.php'); ?>

<?php
  if(!empty($_POST)){
    //エラー項目の確認
    //$_POST['●●●●●']が空欄だったら
    //$error['●●●●●']に'blank'という文字を代入する
    if($_POST['title'] == ''){
      $error['title'] = 'blank';
    }
    if($_POST['author'] == ''){
      $error['author'] = 'blank';
    }
    if($_POST['publisher'] == ''){
      $error['publisher'] = 'blank';
    }
    if($_POST['issue'] == ''){
      $error['issue'] = 'blank';
    }
    if($_POST['page'] == ''){
      $error['page'] = 'blank';
    }
    if($_POST['age'] == ''){
      $error['age'] = 'blank';
    }
    //拡張子が「.jpg」または「.png」であるかを確認する
    //$_FILES['name属性']['内容'] = アップロードされたファイルの情報
    $fileName1 = $_FILES['cover']['name'];
    if(!empty($fileName1)){
      //substr = 文字列から一部を切り取る（-3は後ろから3文字）
      $ext = substr($fileName1, -3);
      if($ext != 'jpg' && $ext != 'png'){
        $error['cover'] = 'type1';
      }
    }
    //拡張子が「.pdf」であるかを確認する
    $fileName2 = $_FILES['pdf']['name'];
    if(!empty($fileName2)){
      $ext = substr($fileName2, -3);
      if($ext != 'pdf'){
        $error['pdf'] = 'type2';
      }
    }
    //何もエラーがなかったら
    if(empty($error)){
      //画像をアップロードする
      //move_uploaded_file(アップロード元, アップロード先)
      //tmp_name = 一時ファイルの保存場所
      $cover = $_FILES['cover']['name'];
  		move_uploaded_file($_FILES['cover']['tmp_name'], '../cover/'.$cover);
      //PDFをアップロードする
      $pdf = $_FILES['pdf']['name'];
  		move_uploaded_file($_FILES['pdf']['tmp_name'], '../pdf/'.$pdf);
      //セッションに各値を保存する
      $_SESSION['join'] = $_POST;
      $_SESSION['join']['cover'] = $cover;
      $_SESSION['join']['pdf'] = $pdf;
      //check.phpに移動する
      header('Location: check.php');
      exit();
  	}
  }

  //書き直す（ページが戻った時に入力情報を保持する）
  //$_REQUEST = オールマイティに使えるスーパーグローバル変数
  //name属性'action'が'rewrite'だったらセッション情報を$_POSTに戻す
  if($_REQUEST['action'] == 'rewrite'){
    $_POST = $_SESSION['join'];
    $error['rewrite'] = true;
  }

  //DB内の投稿内容を取得する
  $books = $db->query('SELECT id, title FROM books ORDER BY id ASC');
?>

<!DOCTYPE html>
<html>

  <head>
    <meta charset="utf-8">
    <title>新規登録及び登録一覧｜産技児童館</title>
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
      <h2>新規登録</h2>
      <!-- enctype="multipart/form-data" = ファイルアップロードする場合にはこの属性と属性値を必ず付ける -->
      <form action="" method="post" enctype="multipart/form-data">
        <dl>
          <dt>書籍名</dt>
          <dd>
            <input class="registerText" type="text" name="title" value="<?php echo htmlspecialchars($_POST['title'],ENT_QUOTES); ?>" placeholder="さんぎものがたり">
            <?php if($error['title'] == 'blank'): ?>
              <p class="error">書籍名を入力してください</p>
            <?php endif; ?>
          </dd>
          <dt>作者</dt>
          <dd>
            <input class="registerText" type="text" name="author" value="<?php echo htmlspecialchars($_POST['author'],ENT_QUOTES); ?>" placeholder="産技太郎">
            <?php if($error['author'] == 'blank'): ?>
              <p class="error">作者を入力してください</p>
            <?php endif; ?>
          </dd>
          <dt>出版社</dt>
          <dd>
            <input class="registerText" type="text" name="publisher" value="<?php echo htmlspecialchars($_POST['publisher'],ENT_QUOTES); ?>" placeholder="産技出版">
            <?php if($error['publisher'] == 'blank'): ?>
              <p class="error">出版社を入力してください</p>
            <?php endif; ?>
          </dd>
          <dt>発行日</dt>
          <dd>
            <input class="registerText" type="text" name="issue" value="<?php echo htmlspecialchars($_POST['issue'],ENT_QUOTES); ?>" placeholder="2019/05/01">
            <?php if($error['issue'] == 'blank'): ?>
              <p class="error">発行日を入力してください</p>
            <?php endif; ?>
          </dd>
          <dt>ページ数</dt>
          <dd>
            <input class="registerText" type="text" name="page" value="<?php echo htmlspecialchars($_POST['page'],ENT_QUOTES); ?>" placeholder="20">
            <?php if($error['page'] == 'blank'): ?>
              <p class="error">ページ数を入力してください</p>
            <?php endif; ?>
          </dd>
          <dt>対象年齢</dt>
          <dd>
            <input class="registerText" type="text" name="age" value="<?php echo htmlspecialchars($_POST['age'],ENT_QUOTES); ?>" placeholder="4〜6歳">
            <?php if($error['age'] == 'blank'): ?>
              <p class="error">対象年齢を入力してください</p>
            <?php endif; ?>
          </dd>
          <dt>説明文</dt>
          <dd><textarea class="registerArea" name="description" rows="5"><?php echo htmlspecialchars($_POST['description'],ENT_QUOTES); ?></textarea></dd>
          <dt>表紙画像</dt>
          <dd>
            <input class="registerFile" type="file" name="cover">
            <?php if($error['cover'] == 'type1'): ?>
              <p class="error">画像は「.jpg」または「.png」を指定してください</p>
      			<?php endif; ?>
            <!-- ファイルアップロードのカラムは再現できな



            いため警告を表示する -->
      			<?php if(!empty($error)): ?>
              <p class="error">恐れ入りますが、画像を改めて指定してください</p>
      			<?php endif; ?>
          </dd>
          <dt>書籍PDF</dt>
          <dd>
            <input class="registerFile" type="file" name="pdf">
            <?php if($error['pdf'] == 'type2'): ?>
              <p class="error">ファイルは「.pdf」を指定してください</p>
      			<?php endif; ?>
      			<?php if(!empty($error)): ?>
              <p class="error">恐れ入りますが、ファイルを改めて指定してください</p>
      			<?php endif; ?>
          </dd>
        </dl>
        <input class="registerButton" type="submit" value="確認する">
      </form>
    </div>

    <div class="registerList">
      <h2>登録一覧</h2>
      <ul>
        <?php foreach($books as $book): ?>
        <li>
          <div class="bookId"><?php echo htmlspecialchars($book['id'],ENT_QUOTES); ?></div>
          <div class="bookTitle"><?php echo htmlspecialchars($book['title'],ENT_QUOTES); ?></div>
          <div class="bookOperation">
            <input class="listButton" type="button" value="詳細" onclick="location.href='detail.php?id=<?php echo $book['id']; ?>'">&nbsp;
            <input class="listButton" type="button" value="変更" onclick="location.href='update.php?id=<?php echo $book['id']; ?>'">&nbsp;
            <input class="listButton" type="button" value="削除" onclick="location.href='delete.php?id=<?php echo $book['id']; ?>'">
          </div>
        </li>
        <?php endforeach; ?>
      </ul>
    </div>

  </body>

</html>
