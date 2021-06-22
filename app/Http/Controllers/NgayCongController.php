<?php

namespace App\Http\Controllers;

use App\Models\HopDong;
use App\Models\NgayCong;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class NgayCongController extends Controller
{
    public function add($id){
        $ngaycong=new NgayCong();
        $ngaycong->fill(['ngay'=>Carbon::now('Asia/Ho_Chi_Minh')->format('Y-m-d'),'gioDen'=>Carbon::now('Asia/Ho_Chi_Minh')->format('H:i:s')]);
        $ngaycong->nhanvien()->associate($id)->save();
    }
    public function getListNV(){
        $nhanviens=User::whereHas('hopdongs',function($query){
            $query->latest()->where('ngayHetHan', '>=', Carbon::now('Asia/Ho_Chi_Minh')->format('Y-m-d'));
        })->whereDoesntHave('ngaycongs', function ($query){
            $query->where('ngay', Carbon::now('Asia/Ho_Chi_Minh')->format('Y-m-d'));
        })->with('phongban')->where('vaiTro', '<>', 'admin')->paginate(10);
        // return view('nhanvien.index')->with(['nhanviens'=> $nhanviens, 'diemdanh'=>true]);
        return response()->json($nhanviens);
    }
    public function save(Request $request){
        foreach($request->idnhanvien as $id){
            $ngaycong=new NgayCong();
            $ngaycong->fill(['ngay'=>Carbon::now('Asia/Ho_Chi_Minh')->format('Y-m-d'),'gioDen'=>Carbon::now('Asia/Ho_Chi_Minh')->format('H:i:s')]);
            $ngaycong->nhanvien()->associate($id)->save();
        }
        return response()->json("thanh cong");
    }
    public function getNgayCong(Request $request){
        $thang=$request->thang;
        $nam=$request->nam;
        $id=$request->idnhanvien;
        $ngaycongs=NgayCong::whereHas('nhanvien', function ($query) use ($id) {
            $query->whereId($id);
        })->whereMonth('ngay', '=',$thang)->whereYear('ngay', '=', $nam)->get();
        return response()->json($ngaycongs);
        // return view('ngaycong.danhsach')->with(['oldyear'=> $nam, 'newyear'=>Carbon::now()->year, 'idnhanvien'=>$id, 'ngaycongs'=>$ngaycongs]);;
    }
    public function count($id){
        $sl=NgayCong::whereHas('nhanvien', function ($query) use ($id) {
            $query->whereId($id);
        })->whereMonth('ngay', '=',Carbon::now('Asia/Ho_Chi_Minh')->month())->count();
        return $sl;
    }
    public function getForm($id){
        $nam= Carbon::parse(HopDong::whereHas('nhanvien',function($query) use ($id){
            $query->whereId($id);
        })->first('ngayKy')->ngayKy)->year;
        return view('ngaycong.danhsach')->with(['oldyear'=> $nam, 'newyear'=>Carbon::now()->year, 'idnhanvien'=>$id]);
    }
    public function searchNV(Request $request){
        $nhanviens=User::where('ten', 'like', "%$request->ten%")->whereHas('hopdongs',function($query){
            $query->latest()->where('ngayHetHan', '>=', Carbon::now('Asia/Ho_Chi_Minh')->format('Y-m-d'));
        })->whereDoesntHave('ngaycongs', function ($query){
            $query->where('ngay', Carbon::now('Asia/Ho_Chi_Minh')->format('Y-m-d'));
        })->with('phongban')->where('vaiTro', '<>', 'admin')->paginate(10);
        return response()->json($nhanviens);
    }
}
