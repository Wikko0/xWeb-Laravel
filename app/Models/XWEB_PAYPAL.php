<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class XWEB_PAYPAL extends Model
{
    use HasFactory;

    protected $table = 'XWEB_PAYPAL';
    protected $connection = 'XWEB';
    public $timestamps = false;

    public function ClientId()
    {
        return $this->currency;
    }

}
