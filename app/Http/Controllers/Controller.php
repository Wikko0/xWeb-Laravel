<?php

namespace App\Http\Controllers;

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
        $admin = DB::connection('XWEB')->Table('XWEB_ADMINCP')->get();
        $adminname = DB::connection('XWEB')->Table('XWEB_ADMINLOGIN')->get();
        $announce = DB::connection('XWEB')->Table('XWEB_ANNOUNCE')->get();
        $download = DB::connection('XWEB')->Table('XWEB_DOWNLOAD')->get();
        $event = json_decode(file_get_contents(storage_path() . "/app/public/event_config.json"), true);
        $boss = json_decode(file_get_contents(storage_path() . "/app/public/boss_config.json"), true);
        $slider = DB::connection('XWEB')->Table('XWEB_SLIDERS')->get();
        $hof = DB::connection('XWEB')->Table('XWEB_HOF')->get();
        View::share(['admin' => $admin,'adminname' => $adminname, 'announce' => $announce, 'download' => $download, 'event' => $event, 'boss' => $boss, 'slider' => $slider, 'hof' => $hof]);

        /* News System */
        $new_news = DB::connection('XWEB')->Table('XWEB_NEWS')->where('specific', '=', 'news')->get();
        $new_events = DB::connection('XWEB')->Table('XWEB_NEWS')->where('specific', '=', 'events')->get();
        $new_updates = DB::connection('XWEB')->Table('XWEB_NEWS')->where('specific', '=', 'updates')->get();
        View::share(['new_news' => $new_news, 'new_events' => $new_events, 'new_updates' => $new_updates]);

        /* User Panel */
        $reset = DB::connection('XWEB')->Table('XWEB_RESET')->get();
        $greset = DB::connection('XWEB')->Table('XWEB_GRANDRESET')->get();
        View::share(['reset' => $reset, 'greset' => $greset]);


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
