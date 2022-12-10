<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class XWEB_NEWS extends Model
{
    use HasFactory;

    protected $table = 'XWEB_NEWS';
    protected $connection = 'XWEB';
    public $timestamps = true;
}
