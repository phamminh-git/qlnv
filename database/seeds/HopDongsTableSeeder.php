<?php

use App\Models\HopDong;
use App\Models\Luong;
use App\Models\PhongBan;
use App\Models\PhuCap;
use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class HopDongsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $phongban=PhongBan::create([
            'ten'=>'quan ly nhan su'
        ]);
        $nhanvien=User::create([
            'ten' => 'quan ly',
            'username'=>'B17DCCN001',
            'vaiTro'=>'truong phong',
            'ngaySinh'=>'1970/01/01',
            'gioiTinh'=>'nam',
            'diaChi'=>'Thai Binh',
            'email'=>'quanly@gmail.com',
            'sdt'=>'0373141558',
            'password'=> Hash::make('B17DCCN001'),
        ]);
        $nhanvien->phongban()->associate($phongban)->save();
        $luong=Luong::create([
            'mucluong'=>20000000
        ]);
        $phucap1=PhuCap::create([
            'ten'=>'tien an',
            'mucphucap'=>1000000
        ]);
        
        $phucap2=PhuCap::create([
            'ten'=>'chi phi di lai',
            'mucphucap'=>500000
        ]);

        $hopdong=HopDong::create([
            'ngayKy'=>'2021/01/01',
            'ngayHetHan'=>'2030/01/01'
        ]);

        $hopdong->nhanvien()->associate($nhanvien);
        $hopdong->luong()->associate($luong);
        $hopdong->phucaps()->attach($phucap1, ['mucphucap'=>$phucap1->mucphucap]);
        $hopdong->phucaps()->attach($phucap2, ['mucphucap'=>$phucap2->mucphucap]);
        $hopdong->save();
    }
}
