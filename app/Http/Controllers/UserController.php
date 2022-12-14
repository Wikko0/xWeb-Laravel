<?php

namespace App\Http\Controllers;

use App\Models\Character;
use App\Models\XWEB_ADDSTATS;
use App\Models\XWEB_CHAR_INFO;
use App\Models\XWEB_CREDITS;
use App\Models\XWEB_GRANDRESET;
use App\Models\XWEB_PKCLEAR;
use App\Models\XWEB_RESET;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Session\Session;

class UserController extends Controller
{

   public function pklevel($value, $view=0)
    {
        $pklevel = array(
            0 => array('Hero'),
            1 => array('Commoner'),
            2 => array('Normal'),
            3 => array('Against Murderer'),
            4 => array('Murderer'),
            5 => array('Phonomania')
        );
        return isset($pklevel[$value][$view]) ? $pklevel[$value][$view] : 'Unknown';
    }


    private function online($char)
    {
        $id = Character::where('Name', '=', $char)->first();
        $check =  DB::table('MEMB_STAT')->where('memb___id', '=', $id->AccountID)->first();
        $check2 = DB::table('AccountCharacter')->where('id', '=', $id->AccountID)->first();


        if(!$check)
        {
            return 1;
        }
        elseif($check->ConnectStat >= 1)
        {
            return 1;
        }
        elseif($check->ConnectStat >= 1 && $check2->GameIDC == $char)
        {
            return 1;
        }
        else
        {
            return 0;
        }
    }
    public function reset()
    {

        $data = ['char'=> Character::where('AccountID', '=', session('User'))->get()];
        return view('user.reset', $data);

    }

    public function do_reset(Request $request)
    {
        if (empty($request->char))
        {
            return redirect()->back()->withErrors('Choose character first!');
        }
        else {
            $online = $this->online($request->char);
            $select = Character::where('Name', '=', $request->char)->first();
            $reset = XWEB_RESET::first();
            switch ($select->Class) {
                case 0:
                case 1:
                case 2:
                case 3:
                case 7:
                case 16:
                    $points = $reset->smpoints;
                    break;
                case 16:
                case 17:
                case 18:
                case 19:
                case 23:
                    $points = $reset->bkpoints;
                    break;
                case 32:
                case 33:
                case 34:
                case 35:
                case 39:
                    $points = $reset->mepoints;
                    break;
                case 48:
                case 49:
                case 50:
                case 54:
                    $points = $reset->mgpoints;
                    break;
                case 64:
                case 65:
                case 66:
                case 70:
                    $points = $reset->dlpoints;
                    break;
                case 80:
                case 81:
                case 83:
                case 87:
                    $points = $reset->sumpoints;
                    break;
                case 96:
                case 98:
                case 10:
                    $points = $reset->rfpoints;
                    break;
                case 112:
                case 114:
                case 118:
                    $points = $reset->glpoints;
                    break;
            }

            $newzen = $select->Money - $reset->zen;
            $newpoints = $select->Resets * $points;

            // Verification
            if ($select->cLevel < $reset->level) {
                return redirect()->back()->withErrors('You\'re not Max Level!');
            } elseif ($newzen < 0) {
                return redirect()->back()->withErrors('You don\'t have enough zen!');
            } elseif ($select->Resets >= $reset->maxresets) {
                return redirect()->back()->withErrors('You\'re Max Resets!');
            }
            elseif ($online === 1) {
                return redirect()->back()->withErrors('Leave game first!');
            }
            // Update
            else {
                Character::
                    where('Name', '=', $request->char)
                    ->update([
                        'Resets' => DB::raw('Resets+1'),
                        'Strength' => 25,
                        'Dexterity' => 25,
                        'Vitality' => 25,
                        'Energy' => 25,
                        'Experience' => 0,
                        'LevelUpPoint' => $newpoints,
                        'Money' => $newzen,
                        'cLevel' => 1
                    ]);
            }

            return redirect()->back()->with('success', 'You have reset this character successfully!');
        }
    }

    public function addstats()
    {

        $data = ['char'=> Character::where('AccountID', '=', session('User'))->get()];
        return view('user.add-stats', $data);

    }

