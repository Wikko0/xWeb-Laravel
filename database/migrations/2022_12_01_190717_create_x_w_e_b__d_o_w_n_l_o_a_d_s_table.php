<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateXWEBDOWNLOADSTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('XWEB')->create('XWEB_DOWNLOAD', function (Blueprint $table) {
            $table->id();
            $table->integer('mb')->nullable();
            $table->string('version')->nullable();
            $table->text('link')->nullable();
            $table->string('site')->nullable();
            $table->string('name')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('XWEB_DOWNLOAD');
    }
}
