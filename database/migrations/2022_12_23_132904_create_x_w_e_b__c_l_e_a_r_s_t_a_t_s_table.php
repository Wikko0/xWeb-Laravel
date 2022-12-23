<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateXWEBCLEARSTATSTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('XWEB')->create('XWEB_RESETSTATS', function (Blueprint $table) {
            $table->id();
            $table->integer('credits');
            $table->integer('zen');
            $table->integer('level');
            $table->integer('resets');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('XWEB_RESETSTATS');
    }
}
