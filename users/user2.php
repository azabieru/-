<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>詳細</title>
    <link rel="stylesheet" href="style2.css">
  </head>
  <body>
    <?php
      //try = 行いたい処理
      //catch = tryが失敗したときの処理
      try{
        $db = new PDO('mysql:dbname=sangijidokandb; host=localhost; charset=utf8', 'root', '');
      }catch(PDOException $e){
        echo 'DB接続エラー：'.$e->getMessage();
      }
        $books = $db->query('SELECT pdf,cover,id,title,author,publisher,issue,page,age FROM books ORDER BY id ASC');
    ?>

    <?php
      //どのidの記事を取得するか
      //idが存在してそれが数字だったら
      if(isset($_REQUEST['id']) && is_numeric($_REQUEST['id'])){
        $id = $_REQUEST['id'];
        $books = $db->prepare('SELECT * FROM books WHERE id=?');
        $books->execute(array($id));
        $book = $books->fetch();
      }
    ?>

    <header>
      <h1>本の詳細</h1>
    </header>

    <main>
      <div class="bookCover"><img src="cover/<?php echo $book['cover']; ?>"</div>
      <div class="details">
        <dl>
          <dt>タイトル</dt>
          <dd><?php echo $book['title']; ?></dd>
          <dt>つくった人</dt>
          <dd><?php echo $book['author']; ?></dd>
          <dt>よんでいいねんれい</dt>
          <dd><?php echo $book['age']; ?></dd>
          <dt>ページのかず</dt>
          <dd><?php echo $book['page']; ?></dd>
          <dt>せつめい</dt>
          <dd><?php echo nl2br($book['description']); ?></dd>
        </dl>
      </div>
        <div class="footer">
          <div class="container">
            <a href="pdf/<?php echo $book['pdf']; ?>"><input class="btn-square-little-rich" type="button" value="読む"></a>
          </div>
        </div>
    </div>
    </main>
  </body>
</html>
