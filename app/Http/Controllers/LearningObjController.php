<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TestName;
use App\Models\LearningObj;


class LearningObjController extends Controller
{
    public function index()
    {
        $testNames = TestName::all()->groupBy('chapter');

        return view('users.series.learning_obj', compact('testNames'));
    }

    public function getQuestions(Request $request,$chapter_id,$test){
        $questions = LearningObj::where('chapter_id', $chapter_id)
                                 ->where('test', $test)
                                 ->get();
    
            $userId = $request->userId; 
           
            return view('users.series.lo_questions', compact('questions','chapter_id','test'));
    
            // dd($questions);
            // return response()->json($questions);
    }

}
