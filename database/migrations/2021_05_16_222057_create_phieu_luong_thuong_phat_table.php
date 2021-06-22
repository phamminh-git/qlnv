<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePhieuLuongThuongPhatTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('phieu_luong_thuong_phat', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('phieuluong_id')->nullable();
            $table->foreign('phieuluong_id')->references('id')->on('phieu_luongs')->onDelete('set null');
            $table->unsignedBigInteger('thuongphat_id')->nullable();
            $table->foreign('thuongphat_id')->references('id')->on('thuong_phats')->onDelete('set null');
            $table->float('muctien');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('phieu_luong_thuong_phat');
    }
}
