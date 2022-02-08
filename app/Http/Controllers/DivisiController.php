<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Yajra\DataTables\DataTables;
use App\Models\Divisi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Response;


class DivisiController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $divisi = Divisi::all();
        return view("pages.masterdivisi", compact('divisi'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nama_divisi' => 'required'
        ]);

        Divisi::create($request->all());
        Session::flash('success', 'Data Berhasil Tersimpan');
        return redirect('divisi');
    }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $where = array('id' => $id);
        $divisi = Divisi::where($where)->first();
        return $divisi;
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
        $this->validate($request, [
            'nama_divisi' => 'required'
        ]);
        $divisi = Divisi::findorfail($id);
        $divisi->update($request->all());
        Session::flash('success', 'Data Berhasil Terupdate');
        return redirect('divisi')->with('message', 'Terupdate!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $divisi = Divisi::find($id);
        $divisi->delete();
        Session::flash('success', 'Data Berhasil Terhapus');
        return redirect('divisi');
    }
}
