<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Reg_User; 

class ScrChapterController extends Controller
{
    public function showDashboard()
    {
        $chapters = [];
        $chapterTopics = [
            "Foundations of Climate Change",
            "Sustainability",
            "Climate Change Risk ",
            "Sustainability and Climate Policy, Culture, and Governance ",
            "Green and Sustainable Finance: Markets and Instruments ",
            "Climate Risk Measurement and Management ",
            "Climate Models and Scenario Analysis ",
            "Net Zero",
        ];
    
        $userId = Auth::id();
        $user = Reg_User::find($userId);
        if (!$user) {
            return redirect()->route('login')->with('error', 'User not found.');
        }

        $statusData = json_decode($user->status, true) ?? [];

        for ($i = 1; $i <= 8; $i++) {
            $chapter_id = "$i";
            $testKey1 = "Test 1";
            $testKey2 = "Test 2";
            $testKey3 = "Test 3";

            $tests = [
                [
                    'label' => 'Test 1',
                    'link' => "questions/chapter{$i}/C{$i}T1"
                ],
                [
                    'label' => 'Test 2',
                    'link' => "questions/chapter{$i}/C{$i}T2"
                ],
                [
                    'label' => 'Test 3',
                    'link' => "questions/chapter{$i}/C{$i}T3"
                ],
            ];

            foreach ($tests as &$test) {
                foreach ($statusData as $statusItem) {
                    if ($statusItem['chapter_id'] == $chapter_id && $statusItem['test_id'] == $test['label']) {
                        $test['status'] = $statusItem['status'];
                        break;
                    }
                }
                $test['status'] = $test['status'] ?? 'Unattempted';
            }
            $topic = $chapterTopics[$i-1];
            $chapters[] = [
                'title' => 'Chapter ' . $i,
                'topic' =>  $topic,
                'tests' => $tests,
            ];
        }

        return view('users.series.scr_questions', compact('chapters'));
    }
}
