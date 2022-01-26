<?php

session_start();

// session_id
$session_id = $_SESSION['id'];

if(empty($session_id)) {
	echo "<script>alert('잘못된 접근입니다'); history.back();</script>";
}

// include
include '../include/db.php';
include '../include/db_function.php';

// 받아온 idx값
$id = $_GET['idx'];
$session_name = $_SESSION['name'];
// 클릭한 아이디 조회수 증가
query($pdo, "UPDATE board SET number=number+1 WHERE idx = '$id'");

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- jQuery -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <!-- js -->
  <script src="../js/main.js" defer></script>
  <link rel="stylesheet" href="../css/read.css" />
  <link rel="stylesheet" href="../css/read_media.css" />
  <title>board_read</title>
</head>
<body>

<?php
	$result = query_select($pdo, "SELECT * FROM board WHERE idx = '$id'");
  $row = $result->fetch();
  $board_user = $row['user_id'];
  $result = query_select($pdo, "SELECT * FROM board_regster WHERE `id` = '$board_user'");
  $row = $result->fetch();
?>
  <div class="board_read">
    <!-- header -->
    <div class="read_header">
      <h1><?php echo $row['name']; ?> 님의 게시글 입니다</h1>
    </div>

<?php
	$result = query_select($pdo, "SELECT * FROM board WHERE idx = '$id'");
	while($row = $result->fetch()) {
?>
    <!-- section -->
    <div class="read_section">
      <div class="read_user">
        <label for="user">작성자</label>
        <p><?php echo $row['user']; ?></p>
      </div>
      <div class="read_name">
        <label for="name">제목</label>
        <p><?php echo $row['name']; ?></p>
      </div>
      <div class="read_text">
        <label for="text">내용</label>
        <p><?php echo $row['text']; ?></p>
      </div>
      <div class="read_file">
        <label for="file">첨부파일</label>
        <p><?php echo $row['file_name']; ?></p>
  <?php
    $result = query_select($pdo, "SELECT * FROM board WHERE idx = '$id'");
    $row = $result->fetch();
        if($row['file_name'] !== "") {
  ?>
        <button class="file_btn" id="file_btn" name="file_btn"><a href="../process/downloadProcess.php?idx=<?php echo $row['idx']; ?>">다운로드</a></button>
  <?php } ?>
      </div>
      <div class="read_button">
        <button id="back_btn">목록으로</button>
	<?php
		$result = query_select($pdo, "SELECT * FROM board WHERE idx = '$id' AND `user_id` = '$session_id'");
		while($row = $result->fetch()) {
	?>
        <button id="delete_btn">삭제하기</button>
        <button id="update_btn">수정하기</button>
  <?php } ?>
      </div>
<?php } ?>
<!-- 댓글 -->
    <div class="read_comment">
      <div class="comment_name">댓글목록</div>
<?php
  $result = query_select($pdo, "SELECT * FROM comment WHERE `number` = '$id' order by idx asc");
  while($row = $result->fetch()) {
?>
      <div class="comment_menu">
        <div class="comment__id">작성자 : <?php echo $row['id']; ?></div>
        <div class="comment__content">작성글 : <?php echo $row['content']; ?></div>
        <div class="comment__pw">작성시간 : <?php echo $row['date']; ?></div>
        <!-- <div><a herf="">삭제</a></div> -->
      </div>
<?php } ?>
    <!-- 댓글 작성 -->
      <div class="comment_insert" style="display:none">
        <form action="../process/commentProcess.php?user=<?php echo $id; ?>" method="post">
          <input type="hidden" name="comment_id" id="comment_id" class="comment_id" value="<?php echo $session_id; ?>">
          <input type="hidden" name="comment_number" id="comment_number" class="comment_number" value="<?php echo $id ?>">
          <input type="password" name="comment_pw" id="comment_pw" class="comment_pw" placeholder = "비밀번호">
          <textarea name="comment_text" id="comment_text" cols="47" rows="3" class="comment_text" style="resize: none;"></textarea>
          <button id="comment_btn" class="comment_btn" name="comment_btn">등록</button>
        </form>
        <button class="comment_back" id="comment_back">목록</button>
      </div>
      <button class="comment_go" id="comment_go">등록하기</button>
    </div>
  </div>

  

<?php 
$result = query_select($pdo, "SELECT * FROM board WHERE idx = '$id'");
$row = $result->fetch()
?>

<script>
// 새로고침 막기 -> 새로고침으로 조회수가 무한으로 올라가는걸 막음
// function doNotReload(){
// if( (event.ctrlKey == true && (event.keyCode == 78 || event.keyCode == 82)) || (event.keyCode == 116) ) {
//     event.keyCode = 0;
//     event.cancelBubble = true;
//     event.returnValue = false;
// } 
// }
// document.onkeydown = doNotReload;


// 뒤로가기
const backtBtn = document.querySelector("#back_btn");

backtBtn.addEventListener('click', function() {
  location = "./main.php?user=<?php echo $session_id; ?>";
})

// 수정
const updateBtn = document.querySelector("#update_btn");

updateBtn.addEventListener('click', function() {
  location = "./update.php?idx=<?php echo $row['idx']; ?>";
})

// 삭제
const deleteBtn = document.querySelector("#delete_btn");

deleteBtn.addEventListener('click', function() {
	// js에서 링크를 통해 idx값을 넘기려면 주소에 넣어서 보내야 보내진다?
  location = "../process/deleteProcess.php?idx=<?php echo $row['idx']; ?>";
})



</script>
</body>
</html>