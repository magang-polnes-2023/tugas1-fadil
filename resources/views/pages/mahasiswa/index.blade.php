@extends('layouts.app')

@section('body')
    <div class="d-flex align-items-center justify-content-between">
        <h1 class="mb-0">Data Mahasiswa</h1>
    </div>
    <hr>
    <a href="{{ route('mahasiswa.create') }}" class="btn btn-primary">Tambah Data</a>
        @if(Session()->has('success'))
            <div id="success-alert" class="alert alert-success mt-3" role="alert">
                {{ Session::get('success') }}
            </div>
            <script>
                setTimeout(function() {
                    var successAlert = document.getElementById('success-alert');
                    successAlert.style.display = 'none';
                }, 5000);
            </script>
        @endif
    <table class="table table-hover mt-3">
        <thead class="table-dark" >
            <tr>
                <th>#</th>
                <th>FotoProfile</th>
                <th>Nama</th>
                <th>Universitas</th>
                <th>Nim</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @if($mahasiswa->count() > 0)
                @foreach($mahasiswa as $mhs)
                    <tr>
                        <td class="text-middle">{{ $loop->iteration }}</td>
                        <td class="text-middle">
                            <img src="{{ asset('/storage/posts/'.$mhs->foto) }}" class="rounded" style="width: 70px">
                        </td>
                        <td class="text-middle">{{ $mhs->nama }}</td>
                        <td class="text-middle">{{ $mhs->universitas->nama }}</td>
                        <td class="text-middle">{{ $mhs->nim }}</td>
                        <td>
                            <form onsubmit="return confirm('Apakah Anda Yakin Untuk Menghapus Data?');" action="{{ route('mahasiswa.destroy', $mhs->id) }}" method="POST">
                                <a href="{{ route('mahasiswa.show', $mhs->id) }}" type="button" class="btn btn-sm btn-dark">SHOW</a>
                                <a href="{{ route('mahasiswa.edit', $mhs->id) }}" type="button" class="btn btn-sm btn-primary">EDIT</a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">DELETE</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            @else
            <tr>
                <td class="text-center" colspan="6">Tidak Ada Data Mahasiswa</td>
            </tr>
            @endif
        </tbody>
    </table>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
@endsection