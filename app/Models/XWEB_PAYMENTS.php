<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class XWEB_PAYMENTS extends Model
{
    use HasFactory;

    protected $table = 'XWEB_PAYMENTS';
    protected $connection = 'XWEB';
    public $timestamps = false;
}
