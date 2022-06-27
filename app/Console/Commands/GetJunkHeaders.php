<?php

namespace App\Console\Commands;

use App\Mail\JunkHeader;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;
use PhpImap\Mailbox;

class GetJunkHeaders extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'mail:junk';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send me the headers of junk emails';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $host = config('services.imap.host');
        $port = config('services.imap.port');
        $encryption = config('services.imap.encryption');
        $prefix = config('services.imap.prefix');
        $username = config('services.imap.username');
        $password = config('services.imap.password');

        $mailbox = new Mailbox(
            '{'."$host:$port/$encryption".'}'."$prefix.Junk",
            $username,
            $password
        );

        $mailIds = $mailbox->searchMailbox('UNSEEN');

        foreach ($mailIds as $mailId) {
            $header = $mailbox->getMailHeader($mailId);

            Mail::to(config('services.imap.username'))
                ->send(new JunkHeader($header));

            $mailbox->markMailAsRead($mailId);
        }

        return 0;
    }
}
