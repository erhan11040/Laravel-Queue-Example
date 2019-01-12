<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Queue;
use App\Jobs\deneme3;
use Illuminate\Console\Scheduling\Schedule;
use Log;
use App\Http\Controllers\curlsitecek;
use Illuminate\Support\Facades\DB;


class deneme2 extends Controller
{
    public function kuyrukcagir()
    {
        // $schedule= new Schedule;

        // $schedule->job(new deneme3(true))->everyMinute();
        // exec('php artisan queue-process-listener');
       // phpinfo();
       //shell_exec("php artisan queue-process-listener");
       Log::info("basla");
       $sitecek = new curlsitecek();
     
       for ($i=0; $i <120 ; $i++) { 
        // $this->dispatch((new deneme3(true)));
        // $this->dispatch((new deneme3(false)));
        //$sitecek->get_ticker("http://arbitrajim.xyz/auto-veri-cek-orderbook");
       
        $sitecek->get_ticker("http://localhost/L-kuyruk/bekle");

        //sitecek->get_ticker("http://arbitrajim.xyz/auto-veri-cek?1");
       }
       
       $curlLoop=DB::select("Select * FROM kontrol WHERE adi=? LIMIT 1",array("curlLoop"));
       if($curlLoop[0]->devam==1)
       {
           
            $sitecek->get_ticker("http://kuyruk.arbitrajim.xyz/dene");
            Log::info("bitti");
            echo "bitti";
       }

      

        
        
    }
    public function bekle(Request $request)
    {
        sleep(10);
        Log::info("bekle");
        echo "1";
    }
}
