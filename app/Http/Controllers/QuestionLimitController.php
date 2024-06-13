<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\QuestionLimit;

class QuestionLimitController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'chapter' => 'required|string',
            'question_limit' => 'required|integer|min:5|max:100',
        ]);

        $chapter = $request->input('chapter');
        $question_limit = $request->input('question_limit');

        $questionLimit = QuestionLimit::where('chapter', $chapter)->first();
        if ($questionLimit) {
            $questionLimit->question_limit = $question_limit;
            $questionLimit->save();
        } else {
            QuestionLimit::create([
                'chapter' => $chapter,
                'question_limit' => $question_limit,
            ]);
        }

        return redirect()->back()->with('success', 'Question limit updated successfully.');
    }

    public function index()
    {
        $questionLimits = QuestionLimit::all();
        // dd($questionLimits);
        return view('admin/adjust_question', compact('questionLimits'));
    }
}
