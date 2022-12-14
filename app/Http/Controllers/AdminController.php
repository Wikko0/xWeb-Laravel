<?php

namespace App\Http\Controllers;

use App\Models\Character;
use App\Models\MEMB_INFO;
use App\Models\XWEB_ADDSTATS;
use App\Models\XWEB_ADMINCP;
use App\Models\XWEB_ADMINLOGIN;
use App\Models\XWEB_ANNOUNCE;
use App\Models\XWEB_DOWNLOAD;
use App\Models\XWEB_GRANDRESET;
use App\Models\XWEB_HOF;
use App\Models\XWEB_NEWS;
use App\Models\XWEB_PKCLEAR;
use App\Models\XWEB_RESET;
use App\Models\XWEB_SLIDERS;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Storage;
use App\Rules\SepareteTime;
use Illuminate\Validation\Validator;
use File;

class AdminController extends Controller
{
    public function adminhome()
    {
        if (session('Admin')) {


            $accinfo = MEMB_INFO::count();
            $charinfo = Character::count();


            return view('ap.home', ['accinfo' => $accinfo, 'charinfo' => $charinfo]);
        } else {
            return redirect('adminpanel/login');
        }

    }

    public function panel()
    {
        return view('ap.adminlogin');
    }

    public function do_panel(Request $request)
    {
        XWEB_ADMINLOGIN::where('id', $request->id)->update(['admin' => $request->name, 'password' => $request->password]);

        return redirect()->back()->withSuccess('You have changed admin data successfully!');
    }

    public function adminlogin()
    {

        return view('ap.login');
    }


    public function do_adminlogin(Request $request)
    {

        $admin_data = XWEB_ADMINLOGIN::
        where('admin', '=', $request->login)
            ->where('password', '=', $request->password)
            ->first();

        if ($admin_data) {
            $request->session()->put('Admin', $admin_data->admin);

            return redirect('adminpanel');

        } else {
            return redirect()->back()->with('errors', 'Wrong password, account doesn\'t exist or you arent Admin');
        }

    }


    public function adminseo()
    {
        return view('ap.seo');
    }

    public function do_adminseo(Request $request)
    {
        XWEB_ADMINCP::where('id', $request->id)->update(['sname' => $request->sname, 'stitle' => $request->stitle, 'sdescription' => $request->sdescription,
            'skeywords' => $request->skeywords, 'surl' => $request->surl, 'sforum' => $request->sforum, 'sdiscord' => $request->sdiscord]);

        return redirect()->back()->withSuccess('You have changed SEO information successfully!');
    }


    public function adminannounce()
    {
        $select = XWEB_ANNOUNCE::first();
        return view('ap.announce', ['announce_config' => $select]);
    }

    public function do_adminannounce(Request $request)
    {

        XWEB_ANNOUNCE::updateOrCreate(
            ['row' => 1],
            ['status' => $request->status, 'date' => $request->date, 'title' => $request->title]);
        return redirect('adminpanel/announce');
    }


    public function download()
    {
        return view('ap.download');
    }

    public function do_download(Request $request)
    {
        $this->validate($request, [
            'name' => 'unique:XWEB.XWEB_DOWNLOAD,name',
            'link' => 'active_url',
            'mb' => 'max:15'
        ]);

         XWEB_DOWNLOAD::
            insert(['mb' => $request->mb, 'name' => $request->name, 'version' => $request->version, 'link' => $request->link,
                'site' => $request->site]);


        return redirect()->back()->withSuccess('You have added this download link successfully!');
    }

    public function do_download_delete(Request $request)
    {

        foreach ($request->id as $key => $items) {

            XWEB_DOWNLOAD::where('id', $items)
                ->delete();
        }

        return redirect()->back()->withSuccess('Successfully deleted download link!');
    }


    public function event()
    {
        return view('ap.event');
    }


    public function do_event(Request $request)
    {
        $this->validate($request, [
            'everyday' => [new SepareteTime(), 'nullable'],
            'monday' => [new SepareteTime(), 'nullable'],
            'tuesday' => [new SepareteTime(), 'nullable'],
            'wednesday' => [new SepareteTime(), 'nullable'],
            'thursday' => [new SepareteTime(), 'nullable'],
            'friday' => [new SepareteTime(), 'nullable'],
            'saturday' => [new SepareteTime(), 'nullable'],
            'sunday' => [new SepareteTime(), 'nullable'],

        ]);

        $decode = json_decode(file_get_contents(storage_path() . "/app/public/event_config.json"), true);


        foreach ($decode['events']['event_timers'] as $value) {
            $name = $request->event;
            $days = $request->days;
            if (in_array(0, $days)) {
                $days = 0;
            }
            if ($days == 0) {
                $time = $request->everyday;
            }
            if (!is_array($days)) {
                $config = ['name' => $name, 'days' => $time];
            } else {
                $d = [];
                foreach ($days as $key => $values) {
                    if ($values == 1)
                        $d[$values] = $request->monday;
                    if ($values == 2)
                        $d[$values] = $request->tuesday;
                    if ($values == 3)
                        $d[$values] = $request->wednesday;
                    if ($values == 4)
                        $d[$values] = $request->thursday;
                    if ($values == 5)
                        $d[$values] = $request->friday;
                    if ($values == 6)
                        $d[$values] = $request->saturday;
                    if ($values == 7)
                        $d[$values] = $request->sunday;
                }

                $config = ['name' => $name, 'days' => $d];
            }
        }
        $new_config = array_push($decode['events']['event_timers'], $config);
        $newJsonString = json_encode($decode);
        file_put_contents(storage_path() . "/app/public/event_config.json", $newJsonString);
        return redirect()->back()->withSuccess('You have added this event successfully!');
    }

