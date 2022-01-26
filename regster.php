<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./css/regster.css" />
  <link rel="stylesheet" href="./css/regster_media.css" />
  <title>board_regster</title>
</head>
<body>
  <div class="board_regster">
    <div class="regster">
      <div class="regster_header">
        <h1>Singup</h1>
      </div>
      <div class="regster_form">
        <form action="./process/regsterProcess.php" method="post" class="form" >
          <div class="input_id">
            <input type="text" class="regster_id" name="regster_id" placeholder="ID" autocomplete="off" required />
          </div>
          <div class="input_name">
            <input type="text" class="regster_name" name="regster_name" placeholder="Name" required />
          </div>
          <div class="input_email">
            <input type="email" class="regster_email" name="regster_email" placeholder="Email" required />
          </div>
          <div class="input_pw">
            <input type="password" class="regster_pw" name="regster_pw" placeholder="PassWord" required />
          </div>
          <div class="input_pw_confirm">
            <input type="password" class="regster_pw_confirm" name="regster_pw_confirm" placeholder="PassWord_ConFirm" required />
          </div>
          <button type="submit" class="regster_btn" name="regster_btn">회원가입</button>
        </form>
        <div class="login_back">
          <button id="regster_back">돌아가기</button>
        </div>
      </div>
    </div>
  </div>

<script>
  const regsterBtn = document.querySelector("#regster_back");
  regsterBtn.addEventListener("click", function() {
    location.href = "index.php";
  })
</script>
</body>
</html>