<?php

namespace Database\Seeders;

use App\Models\XWEB_INFORMATION;
use Illuminate\Database\Seeder;

class InformationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       XWEB_INFORMATION::create([
        'sname' => 'xWeb',
        'version' => 'Season VI',
        'experience' => '100',
        'droprate' => '20',
        'zenrate' => '10',
        'ppl' => '5/7'
    ]);
    }
}
