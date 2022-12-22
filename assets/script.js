const one = document.querySelector(".one") ;
const two = document.querySelector(".two") ;
const three = document.querySelector(".three") ;
const quizPage = document.getElementById("quizP") ;
const infoSection = document.getElementById("info_section") ;
const quizSection = document.getElementById("quiz_section") ;
const resultSection = document.getElementById("result_section") ;
const next_btn = document.querySelector(".next_btn") ;
const total_que = document.querySelector(".total_que") ;
const quiz = document.getElementById("quiz_container") ;
const chase = document.getElementById("sk-chase") ;

quizPage.onclick = function() {
    two.classList.add("active") ;
    infoSection.style.display="none" ; 
    quizSection.style.display="flex" ; 
    questions.sort(function(){return Math.random()-0.5}) ;
    showQuestions(0) ;
}

let que_count = 0 ;

function reload(){
    quiz.style.display="none" ;
    chase.style.display="block" ;
    setTimeout(function(){
        quiz.style.display="block" ;
        chase.style.display="none" ; 
    }, 1000);
}

next_btn.onclick = ()=>{
    if(que_count < questions.length - 1){
        reload() ;
        que_count++ ;
        showQuestions(que_count) ;
    }
}

function showQuestions(index){
    const que_text = document.querySelector(".que_text") ;
    const option_list = document.querySelector(".option_list") ;
    let que_tag = '<span>'+ questions[index].question +'</span>' ;
    let options_tag = '<div class="option"><span>'+ questions[index].options[0] +'</span></div>'
                    + '<div class="option"><span>'+ questions[index].options[1] +'</span></div>'
                    + '<div class="option"><span>'+ questions[index].options[2] +'</span></div>'
                    + '<div class="option"><span>'+ questions[index].options[3] +'</span></div>';
    que_text.innerHTML = que_tag ;
    option_list.innerHTML = options_tag ;
}