<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ThuongPhat extends Model
{
    protected $fillable=['ten', 'mucThuongPhat', 'loai'];
    public function phieuluongs(){
        return $this->belongsToMany('App\Models\PhieuLuong', 'phieu_luong_thuong_phat', 'thuongphat_id', 'phieuluong_id');
    }
}
