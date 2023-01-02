<?php

namespace App\Http\Controllers;

use App\Models\Character;
use App\Models\Guild;
use App\Models\GuildMember;
use App\Models\MEMB_INFO;
use App\Models\MEMB_STAT;
use App\Models\XWEB_ADMINLOGIN;
use App\Models\XWEB_CHAR_INFO;
use App\Models\XWEB_CREDITS;
use App\Models\XWEB_DOWNLOAD;
use App\Models\XWEB_NEWS;
use App\Models\XWEB_VIP;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class xController extends Controller
{
    protected function class($user){
        switch ($user) {
            case 0:
                return 'Dark Wizard';
            case 1:
                return 'Soul Master';
            case 3:
                return 'Grand Master';
            case 7:
                return 'Soul Wizard';

            case 16:
                return 'Dark Knight';
            case 17:
                return 'Blade Knight';
            case 19:
                return 'Blade Master';
            case 23:
                return 'Dragon Knight';

            case 32:
                return 'Fairy Elf';
            case 33:
                return 'Muse Elf';
            case 35:
                return 'High Elf';
            case 39:
                return 'Noble Elf';

            case 48:
                return 'Magic Gladiator';
            case 50:
                return 'Duel Master';
            case 54:
                return 'Magic Knight';

            case 64:
                return 'Dark Lord';
            case 66:
                return 'Lord Emperor';
            case 70:
                return 'Empire Lord';

            case 80:
                return 'Summoner';
            case 81:
                return 'Bloody Summoner';
            case 83:
                return 'Dimension Master';
            case 87:
                return 'Dimension Summoner';

            case 96:
                return 'Rage Fighter';
            case 98:
                return 'Fist Master';
            case 102:
                return 'Fist Blazer';

            case 112:
                return 'Grow Lancer';
            case 114:
                return 'Mirage Lancer';
            case 118:
                return 'Shining Lancer';
        }

    }

    protected function status($user)
    {
        $id = Character::where('Name', '=', $user)->first();
        $check =  MEMB_STAT::where('memb___id', '=', $id->AccountID)->first();
        $check2 = DB::table('AccountCharacter')->where('id', '=', $id->AccountID)->first();


        if(!$check)
        {
            return 'Online';
        }
        elseif($check->ConnectStat >= 1)
        {
            return 'Online';
        }
        elseif($check->ConnectStat >= 1 && $check2->GameIDC == $user)
        {
            return 'Online';
        }
        else
        {
            return 'Offline';
        }
    }

    protected function map($value)
    {
        $map = array(
            0 => 'Lorencia',
            1 => 'Dungeon',
            2 => 'Devias',
            3 => 'Noria',
            4 => 'Lost Tower',
            6 => 'Arena',
            7 => 'Atlans',
            8 => 'Tarkan',
            9 => 'Devil Square',
            10 => 'Icarus',
            11 => 'Blood Castle',
            12 => 'Blood Castle',
            13 => 'Blood Castle',
            14 => 'Blood Castle',
            15 => 'Blood Castle',
            16 => 'Blood Castle',
            17 => 'Blood Castle',
            18 => 'Chaos Castle',
            19 => 'Chaos Castle',
            20 => 'Chaos Castle',
            21 => 'Chaos Castle',
            22 => 'Chaos Castle',
            23 => 'Chaos Castle',
            24 => 'Kalima 1',
            25 => 'Kalima 2',
            26 => 'Kalima 3',
            27 => 'Kalima 4',
            28 => 'Kalima 5',
            29 => 'Kalima 6',
            30 => 'Valley of Loren',
            31 => 'Land of Trials',
            32 => 'Devil Square',
            33 => 'Aida',
            34 => 'Crywolf Fortress',
            36 => 'Kalima 7',
            37 => 'Kanturu',
            38 => 'Kanturu',
            39 => 'Kanturu',
            40 => 'Silent Map',
            41 => 'Balgass Barracks',
            42 => 'Balgass Refuge',
            45 => 'Illusion Temple',
            46 => 'Illusion Temple',
            47 => 'Illusion Temple',
            48 => 'Illusion Temple',
            49 => 'Illusion Temple',
            50 => 'Illusion Temple',
            51 => 'Elbeland',
            52 => 'Blood Castle',
            53 => 'Chaos Castle',
            56 => 'Swamp of Calmness',
            57 => 'Raklion',
            58 => 'Raklion Boss',
            62 => 'Santa\'s Village',
            63 => 'Vulcanus',
            64 => 'Duel Arena',
            65 => 'Doppelganger',
            66 => 'Doppelganger',
            67 => 'Doppelganger',
            68 => 'Doppelganger',
            69 => 'Imperial Guardian',
            70 => 'Imperial Guardian',
            71 => 'Imperial Guardian',
            72 => 'Imperial Guardian',
            79 => 'Loren Market',
            80 => 'Karutan 1',
            81 => 'Karutan 2',
            82 => 'Doppelganger',
            91 => 'Acheron',
            92 => 'Acheron',
            95 => 'Debenter',
            96 => 'Debenter',
            97 => 'Chaos Castle',
            98 => 'Ilusion Temple',
            99 => 'Ilusion Temple',
            100 => 'Uruk Mountain',
            101 => 'Uruk Mountain',
            102 => 'Tormented Square',
            103 => 'Tormented Square',
            104 => 'Tormented Square',
            105 => 'Tormented Square',
            106 => 'Tormented Square',
            110 => 'Nars',
            112 => 'Ferea',
            113 => 'Nixie Lake',
            114 => 'Quest Zone',
            115 => 'Labyrinth',
            116 => 'Deep Dungeon',
            117 => 'Deep Dungeon',
            118 => 'Deep Dungeon',
            119 => 'Deep Dungeon',
            120 => 'Deep Dungeon',
            121 => 'Quest Zone',
            122 => 'Swamp of Darkness',
            123 => 'Kubera Mine',
            124 => 'Kubera Mine',
            125 => 'Kubera Mine',
            126 => 'Kubera Mine',
            127 => 'Kubera Mine',
            128 => 'Atlans Abyss',
            129 => 'Atlans Abyss 2',
            130 => 'Atlans Abyss 3',
            131 => 'Scorched Canyon',
            132 => 'Crimson Flame Icarus',
            133 => 'Temple of Arnil',
            134 => 'Aida Gray',
            135 => 'Old Kethotum',
            136 => 'Burning Kethotum',
        );

        return isset( $map[$value] ) ? $map[$value] : "----";

    }

    protected function background($class)
    {
        $classsm = array(0,1,3,7);
        $classbk = array(16,17,19,23);
        $clasself = array(32,33,35,39);
        $classmg = array(48,50,54);
        $classdl = array(64,66,70);
        $classsum = array(80,81,83,87);
        $classrf = array(96,98,102);
        $classgl = array(112,114,118);
        if(in_array($class, $classsm)){
            return "class-sm";
        }
        if(in_array($class, $classbk)){
            return "class-bk";
        }
        if(in_array($class, $clasself)){
            return "class-elf";
        }
        if(in_array($class, $classmg)){
            return "class-mg";
        }
        if(in_array($class, $classdl)){
            return "class-dl";
        }
        if(in_array($class, $classsum)){
            return "class-sum";
        }
        if(in_array($class, $classrf)){
            return "class-rf";
        }
        if(in_array($class, $classgl)){
            return "class-gl";
        }

    }

    public function index()
    {
        $selectchars = Character::orderBy('Resets', 'desc')
            ->paginate(5);
        $selectguilds = Guild::orderBy('Resets', 'desc')
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

            if(in_array($row->Class, $classsm)){
                $class = "<img src='{$smicon}' alt=''>";
            }
            if(in_array($row->Class, $classbk)){
                $class = "<img src='{$bkicon}' alt=''>";
            }
            if(in_array($row->Class, $clasself)){
                $class = "<img src='{$elficon}' alt=''>";
            }
            if(in_array($row->Class, $classmg)){
                $class = "<img src='{$mgicon}' alt=''>";
            }
            if(in_array($row->Class, $classdl)){
                $class = "<img src='{$dlicon}' alt=''>";
            }
            if(in_array($row->Class, $classsum)){
                $class = "<img src='{$sumicon}' alt=''>";
            }
            if(in_array($row->Class, $classrf)){
                $class = "<img src='{$rficon}' alt=''>";
            }


            // Top5 Characters variable
            $topchars.='<tr>'.
                ' <td>'.++$i.'</td>'.
                '<td><a href="/user/'.$row->Name.'">'.$row -> Name.'</a></td>'.
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
        $userinfo = MEMB_INFO::where('memb___id', '=', session('User'))->first();
        $select = Character::where('AccountID', '=', session('User'))->get();
        $admincheck = XWEB_ADMINLOGIN::first();
        $vipcheck = XWEB_VIP::where('account', session('User'))->first();
        $credits = XWEB_CREDITS::where('name', session('User'))->first();

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

            if(in_array($row->Class, $classsm)){
                $class = "<img src='{$smicon}' alt=''>";
            }
            if(in_array($row->Class, $classbk)){
                $class = "<img src='{$bkicon}' alt=''>";
            }
            if(in_array($row->Class, $clasself)){
                $class = "<img src='{$elficon}' alt=''>";
            }
            if(in_array($row->Class, $classmg)){
                $class = "<img src='{$mgicon}' alt=''>";
            }
            if(in_array($row->Class, $classdl)){
                $class = "<img src='{$dlicon}' alt=''>";
            }
            if(in_array($row->Class, $classsum)){
                $class = "<img src='{$sumicon}' alt=''>";
            }
            if(in_array($row->Class, $classrf)){
                $class = "<img src='{$rficon}' alt=''>";
            }

            if($row->PkLevel == 0){
                $pklevel = "Hero";
            }
            if($row->PkLevel == 1){
                $pklevel = "Commoner";
            }
            if($row->PkLevel == 2){
                $pklevel = "Normal";
            }
            if($row->PkLevel == 3){
                $pklevel = "Against Murderer";
            }
            if($row->PkLevel == 4){
                $pklevel = "Murderer";
            }
            if($row->PkLevel == 5){
                $pklevel = "Phonomania";
            }


            // Output variable
            $output.=
                '<tr>'.
                ' <td rowspan="2">'.++$i.'</td>'.
                '<td rowspan="1">'.$row -> Name.'</td>'.
                '<td rowspan="2">'.$class.'</td>'.
                '<td>'.$row->cLevel.'</td>'.
                '<td>'.$row -> Resets.'</td>'.
                '<td>'.$row -> Strength.'</td>'.
                '<td>'.$row -> Dexterity.'</td>'.
                '<td>'.$row -> Vitality.'</td>'.
                '<td>'.$row -> Energy.'</td>'.
                '<td>'.$row -> PkCount.'</td>'.
                '</tr>'.

            '<tr>'.
            '<td rowspan="1">'.$pklevel.'</td>'.
            '<td colspan="8">Created '.date('d/m/Y H:i', strtotime($row->MDate)).'</td>'.
            '</tr>'

            ;
        }

        //Rank
        if ($admincheck->admin == session('User')) {
            $rank = 'Administrator';
        }
        else
        {
             $rank = 'User';
        }

        //Vip
        $expires = $vipcheck->expires ?? 'Expired';
        $account = $vipcheck->account ?? 0;

        if ($expires != 'Expired' && $account == session('User'))
        {
            $vip = 'Activated';
        }
        else
        {
            $vip = 'None (<a href="/buyvip">Buy Now</a>)';
        }

        return view('user.account-panel', ['UserInfo' => $userinfo, 'output' => $output, 'rank' => $rank, 'vip' => $vip, 'vipcheck' => $vipcheck, 'credits' => $credits]);
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
            $select = Character::where('Name', 'LIKE', "%{$search}%")
                ->paginate(15);

        }
        if(isset($searchby))
        {
            $select = Character::where('Class', '=', "{$searchby}")
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

            if(in_array($row->Class, $classsm)){
                $class = "<img src='{$smicon}' alt=''>";
            }
            if(in_array($row->Class, $classbk)){
                $class = "<img src='{$bkicon}' alt=''>";
            }
            if(in_array($row->Class, $clasself)){
                $class = "<img src='{$elficon}' alt=''>";
            }
            if(in_array($row->Class, $classmg)){
                $class = "<img src='{$mgicon}' alt=''>";
            }
            if(in_array($row->Class, $classdl)){
                $class = "<img src='{$dlicon}' alt=''>";
            }
            if(in_array($row->Class, $classsum)){
                $class = "<img src='{$sumicon}' alt=''>";
            }
            if(in_array($row->Class, $classrf)){
                $class = "<img src='{$rficon}' alt=''>";
            }


            // Output variable
            $output.='<tr>'.
                ' <td>'.++$i.'</td>'.
                '<td><a href="/user/'.$row->Name.'">'.$row -> Name.'</a></td>'.
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

    public function information()
    {
        $countchar = Character::count();
        $countacc = MEMB_INFO::count();
        $countguild = Guild::count();
        $countonline = MEMB_STAT::where('ConnectStat', 1)->count();
        return view('information',['countacc' => $countacc,'countchar' => $countchar,'countguild' => $countguild,'countonline' => $countonline]);
    }


    public function user($username)
    {
        $user = Character::where('Name', $username)->firstOrFail();
        $grandresets = XWEB_CHAR_INFO::where('name', $username)->first();
        $status = $this->status($username);
        $class = $this->class($user->Class);
        $map = $this->map($user->MapNumber);
        $guild = GuildMember::where('Name', $username)->first();
        $background = $this->background($user->Class);

        return view('user', ['user' => $user, 'class' => $class, 'grandresets' => $grandresets, 'status' => $status, 'map' => $map, 'guild' => $guild, 'background' => $background]);
    }
}
