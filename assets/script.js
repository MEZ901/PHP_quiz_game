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
const option_list = document.querySelector(".option_list") ;

quizPage.onclick = function() {
    two.classList.add("active") ;
    infoSection.style.display="none" ; 
    quizSection.style.display="flex" ; 
    questions.sort(function(){return Math.random()-0.5}) ;
    showQuestions(0) ;
    queCounter(1) ;
}

let que_count = 0 ;
let que_numb = 1 ;

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
        que_numb++ ;
        showQuestions(que_count) ;
        queCounter(que_numb)
    }
}

function showQuestions(index){
    const que_text = document.querySelector(".que_text") ;
    let que_tag = '<span>'+ questions[index].question +'</span>' ;
    let options_tag = '<div class="option" onclick="optionSelected(this)"><span>'+ questions[index].options[0] +'</span></div>'
                    + '<div class="option" onclick="optionSelected(this)"><span>'+ questions[index].options[1] +'</span></div>'
                    + '<div class="option" onclick="optionSelected(this)"><span>'+ questions[index].options[2] +'</span></div>'
                    + '<div class="option" onclick="optionSelected(this)"><span>'+ questions[index].options[3] +'</span></div>';
    que_text.innerHTML = que_tag ;
    option_list.innerHTML = options_tag ;
}

function queCounter(index){
    const questions_counter = document.querySelector(".total_que") ;
    let questions_counter_tag = '<span><p>'+ index +'</p>of<p>'+ questions.length +'</p>Questions</span>' ;
    questions_counter.innerHTML = questions_counter_tag ;
}

function optionSelected(answer){
    let userAns = answer.textContent ;
    let correctAns = questions[que_count].answer ;
    let allOptions = option_list.children.length ;
    if(userAns == correctAns){
        answer.classList.add("correct") ;
    }else{
        answer.classList.add("wrong") ;
        for(let i = 0; i < allOptions; i++){
            if(option_list.children[i].textContent == correctAns){
                option_list.children[i].classList.add("correct") ;
            }
        }
    }
    for(let i = 0; i < allOptions; i++){
        option_list.children[i].classList.add("disabled") ;
    }
}