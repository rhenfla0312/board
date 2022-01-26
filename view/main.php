<?php

session_start();

$session_id = $_SESSION['id'];

if(empty($session_id)) {
	echo "<script>alert('잘못된 접근입니다'); history.back();</script>";
}

// include
include '../include/db.php';
include '../include/db_function.php';

// page
include '../process/pageProcess.php';


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
  <!-- font-awesome -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">
  <!-- reset css -->
  <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/reset-css@5.0.1/reset.css"> -->
  <!-- css -->
  <link rel="stylesheet" href="../css/main.css" />
  <link rel="stylesheet" href="../css/main_media.css" />
  <title>board_main</title>
</head>
<body>

<?php 
// search option
$search_title = $_POST['keword'];
$search_text = $_POST['text'];
$search = $_POST['search'];
?>

  <div class="board">
    <!-- header -->
    <div class="header">
      <h1><a href="./main.php?user=<?php echo $session_id; ?>">게시판</a></h1>
      <h3>자유롭게 작성하는 게시판 입니다</h3>

      <!-- 새로고침
      <div class="loding">
        <a href="javascript:self.document.location.reload()"><i class="fas fa-sync"></i></a>
      </div> -->

			<!-- 새로고침 -->
      <div class="loding">
        <a href="./main.php?user=<?php echo $session_id; ?>"><i class="fas fa-sync"></i></a>
      </div>
			
			<!-- 검색 -->
			<div class="pick">
				<form action="./main.php?keword=<?php echo $search_text ?>" method="post" class="pick_form">
					<div class="pick_keword">
						<select name="keword" class="pick_select">
							<option value="name">제목</option>
							<option value="user">글쓴이</option>
						</select>
					</div>
					<div class="pick_text">
						<input type="text" name="text" class="text" required />
					</div>
					<div class="pick_seach">
						<button type="submit" name="search">검색</button>
					</div>
				</form>
			</div>

      <!-- 로그아웃 -->
      <div class="logout">
        <a href="../process/logoutProcess.php" id="logout">로그아웃</a>
      </div>

<?php 
$result = query_select($pdo, "SELECT count(*) FROM  board");
$row = $result->fetchColumn();
?>

			<!-- 총 게시글 -->
			<div class="total_count">
					<h3>TOTAL 0<?php echo $row ?></h3>
			</div>
    </div>


    <!-- section -->
    <div class="section">
      <table class="table">
        <thead>
          <tr>
            <th>번호</th>
            <th>제목</th>
            <th>글쓴이</th>
            <th>날짜</th>
            <th>조회수</th>
          </tr>
        </thead>

<?php

if(isset($search)) {
	$result = query_select($pdo, "SELECT * FROM board WHERE $search_title like '%{$search_text}%' ORDER BY idx desc limit $start, $view_article");
} else {
  $result = query_select($pdo, "SELECT * FROM board ORDER BY idx desc limit $start, $view_article");
}
while($row = $result->fetch()) {
?>
        <tbody>
          <tr>
            <td><?php echo $row['idx']; ?></td>
            <td><a class="bold" href="./read.php?idx=<?php echo $row['idx']; ?>"><?php echo $row['name']; ?></a></td>
            <td><?php echo $row['user']; ?></td>
            <td><?php echo $row['date']; ?></td>
            <td><?php echo $row['number']; ?></td>
          </tr>
        </tbody>
<?php } ?>
      </table>

      <!-- page -->
      <div class="pageing">
        <div class="page">
          <?php if($page !=1) echo "<a href=main.php?page=1><i class='fas fa-angle-double-left'></i></a>";
                else echo "<i class='fas fa-angle-double-left'></i>"; ?>
        </div>
        <div class="page">
          <?php if($page !=1) echo "<a href=main.php?page=$prev_group><i class='fas fa-angle-left arrow'></i></a>";
                else echo "<i class='fas fa-angle-left arrow'></i>"; ?>
        </div>
        <?php for ($i=$start_page; $i < $end_page; $i++) {
                  if($i > $total_page) break;
                  if($i == $page) echo "<div class='page arrow'>$i</div>";
                  else echo "<div class='page'><a href=main.php?page=$i class='arrow'>$i</a></div>";
        } ?>
        <div class="page">
          <?php if($page !=$total_page) echo "<a href=main.php?page=$next_group class='arrow'><i class='fas fa-angle-right'></i></a>";
                else echo "<i class='fas fa-angle-right arrow'></i>"; ?>
        </div>
        <div class="page">
          <?php if($page !=$total_page) echo "<a href=main.php?page=$total_page><i class='fas fa-angle-double-right'></i></a>";
                else echo "<div class='arrow'><i class='fas fa-angle-double-right'></i></div>"; ?>
        </div>
      </div>

      <!-- footer -->
      <div class="footer">
        <button id="insert_btn">글쓰기</button>
      </div>
    </div>
  </div>


<script>
	const insertBtn = document.querySelector("#insert_btn");

	insertBtn.addEventListener('click', function() {
		location = "./insert.php?user=<?php echo $session_id; ?>";
	})

</script>

</body>
</html>