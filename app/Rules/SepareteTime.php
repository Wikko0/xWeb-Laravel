<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class SepareteTime implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        if(strpos($value, ',') !== false){
            $timers = explode(',', $value);
        } else{
            $timers = [$value];
        }
        $is_valid = true;
        foreach($timers AS $timer){
            if(!preg_match("/^((2[0-3]|[01]?[0-9]):[0-5][0-9])|((2[0-3]|[01]?[0-9]):[0-5][0-9]:[0-5][0-9])$/", $timer)){
                $is_valid = false;
                break;
            }
        }
        return $is_valid;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Wrongly formated time. Time range: 00:00 - 23:59';
    }
}
