<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class XWEB_NEWS extends Model
{
    protected $table = 'XWEB_NEWS';
    protected $connection = 'XWEB';
    use HasFactory;
}
