<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePenjualanSampahsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penjualan_sampahs', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('id_sampah')->nullable();
            $table->integer('id_nasabah')->nullable();
            $table->integer('kuantitas')->nullable();
            $table->integer('total')->nullable();
            $table->string('status_penjualan');
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('penjualan_sampahs');
    }
}
