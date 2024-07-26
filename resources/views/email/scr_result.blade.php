<!DOCTYPE html>
<html>

<head>
    <title>SCR Test Result</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            color: black;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .container h2 {
            margin-top: 0;
        }

        .container p {
            margin: 5px 0;
        }

        .header {
            background-color: #f8f8f8;
            padding: 10px;
            border-bottom: 1px solid #ddd;
            border-radius: 10px 10px 0 0;
            text-align: center;
        }

        .content {
            padding: 20px;
            text-align: center;
        }

        .footer {
            background-color: #f8f8f8;
            padding: 10px;
            border-top: 1px solid #ddd;
            border-radius: 0 0 10px 10px;
            margin-top: 20px;
        }

        .content_details {
            margin: 0 auto;
            max-width: 60%;
            padding: 10px;
            border-bottom: 1px solid #ddd;
            border-top: 1px solid #ddd;
            border-radius: 20px;
        }

        @media(max-width:765px) {
            .content_details {
                margin: 0 auto;
                max-width: 80%;
                padding: 10px;
                border-bottom: 1px solid #ddd;
                border-top: 1px solid #ddd;
                border-radius: 20px;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <h1>SCR Preparation Module</h1>
            <h2>SCR Result</h2>
        </div>
        <div class="content">
            <h2>Test Result for {{ $user->first_name }} {{ $user->last_name }}</h2>
            <p>Yay! You have completed the test.</p>
            @php
                $percentage = round(($correctAnswers / $total_question) * 100);
                $remark = '';
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
            @endphp

            <h4>Test Performance: {{ $remark }}</h4>
        </div>

        <div class="content_details">
            @if (is_numeric($test))
            <p>Mock Test: {{ $test }}</p>
        @else
        {{-- {{dd($test)}} --}}
        @php
        function getChapter($test) {
            // Extract chapter number dynamically
            $matches = [];
            preg_match('/C(\d+)T/', $test, $matches);
            return $matches[1] ?? 'N/A';
        }

        function getTest($test) {
            // Extract test number dynamically
            $matches = [];
            preg_match('/T(\d+)/', $test, $matches);
            return $matches[1] ?? 'N/A';
        }
    @endphp
  {{-- {{  dd( getChapter($test),  getTest($test))}} --}}
               <p>Chapter: {{ getChapter($test) }}</p>
               <p>Test: {{ getTest($test) }}</p>
        @endif
        
            <p>Correct Answers: {{ $correctAnswers }}</p>
            <p>Total Questions: {{ $total_question }}</p>
            <p>Percentage: {{ round(($correctAnswers / $total_question) * 100) }}%</p>
        </div>

        <div class="footer content">
            <p>Thank you for participating!</p>
        </div>
    </div>
</body>

</html>
