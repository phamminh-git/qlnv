<?php

use App\Models\HopDong;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
// Route::resource('/phong', 'PhongBanController')->except('show')->middleware(['auth', 'role:quan ly nhan su']);
Route::resource('/phong', 'PhongBanController')->except('show')->middleware(['auth']);
Route::get('/phong/{id}/delete', 'PhongBanController@delete')->name('phong.delete')->middleware('auth', 'role:quan ly nhan su');
Route::get('/phong/search', 'PhongBanController@search')->name('phong.search')->middleware('auth', 'role:quan ly nhan su');
Route::get('/phong/{id}/show', 'PhongBanController@show')->name('phong.show')->middleware('auth', 'role:quan ly nhan su');
Route::get('/phong/{id}/getnhanvien', 'PhongBanController@getListNV')->middleware('auth', 'role:quan ly nhan su');

Route::resource('/phucap', 'PhuCapController')->except('show')->middleware(['auth']);
Route::get('/phucap/{id}/delete', 'PhuCapController@delete')->name('phucap.delete')->middleware(['auth', 'role:ke toan']);
Route::get('/phucap/search', 'PhuCapController@search')->name('phucap.search')->middleware(['auth', 'role:ke toan']);
Route::get('/phucap/{id}/show', 'PhuCapController@show')->name('phucap.show')->middleware('auth', 'role:ke toan');

// Route::resource('/lopdaotao', 'LopDaoTaoController')->except('show')->middleware(['auth', 'role:quan ly nhan su']);
Route::resource('/lopdaotao', 'LopDaoTaoController')->except('show')->middleware(['auth']);
Route::get('/lopdaotao/search', 'LopDaoTaoController@search')->name('lopdaotao.search')->middleware(['auth', 'role:quan ly nhan su']);
Route::get('/lopdaotao/{id}/show', 'LopDaoTaoController@show')->name('lopdaotao.show')->middleware(['auth', 'role:quan ly nhan su']);
Route::get('/lopdaotao/{id}/getnhanvien', 'LopDaoTaoController@getNhanVien')->middleware(['auth', 'role:quan ly nhan su']);
Route::get('/lopdaotao/{id}/addnhanvien', 'LopDaoTaoController@addNhanVien')->name('lopdaotao.themnhanvien')->middleware(['auth', 'role:quan ly nhan su']);
Route::post('/lopdaotao/addnhanvien', 'LopDaoTaoController@saveNhanVien')->name('lopdaotao.savenhanvien')->middleware(['auth', 'role:quan ly nhan su']);
Route::get('/lopdaotao/{id}/delete', "LopDaoTaoController@delete")->name('lopdaotao.delete')->middleware(['auth', 'role:quan ly nhan su']);

Route::resource('/luong', 'LuongController')->except('show')->middleware(['auth', 'role:ke toan']);
Route::get('/luong/{id}/delete', 'LuongController@delete')->name('luong.delete')->middleware(['auth', 'role:ke toan']);
Route::get('/luong/{id}/show', 'LuongController@show')->name('luong.show')->middleware(['auth', 'role:ke toan']);

Route::resource('/nhanvien', 'NhanVienController')->except('show')->middleware(['auth', 'role:quan ly nhan su']);
Route::get('/nhanvien/{id}/show', 'NhanVienController@show')->name('nhanvien.show')->middleware(['auth']);
Route::get('/nhanvien/search', 'NhanVienController@search')->name('nhanvien.search')->middleware(['auth', 'role:quan ly nhan su']);
Route::get('/nhanvien/{id}/delete', 'NhanVienController@delete')->middleware(['auth', 'role:quan ly nhan su']);

Route::get('/ngaycong/{id}/add', 'NgayCongController@add')->name('ngaycong.add')->middleware(['auth']);
Route::get('/ngaycong/diemdanh', 'NgayCongController@getListNV')->middleware(['auth', 'role:quan ly nhan su']);
Route::post('/ngaycong/diemdanh', 'NgayCongController@save')->name('ngaycong.save')->middleware(['auth', 'role:quan ly nhan su']);
Route::get('/ngaycong/{id}/getngaycong', 'NgayCongController@getForm')->middleware(['auth']);
Route::post('/ngaycong/getngaycong', 'NgayCongController@getNgayCong')->name('ngaycong.xem');
Route::get('/ngaycong/{id}/soluong', 'NgayCongController@count')->middleware(['auth']);
Route::get('/ngaycong/searchnhanvien', 'NgayCongController@searchNV')->middleware(['auth', 'role:quan ly nhan su']);

Route::get('/hopdong/create', 'HopDongController@create')->middleware(['auth', 'role:quan ly nhan su']);
Route::post('/hopdong/create', 'HopDongController@save')->name('hopdong.save')->middleware(['auth', 'role:quan ly nhan su']);
Route::post('/hopdong/giahan', 'HopDongController@giaHan')->middleware(['auth', 'role:quan ly nhan su']);

Route::get('/phieuluong','PhieuLuongController@create')->middleware(['auth', 'role:ke toan']);
Route::get('/tkluong', 'TkLuongController@tkluong')->middleware(['auth']);

// Route::get('/addavatar', 'PhieuLuongController@getAvatar');
Route::get('/thuongphat', 'ThuongPhatController@index')->middleware(['auth', 'role:ke toan']);
Route::post('/thuongphat', 'ThuongPhatController@store')->middleware(['auth', 'role:ke toan']);
Route::get('/thuongphat/{id}/delete', 'ThuongPhatController@delete')->middleware(['auth', 'role:ke toan']);
// Route::post('/addavatar', 'PhieuLuongController@saveAvatar')->name('avatar');
// Route::get('/vuerouter', 'PhieuLuongController@vueRouter');
// Route::get('/ketoan', 'PhieuLuongController@vueketoan');
// Route::get('/nguoidung', function(){
//     return view('nguoidung')->with('nhanvien', Auth()->user());
// });
// Route::get('/authuser', function(){
//     return response()->json(Auth()->user());
// });
Route::get('/ngayky', function(){
    $nam= Carbon::parse(HopDong::whereHas('nhanvien',function($query){
        $query->whereId(Auth()->user()->id);
    })->first('ngayKy')->ngayKy)->year;
    return response()->json($nam);
});