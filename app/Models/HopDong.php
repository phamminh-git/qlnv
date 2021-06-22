<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HopDong extends Model
{
    protected $fillable=['ngayKy', 'ngayHetHan'];
    public function nhanvien(){
        return $this->belongsTo('App\User', 'nhan_vien_id');
    }
    public function phucaps(){
        return $this->belongsToMany('App\Models\PhuCap', 'hop_dong_phu_cap', 'hop_dong_id', 'phu_cap_id')->withPivot('mucphucap');
    }
    public function luong(){
        return $this->belongsTo('App\Models\Luong', 'luong_id');
    }
    public function phieuluongs(){
        return $this->hasMany('App\Models\PhieuLuong');
    }
}
