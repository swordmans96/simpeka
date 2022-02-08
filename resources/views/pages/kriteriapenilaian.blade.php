@extends('layouts.app', [
'class' => '',
'elementActive' => 'kriteriapenilaian'
])

@section('content')
<div class="content">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="card">
                <div class="card-header card-header-warning">
                    <h5 class="card-title">DATA KRITERIA PENILAIAN</h5>
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
                                    <th>Aspek Penilaian</th>
                                    <th>Deskripsi Kriteria</th>
                                    <th>Min</th>
                                    <th>Max</th>
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
                        <h5 class="modal-title" id="exampleModalLabel">TAMBAH KRITERIA PENILAIAN</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('kriteria.store')}}" method="POST">
                            @csrf
                            <div class="form-group">
                                <div class="form-group">
                                    <label for="kategori">ASPEK PENILAIAN</label>
                                    <select  id="kat" name="id_kategori" class="form-control">
                                        <option>- PILIH ASPEK PENILAIAN -</option>
                                        <option value=""></option>  
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputAddress2">KRITERIA PENILAIAN</label>
                                <input type="text" class="form-control" required autocomplete="off" name="Deskripsi" placeholder="KRITERIA PENILAIAN">
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputAddress2">NILAI MINIMAL</label>
                                    <input type="number" id="min" min="1" class="form-control" required autocomplete="off" name="min">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputAddress2">NILAI MAKSIMAL</label>
                                    <input type="number" id="max" min="1" class="form-control" required autocomplete="off" name="max">
                                </div> 
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
                    <div class="modal-body">
                        <form action="{{ route('kriteria.store')}}" method="POST">
                            @csrf
                            <div class="form-group">
                                <div class="form-group">
                                    <label for="kategori">ASPEK PENILAIAN</label>
                                    <select  id="kat" name="id_kategori" class="form-control">
                                        <option>- PILIH ASPEK PENILAIAN -</option>
                                        <option value=""></option>  
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputAddress2">KRITERIA PENILAIAN</label>
                                <input type="text" class="form-control" required autocomplete="off" name="Deskripsi" placeholder="KRITERIA PENILAIAN">
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputAddress2">NILAI MINIMAL</label>
                                    <input type="number" id="min" min="1" class="form-control" required autocomplete="off" name="min">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputAddress2">NILAI MAKSIMAL</label>
                                    <input type="number" id="max" min="1" class="form-control" required autocomplete="off" name="max">
                                </div> 
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
        var kategori_id = $(this).data('id');
        $.get('kategori/' + kategori_id + '/edit', function(data) {
            $('#ModalEdit').modal('show');
            var action = '{{route("kategori.update",  ":id"  )}}';
            action = action.replace(':id', data.id);
            $("#formedit").attr("action", action);
            $('#id').val(data.id);
            $('#kategori_penilaian').val(data.kategori_penilaian);
        })
    });
</script>



<script>
    $('body').on('click', '#deletedata', function() {
        var jabatan_id = $(this).data('id');
        var action = '{{route("kategori.destroy",  ":id"  )}}';
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
            ajax: '/datakriteria',
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
                    data: 'id_aspen',
                    name: 'id_aspen',
                    searchable: true
                },
                {
                    data: 'Deskripsi',
                    name: 'Deskripsi',
                    searchable: true

                },
                {
                    data: 'min',
                    name: 'min',
                    searchable: true

                },
                {
                    data: 'max',
                    name: 'max',
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