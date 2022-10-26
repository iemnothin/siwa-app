<?php

namespace App\Http\Controllers;

use App\Models\Citizen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class WargaController extends Controller
{
    public function read()
    {
        $warga = Citizen::with('gender', 'religion', 'maritalStatus', 'job', 'citizenship')->get();

        return view('warga.read', ['citizenList' => $warga]);
    }
    public function create()
    {
        $gender = DB::table('genders')->get();
        $religion = DB::table('religions')->get();
        $job = DB::table('jobs')->get();
        $maritalStatus = DB::table('marital_statuses')->get();
        $citizenship = DB::table('citizenships')->get();

        return view('warga.create', ['genderList' => $gender, 'religionList' => $religion, 'jobList' => $job, 'maritalStatusList' => $maritalStatus, 'citizenshipList' => $citizenship]);
    }
    public function store(Request $request)
    {
        // Citizen::create($request->except('_token', 'submit'));
        $validate = Validator::make($request->all(), [
            'nik' => 'required|min:16|max:16',
            'nama' => 'required|max:30',
            'tempat' => 'required|max:30',
            'tanggal_lahir' => 'required',
            'jenis_kelamin' => 'required',
            'alamat' => 'required|max:15',
            'rt' => 'required|min:3|max:3',
            'rw' => 'required|min:3|max:3',
            'kel_desa' => 'required|max:20',
            'kecamatan' => 'required|max:20',
            'agama' => 'required',
            'status_perkawinan' => 'required',
            'pekerjaan' => 'required',
            'kewarganegaraan' => 'required'
        ], [
            'nik.required' => 'NIK harus diisi',
            'nik.min' => 'NIK harus 16 digit',
            'nik.max' => 'NIK harus 16 digit',
            'nama.required' => 'Nama harus diisi',
            'nama.max' => 'Nama maksimal 50 karakter',
            'tempat.required' => 'Tempat lahir harus diisi',
            'tempat.max' => 'Tempat lahir maksimal 30 karakter',
            'tanggal_lahir.required' => 'Tanggal lahir harus diisi',
            'jenis_kelamin.required' => 'Jenis kelamin harus diisi',
            'alamat.required' => 'Alamat harus diisi',
            'alamat.max' => 'Alamat maksimal 15 karakter',
            'rt.required' => 'RT harus diisi',
            'rt.min' => 'RT harus 3 digit',
            'rt.max' => 'RT harus 3 digit',
            'rw.required' => 'RW harus diisi',
            'rw.min' => 'RW harus 3 digit',
            'rw.max' => 'RW harus 3 digit',
            'kel_desa.required' => 'Kel/Desa harus diisi',
            'kel_desa.max' => 'Kel/Desa maksimal 20 karakter',
            'kecamatan.required' => 'Kecamatan harus diisi',
            'kecamatan.max' => 'Kecamatan maksimal 20 karakter',
            'agama.required' => 'Agama harus diisi',
            'status_perkawinan.required' => 'Status Perkawinan harus diisi',
            'pekerjaan.required' => 'Pekerjaan harus diisi',
            'kewarganegaraan.required' => 'Kewarganegaraan harus diisi'
        ]);
        if ($validate->fails()) {
            return back()->withErrors($validate->errors())->withInput();
        }
        Citizen::create($request->except('_token', 'submit'));
        return redirect('/warga');
    }
    public function edit($id)
    {
        $warga = Citizen::find($id);
        return view('warga.edit', compact(['warga']));
    }
    public function update($id, Request $request)
    {
        $warga = Citizen::find($id);
        $validate = Validator::make($request->all(), [
            'nik' => 'required|min:16|max:16',
            'nama' => 'required|max:30',
            'tempat' => 'required|max:30',
            'tanggal_lahir' => 'required',
            'jenis_kelamin' => 'required|not_in:0',
            'alamat' => 'required|max:15',
            'rt' => 'required|min:3|max:3',
            'rw' => 'required|min:3|max:3',
            'kel_desa' => 'required|max:20',
            'kecamatan' => 'required|max:20',
            'agama' => 'required|not_in:0',
            'status_perkawinan' => 'required|not_in:0',
            'pekerjaan' => 'required|not_in:0',
            'kewarganegaraan' => 'required|not_in:0'
        ], [
            'nik.required' => 'NIK harus diisi',
            'nik.min' => 'NIK harus 16 digit',
            'nik.max' => 'NIK harus 16 digit',
            'nama.required' => 'Nama harus diisi',
            'nama.max' => 'Nama harus 30 karakter',
            'tempat.required' => 'Tempat lahir harus diisi',
            'tempat.max' => 'Tempat lahir harus 30 karakter',
            'tanggal_lahir.required' => 'Tanggal lahir harus diisi',
            'jenis_kelamin.required' => 'Jenis kelamin harus diisi',
            'jenis_kelamin.not_in' => 'Pilih jenis kelamin Anda',
            'alamat.required' => 'Alamat harus diisi',
            'alamat.max' => 'Alamat harus 15 karakter',
            'rt.required' => 'RT harus diisi',
            'rt.min' => 'RT harus 3 digit',
            'rt.max' => 'RT harus 3 digit',
            'rw.required' => 'RW harus diisi',
            'rw.min' => 'RW harus 3 digit',
            'rw.max' => 'RW harus 3 digit',
            'kel_desa.required' => 'Kel/Desa harus diisi',
            'kel_desa.max' => 'Kel/Desa harus 20 karakter',
            'kecamatan.required' => 'Kecamatan harus diisi',
            'kecamatan.max' => 'Kecamatan harus 20 karakter',
            'agama.required' => 'Agama harus diisi',
            'status_perkawinan.required' => 'Status Perkawinan harus diisi',
            'pekerjaan.required' => 'Pekerjaan harus diisi',
            'kewarganegaraan.required' => 'Kewarganegaraan harus diisi'
        ]);
        if ($validate->fails()) {
            return back()->withErrors($validate->errors())->withInput();
        }
        $warga->update($request->except('_token', 'submit'));
        return redirect('/warga');
    }
    public function destroy($id)
    {
        $warga = Citizen::find($id);
        $warga->delete();
        return redirect('/warga');
    }
}
