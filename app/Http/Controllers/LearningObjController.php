<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TestName;
use App\Models\Reg_User;
use App\Models\LearningObj;
use App\Models\QuestionLimit;
use App\Models\LearningObjResult;
use Illuminate\Support\Facades\Auth;

class LearningObjController extends Controller
{
    public function index()
    {
        $testNames = TestName::all()->groupBy('chapter');  $user_id = Auth::id();
        $attemptedTests = LearningObjResult::where('user_id', $user_id)
        ->select('test', 'chapter_id')
        ->get()
        ->toArray();

    // dd($attemptedTests);
        return view('users.series.learning_obj', compact('testNames', 'attemptedTests'));
    }

    
    public function getLoQuestions(Request $request,$chapter_id,$test){
        $questionLimit = QuestionLimit::where('chapter', 'lo')->first();
        $limit = $questionLimit ? $questionLimit->question_limit : 1;
        $questions = LearningObj::where('chapter_id', $chapter_id)
                    ->where('test', $test)
                    ->limit($limit)
                    ->get();
            $userId = $request->userId; 
           
            return view('users.series.lo_questions', compact('questions','chapter_id','test'));
            // dd($questions);
            // return response()->json($questions);
    }

    public function lo_submit(Request $request)
{
    $user = Auth::user();
    
    $existingResult = LearningObjResult::where('user_id', $user->id)
                            ->where('chapter_id', $request->chapter_id)
                            ->where('test', $request->test)
                            ->first();

    if ($existingResult) {
        return redirect()->route('getLoResult', [
            'chapter_id' => urlencode($request->chapter_id),
            'test' => urlencode($request->test)
        ])->with('existingResult', $existingResult);
    }

    $testSeriesData = [];
    $correctAnswers = 0;
    $total_q = 0;

    foreach ($request->results as $result) {
        $testSeriesData[] = [
            'question_id' => $result['question_id'],
            'user_answer' => optional($result)['user_answer'],
            'correct_answer' => $result['result_ans'],
        ];
        $total_q++;
        if (strtoupper(optional($result)['user_answer']) == strtoupper($result['result_ans'])) {
            $correctAnswers++;
        }
    }
   
    $testSeries = new LearningObjResult();
    $testSeries->user_id = $user->id;
    $testSeries->chapter_id = $request->chapter_id;
    $testSeries->test = $request->test;
    $testSeries->test_series = json_encode($testSeriesData);
    $testSeries->score = $correctAnswers;
    $testSeries->total_q = $total_q;
    $testSeries->save();

    return redirect()->route('getLoResult', [
        'chapter_id' => urlencode($request->chapter_id),
        'test' => urlencode($request->test)
    ]);
}

    


public function getLoResult($chapter_id, $test)
{
    if (!Auth::check()) {
        return redirect()->route('login')->with('error', 'You need to log in first.');
    }
    $user_id = Auth::user()->id;
    $user = Reg_User::find($user_id);

    $results = LearningObjResult::where('user_id', $user_id)
                    ->where('chapter_id', $chapter_id)
                    ->where('test', $test)
                    ->get();

    if ($results->isEmpty()) {
        return "No results found for this user, chapter, and test combination.";
    }

    $questions = [];
    $totalQuestions = 0;
    $correctAnswers = 0;
    // dd($results);

    foreach ($results as $result) {
        $testSeries = json_decode($result->test_series, true);
        // dd($testSeries);

        foreach ($testSeries as $item) {
            // dd($item);
            $question = LearningObj::where('id', $item['question_id'])->first();
            // dd($item['question_id']);
            // dd($question);

            if ($question) {
                $questions[] = [
                    'question_title' => $question->question_title,
                    'option_a' => $question->option_a,
                    'option_b' => $question->option_b,
                    'option_c' => $question->option_c,
                    'option_d' => $question->option_d,
                    'user_answer' => $item['user_answer'],
                    'result_ans' => $item['correct_answer'],
                    'reason'=>$question->reason,
                ];
                $totalQuestions++;
                if (strtoupper($item['user_answer']) == strtoupper($item['correct_answer'])) {
                    $correctAnswers++;
                }
            }
        }
    }
// dd($correctAnswers);
    // Debug: Print the total number of questions
    // dd($totalQuestions);

    $user->calculateOverallResult();
       

    return view('users.series.lo_results', [
        'chapter_id' => $chapter_id,
        'test' => $test,
        'questions' => $questions,
        'totalQuestions' => $totalQuestions,
        'correctAnswers' => $correctAnswers
    ]);
}


}
