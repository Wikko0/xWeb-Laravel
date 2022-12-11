<?php

namespace Database\Factories;

use App\Models\XWEB_RESET;
use Illuminate\Database\Eloquent\Factories\Factory;

class ResetFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    protected $model = XWEB_RESET::class;
    public function definition()
    {
        return [
            'level' => '350',
            'zen' => '10000000',
            'bkpoints' => '350',
            'smpoints' => '350',
            'elfpoints' => '350',
            'mgpoints' => '350',
            'sumpoints' => '350',
            'rfpoints' => '350',
            'glpoints' => '350',
            'dlpoints' => '350',
            'maxresets' => '40'
        ];
    }
}
