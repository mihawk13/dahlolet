<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMenuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menu', function (Blueprint $table) {
            $table->string('id_menu', 10);
            $table->string('id_kategori', 5);
            $table->string('nama', 100);
            $table->double('harga');
            $table->string('gambar', 50);
            $table->boolean('status')->default(1);
            $table->primary('id_menu');
            // $table->timestamps();
            // $table->foreign('id_kategori')->references('id_kategori')->on('kategori');
            // $table->foreignId('id_kategori')->constrained();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('menu');
    }
}
