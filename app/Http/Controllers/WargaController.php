<?php

namespace App\Http\Controllers;

use App\Models\Citizen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        $validated = $request->validate([
            'nik' => 'required|unique:citizens,nik|min:16|max:16',
            'nama' => 'required|unique:citizens,nama|max:30|alpha',
            'tempat' => 'required|max:30|alpha',
            'tanggal_lahir' => 'required',
            'jenis_kelamin_id' => 'in:1,2',
            'alamat' => 'required|max:15|alpha',
            'rt' => 'required|min:3|max:3',
            'rw' => 'required|min:3|max:3',
            'kel_desa' => 'required|max:20|alpha',
            'kecamatan' => 'required|max:20|alpha',
            'agama_id' => 'required|in:1,2,3,4,5',
            'status_perkawinan_id' => 'in:1,2',
            'pekerjaan_id' => 'in:1,2,3,4,5,6,7,8,9,10',
            'kewarganegaraan_id' => 'in:1,2'
        ]);
        Citizen::create($validated);
        return redirect('/warga')->with('Sukses', 'Data telah ditambahkan !');
    }
    public function edit($id)
    {
        $citizen = Citizen::find($id);
        $gender = DB::table('genders')->get();
        $religion = DB::table('religions')->get();
        $job = DB::table('jobs')->get();
        $maritalStatus = DB::table('marital_statuses')->get();
        $citizenship = DB::table('citizenships')->get();
        return view('warga.edit', ['citizen'=>$citizen,'genderList' => $gender, 'religionList' => $religion, 'jobList' => $job, 'maritalStatusList' => $maritalStatus, 'citizenshipList' => $citizenship]);
    }
    public function update(Request $request, Citizen $citizen)
    {
        $rules = [
            'tempat' => 'required|max:30|alpha',
            'tanggal_lahir' => 'required',
            'jenis_kelamin_id' => 'in:1,2',
            'alamat' => 'required|max:15',
            'rt' => 'required|min:3|max:3',
            'rw' => 'required|min:3|max:3',
            'kel_desa' => 'required|max:20',
            'kecamatan' => 'required|max:20|alpha',
            'agama_id' => 'in:1,2,3,4,5',
            'status_perkawinan_id' => 'in:1,2',
            'pekerjaan_id' => 'in:1,2,3,4,5,6,7,8,9,10',
            'kewarganegaraan_id' => 'in:1,2'
        ];

        if ($request->nik != $citizen->nik) {
            $rules['nik'] = 'required|unique:citizens,nik|min:16|max:16';
        }
        if ($request->nama != $citizen->nama) {
            $rules['nama'] = 'required|unique:citizens,nama|max:30|alpha';
        }

        $validatedData = $request -> validate($rules);
        Citizen::where('id', $citizen->id)
            ->update($validatedData);

        return redirect('/warga')->with('Sukses', 'Data berhasil diperbarui !');
    }
    public function destroy($id)
    {
        $warga = Citizen::find($id);
        $warga->delete();
        return redirect('/warga');
    }
}
