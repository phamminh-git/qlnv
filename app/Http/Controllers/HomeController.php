<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $nhanvien=User::with(['hopdongs'=> function($query){
            $query->latest()->with('luong')->with('phucaps');
        }])->with('phongban')->find(Auth()->user()->id);
        if(Auth()->user()->phongban->ten=="quan ly nhan su"){
            return view('quanly')->with('nhanvien', $nhanvien);
        }
        elseif (Auth()->user()->phongban->ten=="ke toan") {
            return view('ketoan')->with('nhanvien', $nhanvien);
        }
        else{
            
            return view('nguoidung')->with('nhanvien', $nhanvien);
        }
    }
}
