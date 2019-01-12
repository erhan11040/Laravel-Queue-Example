<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Queue;
use App\Jobs\deneme3;
use Illuminate\Console\Scheduling\Schedule;
use Log;
class sitecek{
        

        public function get_ticker($urlgit) {
            $prices = $this->retrieveJSON($urlgit);
            if($prices===-1)
                return -1;
            else
                return $prices;
        }
    
        protected function retrieveJSON($URL) {
            $opts = array('http' =>
                array(
                    'method'  => 'GET',
                    'timeout' => 30
                )
            );
            $context = stream_context_create($opts);
            for ($i=0; $i < 5; $i++) { 
                
                $feed = @file_get_contents($URL, false, $context);
    
                if($feed===false){
                    Log::info("HATA :".$URL);
                    Log::info("HATA sayisi=".$i);
                    sleep(2);
                    continue;
                }
                else{
                    $json = json_decode($feed, true);
                    return $json;
                }
            }
            return -1;
        }
    }