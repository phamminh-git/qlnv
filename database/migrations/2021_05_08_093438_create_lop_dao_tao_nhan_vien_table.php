<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLopDaoTaoNhanVienTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lop_dao_tao_nhan_vien', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('nhan_vien_id')->nullable();
            $table->foreign('nhan_vien_id')->references('id')->on('users')->onDelete('set null');
            $table->unsignedBigInteger('lop_dao_tao_id')->nullable();
            $table->foreign('lop_dao_tao_id')->references('id')->on('lop_dao_taos')->onDelete('set null');
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
        Schema::dropIfExists('lop_dao_tao_nhan_vien');
    }
}
