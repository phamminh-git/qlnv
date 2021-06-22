<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHopDongPhuCapTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hop_dong_phu_cap', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('hop_dong_id')->nullable();
            $table->foreign('hop_dong_id')->references('id')->on('hop_dongs')->onDelete('set null');
            $table->float('mucphucap', 15);
            $table->unsignedBigInteger('phu_cap_id')->nullable();
            $table->foreign('phu_cap_id')->references('id')->on('phu_caps')->onDelete('set null');
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
        Schema::dropIfExists('hop_dong_phu_cap');
    }
}
