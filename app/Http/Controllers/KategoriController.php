<?php

namespace App\Http\Controllers;

use Illuminate\Auth\Events\Validated;

use Illuminate\Support\Facades\Session;
use App\Models\KategoriPenilaian;
use Illuminate\Http\Request;

class KategoriController extends Controller
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
        $kategori = KategoriPenilaian::all();
        return view("pages.kategoripenilaian", compact('kategori'));
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
            'kategori_penilaian' => 'required'
        ]);
        KategoriPenilaian::create($request->all());
        Session::flash('success', 'Data Berhasil Tersimpan!');
        return redirect('kategori');
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
        $kategori = KategoriPenilaian::where($where)->first();
        return $kategori;
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
            'kategori_penilaian' => 'required'
        ]);

        $kategori = KategoriPenilaian::findorfail($id);
        $kategori->update($request->all());

        Session::flash('success', 'Data Berhasil Terupdate');
        return redirect('kategori')->with('message', 'Terupdate!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kategori = KategoriPenilaian::find($id);
        $kategori->delete();
        Session::flash('success', 'Data Berhasil Terhapus');
        return redirect('kategori');
    }
}
