<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class XWEB_RESETSTATS extends Model
{
    use HasFactory;

    protected $table = 'XWEB_RESETSTATS';
    protected $connection = 'XWEB';
    public $timestamps = false;
}
