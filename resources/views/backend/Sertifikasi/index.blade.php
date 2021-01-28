@extends('layouts.backend')

@section('title', $data['title'])


@section('content')

<div class="container-fluid container-p-y">

    <h4 class="font-weight-bold py-3 mb-4">
        <span class="text-muted font-weight-light">Sertifikasi </span>
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
                    <th>Jenis Kegiatan</th>
                    <th>Nama Kegiatan</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
                </thead>


                <tbody>
                @foreach($data['sertifikasi'] as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->JenisKegiatan->jenis }}</td>
                    <td>{{ $item->getName() }}</td>
                    <td>{{ $item->getStatus() }}</td>
                    <td>
                        <a class="btn icon-btn btn-sm btn-info editbtn"
                        data-toggle="modal" 
                        data-target="#modaledit" 
                        onclick="editdata({{ $item->id }})" 
                        data-jenis_kegiatan_id="{{ $item->jenis_kegiatan_id }}"
                        data-isi="{{ $item->isi }}"
                         >
                            <i class="ion ion-md-create"></i>
                        </a>
                        
                        <a  href="javascript:void(0);" class="btn icon-btn btn-sm btn-danger delete" data-toggle="tooltip" data-original-title="click to delete dosen"><i class="ion ion-md-trash"></i>
                            <form action="{{ route('sertifikasi.destroy', ['id' => $item['id']]) }}" method="POST">
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
                    <h6 class="m-0">Ubah Sertifikasi</h6>
                </div>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span><i class="las la-times"></i></span>
                </button>
            </div>
            
            <form method="POST" enctype="multipart/form-data" id="editform">
                @csrf()
                @method('PUT')
                <input type="hidden" name="mahasiswa_id" value="{{ Auth::user()->Mahasiswa->id }}">
                <div class="modal-body scroll">
                <div class="container-fluid">
                    <div class="form-group">
                        <label for="deskriptor_id">Jenis Kegiatan</label>
                        <select name="jenis_kegiatan_id" id="edit_jenis_kegiatan_id" class="form-control jenis-kegiatan">
                            <option value="">- Pilih Jenis Kegiatan -</option>
                            @foreach ($data['jenis'] as $item)
                            <option value="{{ $item->id }}" data-attributes="{{ $item->atribut }}"> {{ $item->jenis }} </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="attribute-div">
                    </div>
                    <div class="form-group">
                        <label for="name">Sertifikat / Piagam / Surat Keterangan</label>
                        <div class="input-group mb-3">
                          <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroupFileAddon01">Unggah</span>
                          </div>
                          <div class="custom-file">
                            <input type="file" name="file" class="custom-file-input" id="editFile" aria-describedby="inputGroupFileAddon01">
                            <label class="custom-file-label" for="editFile">Pilih File</label>
                          </div>
                        </div>
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

    <!-- end modal edit -->

    <!-- modal create -->
    <div class="modal fade" id="modalcreate" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="title-heading">
                    <h6 class="m-0">Tambah Sertifikasi</h6>
                    </div>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span><i class="las la-times"></i></span>
                    </button>
                </div>
                <form action="{{ Route('sertifikasi.store') }}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <input type="hidden" name="mahasiswa_id" value="{{ Auth::user()->Mahasiswa->id }}">
                    <div class="modal-body scroll">
                    <div class="container-fluid">
                        <div class="form-group">
                            <label for="deskriptor_id">Jenis Kegiatan</label>
                            <select name="jenis_kegiatan_id" id="jenis_kegiatan_id" class="form-control jenis-kegiatan">
                                <option value="">- Pilih Jenis Kegiatan -</option>
                                @foreach ($data['jenis'] as $item)
                                <option value="{{ $item->id }}" data-attributes="{{ $item->atribut }}"> {{ $item->jenis }} </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="attribute-div">
                        </div>
                        <div class="form-group">
                            <label for="name">Sertifikat / Piagam / Surat Keterangan</label>
                            <div class="input-group mb-3">
                              <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroupFileAddon01">Unggah</span>
                              </div>
                              <div class="custom-file">
                                <input type="file" name="file" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
                                <label class="custom-file-label" for="inputGroupFile01">Pilih File</label>
                              </div>
                            </div>
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
        title: 'Hapus Sertifikasi ?',
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
        var url = '{{ route("sertifikasi.update", ":id") }}';
        url = url.replace(':id', id);
        $("#editform").attr('action', url);
    }

    function editSubmit()
    {
        $("#editform").submit();
    }

    $('.editbtn').click(function(){
        
        var jenis_kegiatan_id = $(this).data('jenis_kegiatan_id');
        var isi = $(this).data('isi');

        $('#edit_jenis_kegiatan_id').val(jenis_kegiatan_id);
        $('#edit_jenis_kegiatan_id').trigger('change');

        $.each(isi, function(key, item) {
            $('#modaledit .'+key).val(item);
        });
    });

    function toTitleCase(str) {
      return str.split('_').map(function (item) {
          return item.charAt(0).toUpperCase() + item.substring(1);
      }).join(' ');
    }

    $('.jenis-kegiatan').change(function() {
        var attributes = $(this).find('option:selected').data('attributes').split(',');

        var div = $(this).closest('form').find('.attribute-div');
        div.html('');

        $.each(attributes, function(key, item) {
            div.append('<div class="form-group">'+
                '<label for="'+item+'">'+toTitleCase(item)+'</label>'+
                '<input type="text" name="atribut['+item+']" class="form-control '+item+'" required>'+
            '</div>')
        });
    });


  $('.add').click(function(){
    $('.modal-body #name').val('');
  });

</script>
@endsection