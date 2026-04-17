@extends('admin.layout')

@section('content')
    <div class="content-wrapper">
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Data Dokumen</h3>
                            </div>

                            {{-- Menampilkan pesan sukses --}}
                            @if(session('success'))
                                <p style="color: green;">{{ session('success') }}</p>
                            @endif

                            {{-- Tombol tambah dokumen --}}
                            <a href="{{ route('dokumen.create') }}" class="btn btn-primary">Tambah</a>

                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Nama Dokumen</th>
                                            <th>File</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        {{-- Perulangan untuk menampilkan data dokumen --}}
                                        @foreach ($dokumens as $dokumen)
                                            <tr>
                                                {{-- Menampilkan data dokumen berupa id --}}
                                                <td>{{ $dokumen->id }}</td>
                                                {{-- Menampilkan data dokumen berupa nama dokumen --}}
                                                <td>{{ $dokumen->nama_dokumen }}</td>
                                                {{-- Menampilkan data dokumen berupa link file --}}
                                                <td>
                                                    <a href="{{ asset('storage/' . $dokumen->file) }}" target="_blank">
                                                        Lihat Pdf
                                                    </a>
                                                </td>
                                                {{-- Menampilkan tombol aksi edit dan hapus --}}
                                                <td>
                                                    <a href="{{ route('dokumen.edit', $dokumen->id) }}">Edit</a> |
                                                    <form action="{{ route('dokumen.delete', $dokumen->id) }}"
                                                        style="display: inline;" method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit"
                                                            onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection