<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePembelianSampahsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pembelian_sampahs', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('id_sampah')->nullable();
            $table->integer('id_pengepul')->nullable();
            $table->integer('kuantitas')->nullable();
            $table->integer('total')->nullable();
            $table->string('status_pembelian');
            $table->string('kode_pembelian')->nullable();
            $table->string('bukti_pembayaran')->nullable();
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('pembelian_sampahs');
    }
}
