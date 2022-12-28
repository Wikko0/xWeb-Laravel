<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class XWEB_VIP extends Model
{
    use HasFactory;

    protected $table = 'XWEB_VIP';
    protected $connection = 'XWEB';
    public $timestamps = false;
}
