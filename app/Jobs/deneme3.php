<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Log;
use App\Http\Controllers\sitecek;
use App\Http\Controllers\curlsitecek;
class deneme3 implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    protected $tf;
    public function __construct($tf)
    {
        //
        $this->tf=$tf;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        //
        $sitecek = new curlsitecek();
        
        if($this->tf==true)
        {
            $sitecek->get_ticker("http://arbitrajim.xyz/auto-veri-cek?1");
            $this->wtf();
        }
        else 
        {
            $this->wtf2();
            $sitecek->get_ticker("http://arbitrajim.xyz/auto-veri-cek-orderbook");
            //$sitecek->get_ticker("http://localhost/L-kuyruk/bekle");
        }
    }
    public function wtf()
    {
        
        Log::info("wtf");

    }
    public function wtf2()
    {
        
        Log::info("wtf2");

    }
}
