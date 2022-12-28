<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateXWEBVIPPACKAGESTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('XWEB')->create('XWEB_VIP_PACKAGE', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->integer('days')->nullable();
            $table->integer('credits')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('XWEB_VIP_PACKAGE');
    }
}
