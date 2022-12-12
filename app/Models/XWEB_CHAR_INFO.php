<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class XWEB_CHAR_INFO extends Model
{
    use HasFactory;

    protected $table = 'XWEB_CHAR_INFO';
    protected $connection = 'XWEB';
    public $timestamps = false;
}
