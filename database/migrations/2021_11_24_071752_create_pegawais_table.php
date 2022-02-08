<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePegawaisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pegawais', function (Blueprint $table) {
            $table->id();
            $table->BigInteger('id_divisi')->unsigned();
            $table->foreign('id_divisi')->references('id')->on('divisi')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->BigInteger('id_jabatan')->unsigned();
            $table->foreign('id_jabatan')->references('id')->on('jabatan')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->BigInteger('nik');
            $table->string('nama', 100);
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
        Schema::dropIfExists('pegawais');
    }
}
