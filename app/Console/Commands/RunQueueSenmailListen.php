<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class RunQueueSenmailListen extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'word:RunQueueSenmailListen';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send mail when user order';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
    }
}
