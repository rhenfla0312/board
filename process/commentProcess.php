<?php
session_start();

// include
include '../include/db.php';
include '../include/db_function.php';

$number = $_POST['comment_number'];


$id = $_POST['comment_id'];
$pw = $_POST['comment_pw'];
$text = $_POST['comment_text'];


if(ISSET($_POST['comment_btn'])) {
  $result = query_select($pdo, "SELECT * FROM board_regster WHERE `id` = '$id'");
  $row = $result->fetch();

  $regster_pw = $row['pw'];

  $pwResult = password_verify($pw, $regster_pw);


  if($pwResult) {
    query($pdo, "INSERT INTO comment SET `number` = '$number' ,`id` = '$id', `pw` = '$pwResult', `content` = '$text', `date` = NOW()");
    header("location: ../view/read.php?idx=$number");
  } else {
    echo "<script>alert('비밀번호가 일치하지 않습니다'); history.back();</script>";
  }
}

?>