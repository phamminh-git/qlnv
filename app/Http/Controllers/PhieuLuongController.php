<?php

namespace App\Http\Controllers;

use App\Models\HopDong;
use App\Models\PhieuLuong;
use App\Models\ThuongPhat;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PhieuLuongController extends Controller
{
    public function create(Request $request){
        $thang= $request->thang;
        if((Carbon::now('Asia/Ho_Chi_Minh')->month==$thang && Carbon::now('Asia/Ho_Chi_Minh')->format('Y-m-d')<Carbon::now('Asia/Ho_Chi_Minh')->endOfMonth()->toDateString()) 
        || Carbon::now('Asia/Ho_Chi_Minh')->month<$thang){
            return response()->json("Chưa tính được lương");
        }
        // return response()->json($thang);
        if(PhieuLuong::whereMonth('thang', $request->thang)->get()!=null){
            return response()->json(PhieuLuong::whereMonth('thang', $request->thang)->with(['nhanvien'=>function($query) use($thang){
                $query->withCount(['ngaycongs as songaycong'=>function($query) use ($thang){
                    $query->whereMonth('ngay','=' ,$thang);
                }])->with(['hopdongs'=>function($query){
                    $query->latest()->with('phucaps')->with('luong');
                }])->with('phongban');
            }])->with('thuongphats')->get());
        }
        $phieuluongs=[];
        $nhanviens=User::whereHas('hopdongs', function($query){
            $query->latest()->where('ngayHetHan', '>=', Carbon::now('Asia/Ho_Chi_Minh')->format('Y-m-d'));
        })->withCount(['ngaycongs as songaycong'=>function($query){
            $query->whereMonth('ngay','=' ,Carbon::now('Asia/Ho_Chi_Minh')->month);
        }])->with(['hopdongs'=>function($query){
            $query->latest()->where('ngayHetHan', '>=', Carbon::now('Asia/Ho_Chi_Minh')->format('Y-m-d'))->with('phucaps')->with('luong');
        }])->where('vaiTro', '<>', 'admin')->with('phongban')->get();
        $thuongphat=ThuongPhat::find(1);
        foreach($nhanviens as $nhanvien){
            $tongtien=$nhanvien->hopdongs[0]->luong->mucluong;
            foreach($nhanvien->hopdongs[0]->phucaps as $phucap){
                $tongtien= $tongtien+$phucap->pivot->mucphucap;
            }
            if($nhanvien->songaycong < 23){
                $tongtien=$tongtien-$thuongphat->mucThuongPhat;
                $phieuluong=PhieuLuong::create(['tongtien'=>$tongtien, 'thang'=>Carbon::now('Asia/Ho_Chi_Minh')->format('Y-m-d')]);
                $phieuluong->thuongphats()->attach($thuongphat, ['muctien'=>$thuongphat->mucThuongPhat]);
            }
            else{
                $phieuluong=PhieuLuong::create(['tongtien'=>$tongtien, 'thang'=>Carbon::now('Asia/Ho_Chi_Minh')->format('Y-m-d')]);
            }
            
            $phieuluong->nhanvien()->associate($nhanvien);
            $phieuluong->hopdong()->associate($nhanvien->hopdongs[0]);
            $phieuluong->save();
            $phieuluong->thuongphats;
            $phieuluongs[]=$phieuluong;
        }
        return response()->json($phieuluongs);
    }
    // public function getAvatar(){
    //     return view('avatar');
    // }
    public function saveAvatar(Request $request){
        $file = $request->myfile;
        // return $file->getClientOriginalName();
        $file->move(public_path('uploads'), $file->getClientOriginalName());
    }
    public function vueRouter(){
        return view('vue-router');
    }
    public function vueketoan(){
        return view('ketoan');
    }
}
