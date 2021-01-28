@extends('layouts.backend')

@section('title', $data['title'])



@section('content')

<div class="container-fluid container-p-y">

    <h4 class="font-weight-bold py-3 mb-4">
        <span class="text-muted font-weight-light">Kualifikasi Nilai </span>
    </h4>

    <div class="card">

        <div class="card-header d-flex align-items-center justify-content-between">
            <a data-toggle="modal" data-target="#modalcreate" class="btn btn-primary text-white">
                <i class="las la-plus"></i> Tambah</a>
        </div>



        <div class="card-datatable table-responsive">
            <table class="datatables-demo table table-striped table-bordered">
                <thead>
                <tr >
                    <th>No</th>
                    <th>Index</th>
                    <th>Angka</th>
                    <th>Nilai Akhir Semester</th>
                    <th>Keterangan</th>
                    <th>Aksi</th>
                </tr>
                </thead>


                <tbody>
                @foreach($data['data'] as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->index }}</td>
                    <td>{{ $item->angka }}</td>
                    <td>{{ $item->nilai_semester_from }}</td>
                    <td>{{ $item->nilai_semester_to }}</td>
                    <td>{{ $item->keterangan }}</td>
                    <td>
                        <a
                            class="btn icon-btn btn-sm btn-info editbtn"
                            data-toggle="modal"
                            data-target="#modaledit"
                            onclick="editdata({{ $item->id }})"
                            data-index="{{ $item->index }}"
                            data-angka="{{ $item->angka }}"
                            data-nilai_semester_from="{{ $item->nilai_semester_from }}"
                            data-nilai_semester_to="{{ $item->nilai_semester_to }}"
                            data-keterangan="{{ $item->keterangan }}"
                        >
                            <i class="ion ion-md-create"></i>
                        </a>

                        <a  href="javascript:void(0);" class="btn icon-btn btn-sm btn-danger delete" data-toggle="tooltip" data-original-title="click to delete dosen"><i class="ion ion-md-trash"></i>
                            <form action="{{ route('kualifikasi-nilai.destroy', ['id' => $item['id']]) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            </form>
                        </a>

                    </td>
                </tr>
                @endforeach


                </tbody>
            </table>

        </div>


    </div> <!-- end col -->

  <!-- modal edit -->
  <div class="modal fade" id="modaledit" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <div class="title-heading">
                    <h6 class="m-0">Kualifikasi Nilai Edit</h6>
                </div>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span><i class="las la-times"></i></span>
                </button>
            </div>

            <form action="" method="POST" id="editform" >
                @csrf
                @method('PUT')
                    <div class="modal-body">

                        <div class="form-group">
                            <label for="name">Index</label>
                            <input type="text" name="index" id="index" class="form-control" placeholder="" required>
                        </div>

                        <div class="form-group">
                            <label for="name">Angka</label>
                            <input type="number" name="angka" id="angka" class="form-control" placeholder="" required step="0.01">
                        </div>
                        <div class="form-group">
                            <label for="name">Nilai Akhir Semester</label>
                            <div class="row">
                                <div class="col-6">
                                    <input type="number" name="nilai_semester_from" id="nilai_semester_from" class="form-control" placeholder="Batas Awal" required min="0">
                                </div>
                                <div class="col-6">
                                    <input type="number" name="nilai_semester_to" id="nilai_semester_to" class="form-control" placeholder="Batas Akhir" required max="100">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="name">Keterangan</label>
                            <textarea name="keterangan" id="keterangan" class="form-control" required></textarea>
                        </div>


                    </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
    </div>

    <!-- end modal edit -->

    <!-- modal create -->
    <div class="modal fade" id="modalcreate" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="title-heading">
                    <h6 class="m-0">Tambah Kualifikasi Nilai</h6>
                    </div>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span><i class="las la-times"></i></span>
                    </button>
                </div>
                <form action="{{ Route('kualifikasi-nilai.store') }}" method="POST">
                    {{ csrf_field() }}
                    <div class="modal-body scroll">
                    <div class="container-fluid">
                        <div class="form-group">
                            <label for="name">Index</label>
                            <input type="text" name="index" id="index" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="name">Angka</label>
                            <input type="number" name="angka" id="angka" class="form-control" placeholder="" required step="0.01">
                        </div>

                        <div class="form-group">
                            <label for="name">Nilai Akhir Semester</label>
                            <div class="row">
                                <div class="col-6">
                                    <input type="number" name="nilai_semester_from" id="nilai_semester_from" class="form-control" placeholder="Batas Awal" required min="0">
                                </div>
                                <div class="col-6">
                                    <input type="number" name="nilai_semester_to" id="nilai_semester_to" class="form-control" placeholder="Batas Akhir" required max="100">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="name">Keterangan</label>
                            <textarea name="keterangan" id="keterangan" class="form-control" required></textarea>
                        </div>

                    </div>
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- end modal -->




</div> <!-- end row -->


@endsection


@section('jsbody')

<script>
    $('.delete').click(function(e)
    {
        e.preventDefault();
        var url = $(this).attr('href');
        Swal.fire({
        title: 'Hapus Kualifikasi Nilai ?',
        text: "Anda yakin ingin menghapus!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya!'
        }).then((result) => {
        if (result.value) {
            $(this).find('form').submit();
        }
        })
    });

    function editdata(id)
    {
        var id = id;
        var url = '{{ route("kualifikasi-nilai.update", ":id") }}';
        url = url.replace(':id', id);
        $("#editform").attr('action', url);
    }

    function editSubmit()
    {
        $("#editform").submit();
    }

    $('.editbtn').click(function(){

        var index = $(this).data('index');
        var angka = $(this).data('angka');
        const nilai_semester_from = $(this).data('nilai_semester_from');
        const nilai_semester_to = $(this).data('nilai_semester_to');
        const keterangan = $(this).data('keterangan');

        $('.modal-body #index').val(index);
        $('.modal-body #angka').val(angka);
        $('.modal-body #nilai_semester_from').val(nilai_semester_from);
        $('.modal-body #nilai_semester_to').val(nilai_semester_to);
        $('.modal-body #keterangan').val(keterangan);
    });


  $('.add').click(function(){
    $('.modal-body #index').val('');
    $('.modal-body #angka').val('');
    $('.modal-body #nilai_semester_from').val('');
    $('.modal-body #nilai_semester_to').val('');
    $('.modal-body #keterangan').val('');
  });

</script>
@endsection
