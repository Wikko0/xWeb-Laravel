<?php

namespace App\Http\Controllers;


use App\Models\MEMB_INFO;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;


class doController extends Controller
{
    public function do_register(Request $request)
    {
        $this->validate($request,[
            'login'=>'min:5|max:10|unique:MEMB_INFO,memb___id',
            'mail'=>'email|unique:MEMB_INFO,mail_addr',
            'c-mail'=>'same:mail',
            'pass'=>'min:9',
            'c-pass'=>'same:pass',
            'checkbox'=>'required'
        ]);

        MEMB_INFO::insert([
            'memb___id' => $request->login,
            'memb__pwd' => $request->pass,
            'memb_name' => $request->login,
            'sno__numb' => 111111111,
            'mail_addr' => $request->mail,
            'bloc_code' => 0,
            'ctl1_code' => 0,
            'reg_date' => time(),
        ]);
        return redirect()->back()->withSuccess('Thanks ' .$request->login. ' your registration was successful');
    }




    public function do_login(Request $request)
    {
        $user_data = MEMB_INFO::
            where('memb___id', '=', $request->login)
            ->where('memb__pwd', '=', $request->password)
            ->first();


        if ($user_data) {
            $request->session()->put('User', $user_data->memb___id);
            return redirect('account-panel');

        }
        else
        {
            return redirect()->back()->with('errors','Wrong password or account doesn\'t exist');
        }


    }

    public function do_logout()
    {
        Session::flush();


        return redirect('login');



    }
}



