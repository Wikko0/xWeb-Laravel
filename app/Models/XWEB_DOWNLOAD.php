<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class XWEB_DOWNLOAD extends Model
{
    use HasFactory;

    protected $table = 'XWEB_DOWNLOAD';
    protected $connection = 'XWEB';
    public $timestamps = false;
}