    public function do_addstats(Request $request)
    {


        if (empty($request->char))
        {
            return redirect()->back()->withErrors('Choose character first!');
        }
        else {
            $select = Character::where('Name', '=', $request->char)->first();
            $addstats = XWEB_ADDSTATS::first();
            $newpoints = $select->LevelUpPoint - ($request->str + $request->agi + $request->vit + $request->ene);
            $maxpoints = $addstats->maxpoints;

            // 4Check
            $dl = 0;
            $newstr = $select->Strength + $request->str;
            $newagi = $select->Dexterity + $request->agi;
            $newvit = $select->Vitality + $request->vit;
            $newene = $select->Energy + $request->ene;
            $newcom = $select->Leadership + $request->com;
            $online = $this->online($request->char);

            $dataToUpdate = [
                'Strength' => $select->Strength + $request->str,
                'Dexterity' => $select->Dexterity + $request->agi,
                'Vitality' => $select->Vitality + $request->vit,
                'Energy' => $select->Energy + $request->ene,
                'LevelUpPoint' => $newpoints,
            ];

            if ($select->Class == 64 or $select->Class == 65 or $select->Class == 66) {
                $dataToUpdate['Leadership'] = $select->Leadership + $request->com;
                $dl = 1;
            }

            // Verification
            if ($newpoints < 0) {
                return redirect()->back()->withErrors('You don\'t have enough points!');
            }
            elseif ($newstr > $maxpoints or $newagi > $maxpoints or $newvit > $maxpoints or $newene > $maxpoints or $newcom > $maxpoints) {
                return redirect()->back()->withErrors('Max stats is ' . $maxpoints . '!');
            }
            elseif ($dl === 0 && $request->com != 0) {
                return redirect()->back()->withErrors('Тhe character doesn\'t use a command');
            }
            elseif ($request->str < 0 OR $request->agi < 0 OR $request->vit < 0 OR $request->ene < 0 OR $request->com < 0) {
                return redirect()->back()->withErrors('Invalid symbols');
            }
            elseif ($online === 1) {
                return redirect()->back()->withErrors('Leave game first!');
            }
            // Update
            else {
                Character::where('Name', '=', $request->char)
                    ->update($dataToUpdate);
            }

            return redirect()->back()->with('success', 'You have add stats successfully!');
        }
    }

    public function grandreset()
    {

        $data = ['char'=> Character::where('AccountID', '=', session('User'))->get()];
        return view('user.grandreset', $data);

    }

    public function do_grandreset(Request $request)
    {
        if (empty($request->char))
        {
            return redirect()->back()->withErrors('Choose character first!');
        }
        else {
            $online = $this->online($request->char);
            $select = Character::where('Name', '=', $request->char)->first();
            $credits = XWEB_CREDITS::where('name', '=', $select->AccountID)->first();
            $greset = XWEB_GRANDRESET::first();
            $charinfo = XWEB_CHAR_INFO::first();

            $newzen = $select->Money - $greset->zen;
            $newcredits = $greset->credits + $credits->credits;


            // Verification
            if ($select->cLevel < $greset->level) {
                return redirect()->back()->withErrors('You\'re not Max Level!');
            } elseif ($newzen < 0) {
                return redirect()->back()->withErrors('You don\'t have enough zen!');
            } elseif ($select->Resets < $greset->maxgresets) {
                return redirect()->back()->withErrors('You\'re Not Max Resets!');
            } elseif ($select->Resets < $greset->maxgresets) {
                return redirect()->back()->withErrors('You\'re Not Max Resets!');
            }
            elseif ($online === 1) {
                return redirect()->back()->withErrors('Leave game first!');
            }
            // Update
            else {
                Character::
                where('Name', '=', $request->char)
                    ->update([
                        'Resets' => 0,
                        'Strength' => 25,
                        'Dexterity' => 25,
                        'Vitality' => 25,
                        'Energy' => 25,
                        'Experience' => 0,
                        'LevelUpPoint' => 0,
                        'Money' => $newzen,
                        'cLevel' => 1
                    ]);
                XWEB_CREDITS::
                    update(['credits' => $newcredits,
                    ]);
                if (empty($charinfo->name))
                {
                    XWEB_CHAR_INFO::
                        insert([
                            'name' => $request->char,
                            'gresets' => 1
                        ]);
                }
                else
                {
                    XWEB_CHAR_INFO::
                    where('name', '=', $request->char)
                        ->update(['gresets' => DB::raw('gresets+1'),
                        ]);
                }

            }

            return redirect()->back()->with('success', 'You have reset this character successfully!');
        }
    }

    public function clearpk()
    {

        $char = Character::where('AccountID', '=', session('User'))->get();
        return view('user.clearpk', ['char'=>$char, 'pk' => $this]);

    }

    public function do_clearpk(Request $request)
    {
        if (empty($request->char))
        {
            return redirect()->back()->withErrors('Choose character first!');
        }
        else {
            $online = $this->online($request->char);
            $select = Character::where('Name', '=', $request->char)->first();
            $zen = XWEB_PKCLEAR::first();

            $cost = $select->PkCount * $zen->zen;
            $newzen = $select->Money - $cost;


            // Verification
            if ($newzen < 0) {
                return redirect()->back()->withErrors('You don\'t have enough zen!');
            }
            elseif ($select->PkCount == 0) {
                return redirect()->back()->withErrors('You don\'t have kills yet!');
            }
            elseif ($online === 1) {
                return redirect()->back()->withErrors('Leave game first!');
            }
            // Update
            else {
                Character::
                where('Name', '=', $request->char)
                    ->update([
                        'Money' => $newzen,
                        'PkLevel' => 0,
                        'PkCount' => 0
                    ]);

            }

            return redirect()->back()->with('success', 'You have reset this character successfully!');
        }
    }
}
