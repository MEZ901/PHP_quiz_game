function readQuestionsFile(file, callback) {
    var rawFile = new XMLHttpRequest();
    rawFile.open("GET", file, true);
    rawFile.onreadystatechange = function() {
        if (rawFile.readyState === 4 && rawFile.status == "200") {
            callback(rawFile.responseText);
        }
    }
    rawFile.send(null);
}

readQuestionsFile("/PHP_quiz_game/includes/data.php", function(text){ 
    questions = JSON.parse(text);
}); 

let questions ;
const one = document.querySelector(".one") ;
const two = document.querySelector(".two") ;
const three = document.querySelector(".three") ;
const quizPage = document.getElementById("quizP") ;
const infoSection = document.getElementById("info_section") ;
const quizSection = document.getElementById("quiz_section") ;
const resultSection = document.getElementById("result_section") ;
const next_btn = document.querySelector(".next_btn") ;
const explanation_btn = document.querySelector(".explanation_btn") ;
const total_que = document.querySelector(".total_que") ;
const quiz = document.getElementById("quiz_container") ;
const chase = document.getElementById("sk-chase") ;
const option_list = document.querySelector(".option_list") ;
const timeCount = document.querySelector(".timer .time_sec") ;
const timeText = document.querySelector(".timer .time_text") ;
const restart_quiz = document.querySelector(".buttons .restart") ;
const quit_quiz = document.querySelector(".buttons .quit") ;
const modal = document.getElementById("ExplanationModal") ;
const close_btn = document.getElementsByClassName("close")[0] ;
const progress_bar = document.querySelector(".progress-bar") ;

let counter;
let que_count = 0 ;
let timeValue = 30 ;
let userScore = 0 ;

if(quizPage != undefined){
    quizPage.onclick = function() {
        two.classList.add("active") ;
        infoSection.style.display="none" ; 
        quizSection.style.display="flex" ; 
        questions.sort(function(){return Math.random()-0.5}) ;
        showQuestions(0) ;
        queCounter(0) ;
        startTimer(30) ;
    }
}

if(next_btn != undefined){
    next_btn.onclick = ()=>{
        load(1000) ;
        if(que_count <= questions.length - 1){
            que_count++ ;
            showQuestions(que_count) ;
            queCounter(que_count) ;
            clearInterval(counter) ;
            startTimer(timeValue) ;
            next_btn.style.display = "none" ;
            explanation_btn.style.display = "none" ;
        }
    }
}

if(restart_quiz != undefined){
    restart_quiz.onclick = ()=>{
        que_count = 0 ;
        timeValue = 30 ;
        userScore = 0 ;
        three.classList.remove("active") ;
        resultSection.style.display="none" ; 
        quizSection.style.display="flex" ; 
        questions.sort(function(){return Math.random()-0.5}) ;
        showQuestions(que_count) ;
        queCounter(que_count) ;
        clearInterval(counter) ;
        startTimer(timeValue) ;
        next_btn.style.display = "none" ;
        explanation_btn.style.display = "none" ;
    }
}

if(quit_quiz != undefined){
    quit_quiz.onclick = ()=>{
        window.location.href="../index.php" ;
    }
}

if(explanation_btn != undefined){
    explanation_btn.onclick = function() {
        const expText = modal.querySelector(".exp") ;
        const expTag = questions[que_count].explanation ;
        modal.style.display = "block";
        expText.innerHTML = expTag ;
    }
}

if(close_btn != undefined){
    close_btn.onclick = function() {
        modal.style.display = "none";
    }
}

window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}

if(document.querySelector(".alert-success") != undefined){
    document.querySelector('#chk').checked ="true";
}

function load(time){
    quiz.style.display="none" ;
    chase.style.display="block" ;
    setTimeout(function(){
        quiz.style.display="block" ;
        chase.style.display="none" ;
        if(que_count > questions.length - 1){
            showResultBox() ;
        }
    }, time);
}

function showQuestions(index){
    const que_text = document.querySelector(".que_text") ;
    let que_tag = `<span>${questions[index].question}</span>` ;
    questions[index].options.sort(function(){return Math.random() - 0.5}) ;
    let options_tag = `<div class="option" onclick="optionSelected(this)"><span>${questions[index].options[0]}</span></div>` ;
    for(let i = 1; i < questions[index].options.length; i++){
        options_tag += `<div class="option" onclick="optionSelected(this)"><span>${questions[index].options[i]}</span></div>` ;
    }
    que_text.innerHTML = que_tag ;
    option_list.innerHTML = options_tag ;
}

