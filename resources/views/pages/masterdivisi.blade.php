@extends('layouts.app', [
'class' => '',
'elementActive' => 'master'
])

@section('content')
<div class="content">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="card">
                <div class="card-header card-header-warning">
                    <h5 class="card-title">DATA DIVISI / RUANG</h5>
                </div>
                <div class="card-body table-responsive">
                    <div class="">
                        <table class="table table-striped table-bordered" id="myTable">
                            <tr>
                                <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#tambahkaryawan"><i class="nc-icon nc-simple-add"></i> TAMBAH DATA</button>
                            </tr>
                            <thead class=" text-warning ">
                                <tr>
                                    <th>NO</th>
                                    <th>ID</th>
                                    <th> Nama Devisi / Ruang </th>
                                    <th> Action</th>
                                </tr>
                            </thead>
                        </table>

                        <!-- <table class="table" id="divisi">
                            <tr>
                                <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#tambahkaryawan"><i class="nc-icon nc-simple-add"></i> TAMBAH DATA</button>
                            </tr>
                            <thead class=" text-warning ">
                                <tr>
                                    <th>NO</th>
                                    <th> Nama Devisi / Ruang </th>
                                    <th> Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($divisi as $data)

                                <tr>
                                    <td>{{ $data->id}}</td>
                                    <td>{{ $data->nama_divisi }} </td>
                                    <td>
                                        <form action=" {{ route('divisi.destroy', $data->id) }}" method="POST">
                                            @method('delete')
                                            @csrf
                                            <button type="button" id="editdata" data-nama_divisi="{{ $data->nama_divisi }}" class="btn btn-sm btn-warning nc-icon nc-bullet-list-67 edit" data-toggle="modal" data-target="#ModalEdit" data-id="{{ $data->id }}"></button>
                                            <button type="submit" class="btn btn-sm btn-danger nc-icon nc-simple-remove"></button>

                                        </form>

                                    </td>
                                </tr>
                                @endforeach

                            </tbody>
                        </table> -->
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Insert -->
        <div class="modal fade" id="tambahkaryawan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">TAMBAH DIVISI / RUANG</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('divisi.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="inputAddress2">NAMA DEVISI / RUANG</label>
                                <input type="text" class="form-control" name="nama_divisi" placeholder="NAMA DIVISI">
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">BATAL</button>
                        <button type="submit" class="btn btn-primary">SIMPAN</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>


        <!-- Modal Edit -->
        <div class="modal fade" id="ModalEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">TAMBAH DIVISI / RUANG</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body" id="ModalEditContent">
                        <form id="formedit" action="" method="POST">
                            @csrf
                            @method('PUT')
                            <div class=" form-group">
                                <input type="hidden" class="form-control" id="id">
                                <label for="inputAddress2">NAMA DEVISI / RUANG</label>
                                <input type="text" class="form-control" name="nama_divisi" id="nama_divisi" placeholder="NAMA DIVISI">
                            </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">BATAL</button>
                        <button id="update" type="submit" class="btn btn-primary">SIMPAN</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>


        <!-- Modal Delete -->

        <div id="ModalDelete" class="modal fade">
            <div class="modal-dialog modal-confirm">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Anda Yakin?</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                        <p>Anda yakin mau menghapus data ini?</p>
                    </div>
                    <form id="formhapus" action="" method="POST">
                        @method('delete')
                        @csrf
                        <div class="modal-footer">
                            <button type="button" class="btn btn-info" data-dismiss="modal">Batal</button>
                            <button id="delete" type="submit" class="btn btn-danger">Hapus</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        @push('scripts')
        <!-- JS edit nama -->
        <!-- <script>
            $('#ModalEdit').on('show.bs.modal', function(event) {
                var button = $(event.relatedTarget)
                var id = button.data('id')
                var nama = button.data('nama_divisi')

                var modal = $(this)
                modal.find('.modal-body #id').val(id);
                modal.find('.modal-body #nama_divisi').val(nama);
            })
        </script> -->
        <script>
            $('body').on('click', '#editdata', function() {
                var divisi_id = $(this).data('id');
                $.get('divisi/' + divisi_id + '/edit', function(data) {
                    $('#ModalEdit').modal('show');
                    var action = '{{route("divisi.update",  ":id"  )}}';
                    action = action.replace(':id', data.id);
                    $("#formedit").attr("action", action);
                    $('#id').val(data.id);
                    $('#nama_divisi').val(data.nama_divisi);
                })
            });
        </script>



        <!-- DataTables -->
        <script>
            $(function() {
                $('#myTable').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: '/datadivisi',
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
                            data: 'nama_divisi',
                            name: 'nama_divisi',
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
        </script>
        @endpush

        @endsection