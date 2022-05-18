
document.querySelector("#login").addEventListener("click", (e) => {
    e.preventDefault();
    const id = "admin";
    const password = "1234";
 
    if(id == document.querySelector("#id").value) {
        if(password == document.querySelector("#password").value) {
            alert("환영합니다!")
            document.location.href = "../category/pre_home.html"; 
        }
        else {
            alert("비밀번호가 맞지 않습니다.");
        }
    }
    else {
        alert("아이디 혹은 비밀번호가 맞지 않습니다.");
    }
});
