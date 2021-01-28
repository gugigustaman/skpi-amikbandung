@php
    $segment1 = Request::segment(1);
    $segment2 = Request::segment(2);
    $segment3 = Request::segment(3);
    $segment4 = Request::segment(4);
@endphp

<ul class="sidenav-inner py-1">

<!-- Dashboards -->
<!-- <li class="sidenav-item {{ ($segment1 == 'dashboard') }}">
  <a href="{{ route('dashboard') }}" class="sidenav-link"><i class="sidenav-icon ion ion-md-speedometer"></i>
    <div>Dashboard</div>
  </a>
</li> -->


<!-- <li class="sidenav-divider mb-1"></li>
<li class="sidenav-header small font-weight-semibold">MENU</li> -->
@if (!Auth::user()->Mahasiswa)
<li class="sidenav-item {{ ($segment1 == 'profile' || $segment1 == 'program' || $segment1 == 'kelas' || $segment1 == 'gelar' || $segment1 == 'jenjang' || $segment1 == 'deskriptor' || $segment1 == 'kualifikasi-nilai') ? 'open active' : '' }}">
    <a href="javascript:void(0)" class="sidenav-link sidenav-toggle"><i class="sidenav-icon ion ion-md-apps"></i>
        <div>Data Master</div>
    </a>

    <ul class="sidenav-menu">
        <li class="sidenav-item {{ $segment1 == 'profile' ? 'active' : '' }}">
            <a href="{{ route('profile.kampus.index') }}" class="sidenav-link">
                <div>Profile Perguruan Tinggi</div>
            </a>
        </li>

        <li class="sidenav-item {{ $segment1 == 'program' ? 'active' : '' }}">
            <a href="{{ route('studi.index') }}" class="sidenav-link">
                <div>Program Studi</div>
            </a>
        </li>

        <li class="sidenav-item {{ $segment1 == 'kelas' ? 'active' : '' }}">
            <a href="{{ route('kelas.index') }}" class="sidenav-link">
                <div>Kelas</div>
            </a>
        </li>

        <li class="sidenav-item {{ $segment1 == 'gelar' ? 'active' : '' }}">
            <a href="{{ route('gelar.index') }}" class="sidenav-link">
                <div>Gelar</div>
            </a>
        </li>


        <li class="sidenav-item {{ $segment1 == 'jenjang' ? 'active' : '' }}">
            <a href="{{ route('jenjang.index') }}" class="sidenav-link">
                <div>Jenjang Pendidikan</div>
            </a>
        </li>

        <li class="sidenav-item {{ $segment1 == 'matkul' ? 'active' : '' }}">
            <a href="{{ route('matkul.index') }}" class="sidenav-link">
                <div>Mata Kuliah</div>
            </a>
        </li>

        <li class="sidenav-item {{ $segment1 == 'deskriptor' ? 'active' : '' }}">
            <a href="{{ route('deskriptor.index') }}" class="sidenav-link">
                <div>Deskriptor Kualifikasi</div>
            </a>
        </li>
        <li class="sidenav-item {{ $segment1 == 'kualifikasi-nilai' ? 'active' : '' }}">
            <a href="{{ route('kualifikasi-nilai.index') }}" class="sidenav-link">
                <div>Kualifikasi Nilai</div>
            </a>
        </li>

    </ul>
</li>

<li class="sidenav-item {{ ($segment1 == 'mahasiswa') ? 'active' : '' }} ">
  <a href="{{ route('mahasiswa.index') }}" class="sidenav-link"><i class="sidenav-icon ion ion-ios-people"></i>
    <div>Data Mahasiswa</div>
  </a>
</li>

<li class="sidenav-item {{ ($segment1 == 'sertifikasi') ? 'active' : '' }} ">
  <a href="{{ route('sertifikasi.index') }}" class="sidenav-link"><i class="sidenav-icon ion ion-md-bookmarks"></i>
    <div>Sertifikasi</div>
  </a>
</li>

<li class="sidenav-item {{ ($segment1 == 'skpi') ? 'active' : '' }} ">
  <a href="{{ route('skpi.index') }}" class="sidenav-link"><i class="sidenav-icon ion ion-md-book"></i>
    <div>Daftar SKPI</div>
  </a>
</li>

@else

<li class="sidenav-item {{ ($segment1 == 'sertifikasi') ? 'active' : '' }} ">
  <a href="{{ route('sertifikasi.index') }}" class="sidenav-link"><i class="sidenav-icon ion ion-md-bookmarks"></i>
    <div>Sertifikasi</div>
  </a>
</li>

@endif