const findBtn = document.querySelector("#find");
const singupBtn = document.querySelector("#singup");

// 자동로그인 기능 (보류)
const id = document.querySelector(".login_id");
const pw = document.querySelector(".login_pw");
const login_auto = document.querySelector("#login_auto");
const login_save = document.querySelector("#login_save");


findBtn.addEventListener("click", function() {
  location.href = "find.php";
})

singupBtn.addEventListener("click", function() {
  location.href = "regster.php";
})


// 자동로그인 기능 (보류)
// if(id.value !== "" && pw.value !== "") {

//   login_auto.checked =true;
// }

// if(login_auto.checked === true) {
//   location.href = "./view/main.php?user=<?php echo $id; ?>";
// }

// if(login_auto.checked === false) {
//   id.value = "";
//   pw.value = "";
// }


login_auto.addEventListener("click", function() {
  if(login_auto.checked === true) {
    alert("준비중 입니다");
    login_auto.checked = false;
  }
})

login_save.addEventListener("click", function() {
  if(login_save.checked === true) {
    alert("준비중 입니다");
    login_save.checked = false;
  }
})

