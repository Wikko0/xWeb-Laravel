<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class XWEB_GRANDRESET extends Model
{
    use HasFactory;
    protected $table = 'XWEB_GRANDRESET';
    protected $connection = 'XWEB';
    public $timestamps = false;
}
