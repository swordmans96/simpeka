<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailpenilaianTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detailpenilaian', function (Blueprint $table) {
            $table->id();
            $table->BigInteger('id_penilaian')->unsigned();
            $table->foreign('id_penilaian')->references('id')->on('penilaian')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->BigInteger('id_kriteria')->unsigned();
            $table->foreign('id_kriteria')->references('id')->on('kriteriapenilaian')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->BigInteger('nilai');
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
        Schema::dropIfExists('detailpenilaian');
    }
}
