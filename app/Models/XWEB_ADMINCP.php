<?php

namespace App\Models;

use Database\Factories\AdminCPFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class XWEB_ADMINCP extends Model
{
    use HasFactory;
    protected $guarded;
    protected $table = 'XWEB_ADMINCP';
    protected $connection = 'XWEB';
    public $timestamps = false;
    protected static function newFactory()
    {
        return AdminCPFactory::new();
    }
}
