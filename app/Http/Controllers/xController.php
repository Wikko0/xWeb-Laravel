<?php

namespace App\Http\Controllers;

use App\Models\Character;
use App\Models\XWEB_DOWNLOAD;
use App\Models\XWEB_NEWS;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Session\Session;

class xController extends Controller
{
    public function index()
    {
        $selectchars = Character::orderBy('Resets', 'desc')
            ->paginate(5);
        $selectguilds = Character::orderBy('Resets', 'desc')
            ->paginate(5);

        // Top5 Characters
        $topchars="";
        foreach($selectchars as $i=>$row)
        {
            // Class
            $class = '';
            $classsm = array(0,1,3,7);
            $classbk = array(16,17,19,23);
            $clasself = array(32,33,35,39);
            $classmg = array(48,50,54);
            $classdl = array(64,66,70);
            $classsum = array(80,81,83,87);
            $classrf = array(96,98,102);
            $smicon = url('/images/sm-icon.png');
            $bkicon = url('/images/bk-icon.png');
            $elficon = url('/images/elf-icon.png');
            $mgicon = url('/images/mg-icon.png');
            $dlicon = url('/images/dl-icon.png');
            $sumicon = url('/images/sum-icon.png');
            $rficon = url('/images/rf-icon.png');

            if(in_array($row -> Class, $classsm)){
                $class = "<img src='{$smicon}' alt=''>";
            }
            if(in_array($row -> Class, $classbk)){
                $class = "<img src='{$bkicon}' alt=''>";
            }
            if(in_array($row -> Class, $clasself)){
                $class = "<img src='{$elficon}' alt=''>";
            }
            if(in_array($row -> Class, $classmg)){
                $class = "<img src='{$mgicon}' alt=''>";
            }
            if(in_array($row -> Class, $classdl)){
                $class = "<img src='{$dlicon}' alt=''>";
            }
            if(in_array($row -> Class, $classsum)){
                $class = "<img src='{$sumicon}' alt=''>";
            }
            if(in_array($row -> Class, $classrf)){
                $class = "<img src='{$rficon}' alt=''>";
            }


            // Top5 Characters variable
            $topchars.='<tr>'.
                ' <td>'.++$i.'</td>'.
                '<td>'.$row -> Name.'</td>'.
                '<td>'.$class.'</td>'.
                '<td>'.$row -> Resets.'</td>'.

                '</tr>';
        }


        // Top5 Characters
        $topguilds="";
        foreach($selectguilds as $i=>$row)
        {

            // Top5 Guilds variable
            $topguilds.='<tr>'.
                ' <td>'.++$i.'</td>'.
                '<td>'.$row -> G_Name.'</td>'.
                '<td>'.$row -> G_Master.'</td>'.
                '<td>'.$row -> Resets.'</td>'.

                '</tr>';
        }
        // News in home
        $news = XWEB_NEWS::where('specific', '=', 'news')
            ->paginate('5');

        $events = XWEB_NEWS::where('specific', '=', 'events')
            ->paginate('5');

        $updates = XWEB_NEWS::where('specific', '=', 'updates')
            ->paginate('5');


        return view('index', ['topchars'=> $topchars , 'topguilds'=> $topguilds , 'news'=> $news , 'events'=> $events , 'updates'=> $updates]);
    }

    public function register()
    {
        return view('register');
    }
    public function login()
    {
        return view('login');
    }
    public function account_panel()
    {
        $data = ['UserInfo'=> DB::Table('MEMB_INFO')->where('memb___id', '=', session('User'))->first()];
        return view('user.account-panel', $data);
    }
    public function download()
    {
        $mb = ['lite'=> XWEB_DOWNLOAD::where('version', '=', 'lite')->first('mb'),
            'full'=> XWEB_DOWNLOAD::where('version', '=', 'full')->first('mb')];

        $data = ['litelink'=> XWEB_DOWNLOAD::where('version', '=', 'lite')->get(),
            'fulllink'=> XWEB_DOWNLOAD::where('version', '=', 'full')->get(),
            'update'=> XWEB_DOWNLOAD::where('version', '=', 'update')->get()];
        return view('download', $mb, $data);
    }

    public function ranking(Request $request)
    {

       // Select Character
        $select = Character::orderBy('Resets', 'desc')
            ->paginate(15);


        // Search Ranking
        $search = $request->input('search');
        $searchby = $request->input('searchby');

        if(isset($search))
        {
            $select = DB::table('Character')
                ->Where('Name', 'LIKE', "%{$search}%")
                ->paginate(15);

        }
        if(isset($searchby))
        {
            $select = DB::table('Character')
                ->Where('Class', '=', "{$searchby}")
                ->paginate(15);
        }



        // Output
        $output="";
        foreach($select as $i=>$row)
        {
            // Class
            $class = '';
            $classsm = array(0,1,3,7);
            $classbk = array(16,17,19,23);
            $clasself = array(32,33,35,39);
            $classmg = array(48,50,54);
            $classdl = array(64,66,70);
            $classsum = array(80,81,83,87);
            $classrf = array(96,98,102);
            $smicon = url('/images/sm-icon.png');
            $bkicon = url('/images/bk-icon.png');
            $elficon = url('/images/elf-icon.png');
            $mgicon = url('/images/mg-icon.png');
            $dlicon = url('/images/dl-icon.png');
            $sumicon = url('/images/sum-icon.png');
            $rficon = url('/images/rf-icon.png');

            if(in_array($row -> Class, $classsm)){
                $class = "<img src='{$smicon}' alt=''>";
            }
            if(in_array($row -> Class, $classbk)){
                $class = "<img src='{$bkicon}' alt=''>";
            }
            if(in_array($row -> Class, $clasself)){
                $class = "<img src='{$elficon}' alt=''>";
            }
            if(in_array($row -> Class, $classmg)){
                $class = "<img src='{$mgicon}' alt=''>";
            }
            if(in_array($row -> Class, $classdl)){
                $class = "<img src='{$dlicon}' alt=''>";
            }
            if(in_array($row -> Class, $classsum)){
                $class = "<img src='{$sumicon}' alt=''>";
            }
            if(in_array($row -> Class, $classrf)){
                $class = "<img src='{$rficon}' alt=''>";
            }


            // Output variable
            $output.='<tr>'.
                ' <td>'.++$i.'</td>'.
                '<td>'.$row -> Name.'</td>'.
                '<td>'.$class.'</td>'.
                '<td><img src="images/clan-icon.png" alt=""> Warriors</td>'.
                '<td>'.$row -> Resets.'</td>'.

                '</tr>';
    }


        return view('ranking' , ['output' => $output],['select'=> $select]);
    }


    public function news()
    {
        $news = XWEB_NEWS::where('specific', '=', 'news')
            ->paginate('5');

        $events = XWEB_NEWS::where('specific', '=', 'events')
            ->paginate('5');

        $updates = XWEB_NEWS::where('specific', '=', 'updates')
            ->paginate('5');

        return view('news', ['news'=> $news, 'events'=> $events, 'updates'=> $updates]);
    }

}
