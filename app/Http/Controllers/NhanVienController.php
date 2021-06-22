<?php

namespace App\Http\Controllers;

use App\Http\Requests\NhanVienRequest;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class NhanVienController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $nhanviens=User::where('vaiTro', '<>', 'admin')->with(['hopdongs'=> function($query){
            $query->latest()->with('luong');
        }])->with('phongban')->paginate(10);
        // return view('nhanvien.index')->with('nhanviens', $nhanviens);
        return response()->json($nhanviens);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('nhanvien.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return response()->json($request);
        if($request->id){
            User::whereId($request->id)->update($request->except('created_at','updated_at', 'avatar', 'email','hopdongs', 'phongban', 'phongban_id', 'username', 'password', 'password_confirmation' ));
        }
        else{
            $nhanvien=new User();
            $nhanvien->fill($request->except('password'));
            $nhanvien->password=Hash::make($request->password);
            $nhanvien->save();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function search(Request $request){
        // return response()->json($request->ten);
        // return response()->json($request->ten);
        // return view('nhanvien.index')->with('nhanviens', User::where('ten', 'like', "%$request->ten%")->where('vaiTro', 'nhan vien')->get());
        return response()->json(User::where('vaiTro', '<>', 'admin')->where('ten', 'like', "%$request->ten%")->with(['hopdongs'=> function($query){
            $query->latest()->with('luong');
        }])->with('phongban')->paginate(10));
    }
    public function delete($id){
        User::whereId($id)->delete();
    }
}
