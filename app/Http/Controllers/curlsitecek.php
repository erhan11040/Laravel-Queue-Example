<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Queue;
use App\Jobs\deneme3;
use Illuminate\Console\Scheduling\Schedule;
use Log;
class curlsitecek{
        

        public function get_ticker($urlgit) {
            
           

            $curl = curl_init();

            curl_setopt($curl, CURLOPT_URL, $urlgit);
            
            curl_setopt($curl, CURLOPT_TIMEOUT_MS, 1);

            curl_setopt($curl, CURLOPT_NOSIGNAL, 1);

            curl_exec($curl);

            curl_close($curl);

        }
    
       
    }