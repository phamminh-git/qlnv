<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PhieuLuong extends Model
{
    protected $fillable=['thang', 'tongtien'];
    public function nhanvien(){
        return $this->belongsTo('App\User', 'nhan_vien_id');
    }
    public function hopdong(){
        return $this->belongsTo('App\Models\HopDong');
    }
    public function thuongphats(){
        return $this->belongsToMany('App\Models\ThuongPhat', 'phieu_luong_thuong_phat', 'phieuluong_id', 'thuongphat_id');
    }

}
