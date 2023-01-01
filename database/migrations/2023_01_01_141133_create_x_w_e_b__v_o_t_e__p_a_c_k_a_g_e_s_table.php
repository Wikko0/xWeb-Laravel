<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateXWEBVOTEPACKAGESTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('XWEB')->create('XWEB_VOTE_PACKAGE', function (Blueprint $table) {
            $table->id();
            $table->string('link')->nullable();
            $table->string('image')->nullable();
            $table->integer('zen')->nullable();
            $table->integer('credits')->nullable();
            $table->string('time')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('XWEB_VOTE_PACKAGE');
    }
}
