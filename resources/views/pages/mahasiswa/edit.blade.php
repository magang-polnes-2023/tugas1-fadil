@extends('layouts.app')

@section('body')
    <h1 class="mb-0">Edit Data Mahasiswa</h1>
    <hr>
    <form action="{{ route('mahasiswa.update', $mahasiswa->id) }}" method="POST" enctype="multipart/form-data">
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
        @method('PUT')
        <div class="row mb-3">
            <div class="col">
                <div class="form-label">Foto</div>
                <input class="form-control" name="foto" type="file" id="foto" value="{{ $mahasiswa->foto}}">
            </div>
            <div class="col">
                <div class="form-label">Nama</div>
                <input type="text" name="nama" class="form-control" value="{{ $mahasiswa->nama}}">
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <div class="form-label">Nim</div>
                <input type="text" name="nim" class="form-control" value="{{ $mahasiswa->nim}}">
            </div>
            <div class="col">
                <div class="form-label">No Telp</div>
                <input type="text" name="no_telp" class="form-control" value="{{ $mahasiswa->no_telp}}">
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <div class="form-label">Umur</div>
                <input type="text" name="umur" class="form-control" value="{{ $mahasiswa->umur}}" inputmode="numeric" pattern="[0-9]*">
            </div>
            <div class="col">
                <div class="form-label">Tanggal Lahir</div>
                <input type="date" name="tanggal_lahir" class="form-control" value="{{ $mahasiswa->tanggal_lahir}}">
            </div>
            <script>
                // Menangkap elemen input tanggal_lahir
                var tanggalLahirInput = document.getElementById('tanggal_lahir');

                // Cek apakah nilai awal elemen input sudah terisi
                if (tanggalLahirInput.value) {
                    tanggalLahirInput.style.display = 'block'; // Tampilkan elemen input
                } else {
                    tanggalLahirInput.style.display = 'none'; // Sembunyikan elemen input
                }
            </script>
        </div>
        <div class="row mb-3">
            <div class="col">
            <div class="form-label">Jenis Kelamin</div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="jenis_kelamin" id="flexRadioDefault1" value="Laki-Laki" {{ $mahasiswa->jenis_kelamin == 'Laki-Laki' ? 'checked' : '' }}>
                    <label class="form-check-label" for="flexRadioDefault1">Laki-Laki</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="jenis_kelamin" id="flexRadioDefault2" value="Perempuan" {{ $mahasiswa->jenis_kelamin == 'Perempuan' ? 'checked' : '' }}>
                    <label class="form-check-label" for="flexRadioDefault2">Perempuan</label>
                </div>
            </div>
            <div class="col">
                <div class="form-label">Alamat</div>
                <textarea class="form-control" name="alamat" placeholder="Alamat">{{ $mahasiswa->alamat}}</textarea>
            </div>
        </div>
        <div class="row">
            <div class="d-grid">
                <button class="btn btn-warning">Update</button>
            </div>
        </div>
    </form>
@endsection