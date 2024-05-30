<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Question; 

class QuizController extends Controller
{
    public function getQuestions(Request $request, $chapter_id, $test)
    {
        
        $questions = Question::where('chapter_id', $chapter_id)
                             ->where('test', $test)
                             ->get();

        return view('users.series.questions', compact('questions'),compact('chapter_id'));
        //  response()->json($questions);
    }
}
