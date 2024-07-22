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
            width: 16px;
            height: 16px;
        }

        .quiz-container .question-number-list li {
            margin: 0 10px;
        }

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
            width: 40px;
            height: 40px;
            background-color: #2487ce;
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
            background-color: #826201 !important;
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

        .quiz-container .question-number-list {
            list-style: none;
            display: flex;
            justify-content: center;
            padding: 0;
            margin-bottom: 30px;
            overflow-x: auto;
            flex-wrap: wrap;
            /* margin: 30px; */
        }

        .button {
            width: 220px;
            height: 50px;
            border: 5px double rgb(211, 211, 211);
            border-radius: 5px;
        }

        .mark-review-btn {
            color: white;
            background-color: #826201;
        }

        #submit_test {
            background-color: #28A745;
            color: white;
        }

        #next {
            background-color: #0056b3;
            color: white;
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

            .mark-review-btn {
                font-size: 18px;
                max-width:195px;
            }

            #submit_test {
                font-size: 18px;
                max-width: 124px;
                margin-bottom: 22px;
            }

            #next {
                font-size: 18px;
                max-width: 95px;
            }

        }

        .loader {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(255, 255, 255, 0.8);
            z-index: 9999;
        }

        .spinner {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            border: 16px solid #f3f3f3;
            border-radius: 50%;
            border-top: 16px solid #3498db;
            width: 120px;
            height: 120px;
            animation: spin 2s linear infinite;
        }

        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }

        .question-number-list button.answered {
            background-color: darkgreen;
           border-radius: 50%;
           padding: 10px;
        }

        /* Responsive adjustments for smaller screens */
        @media screen and (max-width: 600px) {
            .spinner {
                width: 60px;
                height: 60px;
                border-width: 8px;
            }
        }
        
.logo{
  margin-right:700px;
}
@media (max-width:370px){
  nav .navbar .nav-links{
  max-width: 100%;
} 
}

@media (max-width:1024px){
.logo{
  margin-right:0px;
}
}

