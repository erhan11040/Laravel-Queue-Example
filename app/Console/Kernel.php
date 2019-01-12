<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use App\Jobs\deneme3;
use Log;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //
        Commands\QueueProcessListener::class
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')
        //          ->hourly();
        // $schedule->job(new deneme3(true))->everyMinute();
        //  $schedule->exec('php artisan queue:listen')->everyMinute();
        // $schedule->exec('php artisan schedule:run')->everyMinute();
        // $schedule->exec('php artisan schedule:run')->everyMinute();
       // $schedule->command('queue:work --daemon')->everyMinute()->withoutOverlapping();
        $schedule->call(function () {
            Log::info("anaaam");
        })->everyMinute();
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
