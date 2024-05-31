<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Question; 
use App\Models\Result; 
use Illuminate\Support\Facades\Auth;


class QuizController extends Controller
{
    public function getQuestions(Request $request, $chapter_id, $test)
    {
        
        $questions = Question::where('chapter_id', $chapter_id)
                             ->where('test', $test)
                             ->get();
        return view('users.series.questions', compact('questions','chapter_id','test'));
        //  response()->json($questions);
    }

    public function submitQuiz(Request $request)
    {
        

        $user = Auth::user();
        $testSeriesData = [];

        foreach ($request->results as $result) {
            $testSeriesData[] = [
                'question_id' => $result['question_id'],
                'user_answer' => optional($result)['user_answer'],
                'correct_answer' => $result['result_ans'],
            ];
        }
        $testSeries = new Result();
        $testSeries->user_id = $user->id;
        $testSeries->chapter_id = $request->chapter_id;
        $testSeries->test_series = json_encode($testSeriesData);
        $testSeries->save();

        return redirect()->back()->with('success', 'Test submitted successfully!');
    }
}