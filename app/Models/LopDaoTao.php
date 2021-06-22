<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LopDaoTao extends Model
{
    protected $fillable=['ten', 'mota', 'ngaybatdau'];
    public function nhanviens(){
        return $this->belongsToMany('App\User', 'lop_dao_tao_nhan_vien','lop_dao_tao_id' ,'nhan_vien_id');
    }
}
