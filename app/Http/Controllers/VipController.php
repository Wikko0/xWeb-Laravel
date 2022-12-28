<?php

namespace App\Http\Controllers;

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

        if (!$this->VipData)
        {
            XWEB_VIP::
            insert([
                'account' => $this->account,
                'bought' => $now,
                'duration' => $duration,
                'expires' => $expirationTime,
            ]);
        }
        else
        {
            return $this->extendVip($request->days);
        }

        return redirect()->back()->withSuccess('You bought VIP Status successfully!');
    }

    private function extendVip($days)
    {

        $now = $this->VipData->bought;
        $duration = $this->VipData->duration + (86400*$days);
        $expirationTime = $this->ExpirationTime($days, $this->VipData->expires);

        XWEB_VIP::where('account', $this->account)->
        UPDATE([
            'account' => session('User'),
            'bought' => $now,
            'duration' => $duration,
            'expires' => $expirationTime,
        ]);

        return redirect()->back()->withSuccess('You extend VIP Status successfully!');
    }

    private function removeVip()
    {
        $now = time();

        if ($this->VipData->duration <= $now)
        {
            XWEB_VIP::where('account', $this->account)->update(['expires' => 'End']);
        }
    }


    private function ExpirationTime($days, $nowDate="") {
        if($nowDate) {
            return date("Y-m-d H:i:s", strtotime($nowDate)+(86400*$days));
        }
        return date("Y-m-d H:i:s", time()+(86400*$days));
    }
}
