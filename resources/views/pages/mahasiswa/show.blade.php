@extends('layouts.app')

@section('body')
    <div class="d-flex align-items-center justify-content-center">
        <h1 class="mb-0">Data Mahasiswa</h1>
    </div>
    <div class="container mt-5 mb-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body text-center">
                        <img src="{{ asset('storage/posts/'.$mahasiswa->foto) }}" class="w-30 rounded">
                        <hr>
                        <h4>Nama            : {{ $mahasiswa->nama }}</h4>
                        <p class="tmt-3">
                            Nim             : {!! $mahasiswa->nim !!}
                        </p>
                        <p class="tmt-3">
                            No_Telp         : {!! $mahasiswa->no_telp !!}
                        </p>
                        <p class="tmt-3">
                            Umur            : {!! $mahasiswa->umur !!} Tahun
                        </p>
                        <p class="tmt-3">
                            Tanggal Lahir   : {!! $mahasiswa->tanggal_lahir !!}
                        </p>
                        <p class="tmt-3">
                            Jenis Kelamin   : {!! $mahasiswa->jenis_kelamin !!}
                        </p>
                        <p class="tmt-3">
                            Alamat          : {!! $mahasiswa->alamat !!}
                        </p>
                        <div class="d-grid">
                            <a href="{{ route('mahasiswa.index') }}" class="btn btn-secondary">Kembali</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
@endsection