@extends('layouts.app')

@section('body')
    <h1 class="mb-0">Tambah Data Universitas</h1>
    <hr>
    <form action="{{ route('universitas.store') }}" method="POST" enctype="multipart/form-data">
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
                <div class="form-label">Nama</div>
                <input type="text" name="nama" class="form-control">
            </div>
            <div class="col">
                <div class="form-label">Email</div>
                <input type="text" name="email" class="form-control">
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <div class="form-label">Akreditasi</div>
                <input type="text" name="akreditasi" class="form-control">
            </div>
            <div class="col">
                <div class="form-label">No Telp</div>
                <input type="text" name="no_telp" class="form-control">
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <div class="form-label">Alamat</div>
                    <textarea class="form-control" name="alamat"></textarea>
            </div>
        </div>
        <div class="row">
            <div class="d-grid">
                <button class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>
@endsection