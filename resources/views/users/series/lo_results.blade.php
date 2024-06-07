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
            <h2><b>Lesson: {{ substr($test, 7, 1) }}</b><span class="d-none d-md-inline">&nbsp;&nbsp;&nbsp;</span>
                <b class="d-block d-md-inline">Test Series: {{ substr($chapter_id, 3) }}</b>
            </h2>
     
    
        {{-- <h2><b>Chapter: {{ substr($chapter_id, 1, 1) }}</b><span class="d-none d-md-inline">&nbsp;&nbsp;&nbsp;</span>
            <b class="d-block d-md-inline">Test Series: {{ substr($chapter_id, 3, 1) }}</b>
        </h2> --}}
    </div> <br>
   <h2 class="text-center"><b>Your Result</b></h2><br>
  
    <br>
    <div class="quiz-container ">
            <div class=" " style="background-color: #d5ebfb">
                <div class="result row text-center mt-3"style="font-size: 23px;">
                    @if ($totalQuestions > 0)
                        <div class="col-md-3 col-sm-6" >
                            <p><strong>Total Questions:</strong> {{ $totalQuestions }}</p>
                        </div>
                        <div class="col-md-3 col-sm-6">
                            <p><strong>Correct Answers:</strong> {{ $correctAnswers }}</p>
                        </div>
                        <div class="col-md-3 col-sm-6">
                            <p><strong>Incorrect Answers:</strong> {{ $totalQuestions - $correctAnswers }}</p>
                        </div>
                        <div class="col-md-3 col-sm-6">
                            <p><strong>Percentage:</strong> {{ number_format(($correctAnswers / $totalQuestions) * 100, 2) }}%</p>
                        </div>
                    @endif
                </div>
            </div>
            <br>
        @foreach ($questions as $index => $question)
            <div id="question-{{ $index + 1 }}" class="question shadow-sm">
                <b>
                    <h4><strong>Question {{ $index + 1 }}:</strong></h4>
                </b>
                <h4 class="mb-3"><b>{{ $question['question_title'] }}</b></h4>
                <div class="options">
                    <div class="option @if ($question['user_answer'] == 'A') @if ($question['user_answer'] == strtoupper($question['result_ans'])) correct @else incorrect @endif @endif">
                        <b>A:</b> {{ $question['option_a'] }}
                    </div>
                    <div
                        class="option @if ($question['user_answer'] == 'B') @if ($question['user_answer'] ==  strtoupper($question['result_ans']))  correct @else incorrect @endif @endif">
                        <b>B:</b> {{ $question['option_b'] }}
                    </div>
                    <div
                        class="option @if ($question['user_answer'] == 'C') @if ($question['user_answer'] ==  strtoupper($question['result_ans']))  correct @else incorrect @endif @endif">
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
                    <strong>Reason :</strong> {{$question['reason'] }}
                </span>

            </div><br>
            <hr style= " height: 3px; 
            background-color: black; 
            border: none; "><br>
        @endforeach

    </div>
    @include('footer')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
