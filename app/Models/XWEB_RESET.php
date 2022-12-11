<?php

namespace App\Models;

use Database\Factories\ResetFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class XWEB_RESET extends Model
{
    use HasFactory;

    protected $table = 'XWEB_RESET';
    protected $connection = 'XWEB';
    public $timestamps = false;
    protected static function newFactory()
    {
        return ResetFactory::new();
    }
}
