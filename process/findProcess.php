<?php
// error_reporting(-1);
// ini_set('display_errors', 'On');
// set_error_handler("var_dump");


// include
include '../include/db.php';
include '../include/db_function.php';

// find id option
$find_id_name = $_POST['find_id_name'];
$find_id_email = $_POST['find_id_email'];
$find_id_btn = $_POST['find_id_btn'];
// find pw option
$find_pw_id = $_POST['find_pw_id'];
$find_pw_email = $_POST['find_pw_email'];
$find_pw_btn = $_POST['find_pw_btn'];


if(isset($find_id_btn)) {
  $result = query_select($pdo, "SELECT * FROM board_regster WHERE `name` = '$find_id_name' AND `email` = '$find_id_email'");
  $row = $result->fetch();
  $db_id = $row['id'];
  $db_name = $row['name'];
  $db_email = $row['email'];

  if($find_id_name === $db_name && $find_id_email === $db_email) {
    echo "<script>alert('아이디 : $db_id'); location.href='../index.php';</script>";
  } else {
    echo "<script>alert('해당하는 아이디가 없습니다'); history.back();</script>";
  }
}


if(isset($find_pw_btn)) {
  $result = query_select($pdo, "SELECT * FROM board_regster WHERE `id` = '$find_pw_id'");
  $row = $result->fetch();
  $db_id_two = $row['id'];
  $db_pw_email = $row['email'];
  $db_pw = $row['pw'];

  // mail option /////// 보류 /////
  // $header_name = "게시판 비밀번호 변경";
  // $header_name = "=?UTF-8?B?".base64_encode($subject)."?=";
  // $content = "<a href='http://13.209.99.189/board/find.php'>비밀번호 변경</a>";
  // $headers = 'From : yym1623@naver.com';
  // $headers .= 'Organization: Sender Organization ' . "\r\n";
	// $headers .= 'MIME-Version: 1.0 ' . "\r\n";
	// $headers .= 'Content-type: text/html; charset=utf-8 ' . "\r\n";
	// $headers .= 'X-Priority: 3 ' ."\r\n" ;
	// $headers .= 'X-Mailer: PHP". phpversion() ' ."\r\n" ;
  //////////////////////////////////////

  if($find_pw_id === $db_id_two && $find_pw_email === $db_pw_email) {
    // echo "<script>alert('비밀번호 : '); location.href='../index.php';</script>";
    echo "<script>alert('비밀번호(암호화) : $db_pw'); location.href='../index.php';</script>";
  } else {
    echo "<script>alert('해당하는 아이디가 없습니다'); history.back();</script>";
  }
}
?>