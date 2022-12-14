<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class XWEB_PKCLEAR extends Model
{
    use HasFactory;

    protected $table = 'XWEB_PKCLEAR';
    protected $connection = 'XWEB';
    public $timestamps = false;
}
