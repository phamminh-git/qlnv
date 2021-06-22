<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PhongBan extends Model
{
    protected $fillable=['ten'];
    public function nhanviens(){
        return $this->hasMany('App\User', 'phongban_id');
    }
}
