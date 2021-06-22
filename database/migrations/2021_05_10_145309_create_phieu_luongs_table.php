<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePhieuLuongsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('phieu_luongs', function (Blueprint $table) {
            $table->id();
            $table->date('thang');
            $table->float('tongtien', 15);
            $table->unsignedBigInteger('nhan_vien_id')->nullable();
            $table->foreign('nhan_vien_id')->references('id')->on('users')->onDelete('set null');
            $table->unsignedBigInteger('hopdong_id')->nullable();
            $table->foreign('hopdong_id')->references('id')->on('hop_dongs')->onDelete('set null');
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
        Schema::dropIfExists('phieu_luongs');
    }
}