    public function do_event_delete(Request $request)
    {

        $decode = json_decode(file_get_contents(storage_path() . "/app/public/event_config.json"), true);


        foreach ($decode['events']['event_timers'] as $key => $element) {

            //check the property of every element
            if ($request->name == $element['name']) {
                unset($decode['events']['event_timers'][$key]);
            }

        }

        $newJsonString = json_encode($decode);
        file_put_contents(storage_path() . "/app/public/event_config.json", $newJsonString);
        return redirect()->back()->withSuccess('You have deleted this event successfully!');
    }


    public function boss()
    {
        return view('ap.boss');
    }


    public function do_boss(Request $request)
    {
        $this->validate($request, [
            'everyday' => [new SepareteTime(), 'nullable'],
            'monday' => [new SepareteTime(), 'nullable'],
            'tuesday' => [new SepareteTime(), 'nullable'],
            'wednesday' => [new SepareteTime(), 'nullable'],
            'thursday' => [new SepareteTime(), 'nullable'],
            'friday' => [new SepareteTime(), 'nullable'],
            'saturday' => [new SepareteTime(), 'nullable'],
            'sunday' => [new SepareteTime(), 'nullable'],

        ]);

        $decode = json_decode(file_get_contents(storage_path() . "/app/public/boss_config.json"), true);


        foreach ($decode['events']['event_timers'] as $value) {
            $name = $request->event;
            $days = $request->days;
            if (in_array(0, $days)) {
                $days = 0;
            }
            if ($days == 0) {
                $time = $request->everyday;
            }
            if (!is_array($days)) {
                $config = ['name' => $name, 'days' => $time];
            } else {
                $d = [];
                foreach ($days as $key => $values) {
                    if ($values == 1)
                        $d[$values] = $request->monday;
                    if ($values == 2)
                        $d[$values] = $request->tuesday;
                    if ($values == 3)
                        $d[$values] = $request->wednesday;
                    if ($values == 4)
                        $d[$values] = $request->thursday;
                    if ($values == 5)
                        $d[$values] = $request->friday;
                    if ($values == 6)
                        $d[$values] = $request->saturday;
                    if ($values == 7)
                        $d[$values] = $request->sunday;
                }

                $config = ['name' => $name, 'days' => $d];
            }
        }
        $new_config = array_push($decode['events']['event_timers'], $config);
        $newJsonString = json_encode($decode);
        file_put_contents(storage_path() . "/app/public/boss_config.json", $newJsonString);
        return redirect()->back()->withSuccess('You have added this boss successfully!');
    }

    public function do_boss_delete(Request $request)
    {

        $decode = json_decode(file_get_contents(storage_path() . "/app/public/boss_config.json"), true);


        foreach ($decode['events']['event_timers'] as $key => $element) {

            //check the property of every element
            if ($request->name == $element['name']) {
                unset($decode['events']['event_timers'][$key]);
            }

        }

        $newJsonString = json_encode($decode);
        file_put_contents(storage_path() . "/app/public/boss_config.json", $newJsonString);
        return redirect()->back()->withSuccess('You have deleted this boss successfully!');
    }

    public function slider()
    {
        $get = ['slider' => DB::connection('XWEB')->Table('XWEB_SLIDERS')->get()];
        return view('ap.slider', $get);
    }

    public function slider_upload(Request $request)
    {

        $this->validate($request, [
            'image' => 'dimensions:min_width=884,min_height=374,max_width=884,max_height=374|mimes:jpg|required|max:10000'
        ], ['image.dimensions' => 'Image must be at least 884 x 374 pixels']);

        $id = XWEB_SLIDERS::latest('id')->first();
        $last = $id->id ?? 0;
        $next_id = ++$last;
        $name = 'slider-img' . $next_id;

         XWEB_SLIDERS::insert(['name' => $name]);


        $makeImage = $request->file('image');
        $makeImage->move(public_path() . '/images/', $name . '.jpg');

        return redirect()->back()->withSuccess('You have added this slider successfully!');
    }

    public function slider_delete(Request $request)
    {

        $name = $request->name;
        $ImagePath = public_path('images/' . $name . '.jpg');
        if (File::exists($ImagePath)) {
            File::delete($ImagePath);
        }
        foreach ($request->id as $key => $items) {
            XWEB_SLIDERS::
                where('id', $items)
                ->delete();
        }


        return redirect()->back()->withSuccess('You have deleted this slider successfully!');
    }

