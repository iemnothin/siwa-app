<?php

namespace App\Http\Controllers;

use App\Models\Citizen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\RedirectResponse;

class WargaController extends Controller
{
    public function read()
    {
        $citizen = Citizen::with('gender', 'religion', 'maritalStatus', 'job', 'citizenship')->get();

        return view('warga.read', ['citizenList' => $citizen]);
    }
    public function create()
    {
        $gender = DB::table('genders')->get();
        $religion = DB::table('religions')->get();
        $job = DB::table('jobs')->get();
        $maritalStatus = DB::table('marital_statuses')->get();
        $citizenship = DB::table('citizenships')->get();
        $citizen = Citizen::all();
        return view('warga.create', ['citizen'=>$citizen,'genderList' => $gender, 'religionList' => $religion, 'jobList' => $job, 'maritalStatusList' => $maritalStatus, 'citizenshipList' => $citizenship]);
    }
    public function store(Request $request)
    {
        // $citizen = Citizen::create($request->except('_token', 'submit'));
        $validated = $request->validate([
            'nik' => 'required|min:16|max:16',
            'nama' => 'required|max:30',
            'tempat' => 'required|max:30',
            'tanggal_lahir' => 'required',
            // 'jenis_kelamin_id' => 'in:Laki-laki,Perempuan',
            'alamat' => 'required|max:15',
            'rt' => 'required|min:3|max:3',
            'rw' => 'required|min:3|max:3',
            'kel_desa' => 'required|max:20',
            'kecamatan' => 'required|max:20',
            // 'agama_id' => 'required|in:Islam,Kristen,Hindu,Buddha,Konghucu',
            // 'status_perkawinan_id' => 'in:Sudah Kawin,Belum Kawin',
            // 'pekerjaan_id' => 'in:Belum/Tidak Bekerja,Mengurus Rumah Tangga,Pelajar/Mahasiswa,Pegawai Negeri Sipil (PNS),Tentara Nasional Indonesia (TNI),Kepolisian RI (POLRI),Karyawan Swasta,Karyawan BUMN,Karyawan BUMD,Buruh',
            // 'kewarganegaraan_id' => 'in:WNI,WNA'
        ]);
        // if ($validate->fails()) {
        //     return back()->withErrors($validate)->withInput();
        // }
        // $simpan = Citizen::create($request->all());
        // if ($simpan) {
        //     return redirect('/warga');
        // }
        // $citizen = Citizen::create([
        // 'nik' => $request->nik,
        // 'nama' => $request->nama,
        // 'tempat' => $request->tempat,
        // 'tanggal_lahir' => $request->tanggal_lahir,
        // 'jenis_kelamin_id' => $request -> input('jenis_kelamin_id'),
        // 'alamat' => $request->alamat,
        // 'rt' => $request->rt,
        // 'rw' => $request->rw,
        // 'kel_desa' => $request->kel_desa,
        // 'kecamatan' => $request->kecamatan,
        // 'agama_id' => $request -> input('agama_id'),
        // 'status_perkawinan_id' => $request -> input('status_perkawinan_id'),
        // 'pekerjaan_id' => $request -> input('pekerjaan_id'),
        // 'kewarganegaraan_id' => $request -> input('kewarganegaraan_id'),
        // ]);
        // $citizen->save();
        Citizen::create($request->all());
        return redirect('/warga')->with('Sukses', 'Data telah ditambahkan !');
    }
    public function edit($id)
    {
        $warga = Citizen::find($id);
        return view('warga.edit', compact(['warga']));
    }
    public function update($id, Request $request)
    {
        $warga = Citizen::find($id);
        $validated = $request->validate([
            'nik' => 'required|min:16|max:16',
            'nama' => 'required|max:30',
            'tempat' => 'required|max:30',
            'tanggal_lahir' => 'required',
            // 'jenis_kelamin_id' => 'in:Laki-laki,Perempuan',
            'alamat' => 'required|max:15',
            'rt' => 'required|min:3|max:3',
            'rw' => 'required|min:3|max:3',
            'kel_desa' => 'required|max:20',
            'kecamatan' => 'required|max:20',
            // 'agama_id' => 'required|in:Islam,Kristen,Hindu,Buddha,Konghucu',
            // 'status_perkawinan_id' => 'in:Sudah Kawin,Belum Kawin',
            // 'pekerjaan_id' => 'in:Belum/Tidak Bekerja,Mengurus Rumah Tangga,Pelajar/Mahasiswa,Pegawai Negeri Sipil (PNS),Tentara Nasional Indonesia (TNI),Kepolisian RI (POLRI),Karyawan Swasta,Karyawan BUMN,Karyawan BUMD,Buruh',
            // 'kewarganegaraan_id' => 'in:WNI,WNA'
        ]);
        return redirect('/warga')->with('Sukses', 'Data telah disimpan !');
    }
    public function destroy($id)
    {
        $warga = Citizen::find($id);
        $warga->delete();
        return redirect('/warga');
    }
}
