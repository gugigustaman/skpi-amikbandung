@extends('layouts.backend')

@section('title', $data['title'])



@section('content')

<div class="container-fluid container-p-y">

    <h4 class="font-weight-bold py-3 mb-4">
        <span class="text-muted font-weight-light">Mahasiswa </span>
    </h4>

    <div class="card">
        
        <div class="card-header d-flex align-items-center justify-content-between">
            <a href="{{ route('mahasiswa.create') }}" class="btn btn-primary text-white">
                <i class="las la-plus"></i> Tambah</a>
        </div>

     
         
        <div class="card-datatable table-responsive">
            <table class="datatables-demo table table-striped table-bordered">
                <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Mahasiswa</th>
                    <th>NPM </th>
                    <th>Program Studi</th>
                    <th>Aksi</th>
                </tr>
                </thead>


                <tbody>
                @foreach($data['mahasiswa'] as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->user->name }}</td>
                    <td>{{ $item->npm }}</td>
                    <td>{{ $item->ProgramStudi->name }}</td>
                    <td>
                        <a class="btn icon-btn btn-sm btn-info editbtn"
                        href="{{ route('mahasiswa.edit', ['id' => $item['id']]) }}">
                            <i class="ion ion-md-create"></i>
                        </a>

                        <a class="btn icon-btn btn-sm btn-info editbtn"
                        href="{{ route('mahasiswa.nilai.edit', ['id' => $item['id']]) }}">
                            <i class="ion ion-md-list-box"></i>
                        </a>
                        
                        <a  href="javascript:void(0);" class="btn icon-btn btn-sm btn-danger delete" data-toggle="tooltip" data-original-title="click to delete mahasiswa"><i class="ion ion-md-trash"></i>
                            <form action="{{ route('mahasiswa.destroy', ['id' => $item['id']]) }}" method="POST">
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

 
       
  

</div> <!-- end row -->


@endsection


@section('jsbody')

<script>
    $('.delete').click(function(e)
    {
        e.preventDefault();
        var url = $(this).attr('href');
        Swal.fire({
        title: 'Hapus Mahasiswa ?',
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


</script>
@endsection