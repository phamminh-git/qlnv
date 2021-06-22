<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Luong extends Model
{
    protected $fillable=['ten', 'mucluong'];
    public function hopdongs(){
        return $this->hasMany('App\Models\HopDong', 'luong_id');
    }
}
