<?php

namespace App\Http\Controllers;

use App\Models\LopDaoTao;
use App\User;
use Illuminate\Http\Request;

class LopDaoTaoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lopdaotaos=LopDaoTao::all();
        // return view('lopdaotao.index')->with('lopdaotaos',$lopdaotaos);
        return response()->json($lopdaotaos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $nhanviens=User::all();
        return view('lopdaotao.create')->with('nhanviens', $nhanviens);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->id){
            LopDaoTao::whereId($request->id)->update($request->except('_token', 'idnhanvien','created_at','updated_at'));
            $lopdaotao=LopDaoTao::find($request->id);
            $lopdaotao->nhanviens()->detach($request->idnhanvien);
            return response()->json("cap nhat thanh cong");
        }
        else{
            $lopdaotao=new LopDaoTao();
            $lopdaotao->fill($request->all());
            $lopdaotao->save();
            $lopdaotao->nhanviens()->attach($request->idnhanvien);
            return response()->json($lopdaotao);
        }
        // return redirect()->route('lopdaotao.index');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return LopDaoTao::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $lopdaotao=LopDaoTao::with('nhanviens')->find($id);
        return view('lopdaotao.create')->with(['lopdaotao'=>$lopdaotao, 'nhanviens'=>$lopdaotao->nhanviens]);
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
        $lopdaotaos=LopDaoTao::where('ten', 'like', "%$request->ten%");
        return view('lopdaotao.index')->with($lopdaotaos);
    }
    public function getNhanVien($id){
        $lopdaotao=LopDaoTao::whereId($id)->with('nhanviens')->get();
        return $lopdaotao[0]->nhanviens;
    }
    public function addNhanVien($id){
        // $nhanviens=User::where('vaiTro', 'nhan vien')->get();
        $nhanviens=User::where('vaiTro', 'nhan vien')->whereDoesntHave('lopdaotaos', function($query) use ($id){
            $query->where('lop_dao_taos.id',$id);
        })->get();
        $lopdaotao=LopDaoTao::find($id);
        return view('lopdaotao.addNhanVien')->with(['nhanviens'=>$nhanviens, 'lopdaotao'=>$lopdaotao]);
    }
    public function saveNhanVien(Request $request){
        $lopdaotao=LopDaoTao::find($request->idlop);
        $lopdaotao->nhanviens()->attach($request->idnhanvien);
        $lop=LopDaoTao::with('nhanviens')->find($request->idlop);
        return view('lopdaotao.listNhanVien')->with('nhanviens', $lop->nhanviens);
    }

    public function delete($id){
        LopDaoTao::whereId($id)->delete();
    }
}
