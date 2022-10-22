@extends('layout.master')

@section('title', 'Ubah Data')
@section('content')
<!-- Form -->
<section id="form">
    <div class="container">
        <div class="position-absolute top-50 start-50 translate-middle">
            <form action="/warga/{{$warga->id}}" method="post">
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
                                <input type="number" name="nik" value="{{$warga->nik}}" class="form-control" id="inputNIK" />
                            </div>
                            <!-- Nama -->
                            <div class="col-md-6 input-group">
                                <label for="inputNama" class="col-sm-2 col-form-label">Nama</label><span class="input-group-text"><i class="bi bi-person-fill"></i></span>
                                <input type="text" name="nama" value="{{$warga->nama}}" class="form-control" id="inputNama" />
                            </div>
                            <!-- Tempat/Tanggal Lahir -->
                            <div class="input-group">
                                <label for="inputTempat" class="col-sm-2 col-form-label">Tempat/Tanggal</label><span class="input-group-text"><i class="bi bi-balloon-fill"></i></span>
                                <input type="text" name="tempat" value="{{$warga->tempat}}" class="form-control" id="inputTempat" /><span class="input-group-text"><i class="bi bi-calendar-event"></i></span>
                                <input type="date" name="tanggal_lahir" value="{{$warga->tanggal_lahir}}" class="form-control" id="inputTempat" />
                            </div>
                            <!-- Jenis Kelamin - opt-->
                            <div class="col-md-6 input-group">
                                <label for="inputJenisKelamin" class="col-sm-2 col-form-label">Jenis Kelamin</label><span class="input-group-text" name="jenis_kelamin" value="{{$warga->jenis_kelamin}}"><i class="bi bi-gender-ambiguous"></i></span>
                                <select class="form-select" aria-label="select jenis kelamin" id="inputJenisKelamin">
                                    <option selected>Pilih</option>
                                    <option value="Laki-laki" @if($warga->jenis_kelamin=="Laki-laki") selected @endif>
                                        Laki-laki
                                    </option>
                                    <option value="Perempuan" @if($warga->jenis_kelamin=="Perempuan") selected @endif>
                                        Perempuan
                                    </option>
                                </select>
                            </div>
                            <!-- Alamat -->
                            <div class="col-md-6 input-group">
                                <label for="inputAlamat" class="col-sm-2 col-form-label">Alamat</label><span class="input-group-text"><i class="bi bi-geo-alt-fill"></i></span>
                                <input type="text" name="alamat" value="{{$warga->alamat}}" class="form-control" id="inputAlamat" />
                            </div>
                            <!-- RT/RW -->
                            <div class="input-group">
                                <span class="input-group-text">RT</span>
                                <input type="number" aria-label="RT" class="form-control" name="rt" value="{{$warga->rt}}" />
                                <span class="input-group-text">RW</span>
                                <input type="number" aria-label="RW" class="form-control" name="rw" value="{{$warga->rw}}" />
                            </div>
                            <!-- kel/desa $ Kecamatan -->
                            <div class="input-group">
                                <span class="input-group-text">Kelurahan/Desa</span>
                                <input type="text" aria-label="kel_desa" class="form-control" name="kel_desa" value="{{$warga->kel_desa}}" />
                                <span class="input-group-text">Kecamatan</span>
                                <input type="text" aria-label="kecamatan" class="form-control" name="kecamatan" value="{{$warga->kecamatan}}" />
                            </div>
                            <!-- Agama - opt-->
                            <div class="col-md-6">
                                <label for="inputAgama" class="form-label" name="agama" value="{{$warga->agama}}">Agama</label>
                                <select class="form-select" aria-label="Default select example" id="inputAgama">
                                    <option selected>Pilih</option>
                                    <option value="Islam" @if($warga->agama=="Islam") selected
                                        @endif>Islam</option>
                                    <option value="Kristen" @if($warga->agama=="Kristen") selected
                                        @endif>
                                        Kristen
                                    </option>
                                    <option value="Hindu" @if($warga->agama=="Hindu") selected
                                        @endif>Hindu</option>
                                    <option value="Buddha" @if($warga->agama=="Buddha") selected
                                        @endif>
                                        Buddha
                                    </option>
                                    <option value="Konghucu" @if($warga->agama=="Konghucu") selected
                                        @endif>
                                        Konghucu
                                    </option>
                                </select>
                            </div>
                            <!-- Status Perkawinan - opt-->
                            <div class="col-md-6">
                                <label for="inputStatusPerkawinan" class="form-label" name="status_perkawinan" value="{{$warga->status_perkawinan}}">Status Perkawinan</label>
                                <select class="form-select" aria-label="select status perkawinan" id="inputStatusPerkawinan">
                                    <option selected>Pilih</option>
                                    <option value="Sudah Kawin" @if($warga->status_perkawinan=="Sudah Kawin") selected
                                        @endif>
                                        Sudah Kawin
                                    </option>
                                    <option value="Belum Kawin" @if($warga->status_perkawinan=="Belum Kawin") selected
                                        @endif>
                                        Belum Kawin
                                    </option>
                                </select>
                            </div>
                            <!-- Pekerjaan - opt-->
                            <div class="col-md-6">
                                <label for="inputPekerjaan" class="form-label" name="pekerjaan" value="{{$warga->pekerjaan}}">Pekerjaan</label>
                                <select class="form-select" aria-label="select pekerjaan" id="inputPekerjaan">
                                    <option selected>Pilih</option>
                                    <option value="Belum/Tidak Bekerja" @if($warga->pekerjaan=="Belum/Tidak Bekerja") selected
                                        @endif>
                                        Belum/Tidak Bekerja
                                    </option>
                                    <option value="Mengurus Rumah Tangga" @if($warga->pekerjaan=="Mengurus Rumah Tangga") selected
                                        @endif>
                                        Mengurus Rumah Tangga
                                    </option>
                                    <option value="Pelajar/Mahasiswa" @if($warga->pekerjaan=="Pelajar/Mahasiswa") selected


                                        @endif>
                                        Pelajar/Mahasiswa
                                    </option>
                                    <option value="Pegawai Negeri Sipil (PNS)" @if($warga->pekerjaan=="Pegawai Negeri Sipil (PNS)") selected
                                        @endif>
                                        Pegawai Negeri Sipil (PNS)
                                    </option>
                                    <option value="Tentara Nasional Indonesia (TNI)" @if($warga->pekerjaan=="Tentara Nasional Indonesia (TNI)") selected
                                        @endif>
                                        Tentara Nasional Indonesia (TNI)
                                    </option>
                                    <option value="Kepolisian RI (POLRI)" @if($warga->pekerjaan=="Kepolisian RI (POLRI)") selected
                                        @endif>
                                        Kepolisian RI (POLRI)
                                    </option>
                                    <option value="Karyawan Swasta" @if($warga->pekerjaan=="Karyawan Swasta") selected
                                        @endif>
                                        Karyawan Swasta
                                    </option>
                                    <option value="Karyawan BUMN" @if($warga->pekerjaan=="Karyawan BUMN") selected
                                        @endif>
                                        Karyawan BUMN
                                    </option>
                                    <option value="Karyawan BUMD" @if($warga->pekerjaan=="Karyawan BUMD") selected
                                        @endif>
                                        Karyawan BUMD
                                    </option>
                                    <option value="Buruh" @if($warga->pekerjaan=="Buruh") selected
                                        @endif>Buruh</option>
                                </select>
                            </div>
                            <!-- Kewarganegaraan - opt-->
                            <div class="col-md-6">
                                <label for="inputKewarganegaraan" class="form-label" name="kewarganegaraan" value="{{$warga->kewarganegaraan}}">Kewarganegaraan</label>
                                <select class="form-select" aria-label="select kewarganegaraan" id="inputKewarganegaraan">
                                    <option selected>Pilih</option>
                                    <option value="WNI" @if($warga->kewarganegaraan=="WNI") selected
                                        @endif>WNI</option>
                                    <option value="WNA" @if($warga->kewarganegaraan=="WNA") selected
                                        @endif>WNA</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container text-center">
                    <div class="row justify-content-md-center mt-3 btn-group" role="group" aria-label="button">
                        <a class="btn btn-secondary rounded-pill" href="/warga" role="button" style="width: 10rem">Kembali</a>
                        <input class="btn btn-primary rounded-pill ms-2" type="submit" name="submit" value="Perbarui" style="width: 10rem" />
                        <input class="btn btn-danger rounded-pill ms-2" type="reset" name="reset" value="Reset" style="width: 10rem" />
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
<!-- End of Form -->
@endsection
