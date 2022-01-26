<?php

session_start();

$session_id = $_SESSION['id'];

// include
include '../include/db.php';
include '../include/db_function.php';

$idx = $_POST['update_idx'];

$user = $_POST['user'];
$name = $_POST['name'];
$text = $_POST['text'];
$updateBtn = $_POST['submit'];



if(isset($updateBtn)) {
    query($pdo, "UPDATE board SET `name` = '$name', `text` = '$text' WHERE `idx` = '$idx'");
    echo "<script>alert('수정이 완료되었습니다'); location.href = '../view/main.php?user=$session_id';</script>";
}


?>