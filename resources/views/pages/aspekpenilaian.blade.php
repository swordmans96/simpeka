@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'aspekpenilaian'
])

@section('content')

@section('content')
<div class="content">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="card">
                <div class="card-header card-header-warning">
                    <h5 class="card-title">DATA ASPEK PENILAIAN</h5>
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
                                    <th> kategori Penilaian</th>
                                    <th>Aspek Penilaian</th>
                                    <th>Bobot (%)</th>
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
                        <h5 class="modal-title" id="exampleModalLabel">TAMBAH ASPEK PENILAIAN</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('aspek.store')}}" method="POST">
                            @csrf
                            <div class="form-group">
                                <div class="form-group">
                                    <label for="kategori">KATEGORI PENILAIAN</label>
                                    <select  id="kat" name="id_kategori" class="form-control">
                                        <option>- Pilih Kategori Penilaian -</option>
                                        @foreach ($kategori as $item)
                                        <option value="{{ $item->id }}">{{ $item->kategori_penilaian }}</option>  
                                        @endforeach 
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputAddress2">ASPEK PENILAIAN</label>
                                <input type="text" class="form-control" required autocomplete="off" name="nama_aspek" placeholder="ASPEK PENILAIAN">
                            </div>
                            <div class="form-group">
                                <label for="inputAddress2">BOBOT</label>
                                <input type="number" id="bobot" min="1" class="form-control" required autocomplete="off" name="bobot">
                                <button class="btn btn-sm btn-warning" id="maks">Bobot Max : ...</button>
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
                        <h5 class="modal-title" id="exampleModalLabel">Edit Aspek Penilaian</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body" id="ModalEditContent">
                        <form id="formedit" action="" method="POST">
                            @csrf
                            @method('PUT')
                            
                            <div class="form-group">
                                <div class="form-group">
                                    <input type="hidden" class="form-control" id="id">
                                    <label for="kategori">KATEGORI PENILAIAN</label>
                                    <select  id="kategori" name="id_kategori" class="form-control"> 
                                        <option>- Pilih Kategori Penilaian -</option>
                                        @foreach ($kategori as $item)
                                        <option value="{{ $item->id }}">{{ $item->kategori_penilaian }}</option>  
                                        @endforeach 
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputAddress2">ASPEK PENILAIAN</label>
                                <input type="text" class="form-control" required autocomplete="off" id="nama_aspek" name="nama_aspek" placeholder="ASPEK PENILAIAN">
                            </div>
                            <div class="form-group">
                                <label for="inputAddress2">BOBOT</label>
                                <input type="number" class="form-control" required autocomplete="off" id="bobots" name="bobot" placeholder="BOBOT (%)">
                                <button class="btn btn-sm btn-warning" id="max"></button>
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
        var aspen_id = $(this).data('id');
        $.get('aspek/' + aspen_id + '/edit', function(data) {
            $('#ModalEdit').modal('show');
            var action = '{{route("aspek.update",  ":id"  )}}';
            action = action.replace(':id', data.id);
            $("#formedit").attr("action", action);
            $('#id').val(data.id);
            $('#kategori').val(data.id_kategori);
            $('#nama_aspek').val(data.nama_aspek);
            $('#bobots').val(data.bobot);
            var kat_id = data.id_kategori;
            $.get('persen/' + kat_id, function(data) {
            console.log(kat.id);
            var a = data.sisa;
            var b = $('#bobots').val();
            var max = (+a) + (+b);
            $("#bobots").attr("max", max);
            $("#max").text("Bobot max : " + max);

        })

        })
    });
</script>

<script>
    $('body').on('change', '#kat', function(){
        var kat_id = $('#kat').val();
        $.get('persen/' + kat_id, function(data) {
            var max = data.sisa;
            $("#bobot").attr("max", max);
            $("#maks").text("Bobot max : " + max);

        })
    })
</script>




<script>
    $('body').on('click', '#deletedata', function() {
        var aspek_id = $(this).data('id');
        var action = '{{route("aspek.destroy",  ":id"  )}}';
        action = action.replace(':id', aspek_id);
        $("#formhapus").attr("action", action);
    });
</script>



<!-- DataTables -->
<script>
    $(function() {
        $('#myTable').DataTable({
            processing: true,
            serverSide: true,
            ajax: '/dataaspek',
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
                    data: 'id_kategori',
                    name: 'id_kategori',
                    searchable: true

                },
                {
                    data: 'nama_aspek',
                    name: 'nama_aspek',
                    searchable: true

                },
                {
                    data: 'bobot' ,
                    name: 'bobot',
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
