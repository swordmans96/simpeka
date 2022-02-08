<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pegawais;
use App\Models\Divisi;
use App\Models\Jabatan;
use Illuminate\Support\Facades\Session;

class PegawaiController extends Controller
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
        $jabatan = Jabatan::all();
        return view("pages.masterkaryawan", compact('divisi', 'jabatan'));
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
            'nik' => 'required',
            'nama' => 'required',
            'id_divisi' => 'required',
            'id_jabatan' => 'required'
        ]);
        Pegawais::create($request->all());
        Session::flash('success', 'Data Berhasil Tersimpan!');
        return redirect('pegawai');
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
        
        $where = array('id' => $id);
        $pegawai = Pegawais::where($where)->first();
        return $pegawai;
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
            'nik' => 'required',
            'nama' => 'required',
            'id_divisi' => 'required',
            'id_jabatan' => 'required'
        ]);

        $pegawai = Pegawais::findorfail($id);
        $pegawai->update($request->all());
        Session::flash('success', 'Data Berhasil Terupdate');
        return redirect('pegawai')->with('message', 'Terupdate!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pegawai = Pegawais::find($id);
        $pegawai->delete();
        Session::flash('success', 'Data Berhasil Terhapus');
        return redirect('jabatan');
    }
}
