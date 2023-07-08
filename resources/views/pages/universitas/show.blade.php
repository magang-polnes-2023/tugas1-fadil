@extends('layouts.app')

@section('body')
    <div class="d-flex align-items-center justify-content-center">
        <h1 class="mb-0">Data Universitas</h1>
    </div>
    <div class="container mt-5 mb-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body text-center">
                        <h4>Nama            : {{ $universitas->nama }}</h4>
                        <p class="tmt-3">
                            Email           : {!! $universitas->email !!}
                        </p>
                        <p class="tmt-3">
                            Akreditasi      : {!! $universitas->akreditasi !!}
                        </p>
                        <p class="tmt-3">
                            No_Telp         : {!! $universitas->no_telp !!}
                        </p>
                        <p class="tmt-3">
                            Alamat          : {!! $universitas->alamat !!}
                        </p>
                        <div class="d-grid">
                            <a href="{{ route('universitas.index') }}" class="btn btn-secondary">Kembali</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
@endsection