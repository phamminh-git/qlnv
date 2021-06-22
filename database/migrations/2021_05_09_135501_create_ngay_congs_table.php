<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNgayCongsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ngay_congs', function (Blueprint $table) {
            $table->id();
            $table->date('ngay');
            $table->time('gioDen');
            $table->time('gioVe')->nullable();
            $table->integer('nhan_vien_id');
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
        Schema::dropIfExists('ngay_congs');
    }
}
