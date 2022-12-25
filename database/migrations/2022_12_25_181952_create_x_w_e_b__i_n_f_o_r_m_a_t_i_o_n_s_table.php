<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateXWEBINFORMATIONSTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('XWEB')->create('XWEB_INFORMATION', function (Blueprint $table) {
            $table->id();
            $table->string('sname');
            $table->string('version');
            $table->string('experience');
            $table->string('droprate');
            $table->string('zenrate');
            $table->string('ppl');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('XWEB_INFORMATION');
    }
}
