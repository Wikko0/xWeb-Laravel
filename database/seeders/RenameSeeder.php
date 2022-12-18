<?php

namespace Database\Seeders;

use App\Models\XWEB_RENAME;
use Illuminate\Database\Seeder;

class RenameSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        XWEB_RENAME::create([
            'credits' => 200
        ]);
    }
}
