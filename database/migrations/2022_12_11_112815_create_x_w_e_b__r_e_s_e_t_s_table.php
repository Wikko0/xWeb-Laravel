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
            $table->integer('level')->nullable();
            $table->integer('zen')->nullable();
            $table->integer('bkpoints')->nullable();
            $table->integer('smpoints')->nullable();
            $table->integer('elfpoints')->nullable();
            $table->integer('mgpoints')->nullable();
            $table->integer('dlpoints')->nullable();
            $table->integer('sumpoints')->nullable();
            $table->integer('rfpoints')->nullable();
            $table->integer('glpoints')->nullable();
            $table->integer('maxresets')->nullable();

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
