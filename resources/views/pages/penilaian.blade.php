@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'penilaian'
])

@section('content')
<div class="content">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header card-header-warning">
                    <h5 class="card-title">PENILAIAN KARYAWAN</h5>
                </div>
                <div class="card-body table-responsive">
                    <div class="">
                        <table class="table table-striped table-bordered" id="myTable">
                            <thead class=" text-warning ">
                                <tr>
                                    <th>NO</th>
                                    <th>ID</th>
                                    <th> Nama </th>
                                    <th> NIK </th>
                                    <th> Divisi </th>
                                    <th> Jabatan </th>
                                    <th> Action</th>
                                </tr>
                            </thead>
                                <tr>
                                    <th>1</th>
                                    <th>1</th>
                                    <th> Desi Indrawati </th>
                                    <th> 34458 </th>
                                    <th> SDM & PK </th>
                                    <th> STAFF </th>
                                    <th> <button type="button"  id="editdata" class="btn btn-sm btn-success nc-icon nc-chart-bar-32" data-toggle="modal" data-target="#nilaikaryawan" data-id=' . $row->id . '></button>
                                    
                                        {{-- <button type="button" id="deletedata" data-id =' . $row->id . ' data-toggle="modal" data-target="#penilaian" class="btn btn-sm btn-danger nc-icon nc-chart-bar-32"></button></th> --}}
                                </tr>
                        </table>
                    </div>

                    {{-- MODAL DETAIL KARYAWAN --}}
                    <div class="modal fade modal-fullscreen" id="nilaikaryawan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">PENILAIAN PEGAWAI</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">TUTUP</button>
                                </div>
                            </div>
                     </div>

                     



                
                
                </div>
            </div>
        </div>

    
    </div>

    @push('scripts')
    <!-- JS edit nama -->

    <script>
        $('body').on('click', '#editdata', function() {
            var pegawai_id = $(this).data('id');
            $.get('pegawai/' + pegawai_id + '/edit', function(data) {
                $('#ModalEdit').modal('show');
                var action = '{{route("pegawai.update",  ":id"  )}}';
                action = action.replace(':id', data.id);
                $("#formedit").attr("action", action);
                $('#id').val(data.id);
                $('#nik').val(data.nik);
                $('#nama').val(data.nama);
                $('#opdivisi').val(data.id_divisi);
                $('#opjabatan').val(data.id_jabatan);
            });
        });
    </script>



    <script>
        $('body').on('click', '#deletedata', function() {
            var jabatan_id = $(this).data('id');
            var action = '{{route("pegawai.destroy",  ":id"  )}}';
            action = action.replace(':id', jabatan_id);
            $("#formhapus").attr("action", action);
        });
    </script>



    <!-- DataTables -->
    {{-- <script>
        $(function() {
            $('#myTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: '/datapegawai',
                columns: [{
                        data: 'no',
                        name: 'id',
                        render: function(data, type, row, meta) {
                            return meta.row + meta.settings._iDisplayStart + 1;
                        }
                    },
                    {
                        data: 'id',
                        name: 'id',
                        visible: false
                    },
                    {
                        data: 'nama',
                        name: 'nama',
                        searchable: true

                    },
                    {
                        data: 'nik',
                        name: 'nik',
                        searchable: true

                    },
                    {
                        data: 'id_divisi',
                        name: 'id_divisi.nama_divisi',
                        searchable: true

                    },
                    {
                        data: 'id_jabatan',
                        name: 'id_jabatan.nama_jabatan',
                        searchable: true

                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    },
                ]
            });
        });
    </script> --}}
    @endpush
@endsection
