<?php
// include
include '../include/db.php';
include '../include/db_function.php';

$login_id = $_POST['login_id'];
$login_pw = $_POST['login_pw'];
$login_btn = $_POST['login_btn'];

// DB 정보 가져오기 
$result = query_select($pdo, "SELECT * FROM board_regster WHERE id = '$login_id'");
$row = $result->fetch();
$hashPw = $row['pw'];

// 비밀번호 검증 로직 실행
$pwResult = password_verify($login_pw, $hashPw);

if($pwResult === true) {
  // 세션에 저장
  session_start();
  $_SESSION['id'] = $row['id'];
  $_SESSION['pw'] = $row['pw'];
  $_SESSION['name'] = $row['name'];


	$session_id = $_SESSION['id'];


  // 자동로그인 기능 (보류)
  // $auto_login = $_POST['login_auto'];
  // $result = query_select($pdo, "SELECT * FROM board_regster WHERE `id` = '$session_id'");
  // if($result) {
  //   $row = $result->fetch();
  //   $user_id = $row['id'];
  //   $user_pw = $row['pw'];
  //   $id = $user_id;
  //   $pw = $user_pw;
  //   // $login_pw = $_POST['login_pw']; 


  //   if($auto_login == "y") {
  //     setcookie("id",$id,(time()+3600*24*30),"/");
  //     setcookie("pw",$login_pw,(time()+3600*24*30),"/");
  //   }
  // }

  header("location: ../view/main.php?user=$session_id");
} else {
  echo "<script>alert('로그인에 실패하였습니다'); location.href='../index.php';</script>";
}


?>