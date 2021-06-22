<?php

namespace App\Http\Controllers;

use App\Models\PhongBan;
use Illuminate\Http\Request;

class TKLuongController extends Controller
{
    public function tkLuong(Request $request){
        $thangbd=$request->thangbd;
        $nambd=$request->nambd;
        $thangkt=$request->thangkt;
        $namkt=$request->namkt;
        $phongbans=PhongBan::with(['nhanviens'=>function($query) use($thangbd, $nambd, $thangkt, $namkt){
            $query->with(['phieuluongs'=> function($query) use($thangbd, $nambd, $thangkt, $namkt){
                $query->whereMonth('thang', '>=', $thangbd)->whereYear('thang', '>=', $nambd)
                ->whereMonth('thang', '<=', $thangkt)->whereYear('thang', '<=', $namkt);
            }]);
        }])->get();
        return response()->json($phongbans);
    }
}
