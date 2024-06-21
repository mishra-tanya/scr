<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class TestResultMail extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $testSeriesData;
    public $correctAnswers;
    public $total_q;
    public $chapter_id;
    public $test;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user, $testSeriesData, $correctAnswers, $total_q, $chapter_id, $test)
    {
        $this->user = $user;
        $this->testSeriesData = $testSeriesData;
        $this->correctAnswers = $correctAnswers;
        $this->total_q = $total_q;
        $this->chapter_id = $chapter_id;
        $this->test = $test;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        Log::info('Building email with data: ', [
            'user' => $this->user,
            'testSeriesData' => $this->testSeriesData,
            'correctAnswers' => $this->correctAnswers,
            'total_q' => $this->total_q,
            'chapter_id' => $this->chapter_id,
            'test' => $this->test,
        ]);

        return $this->view('email.lo_result')
                    ->subject('Learning Objective Test Results')
                    ->with([
                        'user' => $this->user,
                        'testSeriesData' => $this->testSeriesData,
                        'correctAnswers' => $this->correctAnswers,
                        'total_q' => $this->total_q,
                        'chapter_id' => $this->chapter_id,
                        'test' => $this->test,
                    ]);
    }
}