.image-logo{
  width: 100px;
  height: auto;
}
    </style>
    {{-- navbar --}}
    <div class="navbar">
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,300italic&subset=latin'
            rel='stylesheet' type='text/css'>
        <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
        <link rel="stylesheet" href="../../css/home.css">
        <nav>
            <div class="navbar">
                <i class='bx bx-menu'></i>
                <img class="image-logo" src="/assets/img/scr2.png" alt="">
                <div class="logo" >
                  <a href="#" >SCR </a></div>
                <div class="nav-links">
                  <div class="sidebar-logo">
                    <i class='bx bx-x' ></i>
                  </div>
                    <ul class="links">
                        <li><a href="/">Home</a></li>
                        {{-- <li><a href="/home">Dashboard</a></li> --}}
                        <li><a href="/scr_questions">SCR Dashboard</a></li>


                    </ul>
                </div>

            </div>
        </nav>
    </div>
    <script src="../../js/script.js"></script>
    <br><br>

    <form action={{ route('submitquiz') }} method="post">
        @csrf
        <div class="quiz-container">
            <div class="ch text-center" style="font-size: 25px;">
                <div class="loader" id="loader">
                    <div class="spinner"></div>
                </div>
                @if ($test_type === 'mock')
                    <b class="">Mock Test: {{ $ch_no = substr($chapter_id, 9) }}</b>
                @else
                    <p class=""><b>Chapter: {{ $ch_no = substr($chapter_id, 7) }}</b></p>

                    @php
                        function extractChapterAndTest($test)
                        {
                            if (preg_match('/C(\d+)T(\d+)/', $test, $matches)) {
                                return ' Test Series: ' . $matches[2];
                            }
                            return 'Invalid format';
                        }
                    @endphp
                    <p class=""> {{ $ch_no = extractChapterAndTest($test) }}</p>
                @endif
            </div>
            @if ($test_type === 'mock')
                <input type="hidden" name="chapter_id" value={{ $chapter_id }}>
                <input type="hidden" name="test" value={{ $test }}>
            @else
                <input type="hidden" name="chapter_id" value={{ $chapter_id }}>
                <input type="hidden" name="test" value={{ $test }}>
            @endif

            {{-- <input type="hidden" name="user_id" value={{ Auth::user()->id }}> --}}
            {{-- {{ $test }}{{ Auth::user()->id }} --}}

            <hr
                style=" border: 3px solid #2487ce;
            border-radius: 100%;
            border-top: 1px dotted #000000;">
            <ul class="question-number-list">

                {{-- @foreach ($questions as $key => $question)
                <li><button class="{{ $key === 0 ? 'active' : '' }}{{ $question->reviewed ? ' reviewed' : '' }} "
                        data-index="{{ $key }}">{{ $key + 1 }}</button></li>
            @endforeach
            @foreach ($mockQuestions as $key => $question)
            <li><button class="{{ $key === 0 ? 'active' : '' }}{{ $question->reviewed ? ' reviewed' : '' }} "
                    data-index="{{ $key }}">{{ $key + 1 }}</button></li>
        @endforeach --}}
                @foreach ($questions ?? [] as $key => $question)
                    <li><button
                            class=" my-2 {{ $key === 0 ? 'active' : '' }}{{ $question->reviewed ? ' reviewed' : '' }} "
                            data-index="{{ $key }}">{{ $key + 1 }}</button></li>
                @endforeach

                @if ($test === 'mock')
                    @foreach ($mockQuestions ?? [] as $key => $question)
                        <li><button
                                class="my-2 {{ $key === 0 ? 'active' : '' }}{{ $question->reviewed ? ' reviewed' : '' }} "
                                data-index="{{ $key }}">{{ $key + 1 }}</button></li>
                    @endforeach
                @endif

            </ul>

            <hr
                style=" border: 3px solid #2487ce;
            border-radius: 100%;
            border-top: 1px dotted #000000;">
            <br>
            <div style="display: flex; justify-content: end;" class="mb-3">
                <button onclick="submitForm()" type="submit"
                    class="button mx-2 {{ session('existingResult') ? 'disabled' : '' }}" id="submit_test">Submit
                    Test</button>
            </div>
            <div class="question">
                @foreach ($questions ?? [] as $key => $question)
                    <div class="question-block{{ $key === 0 ? ' active' : '' }}" id="question-{{ $key }}">
                        <h3><b>Question {{ $key + 1 }}.</b></h3>
                        <h4><b>{!! nl2br(e($question->question_title)) !!}</b></h4>
                        <hr>
                        <label><b>A. </b>
                            <input type="radio" id="question-{{ $key }}-A"
                                name="results[{{ $key }}][user_answer]" value="A">
                            {{ $question->option_a }}
                        </label>
                        <hr>
                        <label><b>B. </b>
                            <input type="radio" id="question-{{ $key }}-B"
                                name="results[{{ $key }}][user_answer]" value="B">
                            {{ $question->option_b }}
                        </label>
                        <hr>
                        <label><b>C. </b>
                            <input type="radio" id="question-{{ $key }}-C"
                                name="results[{{ $key }}][user_answer]" value="C">
                            {{ $question->option_c }}
                        </label>
                        <hr>
                        <label><b>D. </b>
                            <input type="radio" id="question-{{ $key }}-D"
                                name="results[{{ $key }}][user_answer]" value="D">
                            {{ $question->option_d }}
                        </label>
                        <input type="hidden" name="results[{{ $key }}][question_id]"
                            value="{{ $question->id }}">
                        <input type="hidden" name="results[{{ $key }}][result_ans]"
                            value="{{ $question->result_ans }}">
                        <hr><br><br>
                        <div class="marks">
                            <button class="mx-2 mark-review-btn button" data-index="{{ $key }}"
                                onclick="toggleCheckbox(this)">
                                <input type="hidden" class="checkbox">
                                <span class="button-text">Mark for Review</span>
                            </button>
                        </div>
                    </div>
                @endforeach


                @if ($test_type === 'mock')
                    @foreach ($mockQuestions ?? [] as $key => $question)
                        <div class="question-block{{ $key === 0 ? ' active' : '' }}"
                            id="mock-question-{{ $key }}">
                            <h3>
                                <b>Question {{ $key + 1 }}.</b>
                            </h3>
                            <h4><b>{!! nl2br(e($question->question_title)) !!}</b></h4>

                            <hr>
                            <label><b>A. </b>
                                <input type="radio" id="question-{{ $key }}-A"
                                    name="results[{{ $key }}][user_answer]" value="A">
                                {{ $question->option_a }}
                            </label>
                            <hr>
                            <label><b>B. </b>
                                <input type="radio" id="question-{{ $key }}-B"
                                    name="results[{{ $key }}][user_answer]" value="B">
                                {{ $question->option_b }}
                            </label>
                            <hr>
                            <label><b>C. </b>
                                <input type="radio" id="question-{{ $key }}-C"
                                    name="results[{{ $key }}][user_answer]" value="C">
                                {{ $question->option_c }}
                            </label>
                            <hr>
                            <label><b>D. </b>
                                <input type="radio" id="question-{{ $key }}-D"
                                    name="results[{{ $key }}][user_answer]" value="D">
                                {{ $question->option_d }}
                            </label>
                            <input type="hidden" name="results[{{ $key }}][question_id]"
                                value="{{ $question->id }}">
                            <input type="hidden" name="results[{{ $key }}][result_ans]"
                                value="{{ $question->result_ans }}">

                            <hr><br><br>
                            <div class="marks">
                                <button class="mx-2 mark-review-btn button" data-index="{{ $key }}"
                                    onclick="toggleCheckbox(this)">
                                    <input type="hidden" class="checkbox">
                                    <span class="button-text">Mark for Review</span>
                                </button>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>



            {{-- {{ $existingResult ? 'Already Submitted' : 'Submit Test' }} --}}

            <div style="display: flex; justify-content: end;">
                {{-- <button id="previous">Previous</button> --}}

                <button id="next" class="button mx-2"
                    style="
                    position: relative;
                    top: -70px;">Next</button>
            </div>


        </div>
    </form>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const questions = document.querySelectorAll('.question-block');
            const questionButtons = document.querySelectorAll('.question-number-list button');
            const nextButton = document.getElementById('next');
            const submit_test = document.getElementById('submit_test');
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
                    nextButton.style.display = 'none';
                    // submit_test.style.display='block';
                } else {
                    nextButton.textContent = 'Next';
                    nextButton.style.display = 'block';
                    // submit_test.style.display='none';
                }
            }

            showQuestion(currentQuestionIndex);

            questionButtons.forEach((button, index) => {
                button.addEventListener('click', () => {
                    event.preventDefault();
                    showQuestion(index);
                });
            });

            // document.getElementById('previous').addEventListener('click', () => {
            //     if (currentQuestionIndex > 0) {
            //         showQuestion(currentQuestionIndex - 1);
            //     }
            // });

            nextButton.addEventListener('click', () => {
                event.preventDefault();
                if (currentQuestionIndex < questions.length - 1) {
                    showQuestion(currentQuestionIndex + 1);
                } else {
                    console.log('Submitting...');
                }
            });

            document.querySelectorAll('.mark-review-btn').forEach(button => {
                button.addEventListener('click', () => {
                    event.preventDefault();
                    button.classList.toggle('reviewed');
                    questions[currentQuestionIndex].classList.toggle('reviewed');
                    updateQuestionNumberButtonColors();
                });
            });

            document.querySelectorAll('input[type="radio"]').forEach(radio => {
                radio.addEventListener('change', function() {
                    const questionIndex = parseInt(this.id.split('-')[1]);
                    questionButtons[questionIndex].classList.add('answered');
                    updateQuestionNumberButtonColors();
                });
            });

        });

        function toggleCheckbox(button) {
            var checkbox = button.querySelector('.checkbox');
            var buttonText = button.querySelector('.button-text');
            checkbox.value = checkbox.value === "1" ? "0" : "1";

            if (checkbox.value === "1") {
                buttonText.innerText = 'Remove from Review';
            } else {
                buttonText.innerText = 'Mark for Review';
            }
        }
    </script>
    <script>
        function submitForm() {
            document.getElementById('loader').style.display = 'block';
        }

        document.addEventListener('DOMContentLoaded', function() {
            document.getElementById('loader').style.display = 'none';
        });
    </script>

</body>

</html>
