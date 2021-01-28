@extends('layouts.backend')

@section('title', $data['title'])



@section('content')

<div class="container-fluid container-p-y">

    <h4 class="font-weight-bold py-3 mb-4">
        <span class="text-muted font-weight-light">Profile Perguruan Tinggi </span>
    </h4>

    <div class="card">
        <div class="card-body">
            <form action="{{ route('profile.kampus.update') }}" method="POST">
                @csrf
                <input type="hidden" name="id" value="1">

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label class="form-label">Nama Perguruan Tinggi</label>
                        <input type="text" name="nama" class="form-control" required value="{{ $data['profile']->nama }}">
                    </div>
                    <div class="form-group col-md-6">
                        <label class="form-label">Bahasa Pengantar Kuliah</label>
                        <input type="text" name="bahasa" class="form-control" value="{{ $data['profile']->bahasa }}">
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label class="form-label">SK Pendirian Perguruan Tinggi</label>
                        <input type="text" name="sk_pendirian" class="form-control" required value="{{ $data['profile']->sk_pendirian }}">
                    </div>
                    <div class="form-group col-md-6">
                        <label class="form-label">Sistem Penilaian</label>
                        <input type="text" name="sistem_penilaian" class="form-control" value="{{ $data['profile']->sistem_penilaian }}">
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label class="form-label">Persyaratan Penerimaan</label>
                        <input type="text" name="persyaratan_penerimaan" class="form-control" required value="{{ $data['profile']->persyaratan_penerimaan }}">
                    </div>
                    <div class="form-group col-md-6">
                        <label class="form-label">Lama Studi Reguler</label>
                        <input type="text" name="lama_studi" class="form-control" value="{{ $data['profile']->lama_studi }}">
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label class="form-label">Alamat</label>
                        <textarea name="alamat" class="form-control" required>{{  $data['profile']->alamat }}</textarea>
                    </div>
                    <div class="form-group col-md-6">
                        <label class="form-label">Jenis dan Jenjang Pendidikan Lanjutan</label>
                        <input type="text" name="jenis_pendidikan" class="form-control" value="{{ $data['profile']->jenjang_kualifikasi }}">
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label class="form-label">Jenjang Kualifikasi Sesuai KKN</label>
                        <input type="text" name="jenjang_kualifikasi" class="form-control" required value="{{ $data['profile']->jenjang_kualifikasi }}">
                    </div>
                    <div class="form-group col-md-4">
                        <label class="form-label">Ketua Yayasan </label>
                        <input type="text" name="ketua_yayasan" class="form-control" value="{{ $data['profile']->ketua_yayasan }}">
                    </div>
                    <div class="form-group col-md-4">
                        <label class="form-label">NIP Ketua Yayasan</label>
                        <input type="text" name="nip_ketua_yayasan" class="form-control" value="{{ $data['profile']->nip_ketua_yayasan }}">
                    </div>

                </div>

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label class="form-label">Telepon</label>
                        <input type="number" name="telepon" class="form-control" required value="{{ $data['profile']->telepon }}">
                    </div>
                    <div class="form-group col-md-6">
                        <label class="form-label">Email</label>
                        <input type="email" name="email" class="form-control" value="{{ $data['profile']->email }}">
                    </div>
                </div>



                <button type="submit" class="btn btn-primary">Submit</button>
            </form>

        </div>



    </div> <!-- end col -->





</div> <!-- end row -->


@endsection

