<?php
// include
include '../include/db.php';
include '../include/db_function.php';


$regster_id = $_POST['regster_id'];
$regster_name = $_POST['regster_name'];
$regster_email = $_POST['regster_email'];
$regster_pw = $_POST['regster_pw'];
$regster_pw_confirm = $_POST['regster_pw_confirm'];
$singup_btn = $_POST['regster_btn'];


// password hsah
$hashPw = password_hash($regster_pw, PASSWORD_DEFAULT);

$result = query_select($pdo, "SELECT * FROM board_regster WHERE id = '$regster_id'");
$row = $result->fetch();

if ($row['id'] === $regster_id) {
	echo "<script>alert('이미 등록된 아이디 입니다'); history.back();</script>";
}	else if($regster_pw !== $regster_pw_confirm) {
	echo "<script>alert('비밀번호가 일치하지 않습니다'); history.back();</script>";
} else {
  query($pdo, "INSERT INTO board_regster SET `id`='$regster_id', `name` = '$regster_name', `email` = '$regster_email' ,`pw`='$hashPw', `date`=NOW()");
  echo "<script>alert('회원가입이 완료되었습니다.'); location.href = '../index.php';</script>";
}

?>