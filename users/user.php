<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>みんなの本</title>
    <link rel="stylesheet" href="style.css">
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
        $books = $db->query('SELECT pdf,cover,id FROM books ORDER BY id ASC');
    ?>

    <header>
      <h1>みんなの本</h1>
    </header>

    <h2>よみたい本をおしてね</h2>

      <main>
        <?php foreach($books as $book): ?>
            <div class="bookCover">
              <a href="pdf/<?php echo $book['pdf']; ?>" target="_blank"><img src="cover/<?php echo $book['cover']; ?>"></a>
              <p><input class="btn-square-little-rich" type="button" value="くわしく見る" onClick="location.href='user2.php?id=<?php echo $book['id']; ?>'">&nbsp;</p>
            </div>
        <?php endforeach; ?>
      </main>
  </body>
</html>
