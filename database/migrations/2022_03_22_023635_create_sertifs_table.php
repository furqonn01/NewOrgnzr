<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sertifs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('kode_user');
            $table->foreign('kode_user')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->string('nama');
            $table->string('nama_file');
            $table->string('ket');
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
        Schema::dropIfExists('sertifs');
    }
};
