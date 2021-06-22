<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PhuCap extends Model
{
    protected $fillable=['ten', 'mucphucap'];
    public function hopdongs(){
        return $this->belongsToMany('App\Models\HopDong', 'hop_dong_phu_cap', 'phu_cap_id', 'hop_dong_id')->withPivot('mucphucap');
    }
}
