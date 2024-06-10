<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use App\Models\Reg_User; 
use App\Models\Question; 
use App\Models\LearningObjResult; 
use App\Models\LearningObj;
use App\Models\TestName; 
use App\Models\Result; 



class AuthController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function login(Request $req)
    {
        $req->validate([
            'email' => 'required|email',
            'password' => 'required|string|min:6',
        ]);

        $credentials = $req->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->intended('home');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    public function register_view()
    {
        return view('register');
    }


    public function register(Request $req)
    {
        $req->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'max:255',
            'address' => 'max:255',
            'country' => 'required|string|max:255',
            'designation' => 'max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6'
        ]);

        $user = Reg_User::create([
            'first_name' => $req->first_name,
            'last_name' => $req->last_name,
            'address' => $req->address,
            'country' => $req->country,
            'designation' => $req->designation,
            'email' => $req->email,
            'password' => Hash::make($req->password)
        ]);

        Auth::login($user);

        return redirect()->route('login')->with('success', 'Registration successful.');
    }


    public function show_user()
{
    if (Auth::check()) {
        $user = Auth::user();
        $userId = Auth::id();

        $user = Reg_User::find($userId);

        if (!$user) {
            return redirect()->route('login')->with('error', 'User not found.');
        }

        $statusData = json_decode($user->status, true) ?? [];

        $attemptedCount = 0;
        foreach ($statusData as $statusItem) {
            if ($statusItem['status'] == 'attempted' || $statusItem['status'] == 'completed') {
                $attemptedCount++;
            }
        }
        //counting attempts
        $count = Question::count();
        $lo_count = LearningObj::count();
        $lo_test_count = TestName::count();
        $attempted = LearningObjResult::where('user_id', $userId)->count();

        //learning objective
        $total_questions = 0;
        $correct_answers = 0;
        $score = 0;

        $results = LearningObjResult::where('user_id', $userId)->get();
        if (!$results->isEmpty()) {
            foreach ($results as $result) {
                $test_series = json_decode($result->test_series, true);
                foreach ($test_series as $question) {
                    $total_questions++;
                    if (strtolower($question['user_answer']) == strtolower($question['correct_answer'])) {
                        $correct_answers++;
                    }
                }
            }
            $score = ($total_questions > 0) ? ($correct_answers / $total_questions) * 100 : 0;
        }

        //scr question bank
        $scr_total_questions = 0;
        $scr_correct_answers = 0;
        $scr_score = 0;

        $scr_results = Result::where('user_id', $userId)->get();
        if (!$scr_results->isEmpty()) {
            foreach ($scr_results as $result) {
                $scr_test_series = json_decode($result->test_series, true);
                foreach ($scr_test_series as $question) {
                    $scr_total_questions++;
                    if (strtolower($question['user_answer']) == strtolower($question['correct_answer'])) {
                        $scr_correct_answers++;
                    }
                }
            }
            $scr_score = ($scr_total_questions > 0) ? ($scr_correct_answers / $scr_total_questions) * 100 : 0;
        }

        $learning_obj_results = LearningObjResult::where('user_id', $userId)->get();


        return view('users.home', ['user' => $user], compact(
            'attemptedCount', 'attempted', 'count', 'lo_count', 'lo_test_count',
            'total_questions', 'correct_answers', 'score',
            'scr_total_questions', 'scr_correct_answers', 'scr_score','scr_results','learning_obj_results'
        ));
    } else {
        return redirect()->route('login')->with('error', 'You must be logged in to access this page.');
    }
}


//admin


    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}
