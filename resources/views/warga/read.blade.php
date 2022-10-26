@extends('layout.master')

@section('title', 'Data Keluarga')

@section('content')
<div class="container">
    <div class="row mt-5">
        <div class="col">
            <h1 class="bold">Data Kartu Tanda Penduduk</h1><br>
        </div>
    </div>
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
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($citizenList as $data)
            <tr>
                <td>{{$data->nik}}</td>
                <td>{{$data->nama}}</td>
                <td>{{$data->tempat.", ".$data->tanggal_lahir}}</td>
                <td>{{$data->gender['nama']}}</td>
                <td>
                    {{$data->alamat.", RT.".$data->rt.", RW.".$data->rw.", ".$data->kel_desa.", ".$data->kecamatan}}
                </td>
                <td>{{$data->religion['nama']}}</td>
                <td>{{$data->maritalStatus['nama']}}</td>
                <td>{{$data->job['nama']}}</td>
                <td>{{$data->citizenship['nama']}}</td>
                <td>
                    <div class="row g-4">
                        <div class="col-md-6">
                            <a class="btn btn-warning" href="/warga/{{$data->id}}/edit"><i class="bi bi-pencil-square"></i></a>

                        </div>
                        <div class="col-md-6">
                            <form action="/warga/{{$data->id}}" method="post">
                                @csrf
                                @method('delete')
                                <button class="btn btn-danger" type="submit"><i class="bi bi-trash3-fill"></i></button></form>

                        </div>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
