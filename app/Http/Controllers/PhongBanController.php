<?php

namespace App\Http\Controllers;

use App\Models\PhongBan;
use App\User;
use Illuminate\Http\Request;

class PhongBanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $phongs= PhongBan::all();
        // return view('phongban.index')->with('phongs', $phongs);
        return response()->json($phongs);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('phongban.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {        // $phong=new PhongBan();        
        // $phong->fill($request->all())->save();
        if($request->id){
            PhongBan::whereId($request->id)->update($request->except('created_at','updated_at', 'avatar'));
        }
        else{
            $phong=new PhongBan();        
            $phong->fill($request->all())->save();
            return response()->json($phong);
        }
        // return redirect()->route('phong.index');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $phong=PhongBan::find($id);
        return $phong;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(PhongBan $phong)
    {
        return view('phongban.create')->with('phong', $phong);
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
    public function delete($id){
        PhongBan::whereId($id)->delete();
        // return redirect()->route('phong.index');
        return response()->json(true);
    }
    public function search(Request $request){
        $phongs=PhongBan::where('ten','like', "%$request->ten%")->get();
        return view('phongban.index')->with('phongs', $phongs);
    }
    public function getListNV($id){
        $nhanviens=User::whereHas('phongban', function ($query) use($id){
            $query->whereId($id);
        })->get();
        return response()->json($nhanviens);
    }
}
