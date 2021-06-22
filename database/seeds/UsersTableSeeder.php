<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'ten' => 'admin',
            'username'=>'admin',
            'vaiTro'=>'admin',
            'ngaySinh'=>'1970/01/01',
            'gioiTinh'=>'nam',
            'diaChi'=>'Thai Binh',
            'email'=>'admin@gmail.com',
            'sdt'=>'123',
            'password'=> Hash::make('admin'),
        ]);
    }
}
