<?php

namespace Database\Seeders;

use App\Models\XWEB_ADMINCP;
use App\Models\XWEB_ADMINLOGIN;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        XWEB_ADMINCP::factory(1)->create();
        XWEB_ADMINLOGIN::factory(1)->create();
    }
}
