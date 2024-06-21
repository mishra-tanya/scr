<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

use Illuminate\Support\Facades\Log;

class ScrTestResultMail extends Mailable
{
    use Queueable, SerializesModels;
    public $user;
    public $testSeriesData;
    public $correctAnswers;
    public $total_question;
    public $test;

    /**
     * Create a new message instance.
     *
     * @return void
     */ 
    public function __construct($user, $testSeriesData, $correctAnswers, $total_question, $test)
    {
        $this->user = $user;
        $this->testSeriesData = $testSeriesData;
        $this->correctAnswers = $correctAnswers;
        $this->total_question = $total_question;
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
            'total_question' => $this->total_question,
            'test' => $this->test,
        ]);
// dd($user);
        return $this->view('email.scr_result')
                    ->subject('SCR Test Results')
                    ->with([
                        'user' => $this->user,
                        'testSeriesData' => $this->testSeriesData,
                        'correctAnswers' => $this->correctAnswers,
                        'total_question' => $this->total_question,
                        'test' => $this->test,
                    ]);
    }
}
