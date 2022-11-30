<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateXWEBNEWSTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('XWEB')->create('XWEB_NEWS', function (Blueprint $table) {
            $table->id();
            $table->string('date')->nullable();
            $table->string('subject')->nullable();
            $table->text('news')->nullable();
            $table->string('prefix')->nullable();
            $table->string('specific')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('XWEB_NEWS');
    }
}
