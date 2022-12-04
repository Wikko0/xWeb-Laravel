<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class XWEB_ANNOUNCE extends Model
{
    use HasFactory;
    protected $guarded;

    protected $table = 'XWEB_ANNOUNCE';
    protected $connection = 'XWEB';
    public $timestamps = false;
}
