<?php

session_start();

$session_id = $_SESSION['id'];

if(empty($session_id)) {
	echo "<script>alert('잘못된 접근입니다'); history.back();</script>";
}

// include
include '../include/db.php';
include '../include/db_function.php';


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
  <link rel="stylesheet" href="../css/insert.css" />
  <link rel="stylesheet" href="../css/insert_media.css" />
  <title>board_read</title>
</head>
<body>
  <div class="board_read">
    <!-- header -->
    <div class="read_header">
      <h1>게시글 작성</h1>
      <h3>자유롭게 글을 작성하는 페이지입니다</h3>
    </div>

    <!-- section -->
    <div class="read_section">
      <form action="../process/insertProcess.php" method="post" enctype='multipart/form-data'>
        <div class="read_user">
          <label for="user">작성자</label>
          <input type="text" id="user" name="user" placeholder="이름을 입력해주세요" />
        </div>
        <div class="read_name">
          <label for="name">제목</label>
          <input type="text" id="name" name="name" placeholder="제목을 입력해주세요" autocomplete="off" />
        </div>
        <div class="read_text">
          <label for="text">내용</label>
          <textarea id="text" name="text" rows="15" cols="60" placeholder="내용을 입력해주세요" ></textarea>
        </div>
        <div class="read_file">
          <input type="file" name="file" />
        </div>
        <div class="read_button">
          <button type="button" id="back_btn">목록</button>
          <button type="submit" name="submit" class="submit">제출</button>
        </div>
      </form>
    </div>
  </div>  



<script>
const backtBtn = document.querySelector("#back_btn");

backtBtn.addEventListener('click', function() {
    location = "./main.php?user=<?php echo $session_id; ?>";
})

</script>


</body>
</html>