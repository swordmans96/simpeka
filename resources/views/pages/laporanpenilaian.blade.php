@extends('layouts.app', [
'class' => '',
'elementActive' => 'laporanpenilaian'
])

@section('content')
<div class="content">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="card">
                <div class="card-header card-header-warning">
                    <h5 class="card-title">LAPORAN PENILAIAN</h5>

                    <div class="card-body">
                        <form class="form-inline">
                            <label for="periode">Pilih Periode&nbsp;&nbsp;&nbsp;</label>
                            <input type="date" class=" form-control col-lg-2 col-md-6 col-sm-12" id="periode">&nbsp;&nbsp;&nbsp;
                            <button type="button" class="btn btn-primary nc-icon nc-zoom-split"></button>
                        </form>
                        <div class="table-responsive">
                            <table class="table">
                                <thead class=" text-warning ">
                                    <tr>
                                        <th>Tanggal Penilaian</th>
                                        <th>NIK</th>
                                        <th> Nama </th>
                                        <th> Divisi </th>
                                        <th> Jabatan </th>
                                        <th>Penilai</th>
                                        <th> Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th>24/04/2021</th>
                                        <th>0001</th>
                                        <th> Mukhamad Syaifullah </th>
                                        <th> SIM </th>
                                        <th> Staff </th>
                                        <th>Lukman Sholeh</th>
                                        <th> <button type="button" class="btn btn-sm btn-primary nc-icon nc-zoom-split"></button>
                                            <a href="#myModal" class="trigger-btn" data-toggle="modal"><button type="button" class="btn btn-sm btn-danger nc-icon nc-check-2"></button></a>
                                        </th>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection