<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')->hourly();

        $schedule
        ->command('message:daily')
        ->everyMinute()
        ->appendOutputTo('scheduler.log')->thenPing('https://www.w3schools.com/php/');
    }

     /**
     * Define the application's command schedule TimeZone.
     *
     * @return void
     */
    protected function scheduleTimeZone()
    {
        return 'America/Chicago';
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
