<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('ten');
            $table->string('username')->unique()->nullable();
            $table->string('password')->nullable();
            $table->string('vaiTro');
            $table->date('ngaySinh');
            $table->string('gioiTinh');
            $table->string('diaChi');
            $table->string('email')->unique();
            $table->string('sdt');
            $table->string('avatar')->nullable();
            $table->integer('phongban_id')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
