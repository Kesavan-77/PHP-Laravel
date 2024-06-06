<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class DailyMessage extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'message:daily';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'My daily message';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle(){
        echo date("h:i:sa")." Hello cheif before \n";
        sleep(65);
        echo date("h:i:sa")." Hello cheif after\n";
        return Command::SUCCESS;
    }
}