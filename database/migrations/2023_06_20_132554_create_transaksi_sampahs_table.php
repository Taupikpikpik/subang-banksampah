<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTransaksiSampahsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksi_sampahs', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('id_sampah')->nullable();
            $table->integer('id_jualbeli')->nullable();
            $table->integer('kuantitas')->nullable();
            $table->date('tanggal_transaksi')->nullable();
            $table->string('jenis_transaksi');
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('transaksi_sampahs');
    }
}
