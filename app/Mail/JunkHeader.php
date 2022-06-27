<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use PhpImap\IncomingMailHeader;

class JunkHeader extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * The header instance.
     *
     * @var \PhpImap\IncomingMailHeader
     */
    public $header;

    /**
     * Create a new message instance.
     *
     * @param  \PhpImap\IncomingMailHeader  $header
     * @return void
     */
    public function __construct(IncomingMailHeader $header)
    {
        $this->header = $header;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mails.junk');
    }
}