function queCounter(index){
    const progress_counter = document.querySelector(".progress-counter") ;
    let progress = (index * 100) / questions.length ;
    progress_counter.innerHTML = Math.floor(progress) +"%" ;
    progress_bar.style.width = progress +"%" ; 
}

function optionSelected(answer){
    clearInterval(counter) ;
    let userAns = answer.textContent ;
    let correctAns = questions[que_count].answer ;
    let allOptions = option_list.children.length ;
    if(userAns == correctAns){
        userScore++ ;
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
    next_btn.style.display = "block" ;
    explanation_btn.style.display = "block" ;

}

function startTimer(time){
    counter = setInterval(timer, 1000) ;
    function timer(){
        timeCount.textContent = time ;
        timeText.textContent = "Time left" ;
        time-- ;
        if(time < 9){
            let addZero = timeCount.textContent
            timeCount.textContent = "0" + addZero ;
        }
        if(time < 7){
            timeCount.style.background = "#a42834" ;
            timeCount.style.border = "#a42834" ;
        }else{
            timeCount.style.background = "#202731" ;
            timeCount.style.border = "#202731" ;
        }
        if(time < 0){
            clearInterval(counter) ;
            timeCount.textContent = "00" ;
            timeText.textContent = "Time Off" ;
            let allOptions = option_list.children.length ;
            let correctAns = questions[que_count].answer ;
            for(let i = 0; i < allOptions; i++){
                option_list.children[i].classList.add("disabled") ;
                if(option_list.children[i].textContent == correctAns){
                    option_list.children[i].classList.add("correct") ;
                }
            }
            next_btn.style.display = "block" ;
            explanation_btn.style.display = "block" ;
        }
    }
}

function showResultBox(){
    three.classList.add("active") ;
    quizSection.style.display="none" ; 
    resultSection.style.display="flex" ; 
    const star_icon = document.querySelectorAll(".star") ;
    const scoreText = document.querySelector(".score_text") ;
    let score = Math.floor((userScore * 100 / questions.length));
    if(score < 20){
        let scoreTag = `<span>Unfortunately, You have not passed the quiz successfully you got only <p>${score}%</p></span>` + `<span>You Can try again whenever you feel you are ready.</span>` ;
        scoreText.innerHTML = scoreTag ;
        star_icon[0].classList.add("done") ;
    }else if(score < 40){
        let scoreTag = `<span>Oh! You was close you got <p>${score}%</p></span>` + `<span>You Can try again whenever you feel you are ready.</span>` ;
        scoreText.innerHTML = scoreTag ;
        star_icon[0].classList.add("done") ;
        star_icon[1].classList.add("done") ;
    }else if(score < 60){
        let scoreTag = `<span>Congratulations, You have passed the quiz successfully you got <p>${score}%</p></span>` ;
        scoreText.innerHTML = scoreTag ;
        star_icon[0].classList.add("done") ;
        star_icon[1].classList.add("done") ;
        star_icon[2].classList.add("done") ;
    }else if(score < 80){
        let scoreTag = `<span>Amazing, You have passed the quiz successfully You got <p>${score}%</p></span>` ;
        scoreText.innerHTML = scoreTag ;
        star_icon[0].classList.add("done") ;
        star_icon[1].classList.add("done") ;
        star_icon[2].classList.add("done") ;
        star_icon[3].classList.add("done") ;
    }else{
        let scoreTag = `<span>You're on fire!, You have passed the quiz successfully You got <p>${score}%</p></span>` ;
        scoreText.innerHTML = scoreTag ;
        star_icon[0].classList.add("done") ;
        star_icon[1].classList.add("done") ;
        star_icon[2].classList.add("done") ;
        star_icon[3].classList.add("done") ;
        star_icon[4].classList.add("done") ;
    }
    let xhr = new XMLHttpRequest();
    xhr.open("GET", `../services/user.services.php?score=${score}`, true);
    xhr.onreadystatechange = ()=>{
        if(xhr.readyState == 4 && xhr.status == 200){
            console.log("success")
        }
    }
    xhr.send(`score=${score}`);
}


