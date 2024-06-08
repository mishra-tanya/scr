<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Question; 
use App\Models\Result; 
use App\Models\Reg_User; 

use Illuminate\Support\Facades\Auth;


class QuizController extends Controller
{
    // public function getQuestions(Request $request, $chapter_id, $test)
    // {
        
    //     $questions = Question::where('chapter_id', $chapter_id)
    //                          ->where('test', $test)
    //                          ->get();

    //     $chapterid = (int) substr($chapter_id, 7);
    //     $userId = $request->userId; 
    //     $status = Reg_User::where('id', $userId)
    //                         ->where(function ($query) use ($test, $chapterid) {
    //                             $query->whereJsonContains('status->test_id', $test)
    //                             ->whereJsonContains('status->chapter_id', $chapterid);
    //                         })
    //                         ->value('status');
    //     return view('users.series.questions', compact('questions','chapter_id','test','status'));

        
    //     //  response()->json($questions);
    // }

    public function submitQuiz(Request $request)
    {
        $user = Auth::user();
        
        $existingResult = Result::where('user_id', $user->id)
                                ->where('chapter_id', $request->test)
                                ->first();
    
        if ($existingResult) {
            return redirect()->route('result.show', ['chapter_id' => urlencode($request->test)])->with('existingResult', $existingResult);
        }
    
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
        $testSeries->chapter_id = $request->test;
        $testSeries->test_series = json_encode($testSeriesData);
        $testSeries->save();
    
        return redirect()->route('result.show', ['chapter_id' => urlencode($request->test)]);
    }
    

public function updateTestStatus(Request $request)
{
    $user = Reg_User::find($request->userId);
    
    $testStatuses = $user->status ? json_decode($user->status, true) : [];
    $found = false; 

    foreach ($testStatuses as &$testStatus) {
        if ($testStatus['link'] === $request->link) {
            $testStatus['status'] = 'attempted';
            $found = true;
            break;
        }
    }

    if (!$found) {
        $testStatuses[] = [
            'chapter_id' => $request->chapter_id,
            'test_id' => $request->testLabel,
            'status' => 'attempted',
            'link' => $request->link,
        ];
    }

    $user->status = json_encode($testStatuses);
    $user->save();

    return redirect($request->link);
}

// public function getMockQuestions(Request $request, $chapter_id)
// {
//     $questions = Question::where('chapter_id', $chapter_id)->get();

//     $chapterid = (int) substr($chapter_id, 9);
//     $userId = Auth::user()->id;
//     $status = Reg_User::where('id', $userId)
//                         ->where(function ($query) use ($chapterid) {
//                             $query->whereJsonContains('status->chapter_id', $chapterid);
//                         })->value('status');
//     return view('users.series.questions', compact('questions','chapter_id','status'));

//     // return response()->json($questions);
// }

public function getMockQuestions(Request $request, $chapter_id)
{
    $questions = Question::where('chapter_id', $chapter_id)->get();
    $test=substr($chapter_id,9);
    return $this->showQuestions($request, $chapter_id, $test, $questions,"mock");
}

public function getQuestions(Request $request, $chapter_id, $test)
{
    $questions = Question::where('chapter_id', $chapter_id)
                         ->where('test', $test)
                         ->get();
    return $this->showQuestions($request, $chapter_id, $test, $questions,"test");
}

public function showQuestions(Request $request, $chapter_id, $test, $questions,$test_type)
{
    // dd($questions);
    $chapterid = (int) substr($chapter_id, 7);
    $userId = $request->userId; 
    $status = Reg_User::where('id', $userId)
                        ->where(function ($query) use ($test, $chapterid) {
                            $query->whereJsonContains('status->test_id', $test)
                            ->whereJsonContains('status->chapter_id', $chapterid);
                        })
                        ->value('status');

    $mockQuestions = null;
    if ($test === 'mock') {
        $mockQuestions = $questions;
        $questions = null;
    }

    return view('users.series.questions', compact('mockQuestions', 'questions', 'chapter_id','test_type', 'test', 'status'));
}

}

