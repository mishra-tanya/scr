<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Learning Objective Test Results</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        .quiz-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .card-container {
            max-width: 600px;
            margin: 0 auto;
            margin-top: 20px;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .question {
            margin-bottom: 20px;
            /* border: 2px black solid; */
            padding: 20px;
        }

        .options {
            font-size: 20px;
        }

        .option {
            margin-right: 10px;
            margin-bottom: 10px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            cursor: pointer;
        }

        .option.selected {
            background-color: lightblue;
        }

        .correct {
            background-color: green;
            color: white;
            border: 5px double rgb(211, 211, 211);
        }

        .incorrect {
            background-color: #f44949;
            color: white;
            border: 5px double rgb(211, 211, 211);

        }

        .ya {
            padding: 10px;
            border-radius: 5px;
            color: white;
            border: 5px double rgb(211, 211, 211);

        }

        .ca {
            padding: 10px;
            background-color: green;
            border-radius: 5px;
            color: white;
            border: 5px double rgb(211, 211, 211);

        }

        .result {
            padding: 20px;
        }

        .correct-answer {
            display: inline-block;
            margin-top: 15px;
            font-size: 18px;
        }

        .number-line {
            display: flex;
            justify-content: center;
            margin: 20px;
            flex-wrap: wrap;
        }

        .number-line .number {
            margin: 5px;
            padding: 10px;
            border: 4px double rgb(211, 211, 211);
            ;
            border-radius: 20%;
            width: 40px;
            height: 40px;
            display: flex;
            justify-content: center;
            align-items: center;
            cursor: pointer;
        }

        .number-line .number.correct {
            background-color: green;
            color: white;
        }

        .number-line .number.incorrect {
            background-color: red;
            color: white;
        }

        .number-line .number.not-attempted {
            background-color: gray;
            color: white;
        }

        .question {
            margin-bottom: 20px;
            padding: 20px;
            display: none;
        }

        .question.active {
            display: block;
        }

        .question-number-list button.reviewed {
            background-color: #826201;
        }

        .number-line .number.correct {
            background-color: green;
            color: white;
        }

        .number-line .number.incorrect {
            background-color: red;
            color: white;
        }

        .number-line .number.not-attempted {
            background-color: gray;
            color: white;
        }

        @media(max-width:765px) {
            .card-container {
                max-width: 600px;
                margin: 20px;
                margin-top: 20px;
                padding: 20px;
                border: 1px solid #ccc;
                border-radius: 5px;

            }

            h2 {
                font-size: 30px;
                font-weight: bold;
            }
        }
    </style>
    <link rel="stylesheet" href="../../css/graph.css">
</head>

<body>
    @include('nav')
    <br><br>
    <br><br>
    <div class="text-center">
        <h2><b>Chapter: {{ substr($test, 7, 1) }}</b><span class="d-none d-md-inline">&nbsp;&nbsp;&nbsp;</span>
            <b class="d-block d-md-inline">Learning Objective: {{ substr($chapter_id, 3) }}</b>
        </h2>
<div class="row">
    <div class="col-md-2">

    </div>
    <div class="col-md-8">
        <b>{{$testName->title}}</b>
    </div>
</div>
    </div> <br>
    <h2 class="text-center"><b>Your Result</b></h2>
    <div class="card-container">
        <div class="card-div">
            <div class="">
                @php
                    $percentage = 0;
                    $remark = '';

                    if ($totalQuestions > 0) {
                        $percentage = ($correctAnswers / $totalQuestions) * 100;

                        if ($percentage >= 90) {
                            $remark = 'Excellent!';
                        } elseif ($percentage >= 80) {
                            $remark = 'Very Good!';
                        } elseif ($percentage >= 70) {
                            $remark = 'Good!';
                        } elseif ($percentage >= 60) {
                            $remark = 'Average!';
                        } else {
                            $remark = 'Needs Improvement!';
                        }
                    } else {
                        $remark = 'Give the test first to see the result!!';
                    }
                @endphp



                <h4 class="text-center"><strong> {{ $remark }}</strong></h4>
                <div class="row">
                    @if ($totalQuestions > 0)
                        <div class="col-lg-6 col-md-12 text-end">
                            <div
                                class="card-body d-flex flex-column justify-content-center align-items-center text-center">
                                <svg viewBox="0 0 36 36" class="circular-chart">
                                    <path class="circle-bg" d="M18 2.0845
                                a 15.9155 15.9155 0 0 1 0 31.831
                                a 15.9155 15.9155 0 0 1 0 -31.831" />
                                    <path id="circle" class="circle"
                                        stroke-dasharray="
                                {{ ($correctAnswers / $totalQuestions) * 100 }}
                                
                                , 100"
                                        d="M18 2.0845
                                a 15.9155 15.9155 0 0 1 0 31.831
                                a 15.9155 15.9155 0 0 1 0 -31.831" />
                                    <text x="18" y="20.35" class="percentage">{{ $correctAnswers }}
                                        / {{ $totalQuestions }}</text>
                                </svg>

                    @endif
                </div>
            </div>
            <div class="col-lg-6 col-md-12">
                <div class="result">
                    @if ($totalQuestions > 0)
                        <p><strong>Total Questions:</strong> {{ $totalQuestions }}</p>
                        <p><strong>Correct Answers:</strong> {{ $correctAnswers }}</p>
                        <p><strong>Incorrect Answers:</strong> {{ $totalQuestions - $correctAnswers }}</p>
                        <p><strong>Percentage:</strong>
                            {{ number_format(($correctAnswers / $totalQuestions) * 100, 2) }}%
                    @endif
                    </p>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
    <br>
    <div class="number-line">
        @foreach ($questions as $index => $question)
            @php
                $numberClass = '';
                if ($question['user_answer'] == '') {
                    $numberClass = 'not-attempted';
                } elseif ($question['user_answer'] == strtoupper($question['result_ans'])) {
                    $numberClass = 'correct';
                } else {
                    $numberClass = 'incorrect';
                }
            @endphp
            <div class="number {{ $numberClass }}" data-target="#question-{{ $index + 1 }}">{{ $index + 1 }}
            </div>
        @endforeach
    </div>
    <div class="quiz-container ">
        @foreach ($questions as $index => $question)
            <div id="question-{{ $index + 1 }}" class="question shadow-sm">
                <b>
                    <h4><strong>Question {{ $index + 1 }}:</strong></h4>
                </b>
                <h4 class="mb-3"><b>{!! nl2br(e($question['question_title'])) !!}</b></h4>
                <div class="options">
                    <div
                        class="option @if ($question['user_answer'] == 'A') @if ($question['user_answer'] == strtoupper($question['result_ans'])) correct @else incorrect @endif @endif">
                        <b>A:</b> {{ $question['option_a'] }}
                    </div>
                    <div
                        class="option @if ($question['user_answer'] == 'B') @if ($question['user_answer'] == strtoupper($question['result_ans']))  correct @else incorrect @endif @endif">
                        <b>B:</b> {{ $question['option_b'] }}
                    </div>
                    <div
                        class="option @if ($question['user_answer'] == 'C') @if ($question['user_answer'] == strtoupper($question['result_ans']))  correct @else incorrect @endif @endif">
                        <b>C:</b> {{ $question['option_c'] }}
                    </div>
                    <div
                        class="option @if ($question['user_answer'] == 'D') @if ($question['user_answer'] == strtoupper($question['result_ans'])) correct @else incorrect @endif @endif">
                        <b>D:</b> {{ $question['option_d'] }}
                    </div>
                </div><br>
                @if ($question['user_answer'] == '')
                    <span class="ya incorrect"><strong>Your Answer:</strong> Not Attempted</span>
                @else
                    <span class="ya @if ($question['user_answer'] == strtoupper($question['result_ans'])) correct @else incorrect @endif"><strong>Your
                            Answer:</strong> {{ $question['user_answer'] }}</span>
                @endif

                <div class=" d-sm-none">
                    <p class="correct-answer ca"style="width:auto;margin-top:15px; font-size:18px;"><strong
                            class="">Correct Answer:</strong> {{ ucfirst($question['result_ans']) }}</p>
                </div>
                <span class="ca d-none d-sm-inline">
                    <strong>Correct Answer:</strong> {{ ucfirst($question['result_ans']) }}
                </span><br><br>
                <span class="">
                    <strong>Reason :</strong> {{ $question['reason'] }}
                </span>
                <style>
                    .button {
                        width: 200px;
                        height: 50px;
                        border: 5px double rgb(211, 211, 211);
                        border-radius: 5px;
                        font-size: 18px;
                    }

                    #next {
                        background-color: #0056b3;
                        color: white;
                    }
                </style>
                <div style="display: flex; justify-content: end;">
                    <button id="next" class="button next-button" data-next="{{ $index + 2 }}">Next</button>
                </div>

            </div>
        @endforeach

    </div>
    @include('footer')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            let currentQuestionIndex = 0;
            const questions = document.querySelectorAll('.question');
            const nextButtons = document.querySelectorAll('.next-button');
            const numberLineNumbers = document.querySelectorAll('.number-line .number');

            function showQuestion(index) {
                questions.forEach((question, i) => {
                    question.classList.toggle('active', i === index);
                });
            }

            showQuestion(currentQuestionIndex);

            nextButtons.forEach((button, index) => {
                button.addEventListener('click', function() {
                    if (index + 1 < questions.length) {
                        currentQuestionIndex = index + 1;
                        showQuestion(currentQuestionIndex);
                    }
                });
            });

            numberLineNumbers.forEach(number => {
                number.addEventListener('click', function() {
                    currentQuestionIndex = parseInt(this.textContent) - 1;
                    showQuestion(currentQuestionIndex);
                });
            });
        });
    </script>
</body>

</html>
