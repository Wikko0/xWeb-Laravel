<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class XWEB_ADDSTATS extends Model
{
    use HasFactory;

    protected $table = 'XWEB_ADDSTATS';
    protected $connection = 'XWEB';
    public $timestamps = false;
}
