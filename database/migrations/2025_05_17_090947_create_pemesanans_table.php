<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePemesanansTable extends Migration
{
    public function up()
    {
        Schema::create('pemesanans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained('users')->onDelete('set null');
            $table->timestamp('tanggal')->useCurrent();
            $table->bigInteger('total');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('pemesanans');
    }
}
