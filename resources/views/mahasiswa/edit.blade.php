@extends('layout.template')

@section('content')

<!-- START FORM -->
<div class="my-3 p-3 bg-body rounded shadow-sm">
    <form action='{{ url('mahasiswa/'.$data->nim) }}' method='post'>
        @csrf
        @method('PUT')
        <a href="{{ url('mahasiswa') }}" class="btn btn-secondary">Kembali</a>
        <div class="mb-3 row">
            <label for="nim" class="col-sm-2 col-form-label">NIM</label>
            <div class="col-sm-10">
                <input type="number" class="form-control" name='nim' id="nim" value="{{ $data->nim }}" disabled>
            </div>
        </div>
        <div class="mb-3 row">
            <label for="nama" class="col-sm-2 col-form-label">Nama</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name='nama' id="nama" value="{{ $data->nama }}">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="jurusan" class="col-sm-2 col-form-label">Jurusan</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name='jurusan' id="jurusan" value="{{ $data->jurusan }}">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="jurusan" class="col-sm-2 col-form-label"></label>
            <div class="col-sm-10"><button type="submit" class="btn btn-primary" name="submit">SIMPAN</button></div>
        </div>
    </form>
</div>
<!-- AKHIR FORM -->

@endsection

