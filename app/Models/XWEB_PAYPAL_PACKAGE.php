<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class XWEB_PAYPAL_PACKAGE extends Model
{
    use HasFactory;

    protected $table = 'XWEB_PAYPAL_PACKAGE';
    protected $connection = 'XWEB';
    public $timestamps = false;
}
