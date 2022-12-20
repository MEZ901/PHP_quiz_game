const one = document.querySelector(".one") ;
const two = document.querySelector(".two") ;
const three = document.querySelector(".three") ;
const quizPage = document.getElementById("quizP") ;

quizPage.onclick = function() {
    two.classList.add("active") ;
}