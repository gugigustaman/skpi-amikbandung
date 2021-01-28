<?php

namespace App\Http\Controllers\Admin;

use Auth;
use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Deskriptor;
use App\Models\Mahasiswa;
use App\Models\ProgramStudi;
use App\Models\Kelas;
use App\Models\KualifikasiNilai;
use App\Models\JenjangPendidikan;
use App\Models\Gelar;
use App\Models\ProfileKampus;
use App\Models\Sertifikasi;
use App\Models\Skpi;
use App\Models\User;
use App\Repositories\Repository;
use Illuminate\Support\Facades\Hash;
use PDF;


class MahasiswaController extends Controller{
    
    private $model;

    public function __construct(Mahasiswa $Mahasiswa){
        $this->model = new Repository($Mahasiswa);
    }

    public function index(Request $request)
    {
        $data['title'] = 'Mahasiswa';
        $data['mahasiswa'] = Mahasiswa::all();
        
        return view('backend.Mahasiswa.index', compact('data'));
    }

    public function create()
    {
        $data['title'] = 'Tambah Mahasiswa ';
        $data['gelar'] = Gelar::all();
        $data['jenjang_pendidikan'] = JenjangPendidikan::all();
        $data['kelas'] = Kelas::all();
        $data['program_studi'] = ProgramStudi::all();

        return view('backend.Mahasiswa.create', compact('data'));
    }

    public function store(Request $request)
    {

        $user = User::create([ 
            'name'  => $request['name'],  
            'email' => $request['email'],  
            'password' => Hash::make($request['password']),  
        ]);

        Mahasiswa::create([
            'user_id'                 => $user['id'],  
            'npm'                     => $request['npm'],  
            'ttl'                     => $request->tempat_lahir,  
            'ttl'                     => date('Y-m-d',strtotime($request['ttl'])),  
            'program_studi_id'        => $request['program_studi_id'],  
            'kelas_id'                => $request['kelas_id'],  
            'no_ijazah'               => $request['no_ijazah'],  
            'thn_lulus'               => $request['thn_lulus'],  
            'gelar_id'                => $request['gelar_id'],  
            'jenjang_pendidikan_id'   => $request['jenjang_pendidikan_id'],  
        ]); 
        return redirect()->route('mahasiswa.index')->with('success','Mahasiswa Berhasil di Simpan !');
    }

