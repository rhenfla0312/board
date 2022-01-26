<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./css/regster.css" />
  <link rel="stylesheet" href="./css/regster_media.css" />
  <link rel="stylesheet" href="./css/find.css" />
  <link rel="stylesheet" href="./css/find_media.css" />
  <title>board_regster</title>
</head>
<body>
  <!-- 아이디 찾기 -->
  <div class="find">
    <div class="board_id_find">
      <div class="regster">
        <div class="regster_header">
          <h1>ID_Find</h1>
        </div>
        <div class="regster_form">
          <form action="./process/findProcess.php" method="post" class="form" >
            <div class="input_name">
              <input type="text" class="regster_name" name="find_id_name" placeholder="Name" required />
            </div>
            <div class="input_email">
              <input type="email" class="regster_email" name="find_id_email" placeholder="Email" required />
            </div>
            <button type="submit" class="regster_btn" name="find_id_btn">아이디찾기</button>
          </form>
          <div class="login_back">
            <button id="regster_back">돌아가기</button>
          </div>
        </div>
      </div>
    </div>
    <!-- 비밀번호 찾기 -->
    <div class="board_pw_find">
      <div class="regster">
        <div class="regster_header">
          <h1>PW_Find</h1>
        </div>
        <div class="regster_form">
          <form action="./process/findProcess.php" method="post" class="form" >
            <div class="input_id">
              <input type="text" class="regster_id" name="find_pw_id" placeholder="ID" autocomplete="off" required />
            </div>
            <div class="input_email">
              <input type="email" class="regster_email" name="find_pw_email" placeholder="Email" required />
            </div>
            <button type="submit" class="regster_btn" name="find_pw_btn">비밀번호 찾기</button>
          </form>
          <div class="login_back">
            <button id="regster_back_two">돌아가기</button>
          </div>
        </div>
      </div>
    </div>
  </div>

<script>
  const regsterBtn = document.querySelector("#regster_back");
  regsterBtn.addEventListener("click", function() {
    location.href = "index.php";
  })
  const regsterBtn_two = document.querySelector("#regster_back_two");
  regsterBtn_two.addEventListener("click", function() {
    location.href = "index.php";
  })
</script>
</body>
</html>