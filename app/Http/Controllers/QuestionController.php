<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Question;
use App\Models\LearningObj;

class QuestionController extends Controller
{
    public function storeSCR(Request $request)
    {
        $request->validate([
            'series' => 'required',
            'chapter_id' => 'required|integer',
            'test_series' => 'required|integer',
            'question_title' => 'required|string',
            'option_a' => 'required|string',
            'option_b' => 'required|string',
            'option_c' => 'required|string',
            'option_d' => 'required|string',
            'result_ans' => 'required|string|in:A,B,C,D',
            'reason' => 'required|string',
        ]);

        Question::create([
            'series' => $request->series,
            'chapter_id' => $request->chapter_id,
            'test_series' => $request->test_series,
            'question_title' => $request->question_title,
            'option_a' => $request->option_a,
            'option_b' => $request->option_b,
            'option_c' => $request->option_c,
            'option_d' => $request->option_d,
            'result_ans' => $request->result_ans,
            'reason' => $request->reason,
        ]);

        return redirect()->back()->with('success', 'SCR Question added successfully');
    }

    public function storeLO(Request $request)
    {
        $request->validate([
            'chapter_id' => 'required|integer',
            'learning_objective' => 'required|string',
            'question_title' => 'required|string',
            'option_a' => 'required|string',
            'option_b' => 'required|string',
            'option_c' => 'required|string',
            'option_d' => 'required|string',
            'result_ans' => 'required|string|in:A,B,C,D',
            'reason' => 'nullable|string',
        ]);

        LearningObj::create([
            'chapter_id' => $request->chapter_id,
            'learning_objective' => $request->learning_objective,
            'question_title' => $request->question_title,
            'option_a' => $request->option_a,
            'option_b' => $request->option_b,
            'option_c' => $request->option_c,
            'option_d' => $request->option_d,
            'result_ans' => $request->result_ans,
            'reason' => $request->reason,
        ]);

        return redirect()->back()->with('success', 'Learning Objective Question added successfully');
    }
}
