@extends('layouts.backend')

@section('title', $data['title'])

@section('css')
<link rel="stylesheet" href="{{ asset('asset/temp_backend/vendor/libs/bootstrap-select/bootstrap-select.css') }}">
  <link rel="stylesheet" href="{{ asset('asset/temp_backend/vendor/libs/bootstrap-multiselect/bootstrap-multiselect.css') }}">
<link rel="stylesheet" href="{{ asset('asset/temp_backend/vendor/libs/select2/select2.css') }}">
<link rel="stylesheet" href="{{ asset('asset/temp_backend/vendor/libs/bootstrap-tagsinput/bootstrap-tagsinput.css') }}">
@endsection

@section('content')
<!-- Content -->
<div class="container-fluid  container-p-y">

    <h4 class="font-weight-bold py-3 mb-4">
      <span class="text-muted font-weight-light">Mahasiswa /</span> {{ $data['title'] }} 
    </h4>

    <div class="card">
      <div class="card-header">
        <div class="title-heading">
              <h6 class="m-0">Tambah Mahasiswa </h6>
        </div>
      </div>
      <form action="{{ route('mahasiswa.update',['id' => $data['mahasiswa']['id']]) }}" method="POST">
          @csrf
          @method('PUT')
        <div class="card-body">

          <div class="form-group">
            <div class="row">
              <div class="col-md-2">
                <label for="">NPM Mahasiswa</label>
              </div>
              <div class="col-md-10">
                <input type="text" required class="form-control" name="npm" value="{{ $data['mahasiswa']['npm'] }}" >
              
              </div>
            </div>
          </div>


          <div class="form-group">
            <div class="row">
              <div class="col-md-2">
                <label for="">Nama Mahasiswa</label>
              </div>
              <div class="col-md-10">
                <input type="text" required class="form-control" name="name" value="{{ $data['mahasiswa']['user']['name'] }}">
              
              </div>
            </div>
          </div>

          <div class="form-group">
            <div class="row">
              <div class="col-md-2">
                <label for="">Email Mahasiswa</label>
              </div>
              <div class="col-md-10">
                <input type="email" required class="form-control" name="email" value="{{ $data['mahasiswa']['user']['email'] }}" >
              
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="row">
              <div class="col-md-2">
                <label for="">Password Mahasiswa</label>
              </div>
              <div class="col-md-10">
                <input type="password" class="form-control" name="password" >
              
              </div>
            </div>
          </div>


          <div class="form-group">
            <div class="row">
              <div class="col-md-2">
                <label for="">Tanggal Lahir</label>
              </div>
              <div class="col-md-10">
                <input type="date" required class="form-control" name="ttl" value="{{ $data['mahasiswa']['ttl'] }}">
              
              </div>
            </div>
          </div>

          <div class="form-group">
            <div class="row">
              <div class="col-md-2">
                <label>Program Studi</label>
              </div>
              
                <div class="col-md-10">
                
                <select class="form-control" name="program_studi_id" required>
                    @foreach($data['program_studi'] as $program)
                        <option value="{{ $program['id'] }}" {{ $data['mahasiswa']->program_studi_id  == $program->id  ? 'selected' : ''}}>{{ $program['name']}}</option>
                    @endforeach
                  
                </select>
               

                    
                </div>

            </div>
          </div>


          <div class="form-group">
            <div class="row">
              <div class="col-md-2">
                <label>Kelas</label>
              </div>
              
                <div class="col-md-10">
                
                <select class="form-control" name="kelas_id" required>
                    @foreach($data['kelas'] as $kelas)
                        <option value="{{ $kelas['id'] }}" {{ $data['mahasiswa']->kelas_id  == $kelas->id  ? 'selected' : ''}}>{{ $kelas['name']}}</option>
                    @endforeach
                  
                </select>
               

                    
                </div>

            </div>
          </div>

          <div class="form-group">
            <div class="row">
              <div class="col-md-2">
                <label for="">No Ijazah</label>
              </div>
              <div class="col-md-10">
                <input type="text" required class="form-control" name="no_ijazah" value="{{ $data['mahasiswa']['no_ijazah'] }}">
              
              </div>
            </div>
          </div>

          

          <div class="form-group">
            <div class="row">
              <div class="col-md-2">
                <label for="">Tahun Lulus</label>
              </div>
              <div class="col-md-10">
                <input type="text" required class="form-control" name="thn_lulus" value="{{ $data['mahasiswa']['thn_lulus'] }}">
              
              </div>
            </div>
          </div>

          <div class="form-group">
            <div class="row">
              <div class="col-md-2">
                <label>Gelar</label>
              </div>
              
                <div class="col-md-10">
                
                <select class="form-control" name="gelar_id" required>
                    @foreach($data['gelar'] as $gelar)
                        <option value="{{ $gelar['id'] }}" {{ $data['mahasiswa']->gelar_id  == $gelar->id  ? 'selected' : ''}}>{{ $gelar['name']}}</option>
                    @endforeach
                  
                </select>
               

                    
                </div>

            </div>
          </div>


          <div class="form-group">
            <div class="row">
              <div class="col-md-2">
                <label>Jenjang Pendidikan</label>
              </div>
              
                <div class="col-md-10">
                
                <select class="form-control" name="jenjang_pendidikan_id" required>
                    @foreach($data['jenjang_pendidikan'] as $jenjang_pendidikan)
                        <option value="{{ $jenjang_pendidikan['id'] }}" {{ $data['mahasiswa']->jenjang_pendidikan_id  == $jenjang_pendidikan->id  ? 'selected' : ''}}>{{ $jenjang_pendidikan['name']}}</option>
                    @endforeach
                  
                </select>
               

                    
                </div>

            </div>
          </div>

        

        </div>
        <div class="card-footer">
          <div class="row">
            <div class="col-md-10 ml-sm-auto">
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