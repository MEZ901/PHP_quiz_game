<?php?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/main.css">
    <script src="https://kit.fontawesome.com/e29eb6764b.js" crossorigin="anonymous"></script>
    <title>PHP quiz</title>
</head>
<body>
    <!------------ Stepper component ------------>
    <ul class="stepper-component">
        <li>
            <i class="fa-solid fa-circle-info"></i>
            <div class="active progress one">
                <p>1</p>
                <i class="checkMark fa-solid fa-check"></i>
            </div>
            <p class="text">Info</p>
        </li>
        <li>
            <i class="fa-brands fa-quinscape"></i>
            <div class="progress two">
                <p>2</p>
                <i class="checkMark fa-solid fa-check"></i>
            </div>
            <p class="text">Quiz</p>
        </li>
        <li>
            <i class="fa-solid fa-square-poll-vertical"></i>
            <div class="progress three">
                <p>3</p>
                <i class="checkMark fa-solid fa-check"></i>
            </div>
            <p class="text">Result</p>
        </li>
    </ul>

    <!------------ Information and rules ------------>
    <section class="info_box" id="info_section">
        <div class="custom-shape-divider">
            <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
                <path d="M321.39,56.44c58-10.79,114.16-30.13,172-41.86,82.39-16.72,168.19-17.73,250.45-.39C823.78,31,906.67,72,985.66,92.83c70.05,18.48,146.53,26.09,214.34,3V0H0V27.35A600.21,600.21,0,0,0,321.39,56.44Z" class="shape-fill"></path>
            </svg>
        </div>
        <h1>Some Rules of this Quiz</h1>
        <ul>
            <li>1. You have <span>30 seconds</span> per each question.</li>
            <li>2. There is only <span>one</span> option correct in each question.</li>
            <li>3. You can see the explanation after selecting your answer.</li>
            <li>4. Once you select your answer, it can't be undone.</li>
            <li>5. You'll get score on the basis of your correct answers.</li>
            <li>6. Your score will be saved on your profile.</li>
        </ul>
        <div class="action">
            <a href="../index.php"><button class="btn exit">Exit Quiz</button></a>
            <button class="btn continue" id="quizP">Continue</button>
        </div>
    </section>

    <!------------ Quiz ------------>
    <div class="quiz_box" id="quiz_section">
        <div class="custom-shape-divider">
            <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
                <path d="M321.39,56.44c58-10.79,114.16-30.13,172-41.86,82.39-16.72,168.19-17.73,250.45-.39C823.78,31,906.67,72,985.66,92.83c70.05,18.48,146.53,26.09,214.34,3V0H0V27.35A600.21,600.21,0,0,0,321.39,56.44Z" class="shape-fill"></path>
            </svg>
        </div>
        <div id="quiz_container">
            <header>
                <div class="title">PHQuiz</div>
                <div class="timer">
                    <div class="time_text">Time Left</div>
                    <div class="time_sec">30</div>
                </div>
            </header>
            <section>
            <div class="que_text">
                    <!-- the question goes here -->
                </div>
                <div class="option_list">
                    <!-- the options goes here -->
                </div>
            </section>
            <footer>
                <div class="progress-container">
                    <div class="progress-bar">
                        <p class="progress-counter"></p>
                    </div>
                </div>
                <button class="explanation_btn" id="explanation_btn">Explanation</button>
                <button class="next_btn">Next Question</button>
            </footer>
            <div id="ExplanationModal" class="modal">
                <div class="modal-content">
                    <div class="modal-head">
                        <p class="modal-title">Explanation:</p>
                        <span class="close">&times;</span>
                    </div>
                    <p class="exp"></p>
                </div>
            </div>
        </div>
        <div class="sk-chase" id="sk-chase">
            <div class="sk-chase-dot"></div>
            <div class="sk-chase-dot"></div>
            <div class="sk-chase-dot"></div>
            <div class="sk-chase-dot"></div>
            <div class="sk-chase-dot"></div>
            <div class="sk-chase-dot"></div>
        </div>
    </div>
    <!------------ Result ------------>
    <div class="result_box" id="result_section">
        <div class="custom-shape-divider">
            <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
                <path d="M321.39,56.44c58-10.79,114.16-30.13,172-41.86,82.39-16.72,168.19-17.73,250.45-.39C823.78,31,906.67,72,985.66,92.83c70.05,18.48,146.53,26.09,214.34,3V0H0V27.35A600.21,600.21,0,0,0,321.39,56.44Z" class="shape-fill"></path>
            </svg>
        </div>
        <div class="complete_text">It's all done!</div>
        <div class="icon">
            <i class="fa-solid fa-star star"></i>
            <i class="fa-solid fa-star star"></i>
            <i class="fa-solid fa-star star"></i>
            <i class="fa-solid fa-star star"></i>
            <i class="fa-solid fa-star star"></i>
        </div>
        <div class="score_text">
            <!-- score text goes here -->
        </div>
        <div class="buttons">
            <button class="restart">Replay Quiz</button>
            <button class="quit">Quit Quiz</button>
        </div>
    </div>
    <script src="../assets/script.js"></script>
    </body>
</html>