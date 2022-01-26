<?php

include '../include/db.php';
include '../include/db_function.php';

$idx = $_GET['idx'];



$result = query($pdo, "SELECT * FROM board WHERE idx = '$idx'");
$row = $result->fetch();

if(EMPTY($row['file_name'])) {
  echo "<script>alert('파일이 등록되지 않았습니다'); history.back();</script>";
} else {
  $target_Dir = "../files";
  $file_path = $row['file_path'];
  $file = $row['file_name'];
  $down = $target_Dir."/".$file_path."/".$file;



  $filesize = filesize($down);

  
  if(file_exists($down)){
    header("Content-Type:application/octet-stream");
    // 다운될때 파일이름 지정
    header("Content-Disposition:attachment;filename=$file");
    header("Content-Transfer-Encoding:binary");
    header("Content-Length: $filesize");
    header("Cache-Control:cache,must-revalidate");
    header("Pragma:no-cache");
    header("Expires:0");

    ob_clean();
    // flush();
    readfile($down);
  }
}



?>