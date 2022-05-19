<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class StayHydrated extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'notify:drink';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Remind me to stay hydrated';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $event = 'drink';
        $key = config('services.ifttt.key');
        $title = 'Drink!';
        $emojis = collect(['🧃', '🥤', '🧋', '🍺', '🍷', '🥃', '🍸', '🍹', '🧉']);

        Http::post("https://maker.ifttt.com/trigger/$event/with/key/$key", [
            'value1' => $title,
            'value2' => $emojis->random(),
        ]);

        return 0;
    }
}
