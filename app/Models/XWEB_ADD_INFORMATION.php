<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class XWEB_ADD_INFORMATION extends Model
{
    use HasFactory;
    protected $guarded;
    protected $table = 'XWEB_ADD_INFORMATION';
    protected $connection = 'XWEB';
    public $timestamps = false;
}
