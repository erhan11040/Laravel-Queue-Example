<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Log;
class QueueProcessListener extends Command
{
    //queue-process-listener
    /**
     * The name of the command/process we want to monitor. This string will be used both to check to see if the process
     * is currently running and to spawn it (The arguments are appended to it).
     *
     * @var string
     */
    protected $command = 'php artisan queue:listen';

    /**
     * The arguments to pass to the process when spawning it.
     *
     * @var string
     */
    protected $arguments = '--tries=3';

    /**
     * The signature of the console command. We use the signature when running it through Artisan: php artisan $signature
     *
     * @var string
     */
    protected $signature = 'queue-process-listener';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Monitor the queue listener process to ensure it is always running.';

    /**
     * Create a new command instance.
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        if (!$this->isProcessRunning($this->command)) {
            $this->info("Starting queue listener.");
            Log::info("Starting");
            $this->executeShellCommand($this->command, $this->arguments, true);
        } else {
            $this->info("Queue listener is running.");
            Log::info("running");
        }
    }

    /**
     * Execute a shell command, with the provided arguments, and optionally in the background. Commands that are not run
     * in the background will return their output/response.
     *
     * @param $command
     * @param string $arguments
     * @param bool $background
     * @return string
     */
    public function executeShellCommand($command, $arguments = '', $background = false)
    {
        $command = trim($command);
        if (!is_string($command) || empty($command)) {
            Log::info("null");
            return null;
        }

        $arguments = trim($arguments);

        $cmd = trim($command . ' ' . $arguments) . ($background ? ' > /dev/null 2>/dev/null &' : '');
        return shell_exec($cmd);
    }

    /**
     * Check if a process is running using pgrep.
     *
     * @param $process
     * @return bool
     */
    public function isProcessRunning($process)
    {
        $output = $this->executeShellCommand('pgrep -f "' . $process . '"');

        return !empty(trim($output));
    }
}