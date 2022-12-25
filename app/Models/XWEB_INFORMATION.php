<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class XWEB_INFORMATION extends Model
{
    use HasFactory;

    protected $table = 'XWEB_INFORMATION';
    protected $connection = 'XWEB';
    public $timestamps = false;
}
