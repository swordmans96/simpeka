<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAspenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aspen', function (Blueprint $table) {
            $table->id();
            $table->BigInteger('id_kategori')->unsigned();
            $table->foreign('id_kategori')->references('id')->on('kategoripenilaian')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->string('nama_aspek');
            $table->BigInteger('bobot');
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
        Schema::dropIfExists('aspen');
    }
}
