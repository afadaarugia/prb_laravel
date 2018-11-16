<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\prb;

class prbController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $prbs = prb::all();

        return view('prbs.index', compact('prbs')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('prbs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'id'=>'required',
            'nama'=>'required',
            'tgl_lahir'=>'required',
            'alamat'=>'required',
            'telpon'=>'required'
        ]);
        $prb = new prb([
            'id'=>$request->get('id'),
            'nama'=>$request->get('nama'),
            'tgl_lahir'=>$request->get('tgl_lahir'),
            'alamat'=>$request->get('alamat'),
            'telpon'=>$request->get('telpon')
        ]);

        $prb->save();
        return redirect('/prbs')->with('Sukses!', 'Data telah dimasukkan');
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
        $prb = prb::find($id);
        return view('prbs.edit', compact('prb'));
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
        $request->validate([
            'nama'=>'required',
            'tgl_lahir'=>'required',
            'alamat'=>'required',
            'telpon'=>'required'
        ]);
        
        $prb = prb::find($id);
        $prb->nama = $request->get('nama');
        $prb->tgl_lahir = $request->get('tgl_lahir');
        $prb->alamat = $request->get('alamat');
        $prb->telpon = $request->get('telpon');
        
        $prb->save();
        return redirect('/prbs')->with('Sukses!', 'Data telah diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $prb = prb::find($id);
        $prb->delete();

        return redirect('/prbs')->with('Sukses!', 'Data telah dihapus');
    }
}
