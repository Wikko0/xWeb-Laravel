<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateXWEBADMINCPSTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('XWEB')->create('XWEB_ADMINCP', function (Blueprint $table) {
            $table->id();
            $table->string('sname')->nullable();
            $table->text('stitle')->nullable();
            $table->text('sdescription')->nullable();
            $table->text('skeywords')->nullable();
            $table->text('surl')->nullable();
            $table->text('sforum')->nullable();
            $table->text('sdiscord')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('XWEB_ADMINCP');
    }
}
