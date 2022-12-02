<?php

namespace Database\Factories;

use App\Models\XWEB_ADMINCP;
use Illuminate\Database\Eloquent\Factories\Factory;

class AdminCPFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */

    protected $model = XWEB_ADMINCP::class;
    public function definition()
    {
        return [
            'name' => 'test',
            'sname' => 'XWeb Server',
            'stitle' => 'XWeb',
            'sdescription' => 'MU Online',
            'skeywords' => 'MU Online',
            'surl' => 'https://127.0.0.1',
            'sforum' => 'https://127.0.0.1',
            'sdiscord' => 'https://discord.com',
        ];
    }
}
