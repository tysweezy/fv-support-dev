<?php

namespace App\Mail;

use App\Project;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SurveyRequestMail extends Mailable
{
    use Queueable, SerializesModels;

    public $survey;

    public $attachment;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Project $survey, $attachment)
    {
        $this->survey = $survey;
        $this->attachment = $attachment;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Project Requested')
                    ->from('supportdev@fv.com')
                    ->view('email.survey.request')
                    ->attach($this->attachment);
    }
}
