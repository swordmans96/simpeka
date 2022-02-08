<?php

namespace App\Http\Controllers;

use App\Models\AspekPenilaian;
use App\Models\KategoriPenilaian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AspekController extends Controller
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
        $aspek = AspekPenilaian::all();
        return view("pages.aspekpenilaian", compact('aspek', 'kategori'));
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
            'id_kategori' => 'required',
            'nama_aspek' => 'required',
            'bobot' => 'required'
        ]);
        AspekPenilaian::create($request->all());
        Session::flash('success', 'Data Berhasil Tersimpan!');
        return redirect('aspek');
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
        $aspek = AspekPenilaian::where($where)->first();
        return $aspek;
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
            'id_kategori' => 'required',
            'nama_aspek' => 'required',
            'bobot' => 'required'
        ]);

        $aspek = AspekPenilaian::findorfail($id);
        $aspek->update($request->all());
        Session::flash('success', 'Data Berhasil Terupdate');
        return redirect('aspek')->with('message', 'Terupdate!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $aspek = AspekPenilaian::find($id);
        $aspek->delete();
        Session::flash('success', 'Data Berhasil Terhapus');
        return redirect('aspek');
    }

    public function persen($id)
    {
        $where = array('id_kategori' => $id);
        $sum = AspekPenilaian::where($where)->sum('bobot');
        $sisa = 100 - $sum;
        $getSisa = ['sisa' => $sisa];
        return response()->json($getSisa);
    }
}
