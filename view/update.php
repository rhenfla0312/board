<?php

session_start();

// session_id 값
$session_id = $_SESSION['id'];

if(empty($session_id)) {
	echo "<script>alert('잘못된 접근입니다'); history.back();</script>";
}

// include
include '../include/db.php';
include '../include/db_function.php';

// 받아온 idx값
$id = $_GET['idx'];
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
  <!-- css -->
  <link rel="stylesheet" href="../css/update.css" />
  <link rel="stylesheet" href="../css/update_media.css" />
  <title>board_update</title>
</head>
<body>
  <div class="board_read">
    <!-- header -->
    <div class="read_header">
      <h1>게시글 수정</h1>
      <h3>자유롭게 글을 수정하는 페이지입니다</h3>
    </div>
<?php 
$result = query_select($pdo, "SELECT * FROM board WHERE idx = '$id' AND `user_id` = '$session_id'");
$row = $result->fetch()
?>
    <!-- section -->
    <div class="read_section">
      <form action="../process/updateProcess.php" method="post">
        <input type="hidden" name="update_idx" value="<?php echo $row['idx']; ?>" />
        <div class="read_user">
          <label for="user">작성자</label>
          <input type="text" id="user" name="user" value="<?php echo $row['user'] ?>" readonly />
        </div>
        <div class="read_name">
          <label for="name">제목</label>
          <input type="text" id="name" name="name" value="<?php echo $row['name']; ?>" autocomplete="off" />
        </div>
        <div class="read_text">
          <label for="text">내용</label>
          <textarea id="text" name="text" rows="15" cols="60" ><?php echo $row['text']; ?></textarea>
        </div>
        <div class="read_button">
          <button type="button" id="back_btn">뒤로가기</button>
          <button type="submit" name="submit" class="submit">제출</button>
        </div>
      </form>
    </div>
  </div>  

<?php 
$result = query_select($pdo, "SELECT * FROM board WHERE idx = '$id'");
$row = $result->fetch()
?>

<script>
const backtBtn = document.querySelector("#back_btn");

backtBtn.addEventListener('click', function() {
    location = "./read.php?idx=<?php echo $row['idx']; ?>";
})

</script>


</body>
</html>