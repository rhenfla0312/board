// jquery
$(document).ready(function() {
  // insert.php -> 등록된게 없으면 팝업창
  $('.submit').click(function(e) {
    if($('#name').val() == "" || $('#text').val() == "" || $('#user').val() == "") {
      alert("등록되지 않은 값이 있습니다");
      e.preventDefault();
    }
  })

	// 로그아웃
  $('#logout').on('click', function() {
    return confirm("정말로 " + $(this).text() + " 하시겠습니까?");
  })





})



// js 

// 댓글 목록으로
const commentBtn = document.querySelector("#comment_back");
const comment = document.querySelector(".comment_insert");
const comment_insertBtn = document.querySelector("#comment_go");

commentBtn.addEventListener('click', function() {
  comment.style.display = "none";
  comment_insertBtn.classList.remove("comment_hide");
})

comment_insertBtn.addEventListener('click', function() {
  comment.style.display = "block";
  comment_insertBtn.classList.add("comment_hide");
})