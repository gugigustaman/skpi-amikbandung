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
                    <th>NPM</th>
                    <th>Nama Mahasiswa</th>
                    <th>Jurusan</th>
                    <th>Status</th>
                    <th class="text-center">Aksi</th>
                </tr>
                </thead>
                <tbody>
                @foreach($data['mahasiswa'] as $item)
                <tr>
                    <td>{{ $item->npm }}</td>
                    <td>{{ $item->User->name }}</td>
                    <td>{{ $item->ProgramStudi->name }}</td>
                    <td>{{ $item->getSertifikasiStatusDesc() }}</td>
                    <td class="text-center">
                        <a href="javascript:void(0);" class="btn btn-sm btn-primary verifyBtn" 
                            data-toggle="modal" 
                            data-target="#modalshow" 
                            data-id="{{ $item->id }}"
                            data-sertifikasi="{{ $item->Sertifikasi()->with('JenisKegiatan')->get()->toJson() }}"
                            ><i class="ion ion-md-eye"></i> &nbsp; Lihat Detail</a>
                    </td>
                </tr>
                @endforeach
                
                
                </tbody>
            </table>

        </div>

        
    </div> <!-- end col -->
  
  <!-- modal show -->
  <div class="modal fade" id="modalshow" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <div class="title-heading">
                    <h6 class="m-0">Detail Sertifikasi</h6>
                </div>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span><i class="las la-times"></i></span>
                </button>
            </div>
            
            <form method="POST" action="/mahasiswa/verify_sertifikasi" id="verifyForm">
                @csrf()
                <input type="hidden" name="mahasiswa_id" id="mahasiswa_id" />
                <div class="modal-body scroll">
                <div class="container-fluid certificate-div">
                    
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

    $('.verifyBtn').click(function(){
        var id = $(this).data('id');
        var sertifikasi = $(this).data('sertifikasi');

        $('#mahasiswa_id').val(id);

        $('#verifyForm .certificate-div').html('');

        $.each(sertifikasi, function(key, item) {
          $('#verifyForm .certificate-div').append(''+
            '<div class="card mb-3">'+
              '<img src="'+item.file_url+'" class="card-img-top">'+
              '<div class="card-body">'+
                '<h5 class="card-title">'+item.jenis_kegiatan.jenis+'</h5>'+
                '<p class="card-text">'+item.desc+'</a>'+
              '</div>'+
              '<div class="card-footer text-right">'+
                '<div class="custom-control custom-radio custom-control-inline">'+
                  '<input type="radio" id="approve'+item.id+'" name="sertifikasi['+item.id+']" class="custom-control-input" value="1">'+
                  '<label class="custom-control-label text-success" for="approve'+item.id+'">Approve</label>'+
                '</div>'+
                '<div class="custom-control custom-radio custom-control-inline">'+
                  '<input type="radio" id="reject'+item.id+'" name="sertifikasi['+item.id+']" class="custom-control-input" value="2">'+
                  '<label class="custom-control-label text-danger" for="reject'+item.id+'">Reject</label>'+
                '</div>'+
              '</div>'+
            '</div>');
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