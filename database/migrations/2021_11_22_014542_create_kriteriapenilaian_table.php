<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKriteriapenilaianTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kriteriapenilaian', function (Blueprint $table) {
            $table->id();
            $table->BigInteger('id_aspen')->unsigned();
            $table->foreign('id_aspen')->references('id')->on('aspen')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->text('kriteria');
            $table->BigInteger('min');
            $table->BigInteger('max');
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
        Schema::dropIfExists('kriteriapenilaian');
    }
}
