<?php

// 쿼리 실행 -> execute
function query($pdo, $sql) {
	$query = $pdo->prepare($sql);
	$query->execute();

	return $query;
}

// 쿼리 실행 -> exec
function query_exec($pdo, $sql) {
	$query = $pdo->exec($sql);

	return $query;
}

// 쿼리 조회
function query_select($pdo, $sql) {
    $query = $pdo->query($sql);
    return $query;
}

?> 

