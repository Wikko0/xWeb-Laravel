<?php

namespace Database\Seeders;

use App\Models\XWEB_PAYPAL;
use Illuminate\Database\Seeder;

class PaypalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        XWEB_PAYPAL::create([
        'client_id' => 'AaDdnOw2BWtZYjjvRR-EfUNLIGSCi-VzFHILbhNGrNl9OrfP-B-uV4HenZ3fRigH652o92Kp25qUaGoT',
        'client_secret' => 'EL4XyB1v_Ree7CrLbfwOSVCDTwGvnrnjpQGyYMAwOC99bGug6hL0RpkF27EXo5i605LX-eqhlkOuDIyM',
        'currency' => 'USD'
    ]);
    }
}
