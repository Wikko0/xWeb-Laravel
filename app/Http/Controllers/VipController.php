<?php

namespace App\Http\Controllers;

use App\Models\Character;
use App\Models\XWEB_CREDITS;
use App\Models\XWEB_VIP;
use Illuminate\Http\Request;

class VipController extends Controller
{
    protected $VipData;
    protected $account;

    public function __construct()
    {
        $this->middleware(function ($request, $next){
            $this->account = session('User');
            $this->VipData =  XWEB_VIP::where('account', session('User'))->first();
            return $next($request);
        });

    }

    public function getVip(Request $request)
    {
        $now = time();
        $duration = strtotime("$request->days minutes");
        $expirationTime = $this->ExpirationTime($request->days);
        $account = XWEB_CREDITS::where('Name', $this->account)->first();
        $credits = $account->credits-$request->credits;

        if (!$this->VipData)
        {
            if ($credits < 0)
            {
                return redirect()->back()->withErrors('You don\'t have enough credits!');
            }
            else
            {
                XWEB_VIP::
                insert([
                    'account' => $this->account,
                    'bought' => $now,
                    'duration' => $duration,
                    'expires' => $expirationTime,
                ]);
                XWEB_CREDITS::where('name', $this->account)
                    ->update(['credits'=>$credits]);

                return redirect()->back()->withSuccess('You bought VIP Status successfully!');
            }

        }
        else
        {
            if ($this->VipData->expires == 'Expired')
            {
                XWEB_VIP::where('account', $this->account)
                ->update([
                    'bought' => $now,
                    'duration' => $duration,
                    'expires' => $expirationTime,
                ]);
                XWEB_CREDITS::where('name', $this->account)
                    ->update(['credits'=>$credits]);

                return redirect()->back()->withSuccess('You bought VIP Status successfully!');
            }
            else
            {
                return $this->extendVip($request->days,$request->credits);
            }

        }

    }

    private function extendVip($days,$credits)
    {

        $now = $this->VipData->bought;
        $duration = $this->VipData->duration + (86400*$days);
        $expirationTime = $this->ExpirationTime($days, $this->VipData->expires);
        $account = XWEB_CREDITS::where('Name', $this->account)->first();
        $credits = $account->credits-$credits;

        if ($credits < 0)
        {
            return redirect()->back()->withErrors('You don\'t have enough credits!');
        }
        else
        {
            XWEB_VIP::where('account', $this->account)->
            UPDATE([
                'account' => session('User'),
                'bought' => $now,
                'duration' => $duration,
                'expires' => $expirationTime,
            ]);
            XWEB_CREDITS::where('name', $this->account)
                ->update(['credits'=>$credits]);

            return redirect()->back()->withSuccess('You extend VIP Status successfully!');
        }
    }

    private function ExpirationTime($days, $nowDate="") {
        if($nowDate) {
            return date("Y-m-d H:i:s", strtotime($nowDate)+(86400*$days));
        }
        return date("Y-m-d H:i:s", time()+(86400*$days));
    }
}
