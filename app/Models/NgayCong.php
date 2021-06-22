<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NgayCong extends Model
{
    protected $fillable=['ngay', 'gioDen'];

    public function nhanvien(){
        return $this->belongsTo('App\User', 'nhan_vien_id');
    }
}
