<?php



// include
include '../include/db.php';
include '../include/db_function.php';

// 받아온 idx값
$id = $_REQUEST['idx'];


query($pdo, "DELETE FROM board WHERE idx = '$id'");
header("location: ../view/main.php");

?>