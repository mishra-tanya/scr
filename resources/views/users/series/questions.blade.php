<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SCR Test Series </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <style>
        .quiz-container body {
            background-color: #f5f5f5;
            
        }

        .quiz-container {
            background-color: #fff;
            padding: 20px;
            font-size: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 1200px;
            margin: 20px auto;
        }

        .quiz-container .question-number-list {
            list-style: none;
            display: flex;
            justify-content: center;
            padding: 0;
            margin-bottom: 30px;

        }
         input[type="radio"] {
    /* Increase the size of the radio button */
    width: 16px;
    height: 16px;
         }

        .quiz-container .question-number-list li {
            margin: 0 10px;
        }

        /* Your CSS code */
        .question-number-list {
            list-style: none;
            display: flex;
            justify-content: center;
            padding: 0;
            margin-bottom: 20px;
        }

        .question-number-list li {
            margin: 0 5px;
        }

        .question-number-list button {
            padding: 10px;
            border: none;
            border-radius: 10%;
            /* Make it circular */
            width: 40px;
            /* Set a fixed width */
            height: 40px;
            /* Set a fixed height */
            background-color: #2487ce;
            /* Default blue color */
            color: #fff;
            cursor: pointer;
            border: 5px rgb(211, 211, 211) double;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .question-number-list button.active {
            background-color: #28A745;
        }

        .question-number-list button.reviewed {
            background-color: #826201;
            /* Blue color for reviewed button */
        }

        .quiz-container .question {
            margin-bottom: 20px;
        }

        .quiz-container .options {
            display: grid;
            gap: 10px;
        }

        .quiz-container .options button {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #f9f9f9;
            cursor: pointer;
        }

        .quiz-container .options button:hover {
            background-color: #e9e9e9;
        }

        .quiz-container .navigation {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
        }

        .quiz-container .navigation button {
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            background-color: #007bff;
            color: #fff;
            cursor: pointer;
        }

        .quiz-container .navigation button:hover {
            background-color: #0056b3;
        }

        @media screen and (max-width: 768px) {
            .quiz-container .question-number-list {
                list-style: none;
                display: flex;
                justify-content: center;
                padding: 0;
                margin-bottom: 30px;
                overflow-x: auto;
                flex-wrap: wrap;
            }

            .quiz-container .question-number-list li {
                width: 50px;
                margin: 5px;
            }

        }
    </style>
{{-- navbar --}}
    <div class="navbar">
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,300italic&subset=latin'
            rel='stylesheet' type='text/css'>
        <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
        <style>
            /* Googlefont Poppins CDN Link */
            /* @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap'); */
            * {
                margin: 0;
                padding: 0;
                box-sizing: border-box;
                font-family: 'Poppins', sans-serif;
            }

            body {
                min-height: 100vh;
            }

            nav {
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                height: 70px;
                background: #2487ce;
                box-shadow: 0 1px 2px rgba(0, 0, 0, 0.2);
                z-index: 99;
            }

            nav .navbar {
                height: 100%;
                max-width: 1250px;
                width: 100%;
                display: flex;
                align-items: center;
                justify-content: space-between;
                margin: auto;
                /* background: red; */
                padding: 0 50px;
            }

            .navbar .logo a {
                font-size: 30px;
                color: #fff;
                text-decoration: none;
                font-weight: 600;
            }

            nav .navbar .nav-links {
                line-height: 70px;
                height: 100%;
            }

            nav .navbar .links {
                display: flex;
            }

            nav .navbar .links li {
                position: relative;
                display: flex;
                align-items: center;
                justify-content: space-between;
                list-style: none;
                padding: 0 13px;
            }

            nav .navbar .links li a {
                height: 100%;
                text-decoration: none;
                white-space: nowrap;
                color: #fff;
                font-size: 15px;
                font-weight: 500;
            }

            .links li:hover .htmlcss-arrow,
            .links li:hover .js-arrow {
                transform: rotate(180deg);
            }

            nav .navbar .links li .arrow {
                /* background: red; */
                height: 100%;
                width: 22px;
                line-height: 70px;
                text-align: center;
                display: inline-block;
                color: #fff;
                transition: all 0.3s ease;
            }

            nav .navbar .links li .sub-menu {
                position: absolute;
                top: 70px;
                left: 0;
                line-height: 40px;
                background: #2487ce;
                box-shadow: 0 1px 2px rgba(0, 0, 0, 0.2);
                border-radius: 0 0 4px 4px;
                display: none;
                z-index: 2;
            }

            nav .navbar .links li:hover .htmlCss-sub-menu,
            nav .navbar .links li:hover .js-sub-menu {
                display: block;
            }

            .navbar .links li .sub-menu li {
                padding: 0 22px;
                border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            }

            .navbar .links li .sub-menu a {
                color: #fff;
                font-size: 15px;
                font-weight: 500;
            }

            .navbar .links li .sub-menu .more-arrow {
                line-height: 40px;
            }

            .navbar .links li .htmlCss-more-sub-menu {
                /* line-height: 40px; */
            }

            .navbar .links li .sub-menu .more-sub-menu {
                position: absolute;
                top: 0;
                left: 100%;
                border-radius: 0 4px 4px 4px;
                z-index: 1;
                display: none;
            }

            .links li .sub-menu .more:hover .more-sub-menu {
                display: block;
            }

            .navbar .search-box {
                position: relative;
                height: 40px;
                width: 40px;
            }

            .navbar .search-box i {
                position: absolute;
                height: 100%;
                width: 100%;
                line-height: 40px;
                text-align: center;
                font-size: 22px;
                color: #fff;
                font-weight: 600;
                cursor: pointer;
                transition: all 0.3s ease;
            }

            .navbar .search-box .input-box {
                position: absolute;
                right: calc(100% - 40px);
                top: 80px;
                height: 60px;
                width: 300px;
                background: #2487ce;
                border-radius: 6px;
                opacity: 0;
                pointer-events: none;
                transition: all 0.4s ease;
            }

            .navbar.showInput .search-box .input-box {
                top: 65px;
                opacity: 1;
                pointer-events: auto;
                background: #2487ce;
            }

            .search-box .input-box::before {
                content: '';
                position: absolute;
                height: 20px;
                width: 20px;
                background: #2487ce;
                right: 10px;
                top: -6px;
                transform: rotate(45deg);
            }

            .search-box .input-box input {
                position: absolute;
                top: 50%;
                left: 50%;
                border-radius: 4px;
                transform: translate(-50%, -50%);
                height: 35px;
                width: 280px;
                outline: none;
                padding: 0 15px;
                font-size: 16px;
                border: none;
            }

            .navbar .nav-links .sidebar-logo {
                display: none;
            }

            .navbar .bx-menu {
                display: none;
            }

            @media (max-width:920px) {
                nav .navbar {
                    max-width: 100%;
                    padding: 0 25px;
                }

                nav .navbar .logo a {
                    font-size: 27px;
                }

                nav .navbar .links li {
                    padding: 0 10px;
                    white-space: nowrap;
                }

                nav .navbar .links li a {
                    font-size: 15px;
                }
            }

            @media (max-width:800px) {
                nav {
                    /* position: relative; */
                }

                .navbar .bx-menu {
                    display: block;
                }

                nav .navbar .nav-links {
                    position: fixed;
                    top: 0;
                    left: -100%;
                    display: block;
                    max-width: 270px;
                    width: 100%;
                    background: #2487ce;
                    line-height: 40px;
                    padding: 20px;
                    box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
                    transition: all 0.5s ease;
                    z-index: 1000;
                }

                .navbar .nav-links .sidebar-logo {
                    display: flex;
                    align-items: center;
                    justify-content: space-between;
                }

                .sidebar-logo .logo-name {
                    font-size: 25px;
                    color: #fff;
                }

                .sidebar-logo i,
                .navbar .bx-menu {
                    font-size: 25px;
                    color: #fff;
                }

                nav .navbar .links {
                    display: block;
                    margin-top: 20px;
                }

                nav .navbar .links li .arrow {
                    line-height: 40px;
                }

                nav .navbar .links li {
                    display: block;
                }

                nav .navbar .links li .sub-menu {
                    position: relative;
                    top: 0;
                    box-shadow: none;
                    display: none;
                }

                nav .navbar .links li .sub-menu li {
                    border-bottom: none;

                }

                .navbar .links li .sub-menu .more-sub-menu {
                    display: none;
                    position: relative;
                    left: 0;
                }

                .navbar .links li .sub-menu .more-sub-menu li {
                    display: flex;
                    align-items: center;
                    justify-content: space-between;
                }

                .links li:hover .htmlcss-arrow,
                .links li:hover .js-arrow {
                    transform: rotate(0deg);
                }

                .navbar .links li .sub-menu .more-sub-menu {
                    display: none;
                }

                .navbar .links li .sub-menu .more span {
                    display: flex;
                    align-items: center;
                }

                .links li .sub-menu .more:hover .more-sub-menu {
                    display: none;
                }

                nav .navbar .links li:hover .htmlCss-sub-menu,
                nav .navbar .links li:hover .js-sub-menu {
                    display: none;
                }

                .navbar .nav-links.show1 .links .htmlCss-sub-menu,
                .navbar .nav-links.show3 .links .js-sub-menu,
                .navbar .nav-links.show2 .links .more .more-sub-menu {
                    display: block;
                }

                .navbar .nav-links.show1 .links .htmlcss-arrow,
                .navbar .nav-links.show3 .links .js-arrow {
                    transform: rotate(180deg);
                }

                .navbar .nav-links.show2 .links .more-arrow {
                    transform: rotate(90deg);
                }
            }

            @media (max-width:370px) {
                nav .navbar .nav-links {
                    max-width: 100%;
                }
            }
        </style>


        <nav>
            <div class="navbar">
                <i class='bx bx-menu'></i>
                <div class="logo"><a href="#">SCR</a></div>
                <div class="nav-links">
                    <div class="sidebar-logo">
                        <span class="logo-name">SCR</span>
                        <i class='bx bx-x'></i>
                    </div>
                    <ul class="links">
                        <li><a href="/">Home</a></li>
                        <li><a href="/home">Dashboard</a></li>
                        <li><a href="/home">SCR Dashboard</a></li>


                    </ul>
                </div>
               
            </div>
        </nav>
        <script>
            let navbar = document.querySelector(".navbar");
           
            let navLinks = document.querySelector(".nav-links");
            let menuOpenBtn = document.querySelector(".navbar .bx-menu");
            let menuCloseBtn = document.querySelector(".nav-links .bx-x");
            menuOpenBtn.onclick = function() {
                navLinks.style.left = "0";
            }
            menuCloseBtn.onclick = function() {
                navLinks.style.left = "-100%";
            }


            let htmlcssArrow = document.querySelector(".htmlcss-arrow");
            htmlcssArrow.onclick = function() {
                navLinks.classList.toggle("show1");
            }
            let moreArrow = document.querySelector(".more-arrow");
            moreArrow.onclick = function() {
                navLinks.classList.toggle("show2");
            }
            let jsArrow = document.querySelector(".js-arrow");
            jsArrow.onclick = function() {
                navLinks.classList.toggle("show3");
            }
        </script>

    </div>

    <br><br>
   
    <div class="quiz-container">
      <div class="ch text-center" style="font-size: 25px;">
        <b class="">Chapter: {{  $ch_no = substr($chapter_id, 7);}}</b>
      </div>
        
        <hr style=" border: 3px solid #2487ce;
        border-radius: 100%;
        border-top: 1px dotted #000000;">
        <ul class="question-number-list">
         
            @foreach ($questions as $key => $question)
                <li><button class="{{ $key === 0 ? 'active' : '' }}{{ $question->reviewed ? ' reviewed' : '' }} "
                        data-index="{{ $key }}">{{ $key + 1 }}</button></li>
            @endforeach
        </ul>

        <hr style=" border: 3px solid #2487ce;
        border-radius: 100%;
        border-top: 1px dotted #000000;">
<br>
        <div class="question">
            @foreach ($questions as $key => $question)
                <div class="question-block{{ $key === 0 ? ' active' : '' }}" id="question-{{ $key }}">
                    <h3>
                        <b>Question {{ $key + 1 }}.</b>
                    </h3>
                    <h4><b>{!! nl2br(e($question->question_title)) !!}</b></h4>

                    <hr>
                            <label><b>A. </b>
                                <input type="radio" name="selected_option_{{ $key }}" value="A">
                                {{ $question->option_a }}
                            </label>
                            <hr>
                            <label><b>B. </b>
                                <input type="radio" name="selected_option_{{ $key }}" value="B">
                                {{ $question->option_b }}
                            </label>
                            <hr>
                            <label><b>C. </b>
                                <input type="radio" name="selected_option_{{ $key }}" value="C">
                                {{ $question->option_c }}
                            </label>
                            <hr>
                            <label><b>D. </b>
                                <input type="radio" name="selected_option_{{ $key }}" value="D">
                                {{ $question->option_d }}
                            </label>
                            <hr><br><br>
                    <button class="mark-review-btn btn btn-success" data-index="{{ $key }}">Mark for Review</button>
                </div>
            @endforeach
        </div>

        <div class="navigation">
            {{-- <button id="previous">Previous</button> --}}
            <button id="save" style="font-size: 15px;">Save Response</button>
            <button id="next" style="font-size: 15px;">Next</button>
        </div>
    </div>
    <script>
      

        document.addEventListener('DOMContentLoaded', function() {
            const questions = document.querySelectorAll('.question-block');
            const questionButtons = document.querySelectorAll('.question-number-list button');
            const nextButton = document.getElementById('next');
            let currentQuestionIndex = 0;

            function showQuestion(index) {
                questions.forEach(question => {
                    question.style.display = 'none';
                });
                questions[index].style.display = 'block';
                currentQuestionIndex = index;
                updateQuestionNumberButtonColors();
                updateNavigationButtons();
            }

            function updateQuestionNumberButtonColors() {
                questionButtons.forEach((button, index) => {
                    button.classList.remove('active');
                    button.classList.remove('reviewed');
                    if (index === currentQuestionIndex) {
                        button.classList.add('active');
                    } else if (questions[index].classList.contains('reviewed')) {
                        button.classList.add('reviewed');
                    }
                });
            }

            function updateNavigationButtons() {
                if (currentQuestionIndex === questions.length - 1) {
                    nextButton.textContent = 'Submit';
                } else {
                    nextButton.textContent = 'Next';
                }
            }

            showQuestion(currentQuestionIndex); 

            questionButtons.forEach((button, index) => {
                button.addEventListener('click', () => {
                    showQuestion(index);
                });
            });

            // document.getElementById('previous').addEventListener('click', () => {
            //     if (currentQuestionIndex > 0) {
            //         showQuestion(currentQuestionIndex - 1);
            //     }
            // });

            nextButton.addEventListener('click', () => {
                if (currentQuestionIndex < questions.length - 1) {
                    showQuestion(currentQuestionIndex + 1);
                } else {
                    console.log('Submitting...');
                }
            });

            document.querySelectorAll('.mark-review-btn').forEach(button => {
                button.addEventListener('click', () => {
                    button.classList.toggle('reviewed');
                    questions[currentQuestionIndex].classList.toggle('reviewed');
                    updateQuestionNumberButtonColors();
                });
            });
        });
    </script>
</body>

</html>
