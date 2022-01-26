<?php


// include
include '../include/db.php';
include '../include/db_function.php';


// search option
$search_title = $_POST['keword'];
$search_text = $_POST['text'];
$search = $_POST['search'];

header("location: ../view/main.php?keword=$search_text");





?> qA                                                                                                                                                 