<?php

namespace App\Http\Controllers;

use App\Models\PhuCap;
use Illuminate\Http\Request;

class PhuCapController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $phucaps=PhuCap::all();
        // return view('phucap.index')->with('phucaps', $phucaps);
        return response()->json($phucaps);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('phucap.create');
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
            PhuCap::whereId($request->id)->update($request->except('_token', 'submit','created_at', 'updated_at'));
            return response()->json('thanh cong');
        }
        else{
            $phucap=new PhuCap();
            $phucap->fill($request->all())->save();
            return response()->json($phucap);
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
        return PhuCap::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('phucap.create')->with('phucap', PhuCap::find($id));
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
        PhuCap::destroy($id);
        return redirect()->route('phucap.index');
    }
    public function search(Request $request){
        $phucaps=PhuCap::where('ten', 'like', "%$request->ten%")->get();
        return view('phucap.index')->with('phucaps', $phucaps);
    }
}
