<?php

namespace Database\Factories;

use App\Models\XWEB_ADMINLOGIN;
use Illuminate\Database\Eloquent\Factories\Factory;

class AdminLoginFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    protected $model = XWEB_ADMINLOGIN::class;
    public function definition()
    {
        return [
            'admin' => 'admin',
            'password' => 'admin'
        ];
    }
}
