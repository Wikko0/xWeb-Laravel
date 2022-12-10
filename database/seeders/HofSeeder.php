<?php

namespace Database\Seeders;

use App\Models\XWEB_HOF;
use Illuminate\Database\Seeder;

class HofSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $champs = ['Blade Knight','Soul Master','Muse Elf','Magic Gladiator','Dark Lord','Summoner','Rage Fighter','Grow Lancer'];

        foreach ($champs as $champ)
        {
            XWEB_HOF::create([
                'name' => $champ,
                'class' => $champ,
                'wins' => 1,
                'status' => 'Yes'
            ]);
        }

    }
}
