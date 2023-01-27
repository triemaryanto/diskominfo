<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMenarasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menaras', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('name_menara');
            $table->string('email');
            $table->string('nomor');
            $table->string('lokasi');
            $table->string('altitude');
            $table->string('latitude');
            $table->string('longitude');
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
        Schema::dropIfExists('menaras');
    }
}
