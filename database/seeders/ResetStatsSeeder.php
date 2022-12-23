<?php

namespace Database\Seeders;

use App\Models\XWEB_RESETSTATS;
use Illuminate\Database\Seeder;

class ResetStatsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        XWEB_RESETSTATS::create([
        'credits' => 200,
        'zen' => 1000000,
        'level' => 350,
        'resets' => 1,
    ]);
    }
}
