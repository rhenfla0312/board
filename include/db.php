<?php
  $pdo = new PDO('mysql:host=yymtest.ctyskj53encv.ap-northeast-2.rds.amazonaws.com; dbname=board; charset=utf8', 'yym', 'xldjf0312');
  $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
?>
