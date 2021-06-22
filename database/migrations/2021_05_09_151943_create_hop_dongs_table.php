<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHopDongsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hop_dongs', function (Blueprint $table) {
            $table->id();
            $table->date('ngayKy');
            $table->date('ngayHetHan');
            $table->unsignedBigInteger('nhan_vien_id')->nullable();
            $table->foreign('nhan_vien_id')->references('id')->on('users')->onDelete('set null');
            $table->unsignedBigInteger('luong_id')->nullable();
            $table->foreign('luong_id')->references('id')->on('luongs')->onDelete('set null');
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
        Schema::dropIfExists('hop_dongs');
    }
}
