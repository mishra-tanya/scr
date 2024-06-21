<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Question; 
use App\Models\Result; 
use App\Models\Reg_User; 
use App\Models\QuestionLimit; 

use App\Mail\ScrTestResultMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;



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
                                $userModel = Reg_User::find($user->id);
    //  dd( $request->test);
                                $statusData = json_decode($userModel->status, true);
                                // dd($statusData);
                                if(is_numeric($request->test)){
                                    $testParts = $request->test;
                                    $chapterId = $request->test.'Mock';
                                    // dd($chapterId);
                                    foreach ($statusData as &$status) {
                                        // dd($statusData);
                                        $statusParts = explode(' ', $status['test_id']);
                                        $statusChapterId = $status['chapter_id'];
                                        $statusTestId = intval($statusParts[1]);
                                        // dd($statusChapterId,$statusTestId,$statusParts);

                                        if ($status['chapter_id'] == $chapterId && in_array($status['test_id'], ['Mock Test 1', 'Mock Test 2', 'Mock Test 3'])) {
                                            $status['status'] = 'completed';
                                        // dd($statusChapterId,$statusTestId);
                                            // dd($status['status']);
                                            break;
                                        }
                                        // dd($status['test_id']);
                                    }
                                }
                                else{
                                    $testParts = explode('T', $request->test);
                                    $chapterId = intval(substr($testParts[0], 1));
                                    $testId = intval($testParts[1]);
                                
                                    foreach ($statusData as &$status) {
                                        $statusParts = explode(' ', $status['test_id']);
                                        $statusChapterId = $status['chapter_id'];
                                        $statusTestId = intval($statusParts[1]);
                                        // dd($statusChapterId);
                                        if ($statusChapterId == $chapterId && $statusTestId == $testId) {
                                            $status['status'] = 'completed';
                                            break;
                                        }
                                    }
                                }
                                
                              
                                
                                $userModel->status = json_encode($statusData);
                                $userModel->save();
                            
        if ($existingResult) {
            return redirect()->route('result.show', ['chapter_id' => urlencode($request->test)])->with('existingResult', $existingResult);
        }
    
        $testSeriesData = [];
        $correctAnswers = 0; 
        $total_question = 0; 

        foreach ($request->results as $result) {
            $testSeriesData[] = [
                'question_id' => $result['question_id'],
                'user_answer' => optional($result)['user_answer'],
                'correct_answer' => $result['result_ans'],
            ];
            $total_question++;
            if (strtoupper(optional($result)['user_answer']) == strtoupper($result['result_ans'])) {
                $correctAnswers++;
            }
        }
    
        $testSeries = new Result();
        $testSeries->user_id = $user->id;
        $testSeries->chapter_id = $request->test;
        $testSeries->test_series = json_encode($testSeriesData);
        $testSeries->score = $correctAnswers;
        $testSeries->total_question = $total_question;
        $testSeries->save();
    // mail
    // dd($user->email,$user, $testSeriesData, $correctAnswers, $total_question, $request->test );
        try {
            if ($user->email_notification == 1) {
                Mail::to($user->email)->send(new ScrTestResultMail($user, $testSeriesData, $correctAnswers, $total_question, $request->test));
                Log::info('Mail sent to: ' . $user->email);
            } else {
                Log::info('Email notification is disabled for user: ' . $user->email);
            }
        } catch (\Exception $e) {
            Log::error('Mail send error: ' . $e->getMessage());
            return response()->json(['message' => 'Failed to send email. Please try again later.'], 500);
        }

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
    $questionLimit = QuestionLimit::where('chapter', 'mock')->first();
    $limit = $questionLimit ? $questionLimit->question_limit : 5; 

    $questions = Question::where('chapter_id', $chapter_id)
                         ->limit($limit)
                         ->get();
    // $questions = Question::where('chapter_id', $chapter_id)->get();
    $test=substr($chapter_id,9);
    return $this->showQuestions($request, $chapter_id, $test, $questions,"mock");
}

public function getQuestions(Request $request, $chapter_id, $test)
{
    // dd($chapter_id);
    $questionLimit = QuestionLimit::where('chapter', $chapter_id)->first();

    $limit = $questionLimit ? $questionLimit->question_limit : 5; 

    $questions = Question::where('chapter_id', $chapter_id)
                         ->where('test', $test)
                         ->limit($limit)
                         ->get();
    
    return $this->showQuestions($request, $chapter_id, $test, $questions,"test");
}

public function showQuestions(Request $request, $chapter_id, $test, $questions,$test_type)
{
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

