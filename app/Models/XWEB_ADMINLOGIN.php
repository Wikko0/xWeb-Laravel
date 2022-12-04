<?php

namespace App\Models;

use Database\Factories\AdminLoginFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class XWEB_ADMINLOGIN extends Model
{
    use HasFactory;

    protected $table = 'XWEB_ADMINLOGIN';
    protected $connection = 'XWEB';
    public $timestamps = false;
    protected static function newFactory()
    {
        return AdminLoginFactory::new();
    }
}
