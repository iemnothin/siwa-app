@extends('layout.master')

@section('title', 'Ubah Data')
@section('content')
<!-- Form -->
<section id="form">
    <div class="container">
        <div class="position-absolute top-50 start-50 translate-middle">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="/warga/{{$citizen->id}}" method="post">
                @method('put')
                @csrf
                <div class="card pb-3" style="width: 50rem">
                    <div class="card-title">
                        <h2 class="text-center mt-3">
                            Edit Data Warga
                        </h2>
                    </div>
                    <div class="card-body">
                        <div class="row g-3">
                            <!-- NIK -->
                            <div class="col-md-6 input-group">
                                <label for="inputNIK" class="col-sm-2 col-form-label">NIK</label><span class="input-group-text"><i class="bi bi-person-lines-fill"></i></span>
                                <input type="number" name="nik" value="{{ old('nik', $citizen->nik) }}" class="form-control @error('nik') is-invalid @enderror" id="inputNIK" />
                            </div>
                            <!-- Nama -->
                            <div class="col-md-6 input-group">
                                <label for="inputNama" class="col-sm-2 col-form-label">Nama</label><span class="input-group-text"><i class="bi bi-person-fill"></i></span>
                                <input type="text" name="nama" value="{{ old('nama', $citizen->nama) }}" class="form-control @error('nama') is-invalid @enderror" id="inputNama" />
                            </div>
                            <!-- Tempat/Tanggal Lahir -->
                            <div class="input-group">
                                <label for="inputTempat" class="col-sm-2 col-form-label">Tempat/Tanggal</label><span class="input-group-text"><i class="bi bi-balloon-fill"></i></span>
                                <input type="text" name="tempat" value="{{ old('tempat',$citizen->tempat) }}" class="form-control @error('tempat') is-invalid @enderror" id="inputTempat" /><span class="input-group-text"><i class="bi bi-calendar-event"></i></span>
                                <input type="date" name="tanggal_lahir" value="{{ old('tanggal_lahir',$citizen->tanggal_lahir)}}" class="form-control @error('tanggal_lahir') is-invalid @enderror" id="inputTempat" />
                            </div>
                            <!-- Jenis Kelamin - opt-->
                            <div class="col-md-6 input-group">
                                <label for="inputJenisKelamin" class="col-sm-2 col-form-label">Jenis Kelamin</label><span class="input-group-text" name="jenis_kelamin"><i class="bi bi-gender-ambiguous"></i></span>
                                <select class="form-select" aria-label="select jenis kelamin" id="inputJenisKelamin">
                                    <option selected>Pilih</option>
                                    @foreach($genderList as $value)
                                        @if (old('jenis_kelamin_id', $citizen->jenis_kelamin_id) == $value->id)
                                            <option value="{{ $value->id }}" selected>{{ $value->nama }}</option>
                                        @else
                                            <option value="{{ $value->id }}">{{ $value->nama }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            <!-- Alamat -->
                            <div class="col-md-6 input-group">
                                <label for="inputAlamat" class="col-sm-2 col-form-label">Alamat</label><span class="input-group-text"><i class="bi bi-geo-alt-fill"></i></span>
                                <input type="text" name="alamat" value="{{ old('alamat',$citizen->alamat) }}" class="form-control @error('alamat') is-invalid @enderror" id="inputAlamat" />
                            </div>
                            <!-- RT/RW -->
                            <div class="input-group">
                                <span class="input-group-text">RT</span>
                                <input type="number" aria-label="RT" value="{{ old('rt',$citizen->rt) }}" class="form-control @error('rt') is-invalid @enderror" name="rt"  />
                                <span class="input-group-text">RW</span>
                                <input type="number" aria-label="RW" value="{{ old('rw',$citizen->rw) }}" class="form-control @error('rw') is-invalid @enderror" name="rw"  />
                            </div>
                            <!-- kel/desa $ Kecamatan -->
                            <div class="input-group">
                                <span class="input-group-text">Kelurahan/Desa</span>
                                <input type="text" aria-label="kel_desa" value="{{ old('kel_desa',$citizen->kel_desa) }}" class="form-control @error('kel_desa') is-invalid @enderror" name="kel_desa"  />
                                <span class="input-group-text">Kecamatan</span>
                                <input type="text" aria-label="kecamatan" value="{{ old('kecamatan',$citizen->kecamatan)}}" class="form-control @error('kecamatan') is-invalid @enderror" name="kecamatan"  />
                            </div>
                            <!-- Agama - opt-->
                            <div class="col-md-6">
                                <label for="inputAgama" class="form-label" name="agama">Agama</label>
                                <select class="form-select" aria-label="Select Agama" id="inputAgama">
                                    <option selected>- Pilih -</option>
                                    @foreach($religionList as $value)
                                        @if (old('agama_id', $citizen->agama_id) == $value->id)
                                            <option value="{{ $value->id }}" selected>{{ $value->nama }}</option>
                                        @else
                                            <option value="{{ $value->id }}">{{ $value->nama }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            <!-- Status Perkawinan - opt-->
                            <div class="col-md-6">
                                <label for="inputStatusPerkawinan" class="form-label" name="status_perkawinan">Status Perkawinan</label>
                                <select class="form-select" aria-label="select status perkawinan" id="inputStatusPerkawinan">
                                    <option selected>- Pilih -</option>
                                    @foreach($maritalStatusList as $value)
                                        @if (old('status_perkawinan_id', $citizen->status_perkawinan_id) == $value->id)
                                            <option value="{{ $value->id }}" selected>{{ $value->nama }}</option>
                                        @else
                                            <option value="{{ $value->id }}">{{ $value->nama }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            <!-- Pekerjaan - opt-->
                            <div class="col-md-6">
                                <label for="inputPekerjaan" class="form-label" name="pekerjaan">Pekerjaan</label>
                                <select class="form-select" aria-label="select pekerjaan" id="inputPekerjaan">
                                    <option selected>- Pilih -</option>
                                    @foreach($jobList as $value)
                                        @if (old('pekerjaan_id', $citizen->pekerjaan_id) == $value->id)
                                            <option value="{{ $value->id }}" selected>{{ $value->nama }}</option>
                                        @else
                                            <option value="{{ $value->id }}">{{ $value->nama }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            <!-- Kewarganegaraan - opt-->
                            <div class="col-md-6">
                                <label for="inputKewarganegaraan" class="form-label" name="kewarganegaraan">Kewarganegaraan</label>
                                <select class="form-select" aria-label="select kewarganegaraan" id="inputKewarganegaraan">
                                    <option selected>- Pilih -</option>
                                    @foreach($citizenshipList as $value)
                                        @if (old('kewarganegaraan_id', $citizen->kewarganegaraan_id) == $value->id)
                                            <option value="{{ $value->id }}" selected>{{ $value->nama }}</option>
                                        @else
                                            <option value="{{ $value->id }}">{{ $value->nama }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container text-center">
                    <div class="row justify-content-md-center mt-3 btn-group" role="group" aria-label="button">
                        <a class="btn btn-secondary rounded-pill" href="/warga" role="button" style="width: 10rem">Kembali</a>
                        <input class="btn btn-primary rounded-pill ms-2" type="submit" value="Simpan" style="width: 10rem" />
                        <input class="btn btn-danger rounded-pill ms-2" type="reset" name="reset" value="Reset" style="width: 10rem" />
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
<!-- End of Form -->
@endsection
