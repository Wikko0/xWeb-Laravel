<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class XWEB_VOTE extends Model
{
    use HasFactory;

    protected $table = 'XWEB_VOTE';
    protected $connection = 'XWEB';
    public $timestamps = false;
}
