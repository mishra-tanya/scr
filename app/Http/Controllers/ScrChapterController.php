<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ScrChapterController extends Controller
{
    public function showDashboard()
    {
        $chapters = [];

        for ($i = 1; $i <= 8; $i++) {
            $chapters[] = [
                'title' => 'Chapter ' . $i,
                'topic' => 'Chapter ' . $i . ' topic',
                'tests' => [
                    ['label' => 'Test 1', 'status' => 'Unattempted', 'link' => "questions/chapter{$i}/C{$i}T1"],
                    ['label' => 'Test 2', 'status' => 'Unattempted', 'link' => "questions/chapter{$i}/C{$i}T2"],
                    ['label' => 'Test 3', 'status' => 'Unattempted', 'link' => "questions/chapter{$i}/C{$i}T3"],
                ],
            ];
        }

        return view('users.series.scr_questions', compact('chapters'));
    }
}
