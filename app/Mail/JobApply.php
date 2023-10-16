<?php

namespace App\Mail;

use App\Models\Curriculo;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Mail\Mailables\Attachment;


class JobApply extends Mailable
{
    use Queueable, SerializesModels;
 
    /**
     * The order instance.
     *
     * @var \App\Models\Curriculo
     */
    public $curriculo;
 
    /**
     * Create a new message instance.
     *
     * @param  \App\Models\Curriculo  $curriculo
     * @return void
     */
    public function __construct(Curriculo $curriculo)
    {
        $this->curriculo = $curriculo;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build(Curriculo $curriculo)
    {
        return $this->view('emails.job_apply')
                    ->attachFromStorageDisk('curriculos_upload', $curriculo->resume);
    }

}
