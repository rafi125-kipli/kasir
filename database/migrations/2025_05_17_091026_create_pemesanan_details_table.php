<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePemesananDetailsTable extends Migration
{
    public function up()
    {
        Schema::create('pemesanan_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pemesanan_id')->constrained('pemesanans')->onDelete('cascade');
            $table->foreignId('barang_id')->constrained('barangs')->onDelete('cascade');
            $table->integer('qty');
            $table->bigInteger('harga'); 
            $table->bigInteger('subtotal'); 
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('pemesanan_details');
    }
}
