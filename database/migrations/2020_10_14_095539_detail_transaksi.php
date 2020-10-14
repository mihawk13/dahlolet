<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DetailTransaksi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_transaksi', function (Blueprint $table) {
            // $table->id();
            $table->foreignId('id_transaksi');
            $table->string('id_menu', 10);
            $table->integer('qty');
            $table->double('harga');
            $table->double('total_harga');
            $table->foreign('id_transaksi')->references('id')->on('transaksi');
            $table->foreign('id_menu')->references('id_menu')->on('menu');
            // $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detail_transaksi');
    }
}
