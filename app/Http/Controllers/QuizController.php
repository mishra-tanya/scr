<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Question; 
use App\Models\Result; 
use App\Models\Reg_User; 

use Illuminate\Support\Facades\Auth;


class QuizController extends Controller
{
    public function getQuestions(Request $request, $chapter_id, $test)
    {
        
        $questions = Question::where('chapter_id', $chapter_id)
                             ->where('test', $test)
                             ->get();

        $chapterid = (int) substr($chapter_id, 7);
        $userId = $request->userId; 
        $status = Reg_User::where('id', $userId)
                            ->where(function ($query) use ($test, $chapterid) {
                                $query->whereJsonContains('status->test_id', $test)
                                ->whereJsonContains('status->chapter_id', $chapterid);
                            })
                            ->value('status');
        return view('users.series.questions', compact('questions','chapter_id','test','status'));

        
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
        $testSeries->chapter_id = $request->test;
        $testSeries->test_series = json_encode($testSeriesData);
        $testSeries->save();

        $chapterId = urlencode($request->test); 

        return redirect("result/$chapterId");
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
  
}