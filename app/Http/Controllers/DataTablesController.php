<?php

namespace App\Http\Controllers;

use App\Models\AspekPenilaian;
use Session;
use Yajra\DataTables\DataTables;
use App\Models\Jabatan;
use App\Models\Divisi;
use App\Models\KategoriPenilaian;
use App\Models\KriteriaPenilaian;
use App\Models\Pegawai;
use App\Models\Pegawais;
use Illuminate\Http\Request;
use Redirect, Response;


class DatatablesController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function divisi()
    {
        $divisi = Divisi::all();
        return DataTables::of($divisi)
            ->addIndexColumn()
            ->addColumn('action', function ($row) {

                $action = '<button type="button" id="editdata" class="btn btn-sm btn-warning nc-icon nc-bullet-list-67 edit" data-toggle="modal" data-target="#ModalEdit" data-id=' . $row->id . ' data-nama_divisi=' . $row->nama_divisi . '></button>
                <meta name="csrf-token" content="{{ csrf_token() }}"> <button id="deletedata" data-id =' . $row->id . ' data-toggle="modal" data-target="#ModalDelete" class="btn btn-sm btn-danger nc-icon nc-simple-remove"></button>';
                return $action;
            })
            ->rawColumns(['action'])
            ->make(true);
    }

    public function jabatan()
    {
        $jabatan = Jabatan::all();
        return DataTables::of($jabatan)
            ->addIndexColumn()
            ->addColumn('action', function ($row) {

                $action = '<button type="button" id="editdata" class="btn btn-sm btn-warning nc-icon nc-bullet-list-67 edit" data-toggle="modal" data-target="#ModalEdit" data-id=' . $row->id . ' data-nama_jabatan=' . $row->nama_jabatan . '></button>
                <meta name="csrf-token" content="{{ csrf_token() }}"> <button id="deletedata" data-id =' . $row->id . ' data-toggle="modal" data-target="#ModalDelete" class="btn btn-sm btn-danger nc-icon nc-simple-remove"></button>';
                return $action;
            })
            ->rawColumns(['action'])
            ->make(true);
    }

    public function kategori()
    {
        $kategori = KategoriPenilaian::all();
        return DataTables::of($kategori)
            ->addIndexColumn()
            ->addColumn('action', function ($row) {

                $action = '<button type="button" id="editdata" class="btn btn-sm btn-warning nc-icon nc-bullet-list-67 edit" data-toggle="modal" data-target="#ModalEdit" data-id=' . $row->id . ' data-nama_jabatan=' . $row->nama_jabatan . '></button>
                <meta name="csrf-token" content="{{ csrf_token() }}"> <button id="deletedata" data-id =' . $row->id . ' data-toggle="modal" data-target="#ModalDelete" class="btn btn-sm btn-danger nc-icon nc-simple-remove"></button>';
                return $action;
            })
            ->rawColumns(['action'])
            ->make(true);
    }

    public function aspek()
    {
        $aspek = AspekPenilaian::all();
        return DataTables::of($aspek)
            ->addIndexColumn()
            ->addColumn('id_kategori', function ($data) {
                return $data->kategori->kategori_penilaian;
            })
            ->addIndexColumn()
            ->addColumn('action', function ($row) {

                $action = '<button type="button" id="editdata" class="btn btn-sm btn-warning nc-icon nc-bullet-list-67 edit" data-toggle="modal" data-target="#ModalEdit" data-id=' . $row->id . ' data-nama_jabatan=' . $row->nama_jabatan . '></button>
                <meta name="csrf-token" content="{{ csrf_token() }}"> <button id="deletedata" data-id =' . $row->id . ' data-toggle="modal" data-target="#ModalDelete" class="btn btn-sm btn-danger nc-icon nc-simple-remove"></button>';
                return $action;
            })
            ->rawColumns(['action'])
            ->make(true);
    }


    public function kriteria()
    {
        $kriteria = KriteriaPenilaian::all();
        return DataTables::of($kriteria)
            ->addIndexColumn()
            ->addColumn('id_aspen', function ($data) {
                return $data->aspen->nama_aspek;
            })
            ->addIndexColumn()
            ->addColumn('action', function ($row) {

                $action = '<button type="button" id="editdata" class="btn btn-sm btn-warning nc-icon nc-bullet-list-67 edit" data-toggle="modal" data-target="#ModalEdit" data-id=' . $row->id . ' data-nama_jabatan=' . $row->nama_jabatan . '></button>
                <meta name="csrf-token" content="{{ csrf_token() }}"> <button id="deletedata" data-id =' . $row->id . ' data-toggle="modal" data-target="#ModalDelete" class="btn btn-sm btn-danger nc-icon nc-simple-remove"></button>';
                return $action;
            })
            ->rawColumns(['action'])
            ->make(true);
    }


    public function pegawai()
    {
        $pegawai = Pegawais::all();
        return DataTables::of($pegawai)
            ->addIndexColumn()
            ->addColumn('id_divisi', function ($data) {
                return $data->divisi->nama_divisi;
            })
            ->addColumn('id_jabatan', function ($data) {
                return $data->jabatan->nama_jabatan;
            })
            ->addColumn('action', function ($row) {

                $action = '<button type="button"  id="editdata" class="btn btn-sm btn-warning nc-icon nc-bullet-list-67 edit" data-toggle="modal" data-target="#ModalEdit" data-id=' . $row->id . '></button>
                <meta name="csrf-token" content="{{ csrf_token() }}">
                <button id="deletedata" data-id =' . $row->id . ' data-toggle="modal" data-target="#ModalDelete" class="btn btn-sm btn-danger nc-icon nc-simple-remove"></button>';
                return $action;
            })
            ->rawColumns(['action'])
            ->make(true);
    }
}
