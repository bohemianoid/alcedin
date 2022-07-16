<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class JunkHeader extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * The attachment URI.
     *
     * @var string
     */
    public $attachmentUri;

    /**
     * The attachment name.
     *
     * @var string
     */
    public $attachmentName;

    /**
     * Create a new message instance.
     *
     * @param  string  $attachmentUri
     * @param  string  $attachmentName
     * @return void
     */
    public function __construct(string $attachmentUri, string $attachmentName)
    {
        $this->attachmentUri = $attachmentUri;
        $this->attachmentName = $attachmentName;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mails.junk')
                    ->attach($this->attachmentUri, [
                        'as' => $this->attachmentName,
                    ]);
    }
}
