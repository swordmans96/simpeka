<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Yajra\DataTables\DataTables;
use App\Models\Jabatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Response;

class JabatanController extends Controller
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
        $jabatan = Jabatan::all();
        return view("pages.masterjabatan", compact('jabatan'));
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
            'nama_jabatan' => 'required'
        ]);
        Jabatan::create($request->all());
        Session::flash('success', 'Data Berhasil Tersimpan!');
        return redirect('jabatan');
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
        $jabatan = Jabatan::where($where)->first();
        return $jabatan;
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
            'nama_jabatan' => 'required'
        ]);
        $jabatan = Jabatan::findorfail($id);
        $jabatan->update($request->all());
        Session::flash('success', 'Data Berhasil Terupdate');
        return redirect('jabatan')->with('message', 'Terupdate!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $jabatan = Jabatan::find($id);
        $jabatan->delete();
        Session::flash('success', 'Data Berhasil Terhapus');
        return redirect('jabatan');
    }
}
