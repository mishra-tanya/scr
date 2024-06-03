<?php
namespace App\Http\Controllers;

use App\Models\Result;
use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class ResultController extends Controller
{
    public function getResult( $chapter_id)
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'You need to log in first.');
        }
        $user_id = Auth::user()->id;
        $results = Result::where('user_id', $user_id)
                        ->where('chapter_id', $chapter_id)
                        ->get();

        $questions = [];
        $totalQuestions = 0;
        $correctAnswers = 0;

        foreach ($results as $result) {
            $testSeries = json_decode($result->test_series, true);
            foreach ($testSeries as $item) {
                $question = Question::where('question_no', $item['question_id'])->first();
                if ($question) {
                    $questions[] = [
                        'question_title' => $question->question_title,
                        'option_a' => $question->option_a,
                        'option_b' => $question->option_b,
                        'option_c' => $question->option_c,
                        'option_d' => $question->option_d,
                        'reason' => $question->reason,
                        'user_answer' => $item['user_answer'],
                        'correct_answer' => $item['correct_answer']
                    ];
                    $totalQuestions++;
                    if ($item['user_answer'] == $item['correct_answer']) {
                        $correctAnswers++;
                    }
                }
            }
        }

        return view('users.series.results', [
            'chapter_id'=>$chapter_id,
            'questions' => $questions,
            'totalQuestions' => $totalQuestions,
            'correctAnswers' => $correctAnswers
        ]);
    }
}
