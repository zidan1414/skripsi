<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hargapakets', function (Blueprint $table) {
            $table->id();
            $table->integer('id_paket');
            $table->string('kategori_grup');
            $table->integer('harga_tanpa_hotel');
            $table->integer('harga_hotel_1');
            $table->integer('harga_hotel_2');
            $table->integer('harga_hotel_3');
            $table->integer('harga_hotel_4');
            $table->integer('harga_hotel_5');
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
        Schema::dropIfExists('hargapakets');
    }
};
