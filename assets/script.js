const one = document.querySelector(".one") ;
const two = document.querySelector(".two") ;
const three = document.querySelector(".three") ;
const quizPage = document.getElementById("quizP") ;
const infoSection = document.getElementById("info_section") ;
const quizSection = document.getElementById("quiz_section") ;
const resultSection = document.getElementById("result_section") ;

quizPage.onclick = function() {
    two.classList.add("active") ;
    infoSection.style.display="none" ; 
    quizSection.style.display="flex" ; 
}