    public function news()
    {
        return view('ap.news');
    }

    public function news_upload(Request $request)
    {

        $today = date('Y-m-d');
       XWEB_NEWS::
            insert(['date' => $today,
                'subject' => $request->title,
                'news' => $request->news,
                'prefix' => $request->prefix,
                'specific' => 'news']);
        return redirect()->back()->withSuccess('You have added this news successfully!');
    }

    public function news_delete(Request $request)
    {
        foreach ($request->id as $key => $id) {

           XWEB_NEWS::
                where('id', $id)
                ->delete();
        }

        return redirect()->back()->withSuccess('You have deleted this news successfully!');
    }

    public function events()
    {
        return view('ap.events');
    }

    public function events_upload(Request $request)
    {

        $today = date('Y-m-d');
         XWEB_NEWS::
            insert(['date' => $today,
                'subject' => $request->title,
                'news' => $request->news,
                'prefix' => $request->prefix,
                'specific' => 'events']);
        return redirect()->back()->withSuccess('You have added this event news successfully!');
    }

    public function events_delete(Request $request)
    {
        foreach ($request->id as $key => $id) {

            XWEB_NEWS::
                where('id', $id)
                ->delete();
        }

        return redirect()->back()->withSuccess('You have deleted this event news successfully!');
    }

    public function updates()
    {
        return view('ap.updates');
    }

    public function updates_upload(Request $request)
    {

        $today = date('Y-m-d');
        XWEB_NEWS::
            insert(['date' => $today,
                'subject' => $request->title,
                'news' => $request->news,
                'prefix' => $request->prefix,
                'specific' => 'updates']);
        return redirect()->back()->withSuccess('You have added this updates news successfully!');
    }

    public function updates_delete(Request $request)
    {
        foreach ($request->id as $key => $id) {

            XWEB_NEWS::
                where('id', $id)
                ->delete();
        }

        return redirect()->back()->withSuccess('You have deleted this updates news successfully!');
    }

    public function hof()
    {
        $class = ['char' => XWEB_HOF::get()];
        return view('ap.hof', $class);
    }

    public function hof_add(Request $request)
    {
       XWEB_HOF::
            where('class', '=', $request->class)
            ->update(['name' => $request->name,
                'wins' => $request->wins
            ]);
        return redirect()->back()->withSuccess('You have added this updates HOF successfully!');
    }

    public function hofswitch()
    {
        $class = ['char' => XWEB_HOF::get()];
        return view('ap.hofswitch', $class);
    }

    public function hof_switch(Request $request)
    {
        foreach ($request->id as $i => $id) {
            $switch = $request->switch[$i] ?? null;

            if ($switch == true) {
                $switch = "Yes";
            } else {
                $switch = "No";
            }

            XWEB_HOF::
                where('name', $request->name[$i])
                ->update(
                    [
                        'status' => $switch,
                    ]);
        }

        return redirect()->back()->withSuccess('You have added this updates HOF successfully!');

    }

    public function reset()
    {
        $db = ['reset' => XWEB_RESET::get()];
        return view('ap.reset', $db);
    }

    public function do_reset(Request $request)
    {
        XWEB_RESET::
            where('id', $request->id)
            ->update(['maxresets' => $request->maxresets,
                'level' => $request->level,
                'zen' => $request->zen,
                'bkpoints' => $request->bkpoints,
                'smpoints' => $request->smpoints,
                'elfpoints' => $request->elfpoints,
                'mgpoints' => $request->mgpoints,
                'dlpoints' => $request->dlpoints,
                'sumpoints' => $request->sumpoints,
                'rfpoints' => $request->rfpoints,
                'glpoints' => $request->glpoints,

            ]);
        return redirect()->back()->withSuccess('You have changed reset settings successfully!');
    }

    public function addstats()
    {
        $db = ['addstats' => XWEB_ADDSTATS::get()];
        return view('ap.addstats', $db);
    }

    public function do_addstats(Request $request)
    {
        XWEB_ADDSTATS::where('id', $request->id)
            ->update(['maxpoints' => $request->maxpoints

            ]);
        return redirect()->back()->withSuccess('You have changed addstats settings successfully!');
    }

    public function grandreset()
    {
        $db = ['greset' => XWEB_GRANDRESET::get()];
        return view('ap.grandreset', $db);
    }

    public function do_grandreset(Request $request)
    {
        XWEB_GRANDRESET::where('id', $request->id)
            ->update(['maxgresets' => $request->maxgresets,
                'resets' => $request->resets,
                'level' => $request->level,
                'zen' => $request->zen,
                'credits' => $request->credits,

            ]);
        return redirect()->back()->withSuccess('You have changed reset settings successfully!');
    }

    public function pkclear()
    {
        $db = ['pkclear' => XWEB_PKCLEAR::get()];
        return view('ap.pkclear', $db);
    }

    public function do_pkclear(Request $request)
    {
        XWEB_PKCLEAR::where('id', $request->id)
            ->update(['zen' => $request->zen
            ]);
        return redirect()->back()->withSuccess('You have changed PK Clear cost settings successfully!');
    }

}
