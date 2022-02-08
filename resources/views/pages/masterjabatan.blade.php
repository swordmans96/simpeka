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
                    <h5 class="card-title">DATA JABATAN</h5>
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
                                    <th> NAMA JABATAN </th>
                                    <th> Action</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Insert -->
        <div class="modal fade" id="tambahkaryawan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">TAMBAH JABATAN</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('jabatan.store')}}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="inputAddress2">NAMA JABATAN</label>
                                <input type="text" class="form-control" name="nama_jabatan" placeholder="NAMA JABATAN">
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
                        <h5 class="modal-title" id="exampleModalLabel">Edit Jabatan</h5>
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
                                <label for="inputAddress2">NAMA JABATAN</label>
                                <input type="text" class="form-control" name="nama_jabatan" id="nama_jabatan" placeholder="NAMA JABATAN">
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
                    <form id="formhapus" action="" method="post">
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


    </div>
</div>

@push('scripts')
<!-- JS edit nama -->

<script>
    $('body').on('click', '#editdata', function() {
        var jabatan_id = $(this).data('id');
        $.get('jabatan/' + jabatan_id + '/edit', function(data) {
            $('#ModalEdit').modal('show');
            var action = '{{route("jabatan.update",  ":id"  )}}';
            action = action.replace(':id', data.id);
            $("#formedit").attr("action", action);
            $('#id').val(data.id);
            $('#nama_jabatan').val(data.nama_jabatan);
        })
    });
</script>



<script>
    $('body').on('click', '#deletedata', function() {
        var jabatan_id = $(this).data('id');
        var action = '{{route("jabatan.destroy",  ":id"  )}}';
        action = action.replace(':id', jabatan_id);
        $("#formhapus").attr("action", action);
    });
</script>



<!-- DataTables -->
<script>
    $(function() {
        $('#myTable').DataTable({
            processing: true,
            serverSide: true,
            ajax: '/datajabatan',
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
                    data: 'nama_jabatan',
                    name: 'nama_jabatan',
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