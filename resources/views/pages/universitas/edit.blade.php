@extends('layouts.app')

@section('body')
    <h1 class="mb-0">Edit Data Universitas</h1>
    <hr>
    <form action="{{ route('universitas.update', $universitas->id) }}" method="POST" enctype="multipart/form-data">
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
                <div class="form-label">Nama Universitas</div>
                <input type="text" name="nama" class="form-control" value="{{ $universitas->nama}}">
            </div>
            <div class="col">
                <div class="form-label">Email</div>
                <input type="text" name="email" class="form-control" value="{{ $universitas->email}}">
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <div class="form-label">Akreditasi</div>
                <input type="text" name="akreditasi" class="form-control" value="{{ $universitas->akreditasi}}">
            </div>
            <div class="col">
                <div class="form-label">No Telp</div>
                <input type="text" name="no_telp" class="form-control" value="{{ $universitas->no_telp}}">
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <div class="form-label">Alamat</div>
                    <textarea class="form-control" name="alamat">{{ $universitas->alamat}}</textarea>
            </div>
        </div>
        <div class="row">
            <div class="d-grid">
                <button class="btn btn-warning">Update</button>
            </div>
        </div>
    </form>
@endsection