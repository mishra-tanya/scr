<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Question;
use App\Models\LearningObj;
use App\Models\TestName;

class QuestionController extends Controller
{
    public function storeSCR(Request $request)
    {
        $count = Question::count();
        $newQuestionNo = $count + 1;

        $request->validate([
            'chapter_id' => 'required|integer',
            'question_title' => 'required|string',
            'option_a' => 'required|string',
            'option_b' => 'required|string',
            'option_c' => 'required|string',
            'option_d' => 'required|string',
            'result_ans' => 'required|string|in:A,B,C,D',
            'reason' => 'required|string',
        ]);

        Question::create([
            'question_no' => $newQuestionNo,
            'chapter_id' => 'chapter'.$request->chapter_id,
            'question_title' => $request->question_title,
            'option_a' => $request->option_a,
            'option_b' => $request->option_b,
            'image'=>'hi',
            'status'=>'active',
            'subject_id'=>$request->chapter_id,
            'test'=>'C'.$request->chapter_id.'T'.$request->test_series,
            'option_c' => $request->option_c,
            'option_d' => $request->option_d,
            'result_ans' => $request->result_ans,
            'reason' => $request->reason,
        ]);

        return redirect()->back()->with('success', 'SCR Question added successfully');
    }

    public function storeMock(Request $request)
    {
        $count = Question::count();
        $newQuestionNo = $count + 1;

        $request->validate([
            'chapter_id' => 'required|integer',
            'question_title' => 'required|string',
            'option_a' => 'required|string',
            'option_b' => 'required|string',
            'option_c' => 'required|string',
            'option_d' => 'required|string',
            'result_ans' => 'required|string|in:A,B,C,D',
            'reason' => 'required|string',
        ]);

        Question::create([
            'question_no' => $newQuestionNo,
            'chapter_id' => 'mock_test'.$request->test_series,
            'question_title' => $request->question_title,
            'option_a' => $request->option_a,
            'option_b' => $request->option_b,
            'image'=>'hi',
            'status'=>'active',
            'subject_id'=>$request->chapter_id,
            'test'=>'C'.$request->chapter_id.'F'.$request->test_series,
            'option_c' => $request->option_c,
            'option_d' => $request->option_d,
            'result_ans' => $request->result_ans,
            'reason' => $request->reason,
        ]);

        return redirect()->back()->with('success', 'SCR Mock Question added successfully');
    }

    public function storeLO(Request $request)
    {
        $count = LearningObj::count();
        $newQuestionNo = $count + 1;

        $request->validate([
            'chapter_id' => 'required|integer',
            'question_title' => 'required|string',
            'option_a' => 'required|string',
            'option_b' => 'required|string',
            'option_c' => 'required|string',
            'option_d' => 'required|string',
            'result_ans' => 'required|string|in:A,B,C,D',
            'reason' => 'nullable|string',
        ]);

        LearningObj::create([
            'id'=>$newQuestionNo,
            'question_no'=>$newQuestionNo,
            'test' => 'lo_test'.$request->chapter_id,
            'chapter_id' => $request->learning_objective,
            'question_title' => $request->question_title,
            'image'=>'hi',
            'status'=>'active',
            'subject_id'=>$request->chapter_id,
            'option_a' => $request->option_a,
            'option_b' => $request->option_b,
            'option_c' => $request->option_c,
            'option_d' => $request->option_d,
            'result_ans' => $request->result_ans,
            'reason' => $request->reason,
        ]);

        return redirect()->back()->with('success', 'Learning Objective Question added successfully');
    }

    public function fetchLearningObjectives($chapterId)
    {
        $learningObjectives = TestName::where('chapter', 'ch'.$chapterId)->get();
        return response()->json($learningObjectives);
    }
}
