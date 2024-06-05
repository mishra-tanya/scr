<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SCR Test Results</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        .quiz-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
            /* border: 1px solid #ccc; */
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
            border: 2px black solid;
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
        @if (is_numeric($chapter_id))
        <h2><b>Mock Test: {{$chapter_id}}</b><span class="d-none d-md-inline"></span></h2>
    @else
        @if (preg_match('/[A-Za-z][0-9][A-Za-z][0-9]/', $chapter_id))
            <h2><b>Chapter: {{ substr($chapter_id, 1, 1) }}</b><span class="d-none d-md-inline">&nbsp;&nbsp;&nbsp;</span>
                <b class="d-block d-md-inline">Test Series: {{ substr($chapter_id, 3, 1) }}</b>
            </h2>
        @else
            <h2><b>Invalid Chapter ID: {{$chapter_id}}</b></h2>
        @endif
    @endif
    
        {{-- <h2><b>Chapter: {{ substr($chapter_id, 1, 1) }}</b><span class="d-none d-md-inline">&nbsp;&nbsp;&nbsp;</span>
            <b class="d-block d-md-inline">Test Series: {{ substr($chapter_id, 3, 1) }}</b>
        </h2> --}}
    </div> <br>
    <h2 class="text-center"><b>Your Result</b></h2>

    <div class="card-container">
        <div class="card-div">
            <div class="">
                @php
                $percentage = 0;
                $remark = '';
            
                if($totalQuestions > 0) {
                    $percentage = ($correctAnswers / $totalQuestions) * 100;
            
                    if ($percentage >= 90) {
                        $remark = 'Excellent!';
                    } elseif ($percentage >= 75) {
                        $remark = 'Good job!';
                    } elseif ($percentage >= 50) {
                        $remark = 'Not bad!';
                    } else {
                        $remark = 'Keep practicing!';
                    }
                } else {
                    $remark = 'Give the test first to see the result!!';
                }
            @endphp
            
                   
                   
                <h4 class="text-center"><strong> {{ $remark }}</strong></h4>
                <div class="row">
                    @if ($totalQuestions > 0)
                    <div class="col-lg-6 col-md-12 text-end">
                        <div class="card-body d-flex flex-column justify-content-center align-items-center text-center">
                            <svg viewBox="0 0 36 36" class="circular-chart">
                                <path class="circle-bg" d="M18 2.0845
                                    a 15.9155 15.9155 0 0 1 0 31.831
                                    a 15.9155 15.9155 0 0 1 0 -31.831" />
                                <path id="circle" class="circle"
                                    stroke-dasharray="
                                    {{ ($correctAnswers / $totalQuestions) * 100 }}
                                    
                                    , 100" d="M18 2.0845
                                    a 15.9155 15.9155 0 0 1 0 31.831
                                    a 15.9155 15.9155 0 0 1 0 -31.831" />
                                <text x="18" y="20.35" class="percentage">{{ $correctAnswers }}
                                    /{{ $totalQuestions }}</text>
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
                } elseif ($question['user_answer'] == $question['correct_answer']) {
                    $numberClass = 'correct';
                } else {
                    $numberClass = 'incorrect';
                }
            @endphp
            <div class="number {{ $numberClass }}" data-target="#question-{{ $index + 1 }}">{{ $index + 1 }}
            </div>
        @endforeach
    </div>
    <div class="quiz-container">
        @foreach ($questions as $index => $question)
            <div id="question-{{ $index + 1 }}" class="question shadow-lg">
                <b>
                    <h4><strong>Question {{ $index + 1 }}:</strong></h4>
                </b>
                <h4 class="mb-3"><b>{{ $question['question_title'] }}</b></h4>
                <div class="options">
                    <div
                        class="option @if ($question['user_answer'] == 'A') @if ($question['user_answer'] == $question['correct_answer']) correct @else incorrect @endif @endif">
                        <b>A:</b> {{ $question['option_a'] }}
                    </div>
                    <div
                        class="option @if ($question['user_answer'] == 'B') @if ($question['user_answer'] == $question['correct_answer']) correct @else incorrect @endif @endif">
                        <b>B:</b> {{ $question['option_b'] }}
                    </div>
                    <div
                        class="option @if ($question['user_answer'] == 'C') @if ($question['user_answer'] == $question['correct_answer']) correct @else incorrect @endif @endif">
                        <b>C:</b> {{ $question['option_c'] }}
                    </div>
                    <div
                        class="option @if ($question['user_answer'] == 'D') @if ($question['user_answer'] == $question['correct_answer']) correct @else incorrect @endif @endif">
                        <b>D:</b> {{ $question['option_d'] }}
                    </div>
                </div><br>
                @if ($question['user_answer'] == '')
                    <span class="ya incorrect"><strong>Your Answer:</strong> Not Attempted</span>
                @else
                    <span class="ya @if ($question['user_answer'] == $question['correct_answer']) correct @else incorrect @endif"><strong>Your
                            Answer:</strong> {{ $question['user_answer'] }}</span>
                @endif

                <div class=" d-sm-none">
                    <p class="correct-answer ca"style="width:auto;margin-top:15px; font-size:18px;"><strong
                            class="">Correct Answer:</strong> {{ $question['correct_answer'] }}</p>
                </div>
                <span class="ca d-none d-sm-inline">
                    <strong>Correct Answer:</strong> {{ $question['correct_answer'] }}
                </span>
                <p><strong><br>Reason:</strong> {{ $question['reason'] }}</p>

            </div><br>
            <hr style="height: 20px;"><br>
        @endforeach

    </div>
    @include('footer')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.querySelectorAll('.number-line .number').forEach(number => {
            number.addEventListener('click', function() {
                document.querySelector(this.dataset.target).scrollIntoView({
                    behavior: 'smooth'
                });
                document.querySelectorAll('.number-line .number').forEach(num => num.classList.remove(
                    'active'));
                this.classList.add('active');
            });
        });
    </script>
</body>

</html>