    public function edit($id)
    {
        $data['title'] = 'Edit Mahasiswa ';
        $data['mahasiswa'] =  Mahasiswa::find($id);
        $data['gelar'] = Gelar::all();
        $data['jenjang_pendidikan'] = JenjangPendidikan::all();
        $data['kelas'] = Kelas::all();
        $data['program_studi'] = ProgramStudi::all();
    
        return view('backend.Mahasiswa.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $data = Mahasiswa::find($id);

        $data_user = User::where('id',$data['user_id'])->first();
        
        $data_user->update([
            'name' => $request['name'],  
            'email' => $request['email'],  
            'password' =>$request['password'] == NULL ? $data_user['password'] : Hash::make($request['password']),  
        ]);

        $data->update([
        'npm' => $request->npm,
        'tempat_lahir' => $request->tempat_lahir,
        'ttl' => $request->ttl,
        'program_studi_id' => $request->program_studi_id,
        'kelas_id' => $request->kelas_id,
        'no_ijazah' => $request->no_ijazah,
        'thn_lulus' => $request->thn_lulus,
        'gelar_id' => $request->gelar_id,
        'jenjang_pendidikan_id' => $request->jenjang_pendidikan_id,
        
        ]);

        return  redirect()->route('mahasiswa.index')->with('success','Mahasiswa Berhasil di Update !');
    }
      public function destroy($id)
    {
        $this->model->delete($id);
        return back()->with('success','Mahasiswa Berhasil di Hapus !');
    }    

    public function edit_nilai($id) {
        $data['title'] = 'Form Nilai Mahasiswa';
        $data['mahasiswa'] = Mahasiswa::findOrFail($id);
        $data['kualifikasi_nilai'] = KualifikasiNilai::all();

        $data['nilai'] = [];

        foreach ($data['mahasiswa']->Matkul as $matkul) {
            $data['nilai'][$matkul->id] = $matkul->pivot->kualifikasi_nilai_id;
        }

        return view('backend.Mahasiswa.nilai.edit', compact('data'));
    }

    public function update_nilai(Request $request, $id) {
        $mahasiswa = Mahasiswa::findOrFail($id);

        $nilai = [];

        foreach ($request->nilai as $matkul_id => $kualifikasi_nilai_id) {
            if ($kualifikasi_nilai_id != null) {
                $nilai[$matkul_id] = [
                    'kualifikasi_nilai_id' => $kualifikasi_nilai_id
                ];
            }
        }

        $mahasiswa->Matkul()->sync($nilai);

        return back()->with('success','Berhasil Menyimpan Nilai Mahasiswa!');
    }

    public function verify_sertifikasi(Request $request)
    {
        if (!$request->mahasiswa_id) {
            return back()->with('danger', 'Anda belum memilih mahasiswa.');
        }

        $mahasiswa = Mahasiswa::findOrFail($request->mahasiswa_id);

        if (!$request->sertifikasi) {
            return back()->with('danger', 'Silakan approve atau reject sertifikasi terlebih dahulu');
        }

        foreach ($request->sertifikasi as $sid => $value) {
            $sertifikasi = Sertifikasi::findOrFail($sid);
            if ($sertifikasi->mahasiswa_id != $mahasiswa->id) {
                return back()->with('danger', 'Sertifikasi tidak ditemukan.');
            }
            $sertifikasi->status = $value;

            if ($value == 1) {
                $sertifikasi->approved_at = Carbon::now();
            } else if ($value == 2) {
                $sertifikasi->rejected_at = Carbon::now();
            }

            $sertifikasi->save();
        }

        return back()->with('success','Sertifikasi Berhasil di Update !');
    }

    public function skpi(Request $request, $id) {
        $mahasiswa = Mahasiswa::findOrFail($id);

        $kualifikasi_nilai = KualifikasiNilai::whereNotNull('skala_cp')->get();
        
        $new = false;

        if (!$mahasiswa->Skpi) {
            $new = true;
            $skpi = new Skpi();
            $skpi->mahasiswa_id = $mahasiswa->id;
            $skpi->no = Skpi::generateNewNoSkpi($mahasiswa->ProgramStudi, $mahasiswa->JenjangPendidikan);
            $skpi->file = 'skpi/'.str_replace('/', '-', $skpi->no).'.pdf';
            $skpi->user_id = Auth::user()->id;
            $skpi->save();

            $mahasiswa->Skpi = $skpi;
        }

        $now = Carbon::now();

        $data = [
            'logo_img' => storage_path('app/img/logo-amikbandung.png'),
            'first_header_img' => storage_path('app/img/header-skpi.png'),
            'mahasiswa' => $mahasiswa,
            'kampus' => ProfileKampus::first(),
            'deskriptor' => Deskriptor::all(),
            'kualifikasi_nilai' => $kualifikasi_nilai,
            'en_date' => $now->format('F j, Y'),
            'id_date' => $this->indonesian_date($now, 'j F Y'),
        ];

        $pdf = PDF::loadView('backend.Skpi.template', $data);
        $pdf->setPaper('a4', 'portrait');

        if ($new) {
            $pdf->save(storage_path('app/'.$mahasiswa->Skpi->file));
        }

        return $pdf->stream(str_replace('/', '-', $mahasiswa->Skpi->file));
    }

    function indonesian_date($timestamp = '', $date_format = 'l, j F Y | H:i', $suffix = '') {
        if (trim ($timestamp) == '')
        {
                $timestamp = time ();
        }
        elseif (!ctype_digit ($timestamp))
        {
            $timestamp = strtotime ($timestamp);
        }
        # remove S (st,nd,rd,th) there are no such things in indonesia :p
        $date_format = preg_replace ("/S/", "", $date_format);
        $pattern = array (
            '/Mon[^day]/','/Tue[^sday]/','/Wed[^nesday]/','/Thu[^rsday]/',
            '/Fri[^day]/','/Sat[^urday]/','/Sun[^day]/','/Monday/','/Tuesday/',
            '/Wednesday/','/Thursday/','/Friday/','/Saturday/','/Sunday/',
            '/Jan[^uary]/','/Feb[^ruary]/','/Mar[^ch]/','/Apr[^il]/','/May/',
            '/Jun[^e]/','/Jul[^y]/','/Aug[^ust]/','/Sep[^tember]/','/Oct[^ober]/',
            '/Nov[^ember]/','/Dec[^ember]/','/January/','/February/','/March/',
            '/April/','/June/','/July/','/August/','/September/','/October/',
            '/November/','/December/',
        );
        $replace = array ( 'Sen','Sel','Rab','Kam','Jum','Sab','Min',
            'Senin','Selasa','Rabu','Kamis','Jumat','Sabtu','Minggu',
            'Jan','Feb','Mar','Apr','Mei','Jun','Jul','Ags','Sep','Okt','Nov','Des',
            'Januari','Februari','Maret','April','Juni','Juli','Agustus','Sepember',
            'Oktober','November','Desember',
        );
        $date = date ($date_format, $timestamp);
        $date = preg_replace ($pattern, $replace, $date);
        $date = "{$date} {$suffix}";
        return $date;
    } 
}
