<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'ten', 'email', 'vaiTro', 'ngaySinh', 'gioiTinh', 'diaChi', 'sdt', 'username'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function lopdaotaos(){
        return $this->belongsToMany('App\Models\LopDaoTao', 'lop_dao_tao_nhan_vien','nhan_vien_id' ,'lop_dao_tao_id');
    }
    public function ngaycongs(){
        return $this->hasMany('App\Models\NgayCong', 'nhan_vien_id');
    }
    public function hopdongs(){
        return $this->hasMany('App\Models\HopDong', 'nhan_vien_id');
    }
    public function phieuluongs(){
        return $this->hasMany('App\Models\PhieuLuong', 'nhan_vien_id');
    }
    public function phongban(){
        return $this->belongsTo('App\Models\PhongBan');
    }
}
