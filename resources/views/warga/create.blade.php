@extends('layout.master')

@section('title', 'Tambah Data')
@section('content')
<!-- Form -->
<section id="form">
    <div class="container">
        <div class="position-absolute top-50 start-50 translate-middle">
            <form action="/warga/store" method="post">
                @csrf
                <div class="card pb-3" style="width: 50rem">
                    <div class="card-title">
                        <h2 class="text-center mt-3">
                            Tambah Data Warga
                        </h2>
                    </div>
                    <div class="card-body">
                        <div class="row g-3">
                            <!-- NIK -->
                            <div class="col-md-6 input-group">
                                <label for="inputNIK" class="col-sm-2 col-form-label">NIK</label><span class="input-group-text"><i class="bi bi-person-lines-fill"></i></span>
                                <input type="number" name="nik" class="form-control" id="inputNIK" />
                            </div>
                            <!-- Nama -->
                            <div class="col-md-6 input-group">
                                <label for="inputNama" class="col-sm-2 col-form-label">Nama</label><span class="input-group-text"><i class="bi bi-person-fill"></i></span>
                                <input type="text" name="nama" class="form-control" id="inputNama" />
                            </div>
                            <!-- Tempat/Tanggal Lahir -->
                            <div class="input-group">
                                <label for="inputTempat" class="col-sm-2 col-form-label">Tempat/Tanggal</label><span class="input-group-text"><i class="bi bi-balloon-fill"></i></span>
                                <input type="text" name="tempat" class="form-control" id="inputTempat" /><span class="input-group-text"><i class="bi bi-calendar-event"></i></span>
                                <input type="date" name="tanggal_lahir" class="form-control" id="inputTempat" />
                            </div>
                            <!-- Jenis Kelamin - opt-->
                            <div class="col-md-6 input-group">
                                <label for="inputJenisKelamin" class="col-sm-2 col-form-label">Jenis Kelamin</label><span class="input-group-text" name="jenis_kelamin"><i class="bi bi-gender-ambiguous"></i></span>
                                <select class="form-select" aria-label="Default select example" id="inputJenisKelamin">
                                    <option selected>Pilih</option>
                                    <option value="Laki-laki">
                                        Laki-laki
                                    </option>
                                    <option value="Perempuan">
                                        Perempuan
                                    </option>
                                </select>
                            </div>
                            <!-- Alamat -->
                            <div class="col-md-6 input-group">
                                <label for="inputAlamat" class="col-sm-2 col-form-label">Alamat</label><span class="input-group-text"><i class="bi bi-geo-alt-fill"></i></span>
                                <input type="text" name="alamat" class="form-control" id="inputAlamat" />
                            </div>
                            <!-- RT/RW -->
                            <div class="input-group">
                                <span class="input-group-text">RT</span>
                                <input type="number" aria-label="RT" class="form-control" name="rt" />
                                <span class="input-group-text">RW</span>
                                <input type="number" aria-label="RW" class="form-control" name="rw" />
                            </div>
                            <!-- kel/desa $ Kecamatan -->
                            <div class="input-group">
                                <span class="input-group-text">Kelurahan/Desa</span>
                                <input type="text" aria-label="kel_desa" class="form-control" name="kel_desa" />
                                <span class="input-group-text">Kecamatan</span>
                                <input type="text" aria-label="kecamatan" class="form-control" name="kecamatan" />
                            </div>
                            <!-- Agama - opt-->
                            <div class="col-md-6">
                                <label for="inputAgama" class="form-label" name="agama">Agama</label>
                                <select class="form-select" aria-label="Default select example" id="inputAgama">
                                    <option selected>Pilih</option>
                                    <option value="Islam">Islam</option>
                                    <option value="Kristen">
                                        Kristen
                                    </option>
                                    <option value="Hindu">Hindu</option>
                                    <option value="Buddha">
                                        Buddha
                                    </option>
                                    <option value="Konghucu">
                                        Konghucu
                                    </option>
                                </select>
                            </div>
                            <!-- Status Perkawinan - opt-->
                            <div class="col-md-6">
                                <label for="inputStatusPerkawinan" class="form-label" name="status_perkawinan">Status Perkawinan</label>
                                <select class="form-select" aria-label="Default select example" id="inputStatusPerkawinan">
                                    <option selected>Pilih</option>
                                    <option value="Sudah Kawin">
                                        Sudah Kawin
                                    </option>
                                    <option value="Belum Kawin">
                                        Belum Kawin
                                    </option>
                                </select>
                            </div>
                            <!-- Pekerjaan - opt-->
                            <div class="col-md-6">
                                <label for="inputPekerjaan" class="form-label" name="pekerjaan">Pekerjaan</label>
                                <select class="form-select" aria-label="Default select example" id="inputPekerjaan">
                                    <option selected>Pilih</option>
                                    <option value="Belum/Tidak Bekerja">
                                        Belum/Tidak Bekerja
                                    </option>
                                    <option value="Mengurus Rumah Tangga">
                                        Mengurus Rumah Tangga
                                    </option>
                                    <option value="Pelajar/Mahasiswa">
                                        Pelajar/Mahasiswa
                                    </option>
                                    <option value="Pegawai Negeri Sipil (PNS)">
                                        Pegawai Negeri Sipil (PNS)
                                    </option>
                                    <option value="Tentara Nasional Indonesia (TNI)">
                                        Tentara Nasional Indonesia (TNI)
                                    </option>
                                    <option value="Kepolisian RI (POLRI)">
                                        Kepolisian RI (POLRI)
                                    </option>
                                    <option value="Karyawan Swasta">
                                        Karyawan Swasta
                                    </option>
                                    <option value="Karyawan BUMN">
                                        Karyawan BUMN
                                    </option>
                                    <option value="Karyawan BUMD">
                                        Karyawan BUMD
                                    </option>
                                    <option value="Buruh">Buruh</option>
                                </select>
                            </div>
                            <!-- Kewarganegaraan - opt-->
                            <div class="col-md-6">
                                <label for="inputKewarganegaraan" class="form-label" name="kewarganegaraan">Kewarganegaraan</label>
                                <select class="form-select" aria-label="Default select example" id="inputKewarganegaraan">
                                    <option selected>Pilih</option>
                                    <option value="WNI">WNI</option>
                                    <option value="WNA">WNA</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container text-center">
                    <div class="row justify-content-md-center mt-3 btn-group" role="group" aria-label="button">
                        <a class="btn btn-secondary rounded-pill" href="/warga" role="button" style="width: 10rem">Kembali</a>

                        <input class="btn btn-primary rounded-pill ms-2" type="submit" name="submit" value="Tambah" style="width: 10rem" />

                        <input class="btn btn-danger rounded-pill ms-2" type="reset" name="reset" value="Reset" style="width: 10rem" />
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
<!-- End of Form -->
@endsection
