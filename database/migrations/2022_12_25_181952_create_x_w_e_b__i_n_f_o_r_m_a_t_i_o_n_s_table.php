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
            $table->string('sname')->nullable();
            $table->string('version')->nullable();
            $table->string('experience')->nullable();
            $table->string('droprate')->nullable();
            $table->string('zenrate')->nullable();
            $table->string('ppl')->nullable();
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
