<?php

namespace Database\Seeders;

use App\Models\XWEB_ADDSTATS;
use Illuminate\Database\Seeder;

class AddstatsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        XWEB_ADDSTATS::create(['maxpoints' => 32767]);
    }
}
