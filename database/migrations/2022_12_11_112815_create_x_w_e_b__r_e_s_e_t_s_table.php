<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateXWEBRESETSTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('XWEB')->create('XWEB_RESET', function (Blueprint $table) {
            $table->id();
            $table->integer('level');
            $table->integer('zen');
            $table->integer('bkpoints');
            $table->integer('smpoints');
            $table->integer('elfpoints');
            $table->integer('mgpoints');
            $table->integer('dlpoints');
            $table->integer('sumpoints');
            $table->integer('rfpoints');
            $table->integer('glpoints');
            $table->integer('maxresets');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('XWEB_RESET');
    }
}
