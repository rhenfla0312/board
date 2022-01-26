<?php

session_start();

// include
include '../include/db.php';
// include '../include/db_function.php';

// option
$name = $_POST['name'];
$text = $_POST['text'];
$user = $_POST['user'];
$btn = $_POST['submit'];

$id = $_SESSION['id'];

if(isset($btn)) {
  if($_FILES['file']['error'] > 0) {
    echo $_FILES['file']['error'];
  } else {
    if(isset($_FILES['file']['name'])) {
      $file_name = $_FILES['file']['name'];
      $file_path = "../files";
      $file_tmp_name = $_FILES['file']['tmp_name'];

      // 파일이름 중복을 피하기 위해 랜덤숫자로 경로에 생성한다
      $time = "data".time();

      $cmd = "mkdir ../files/".$time;
      `$cmd`;


      $file_mix = "$file_path"."/"."$time"."/"."$file_name";

      // 파일 업로드시 무조건 임시파일로 등록이 된다 -> 임시파일은 스크립트 종료시 자동 삭제된다 -> 종료하기전에 원하는 위치에 옮겨야한다
      move_uploaded_file($file_tmp_name, $file_mix);

    }
  }
	// query($pdo, "INSERT INTO board SET `name` = '$name', `text` = '$text', `user` = '$user', `date` = NOW()");
	$sql = "INSERT INTO board SET `name` = '$name', `text` = '$text', `user` = '$user', `file_name` = '$file_name', `file_path` = '$time', `user_id` = '$id', `date` = NOW()";
  $pdo->exec($sql);
  header("location: ../view/main.php?user=$id");
}

?>