<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class XWEB_HOF extends Model
{
    use HasFactory;

    protected $table = 'XWEB_HOF';
    protected $connection = 'XWEB';
    public $timestamps = false;
}
