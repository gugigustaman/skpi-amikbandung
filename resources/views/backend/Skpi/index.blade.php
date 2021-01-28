@extends('layouts.backend')

@section('title', $data['title'])



@section('content')

<div class="container-fluid container-p-y">

    <h4 class="font-weight-bold py-3 mb-4">
        <span class="text-muted font-weight-light">Halaman Cetak SKPI </span>
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
                    <th>NPM</th>
                    <th>Nama Mahasiswa</th>
                    <th>Program Studi </th>
                    <th>Kelas</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
                </thead>


                <tbody>
                @foreach($data['mahasiswa'] as $item)
                <tr>
                    <td>{{ $item->npm }}</td>
                    <td>{{ $item->user->name }}</td>
                    <td>{{ $item->ProgramStudi->name }}</td>
                    <td>{{ $item->Kelas->name }}</td>
                    <td>{{ $item->getSertifikasiStatus() == 1 ? 'Dokumen Selesai' : 'Dokumen Belum' }}</td>
                    <td>                        
                        <a href="/mahasiswa/{{ $item->id }}/skpi" target="_blank" class="btn btn-sm btn-primary"><i class="ion ion-md-print"></i> Print
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