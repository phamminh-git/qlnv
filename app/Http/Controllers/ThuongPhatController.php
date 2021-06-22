<?php

namespace App\Http\Controllers;

use App\Models\ThuongPhat;
use Illuminate\Http\Request;

class ThuongPhatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $thuongphats=ThuongPhat::all();
        return response()->json($thuongphats);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
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
            ThuongPhat::whereId($request->id)->update($request->except('_token', 'submit','created_at', 'updated_at'));
            return response()->json('thanh cong');
        }
        else{
            $thuongphat=new ThuongPhat();
            $thuongphat->fill($request->all())->save();
            return response()->json($thuongphat);
        }
        // return redirect()->route('phucap.index');
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
    public function delete($id){
        ThuongPhat::whereId($id)->delete();
    }
}
