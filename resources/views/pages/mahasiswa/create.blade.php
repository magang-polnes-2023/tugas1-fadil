@extends('layouts.app')

@section('body')
    <h1 class="mb-0">Tambah Data Mahasiswa</h1>
    <hr>
    <form action="{{ route('mahasiswa.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @if ($errors->any())
            <div class="alert alert-danger mt-3" role="alert" id="danger-alert">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            <script>
                setTimeout(function() {
                    var successAlert = document.getElementById('danger-alert');
                    successAlert.style.display = 'none';
                }, 5000);
            </script>
        @endif
        <div class="row mb-3">
            <div class="col">
                <div class="form-label">Foto</div>
                <input class="form-control" name="foto" type="file" id="foto">
            </div>
            <div class="col">
                <div class="form-label">Nama</div>
                <input type="text" name="nama" class="form-control">
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <div class="form-label">Nim</div>
                <input type="text" name="nim" class="form-control">
            </div>
            <div class="col">
                <div class="form-label">No Telp</div>
                <input type="text" name="no_telp" class="form-control">
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <div class="form-label">Umur</div>
                <input type="text" name="umur" class="form-control">
            </div>
            <div class="col">
                <div class="form-label">Tanggal Lahir</div>
                <input type="date" name="tanggal_lahir" class="form-control">
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <div class="form-label">Jenis Kelamin</div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="jenis_kelamin" id="flexRadioDefault1" value="Laki-Laki">
                    <label class="form-check-label" for="flexRadioDefault1">Laki-Laki</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="jenis_kelamin" id="flexRadioDefault2" value="Perempuan">
                    <label class="form-check-label" for="flexRadioDefault2">Perempuan</label>
                </div>
            </div>
            <div class="col">
                <div class="form-label">Alamat</div>
                    <textarea class="form-control" name="alamat" placeholder="Alamat" ></textarea>
            </div>
        </div>
        <div class="row">
            <div class="d-grid">
                <button class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>
@endsection