<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKeranjangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('keranjangs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('jumlah_barang');
            $table->integer('total_harga');
            $table->unsignedInteger('idPengguna');
            $table->unsignedInteger('idProduk');
            $table->foreign('idPengguna')->references('id')->on('penggunas');
            $table->foreign('idProduk')->references('id')->on('produks');
            $table->timestamps();
        });
        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('keranjangs');
    }
}
