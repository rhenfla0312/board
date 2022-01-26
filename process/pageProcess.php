<?php

// search option
$search_title = $_POST['keword'];
$search_text = $_POST['text'];
$search = $_POST['search'];

$page = $_GET['page']; 

if(isset($search)) {
  $result = query_select($pdo, "SELECT * FROM board WHERE $search_title like '%{$search_text}%'");
} else {
  $result = query_select($pdo, "SELECT * FROM board");
}
// rowCount - 전체 레코드 행 구하기
$total_article =  $result->rowCount();
// 한페이지에 게시글이 출력될 레코드
$view_article = 15;
// 페이지 번호가 없으면 1페이지 번호를 만든다
if(!$page) $page = 1;

// 시작페이지
// 현제 페이지에 나타날 레코드 수 * 페이지 번호 - 1 = 시작점 지점
$start = ($page - 1) * $view_article;

// 전체 총 레코드 / 현재 페이지에 보여질 레코드

$total_page = ceil($total_article / $view_article);



// 페이지 인덱스의 시작과 종료 범위 구하기
// ex) 10페이지가 한그룹
// 첫 페이지 구하기
if($page % 10) {
  // 페이지가 1부터 9까지면 + 1 을 한다, + 1 인 상태에서 $page를 - 1을 한다 
  $start_page =  $page - $page % 10 + 1;

} else {
  // 페이지가 10% 이상이면 -9를 해준다	
  $start_page = $page - 9;
}

// 마지막 페이지 구하기
// 시작페이지에서 +10을 한다
  $end_page = $start_page + 10;


//  그룹 이동 ///
// 이전 그룹
// 첫 페이지 번호 - 1
$prev_group = $start_page - 1;
// 이전 그룹을 누르면 맨 앞페이지로 이동
if($prev_group < 1) $prev_group = 1;

// 다음 그룹
$next_group = $end_page;
// 다음 그룹 변수가 전체 페이지 보다 크면 다음 그룹 변수는 전체 페이지 번호가 된다
if($next_group > $total_page) $next_group = $total_page;

?>