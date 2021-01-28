@extends('layouts.backend')

@section('title', $data['title'])

@section('css')
<link rel="stylesheet" href="{{ asset('asset/temp_backend/vendor/libs/bootstrap-select/bootstrap-select.css') }}">
  <link rel="stylesheet" href="{{ asset('asset/temp_backend/vendor/libs/bootstrap-multiselect/bootstrap-multiselect.css') }}">
<link rel="stylesheet" href="{{ asset('asset/temp_backend/vendor/libs/select2/select2.css') }}">
<link rel="stylesheet" href="{{ asset('asset/temp_backend/vendor/libs/bootstrap-tagsinput/bootstrap-tagsinput.css') }}">
<style type="text/css">
  .bg-lighter {
    background: rgba(24,28,33,0.025);
  }
</style>
@endsection

@section('content')
<!-- Content -->
<div class="container-fluid  container-p-y">

    <h4 class="font-weight-bold py-3 mb-4">
      <span class="text-muted font-weight-light">Mahasiswa / </span> {{ $data['title'] }} 
    </h4>

    <div class="card">
      <div class="card-header">
        <div class="title-heading">
              <h6 class="m-0">Form Nilai Mahasiswa</h6>
        </div>
      </div>
      <form action="{{ route('mahasiswa.nilai.update',['id' => $data['mahasiswa']['id']]) }}" method="POST">
          @csrf
        <div class="card-body">
          <div class="row">
            <div class="col-12 col-md-6">
              <table class="table table-striped table-borderless">
                <tbody>
                  <tr>
                    <td class="font-weight-bold">Nama</td>
                    <td width="5%">:</td>
                    <td>{{ $data['mahasiswa']->User->name }}</td>
                  </tr>
                  <tr>
                    <td class="font-weight-bold">NPM</td>
                    <td width="5%">:</td>
                    <td>{{ $data['mahasiswa']->npm }}</td>
                  </tr>
                  <tr>
                    <td class="font-weight-bold">Jurusan</td>
                    <td width="5%">:</td>
                    <td>{{ $data['mahasiswa']->ProgramStudi->name }}</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>  

          <hr class="mb-4">

          <div class="row">
          @foreach ($data['mahasiswa']->ProgramStudi->Matkul as $matkul)      
            <div class="col-12 col-md-4 mb-3 @if (($loop->index + 1) % 3 == 2) bg-lighter @endif">
              <div class="form-group row mb-md-0 align-items-center px-3 py-2">
                  <label for="inputEmail3" class="col-sm-8 col-form-label p-0 mb-0">{{ $matkul->mata_kuliah }}</label>
                  <div class="col-sm-4 p-0">
                    <select class="form-control" name="nilai[{{ $matkul->id }}]">
                      <option value="">-</option>
                      @foreach ($data['kualifikasi_nilai'] as $kn)
                      <option value="{{ $kn->id }}"
                        @if (isset($data['nilai'][$matkul->id]) && $data['nilai'][$matkul->id] == $kn->id)
                        selected
                        @endif
                        >{{ $kn->index }}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
            </div>
          @endforeach
          </div>
        </div>
        <div class="card-footer">
          <div class="row">
            <div class="col-md-10 ml-sm-auto text-right">
              <button type="submit" class="btn btn-primary">Simpan</button>
              <a href="{{ route('mahasiswa.index') }}" class="btn btn-default">Cancel</a>
            </div>
          </div>
        </div>
      </form>
    </div>

</div>
<!-- / Content -->
@endsection
@section('jsfoot')

<script src="{{ asset('asset/temp_backend/vendor/libs/bootstrap-select/bootstrap-select.js') }}"></script>
<script src="{{ asset('asset/temp_backend/vendor/libs/bootstrap-multiselect/bootstrap-multiselect.js') }}"></script>
<script src="{{ asset('asset/temp_backend/vendor/libs/select2/select2.js') }}"></script>
<script src="{{ asset('asset/temp_backend/js/forms_selects.js') }}"></script>
@endsection