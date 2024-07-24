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
use App\Models\Note; 


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
            'contact_no'=>'required|string|min:10',
            'designation' => 'max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6'
        ]);

        if (Reg_User::where('email', $req->email)->exists()) {
            return back()->withErrors([
                'email' => 'The email address has already been taken.'
            ])->withInput();
        }
        
        $user = Reg_User::create([
            'first_name' => $req->first_name,
            'last_name' => $req->last_name,
            'address' => $req->address,
            'contact_no'=>$req->contact_no,
            'country' => $req->country,
            'designation' => $req->designation,
            'email' => $req->email,
            'password' => Hash::make($req->password)
        ]);
        // dd($req->all());

        // Auth::login($user);

        return redirect()->route('login')->with('registered', true);
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
        
        $chapterNotes = json_decode($user->chapter_notes);

        $numberOfChapters = 0;
       
        
        $numberOfChapters = 0;
        $numberOfFlashChapters = 0;

        if (is_array($chapterNotes)) {
            foreach ($chapterNotes as $chapter) {
                if (preg_match('/^Chapter/', $chapter)) {
                    $numberOfChapters++;
                } elseif (preg_match('/^flash_chapter/', $chapter)) {
                    $numberOfFlashChapters++;
                }
            }
        }
    
        // dd($numberOfChapters); 
        
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

        $user->calculateOverallResult();
        $learning_obj_results = LearningObjResult::where('user_id', $userId)->get();

        // $find_rank=Reg_User::where('is_admin','0')->orderBy('learning_obj','desc')->get();
        // $lo_rank=null;
        // foreach($find_rank as $index=>$rank){
        //     if($user->email==$rank->email){
        //         $lo_rank =$index+1;
        //         break;
        //     }
        // }

        // $find_rank_scr=Reg_User::where('is_admin','0')->orderBy('scr','desc')->get();
        // $scr_rank=null;
        // foreach($find_rank_scr as $index=>$rank){
        //     if($user->email==$rank->email){
        //         $scr_rank =$index+1;
        //         break;
        //     }
        // }
        // dd($scr_rank);

        $trial_ends_at = session('trial_ends_at');

        return view('users.home', ['user' => $user], compact(
            'attemptedCount', 'attempted', 'count', 'lo_count', 'lo_test_count',
            // 'lo_rank','scr_rank',
            'total_questions', 'correct_answers', 'score','numberOfChapters','numberOfFlashChapters',
            'scr_total_questions', 'scr_correct_answers', 'scr_score','scr_results','learning_obj_results', 'trial_ends_at'
        ));
    } else {
        return redirect()->route('login')->with('error', 'You must be logged in to access this page.');
    }
}

public function updateEmailNotification(Request $request, Reg_User $user)
{
    $emailNotificationValue = $request->input('email_notification');

// dd($emailNotificationValue);
    $user->email_notification = $emailNotificationValue;

    $user->save();

    return back()->with('success', 'Email notification status updated successfully');
}



    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
    
     public function deploy()
    {
        //deployment script for test
        // Enable error reporting
        error_reporting(E_ALL);

        // Define variables
        $gitRepo = "https://github.com/mishra-tanya/scr";
        $branch = "master";
        // $hostingerFileManagerDir = dirname(dirname(dirname(__DIR__)));
        $hostingerFileManagerDir = dirname(dirname(dirname(__DIR__))); // Navigate three levels up from the current directory
        // $hostingerFileManagerDir = $baseDir . '/public/deploy_test';
        echo  $hostingerFileManagerDir;
        // Check if Git is installed
        if (!shell_exec("git --version")) {
            echo "Error: Git is not installed or accessible. Please install Git on youri server.";
            exit;
        }

        // Check if the directory is a Git repository
        if (!is_dir("$hostingerFileManagerDir/.git")) {
            // If not, initialize a new Git repository
            $output = shell_exec("git -C $hostingerFileManagerDir init 2>&1");
            echo "Git Init Output: <pre>$output</pre>";

            // Add the remote repository
            $output = shell_exec("git -C $hostingerFileManagerDir remote add origin $gitRepo 2>&1");
            echo "Git Add Remote Output: <pre>$output</pre>";
        }
        // Discard local changes
        $output = shell_exec("git -C $hostingerFileManagerDir reset --hard HEAD 2>&1");
        echo "Discard Local Changes Output: <pre>$output</pre>";
        // Pull latest changes from GitHub
        $output = shell_exec("git -C $hostingerFileManagerDir pull origin $branch 2>&1");
        echo "Git Pull Output: <pre>$output</pre>";

        // Check if there were any errors during git pull
        if (strpos($output, "error") !== false) {
            echo "Error: There was an error during 'git pull'. Please check the output above for details.";
            exit;
        }

        // Check if the branch is already up to date
        if (strpos($output, "Already up to date.") !== false) {
            echo "Branch is already up to date. No need to copy files.";
            exit;
        }

        // Copy files to Hostinger file manager directory
        recursive_copy(".", $hostingerFileManagerDir);

        // Recursive function to copy files
        function recursive_copy($source, $dest)
        {
            // Check if source is a directory
            if (is_dir($source)) {
                // Create destination directory if it doesn't exist
                if (!is_dir($dest)) {
                    mkdir($dest);
                }

                // Loop through files in source directory
                $files = scandir($source);
                foreach ($files as $file) {
                    if ($file != "." && $file != ".." && $file != ".git") {
                        // Recursive copy for subdirectories
                        if (is_dir("$source/$file")) {
                            recursive_copy("$source/$file", "$dest/$file");
                        } else {
                            // Copy file
                            if (!copy("$source/$file", "$dest/$file")) {
                            } else {
                                echo "Copied file '$file' to '$dest'.<br>";
                            }
                        }
                    }
                }
            } else {
                // Copy single file
                if (!copy($source, $dest)) {
                } else {
                    echo "Copied file '$source' to '$dest'.<br>";
                }
            }
        }

        echo "Deployment successful!";
    }
}