<?php

namespace App\Http\Controllers;

use App\Models\Warga;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class WargaController extends Controller
{
    public function read()
    {
        $warga = Warga::all();
        return view('warga.read', compact(['warga']));
    }
    public function create()
    {
        return view('warga.create');
    }
    public function store(Request $request)
    {
        // Warga::create($request->except('_token', 'submit'));
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
            'nama.max' => 'Nama harus 30 karakter',
            'tempat.required' => 'Tempat lahir harus diisi',
            'tempat.max' => 'Tempat lahir harus 30 karakter',
            'tanggal_lahir.required' => 'Tanggal lahir harus diisi',
            'jenis_kelamin.required' => 'Jenis kelamin harus diisi',
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
        // Warga::create($request->except('_token', 'submit'));
        return redirect('/warga');
    }
    public function edit($id)
    {
        $warga = Warga::find($id);
        return view('warga.edit', compact(['warga']));
    }
    public function update($id, Request $request)
    {
        $warga = Warga::find($id);
        $warga->update($request->except('_token', 'submit'));
        return redirect('/warga');
    }
    public function destroy($id)
    {
        $warga = Warga::find($id);
        $warga->delete();
        return redirect('/warga');
    }
}
