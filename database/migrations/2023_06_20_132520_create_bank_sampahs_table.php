<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBankSampahsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bank_sampahs', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('nama_sampah')->nullable();
            $table->integer('id_kategori_sampah')->nullable();
            $table->integer('stok')->nullable();
            $table->integer('harga_beli')->nullable();
            $table->integer('harga_jual')->nullable();
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('bank_sampahs');
    }
}
