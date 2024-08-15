<?php
namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

use Illuminate\Database\Eloquent\Model;

class Reg_User extends Authenticatable
{
    use Notifiable;
    protected $table = 'reg_users';
    protected $fillable = [
        'first_name', 'last_name', 'address', 'country', 'designation', 'email', 'password', 'is_admin'
        ,'contact_no', 'chapter_notes','payment_status','payment_id', 'email_verified', 'verification_token'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function learningObjResults()
    {
        return $this->hasMany(LearningObjResult::class, 'user_id');
    }

    public function results()
    {
        return $this->hasMany(Result::class, 'user_id');
    }

    public function calculateOverallResult()
    {
        $learningObjResults = $this->learningObjResults;
        $learningTotalQuestions = 0;
        $learningCorrectAnswers = 0;

        foreach ($learningObjResults as $result) {
            $testSeries = json_decode($result->test_series, true);
            foreach ($testSeries as $question) {
                $learningTotalQuestions++;
                if (strtolower($question['user_answer']) == strtolower($question['correct_answer'])) {
                    $learningCorrectAnswers++;
                }
            }
        }
        $learningObjScore = ($learningTotalQuestions > 0) ? ($learningCorrectAnswers / $learningTotalQuestions) * 100 : 0;

        $scrResults = $this->results;
        $scrTotalQuestions = 0;
        $scrCorrectAnswers = 0;

        foreach ($scrResults as $result) {
            $scrTestSeries = json_decode($result->test_series, true);
            foreach ($scrTestSeries as $question) {
                $scrTotalQuestions++;
                if (strtolower($question['user_answer']) == strtolower($question['correct_answer'])) {
                    $scrCorrectAnswers++;
                }
            }
        }
        $scrScore = ($scrTotalQuestions > 0) ? ($scrCorrectAnswers / $scrTotalQuestions) * 100 : 0;

        $this->scr = $scrScore;
        $this->learning_obj = $learningObjScore;

        $this->save();
    }

    }
