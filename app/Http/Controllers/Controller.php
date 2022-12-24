<?php

namespace App\Http\Controllers;

use App\Models\XWEB_ADMINCP;
use App\Models\XWEB_ADMINLOGIN;
use App\Models\XWEB_ANNOUNCE;
use App\Models\XWEB_DOWNLOAD;
use App\Models\XWEB_GRANDRESET;
use App\Models\XWEB_HOF;
use App\Models\XWEB_NEWS;
use App\Models\XWEB_PAYPAL;
use App\Models\XWEB_PKCLEAR;
use App\Models\XWEB_RENAME;
use App\Models\XWEB_RESET;
use App\Models\XWEB_RESETSTATS;
use App\Models\XWEB_SLIDERS;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;
use View;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __construct() {
        /* All Variable */
        $admin = XWEB_ADMINCP::get();
        $adminname = XWEB_ADMINLOGIN::get();
        $announce = XWEB_ANNOUNCE::get();
        $download = XWEB_DOWNLOAD::get();
        $event = json_decode(file_get_contents(storage_path() . "/app/public/event_config.json"), true);
        $boss = json_decode(file_get_contents(storage_path() . "/app/public/boss_config.json"), true);
        $slider = XWEB_SLIDERS::get();
        $hof = XWEB_HOF::get();
        View::share(['admin' => $admin,'adminname' => $adminname, 'announce' => $announce, 'download' => $download, 'event' => $event, 'boss' => $boss, 'slider' => $slider, 'hof' => $hof]);

        /* News System */
        $new_news = XWEB_NEWS::where('specific', '=', 'news')->get();
        $new_events = XWEB_NEWS::where('specific', '=', 'events')->get();
        $new_updates = XWEB_NEWS::where('specific', '=', 'updates')->get();
        View::share(['new_news' => $new_news, 'new_events' => $new_events, 'new_updates' => $new_updates]);

        /* User Panel */
        $reset = XWEB_RESET::get();
        $greset = XWEB_GRANDRESET::get();
        $pkclear = XWEB_PKCLEAR::get();
        $rename = XWEB_RENAME::get();
        $resetstats = XWEB_RESETSTATS::get();
        View::share(['reset' => $reset, 'greset' => $greset, 'pkclear' => $pkclear, 'rename' => $rename, 'resetstats' => $resetstats]);

        /* Payments */
        $paypal = XWEB_PAYPAL::get();
        View::share(['paypal' => $paypal]);


        /* Event Timer */
        $events = json_decode(file_get_contents(storage_path() . "/app/public/event_config.json"), true);
        $days = [1 => 'Monday', 2 => 'Tuesday', 3 => 'Wednesday', 4 => 'Thursday', 5 => 'Friday', 6 => 'Saturday', 7 => 'Sunday',];
        $ii = 0;
        $iii = 1;
        $timers = [];
        foreach($events['events']['event_timers'] as $event){
            $name = $event['name'];

            if(is_array($event['days'])){
                $today = date('N');
                if(isset($event['days'][$today]) === true){
                    if($this->no_more_event($event['days'][$today], time()) === true){
                        $day = "Today ";
                        $times = array_unique(explode(',', $event['days'][$today]));
                        asort($times);
                    } else{
                        $nxt = $this->find_next_day($event);
                        $times = array_unique(explode(',', $event['days'][$nxt]));
                        asort($times);
                        $day = 'Next ' . $days[$nxt];
                    }
                } else{
                    $nxt = $this->find_next_day($event);
                    $times = array_unique(explode(',', $event['days'][$nxt]));
                    asort($times);
                    $day = 'Next ' . $days[$nxt];
                }
            } else{
                $times = array_unique(explode(',', $event['days']));
                asort($times);
                if($this->no_more_event($event['days'], time()) === false){
                    $day = "Tomorrow ";
                } else{
                    $day = "Today ";
                }
            }
            foreach($times as $t){
                $nxttime = strtotime($day . ' ' . $t);
                if(time() <= $nxttime){
                    $a = $nxttime - time();
                    $timers[$ii] = ['name' => $name, 'left' => $a, 'id' => $iii];
                    $ii++;
                    $iii++;
                    break;
                }
            }
        }

        View::share(['timers' => $timers]);

        /* Boss Timer */
        $events = json_decode(file_get_contents(storage_path() . "/app/public/boss_config.json"), true);
        $days = [1 => 'Monday', 2 => 'Tuesday', 3 => 'Wednesday', 4 => 'Thursday', 5 => 'Friday', 6 => 'Saturday', 7 => 'Sunday',];
        $ii = 0;
        $iii = 1;
        $timers = [];
        foreach($events['events']['event_timers'] as $event){
            $name = $event['name'];

            if(is_array($event['days'])){
                $today = date('N');
                if(isset($event['days'][$today]) === true){
                    if($this->no_more_event($event['days'][$today], time()) === true){
                        $day = "Today ";
                        $times = array_unique(explode(',', $event['days'][$today]));
                        asort($times);
                    } else{
                        $nxt = $this->find_next_day($event);
                        $times = array_unique(explode(',', $event['days'][$nxt]));
                        asort($times);
                        $day = 'Next ' . $days[$nxt];
                    }
                } else{
                    $nxt = $this->find_next_day($event);
                    $times = array_unique(explode(',', $event['days'][$nxt]));
                    asort($times);
                    $day = 'Next ' . $days[$nxt];
                }
            } else{
                $times = array_unique(explode(',', $event['days']));
                asort($times);
                if($this->no_more_event($event['days'], time()) === false){
                    $day = "Tomorrow ";
                } else{
                    $day = "Today ";
                }
            }
            foreach($times as $t){
                $nxttime = strtotime($day . ' ' . $t);
                if(time() <= $nxttime){
                    $a = $nxttime - time();
                    $timers[$ii] = ['name' => $name, 'left' => $a, 'id' => $iii];
                    $ii++;
                    $iii++;
                    break;
                }
            }
        }

        View::share(['bosstimers' => $timers]);
    }



    private function no_more_event($times, $now)
    {
        $times = explode(',', $times);
        $lastevent = strtotime('Today ' . end($times));
        if($lastevent < $now){
            return false;
        } else{
            return true;
        }
    }

    private function find_next_day($event)
    {
        $today = date('N');
        $f = false;
        for($i = $today; $i <= 7; $i++){
            if(isset($event['days'][$i]) && $i != $today){
                $f = true;
                $day = $i;
                break;
            }
        }
        if($f === false){
            reset($event['days']);
            $day = key($event['days']);
        }
        return $day;
    }

}
