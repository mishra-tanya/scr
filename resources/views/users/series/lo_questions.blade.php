<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Learning Objective</title>
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

        /* input[type="radio"] {
            width: 16px;
            height: 16px;
        } */

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
            padding: 15px;
            border: none;
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
            background-color: #826201;
        }

        .quiz-container .question {
            margin-bottom: 20px;
        }

        .button {
            width: 220px;
            height: 50px;
            border: 7px double rgb(211, 211, 211);
            /* border-radius: 5px; */
        }

        #submit_test {
            background-color: #28A745;
            color: white;
        }

        #next {
            background-color: #0056b3;
            color: white;
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
            background-color: #e9e9f9;
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

        .mark-review-btn {
            color: white;
            background-color: #826201;
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
    position: fixed;
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

/* Responsive adjustments for smaller screens */
@media screen and (max-width: 600px) {
    .spinner {
        width: 60px;
        height: 60px;
        border-width: 8px;
    }
}

    </style>
    @include('nav')
    </div>

    <br><br>
    <div class="loader" id="loader">
        <div class="spinner"></div>
    </div>
    <form id="testForm" action={{ route('lo_submit') }} method="post">
        @csrf
        <div class="quiz-container">


            <div class="ch text-center" style="font-size: 25px;">
                <b class="">Lesson: {{ $ch_no = substr($test, 7) }}</b>
            </div>
            <input type="hidden" name="chapter_id" value={{ $chapter_id }}>
            <input type="hidden" name="test" value={{ $test }}>

            {{-- <input type="hidden" name="user_id" value={{ Auth::user()->id }}> --}}
            {{-- {{ $test }}{{ Auth::user()->id }} --}}

            <hr style="border: 3px solid #28A745; border-radius: 100%; border-top: 1px dotted #000000;">
            <ul class="question-number-list">
                @foreach ($questions ?? [] as $key => $question)
                    <li><button
                            class="my-2 {{ $key === 0 ? 'active' : '' }}{{ $question->reviewed ? ' reviewed' : '' }}"
                            data-index="{{ $key }}">{{ $key + 1 }}</button></li>
                @endforeach
            </ul>
            <hr style="border: 3px solid #2487ce; border-radius: 100%; border-top: 1px dotted #000000;">
            <div style="display: flex; justify-content: end; " class="mb-3">
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
                        <div class="row">
                            <div class="col-12 col-md-6 mb-3">
                                <label class="d-flex align-items-center">
                                    <b>A. </b>
                                    <input type="radio" name="results[{{ $key }}][user_answer]"
                                        value="A" class="ms-2">
                                    <span class="ms-2">{{ $question->option_a }}</span>
                                </label>
                            </div>
                            <div class="col-12 col-md-6 mb-3">
                                <label class="d-flex align-items-center">
                                    <b>B. </b>
                                    <input type="radio" name="results[{{ $key }}][user_answer]"
                                        value="B" class="ms-2">
                                    <span class="ms-2">{{ $question->option_b }}</span>
                                </label>
                            </div>
                            <div class="col-12">
                            </div>
                            <div class="col-12 col-md-6 mb-3">
                                <label class="d-flex align-items-center">
                                    <b>C. </b>
                                    <input type="radio" name="results[{{ $key }}][user_answer]"
                                        value="C" class="ms-2">
                                    <span class="ms-2">{{ $question->option_c }}</span>
                                </label>
                            </div>
                            <div class="col-12 col-md-6 mb-3">
                                <label class="d-flex align-items-center">
                                    <b>D. </b>
                                    <input type="radio" name="results[{{ $key }}][user_answer]"
                                        value="D" class="ms-2">
                                    <span class="ms-2">{{ $question->option_d }}</span>
                                </label>
                            </div>
                        </div>

                        <input type="hidden" name="results[{{ $key }}][question_id]"
                            value="{{ $question->id }}">
                        <input type="hidden" name="results[{{ $key }}][result_ans]"
                            value="{{ $question->result_ans }}">
                        <hr><br>
                        <div class="marks">
                            <button class="mx-2 mark-review-btn button" data-index="{{ $key }}"
                                onclick="toggleCheckbox(this, event)">
                                <input type="hidden" class="checkbox" value="0">
                                <span class="button-text">Mark for Review</span>
                            </button>
                        </div>
                    </div>
                @endforeach
            </div>
            <div style="display: flex; justify-content: end;">
                <button id="next" class="button mx-2">Next</button>
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
                } else {
                    nextButton.textContent = 'Next';
                    nextButton.style.display = 'block';
                }
            }

            showQuestion(currentQuestionIndex);

            questionButtons.forEach((button, index) => {
                button.addEventListener('click', (event) => {
                    event.preventDefault();
                    showQuestion(index);
                });
            });

            nextButton.addEventListener('click', (event) => {
                event.preventDefault();
                if (currentQuestionIndex < questions.length - 1) {
                    showQuestion(currentQuestionIndex + 1);
                } else {
                    console.log('Submitting...');
                }
            });

            document.querySelectorAll('.mark-review-btn').forEach(button => {
                button.addEventListener('click', (event) => {
                    event.preventDefault();
                    button.classList.toggle('reviewed');
                    const questionIndex = button.getAttribute('data-index');
                    questions[questionIndex].classList.toggle('reviewed');
                    updateQuestionNumberButtonColors();
                });
            });
        });

        function toggleCheckbox(button, event) {
            event.preventDefault();
            const checkbox = button.querySelector('.checkbox');
            const buttonText = button.querySelector('.button-text');
            checkbox.value = checkbox.value === "1" ? "0" : "1";

            if (checkbox.value === "1") {
                buttonText.innerText = 'Remove from Review';
                button.classList.add('reviewed');
            } else {
                buttonText.innerText = 'Mark for Review';
                button.classList.remove('reviewed');
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
