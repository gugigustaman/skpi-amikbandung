@extends('layouts.backend')

@section('title', $data['title'])


@section('content')

<div class="container-fluid container-p-y">

    <h4 class="font-weight-bold py-3 mb-4">
        <span class="text-muted font-weight-light">Jenjang Pendidikan </span>
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
                    <th>Jenjang Pendidikan</th>
                    <th>Aksi</th>
                </tr>
                </thead>


                <tbody>
                @foreach($data['jenjang'] as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->name }}</td>
                    <td>
                        <a class="btn icon-btn btn-sm btn-info editbtn"
                        data-toggle="modal" data-target="#modaledit" onclick="editdata({{ $item->id }})" data-name="{{ $item->name }}" >
                            <i class="ion ion-md-create"></i>
                        </a>
                        
                        <a  href="javascript:void(0);" class="btn icon-btn btn-sm btn-danger delete" data-toggle="tooltip" data-original-title="click to delete dosen"><i class="ion ion-md-trash"></i>
                            <form action="{{ route('jenjang.destroy', ['id' => $item['id']]) }}" method="POST">
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
                    <h6 class="m-0">Jenjang Pendidikan Edit</h6>
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
                            <label for="name">Jenjang Pendidikan</label>
                            <input type="text" name="name" id="name" class="form-control" placeholder="" required>
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
                    <h6 class="m-0">Tambah Jenjang Pendidikan</h6>
                    </div>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span><i class="las la-times"></i></span>
                    </button>
                </div>
                <form action="{{ Route('jenjang.store') }}" method="POST">
                    {{ csrf_field() }}
                    <div class="modal-body scroll">
                    <div class="container-fluid">
                        <div class="form-group">
                            <label for="name">Jenjang Pendidikan</label>
                            <input type="text" name="name" id="name" class="form-control" required>
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
        title: 'Hapus Jenjang Pendidikan ?',
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
        var url = '{{ route("jenjang.update", ":id") }}';
        url = url.replace(':id', id);
        $("#editform").attr('action', url);
    }

    function editSubmit()
    {
        $("#editform").submit();
    }

    $('.editbtn').click(function(){
        
        var name = $(this).data('name');

        $('.modal-body #name').val(name);
    });


  $('.add').click(function(){
    $('.modal-body #name').val('');
  });

</script>
@endsection