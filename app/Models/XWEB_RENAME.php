<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class XWEB_RENAME extends Model
{
    use HasFactory;

    protected $table = 'XWEB_RENAME';
    protected $connection = 'XWEB';
    public $timestamps = false;
}
