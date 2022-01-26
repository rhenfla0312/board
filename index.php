<?php
// 자동로그인 기능 (보류)
// session_start();
// include
// include './include/db.php';
// include './include/db_function.php';

// $session_id = $_SESSION['id'];

// $id = $_COOKIE["id"];
// $pw = $_COOKIE["pw"];
// if ($id && $pw) {
//     $result = query_select($pdo, "SELECT * FROM board_regster WHERE `id` = '$id' AND `pw` = '$pw'");
//     if($result) {
//       $row = $result->fetch();
//         $_SESSION['id'] = $row['id'];
//         $_SESSION['pw'] = $row['pw'];
//     } 
//     $save_id = $_SESSION['id'];
//     $save_pw = $_SESSION['pw'];
// }

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- open graph -->
  <meta property="og:type" content="website" />
  <meta property="og:site_name" content="게시판" />
  <meta property="og:title" content="게시판" />
  <meta property="og:description" content="누구나 자유롭게 작성할 수 있는 게시판 입니다" />
  <meta property="og:image" content="./imges/open_grape_img.png" />
  <meta property="og:url" content="http://13.209.99.189/board" />
  <!-- js -->
  <script src="./js/login.js" defer></script>
  <!-- css -->
  <link rel="stylesheet" href="./css/login.css" />
  <link rel="stylesheet" href="./css/login_media.css" />
  <title>board_login</title>
</head>
<body>
  <div class="board_login">
    <div class="login">
      <div class="login_header">
        <h1>Login</h1>
      </div>
      <div class="login_form">
        <form action="./process/loginProcess.php" method="post" class="form" >
          <div class="input_id">
            <input type="text" class="login_id" name="login_id" placeholder="ID" autocomplete="off" required />
          </div>
          <div class="input_pw">
            <input type="password" class="login_pw" name="login_pw" placeholder="PASSWORD" required />
          </div>
          <button type="submit" class="login_btn" name="login_btn">로그인</button>
          <div class="login_checkbox">
            <div class="checkbox_save">
              <input type="checkbox" name="login_save" id="login_save" class="save"/>
              <label for="login_save">아이디 저장</label>
            </div>
            <div class="checkbox_auto">
              <input type="checkbox" name="login_auto" id="login_auto" class="auto" value="y" />
              <label for="login_auto">자동로그인</label>
            </div>
          </div>
        </form>
          <div class="find_singup">
            <div class="find">
              <button id="find">아이디/비밀번호 찾기</button>
            </div>
            <div class="singup">
              <button id="singup">회원가입</button>
            </div>
        </div>
      </div>
    </div>
  </div>



</body>
</html>