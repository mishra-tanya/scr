<?php

namespace App\Http\Controllers;

use App\Models\Reg_User; 
use App\Models\LearningObjResult; 
use App\Models\Result; 
use App\Models\LearningObj; 
use App\Models\Question; 
use App\Models\TrialRequest; 


use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


use Illuminate\Http\Request;

class UserController extends Controller
{
    public function dashboard()
    {
        
        $totalLearningObjectiveQuestions = LearningObj::count();
        $totalSCRQuestionsAdded = Question::count();
        $totalUsers = Reg_User::where('is_admin', '0')->count();
        $totalPaidUsers = Reg_User::where('payment_status', 1)->count();
        $totalTrialRequests = 0;
        $newUsersToday = Reg_User::whereDate('created_at', now()->toDateString())->count();
        $totalAdmins = Reg_User::where('is_admin', '1')->count();
        $totalChapters = 8; 

        $trialRequests = DB::table('trial_requests')
        ->join('reg_users', 'trial_requests.email', '=', 'reg_users.email')
        ->select(
            'trial_requests.id',
            'trial_requests.email',
            'trial_requests.approved',
            'trial_requests.trial_days',
            'reg_users.first_name',
            'reg_users.last_name',
            'reg_users.country',
            'reg_users.designation',
            'reg_users.contact_no',
            'reg_users.address',
            // 'reg_users.payment_status'
        )
        ->get();
        // dd($trialRequests);
        return view('admin.dashboard', compact(
            'totalLearningObjectiveQuestions',
            'totalSCRQuestionsAdded',
            'totalUsers',
            'totalPaidUsers',
            'totalTrialRequests',
            'newUsersToday',
            'totalAdmins',
            'totalChapters',
            'trialRequests'
        ));
    }

    
    public function updateTrialDays(Request $request, $id)
    {
        $request->validate([
            'trial_days' => 'required|integer',
        ]);

        $trialRequest = TrialRequest::findOrFail($id);
        $newTrialDays = $request->input('trial_days');

        DB::transaction(function () use ($trialRequest, $newTrialDays) {
            $trialRequest->update(['trial_days' => $newTrialDays, 'approved' => true]);
    
            Reg_User::where('email', $trialRequest->email)->update(['trial_days' => $newTrialDays]);
        });

        return redirect()->back()->with('success', 'Trial days updated successfully.');
    }

    public function index()
    {
      
        $users = Reg_User::where('is_admin', 0)->get();
        $admins = Reg_User::where('is_admin', 1)->get();
        // dd($users);
        return view('admin.user_admin', compact('users','admins'));
    }

    public function showUserDetails($email)
    {
      
        $user = Reg_User::where('email', $email)->firstOrFail();
        $loResults = LearningObjResult::where('user_id', $user->id)->get();
        $results = Result::where('user_id', $user->id)->get();

        return view('admin.user_details', compact('user','loResults','results'));
    }
    
    public function viewScrTestDetails($chapter_id)
    {
       
       
        $user = Reg_User::find($result->user_id);
        

        $result = Result::findOrFail($chapter_id);
        dd($result);

        $questions = [];
        $totalQuestions = 0;
        $correctAnswers = 0;

        $testSeries = json_decode($result->test_series, true);
        foreach ($testSeries as $item) {
            $question = Question::where('question_no', $item['question_id'])->first();
            if ($question) {
                $questions[] = [
                    'question_title' => $question->question_title,
                    'option_a' => $question->option_a,
                    'option_b' => $question->option_b,
                    'option_c' => $question->option_c,
                    'option_d' => $question->option_d,
                    'reason' => $question->reason,
                    'user_answer' => $item['user_answer'],
                    'correct_answer' => $item['correct_answer']
                ];
                $totalQuestions++;
                if ($item['user_answer'] == $item['correct_answer']) {
                    $correctAnswers++;
                }
            }
        }

        return view('admin.scr_test_details', [
            'user' => $user,
            'result' => $result,
            'questions' => $questions,
            'totalQuestions' => $totalQuestions,
            'correctAnswers' => $correctAnswers
        ]);
    }
    
    public function sendEmail(Request $req, $id)
    {

        $user = Reg_User::findOrFail($id);
        // dd(config('mail.from.name'));

        Mail::raw($req->message, function ($emailMessage) use ($req, $user) {
            $emailMessage->to($user->email);
            $emailMessage->subject($req->subject);
        });
        Session::flash('email_success', 'Email sent successfully.');

        return back();
    }
    
}
