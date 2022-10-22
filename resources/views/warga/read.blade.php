@extends('layout.master')

@section('title', 'Data Keluarga')

@section('content')
<div class="container">
    <a class="btn btn-primary rounded-pill" href="/warga/create" role="button">Tambah Data</a>
    <table class="table">
        <thead>
            <tr class="text-center">
                <th scope="col">NIK</th>
                <th scope="col">Nama</th>
                <th scope="col">Tempat <br> Tanggal Lahir</th>
                <th scope="col">Jenis Kelamin</th>
                <th scope="col">Alamat</th>
                <th scope="col">Agama</th>
                <th scope="col">Status Perkawinan</th>
                <th scope="col">Pekerjaan</th>
                <th scope="col">Kewarganegaraan</th>
                <th scope="col">Gol. Darah</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($warga as $w)
            <tr>
                <td>{{$w->nik}}</td>
                <td>{{$w->nama}}</td>
                <td>{{$w->tempat.", ".$w->tanggal_lahir}}</td>
                <td>{{$w->jenis_kelamin}}</td>
                <td>
                    {{$w->alamat.", RT.".$w->rt.", RW.".$w->rw.", ".$w->kel_desa.", ".$w->kecamatan}}
                </td>
                <td>{{$w->agama}}</td>
                <td>{{$w->status_perkawinan}}</td>
                <td>{{$w->pekerjaan}}</td>
                <td>{{$w->kewarganegaraan}}</td>
                <td>{{$w->gol_darah}}</td>
                <td>
                    <div class="row g-5">
                        <div class="col-md-6">
                            <a class="btn btn-warning rounded-pill" href="/warga/{{$w->id}}/edit">Ubah</a>
                        </div>
                        <div class="col-md-6">
                            <form action="/warga/{{$w->id}}" method="post">
                                @csrf
                                @method('delete')
                                <input class="btn btn-danger rounded-pill" type="submit" value="Hapus"></form>

                        </div>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
