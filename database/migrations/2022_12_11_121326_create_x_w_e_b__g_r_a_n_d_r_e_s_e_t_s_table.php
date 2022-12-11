<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateXWEBGRANDRESETSTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('XWEB')->create('XWEB_GRANDRESET', function (Blueprint $table) {
            $table->id();
            $table->integer('resets');
            $table->integer('maxgresets');
            $table->integer('level');
            $table->integer('zen');
            $table->integer('credits');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('XWEB_GRANDRESET');
    }
}
