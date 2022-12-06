<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class XWEB_SLIDERS extends Model
{
    use HasFactory;
    protected $table = 'XWEB_SLIDERS';
    protected $connection = 'XWEB';
    public $timestamps = false;
}
