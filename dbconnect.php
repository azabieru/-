<?php
  //try = 行いたい処理
  //catch = tryが失敗したときの処理
  try{
    $db = new PDO('mysql:dbname=sangijidokandb; host=localhost; charset=utf8', 'root', '');
  }catch(PDOException $e){
    echo 'DB接続エラー：'.$e->getMessage();
  }
?>
