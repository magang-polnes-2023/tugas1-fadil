@extends('layouts.app')

@section('body')
    <div class="d-flex align-items-center justify-content-between">
        <h1 class="mb-0">Data Universitas</h1>
    </div>
    <hr>
    <a href="{{ route('universitas.create') }}" class="btn btn-primary">Tambah Data</a>
        @if(Session::has('success'))
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
                <th>Nama</th>
                <th>Email</th>
                <th>Akreditasi</th>
                <th>Nama Mahasiswa</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @if($universitas->count() > 0)
                @foreach($universitas as $univ)
                    <tr>
                        <td class="text-middle">{{ $loop->iteration }}</td>
                        <td class="text-middle">{{ $univ->nama }}</td>
                        <td class="text-middle">{{ $univ->email }}</td>
                        <td class="text-middle">{{ $univ->akreditasi }}</td>
                        <td class="text-middle">
                            <ul>
                                @foreach($univ->mahasiswa as $univmhs)
                                    <li>
                                            {{ $univmhs->nama }}
                                    </li>
                                @endforeach
                            </ul>
                        </td>
                        <td>
                            <form onsubmit="return confirm('Apakah Anda Yakin Untuk Menghapus Data?');" action="{{ route('universitas.destroy', $univ->id) }}" method="POST">
                                <a href="{{ route('universitas.show', $univ->id) }}" type="button" class="btn btn-sm btn-dark">SHOW</a>
                                <a href="{{ route('universitas.edit', $univ->id) }}" type="button" class="btn btn-sm btn-primary">EDIT</a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">DELETE</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            @else
            <tr>
                <td class="text-center" colspan="6">Tidak Ada Data Universitas</td>
            </tr>
            @endif
        </tbody>
    </table>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
@endsection