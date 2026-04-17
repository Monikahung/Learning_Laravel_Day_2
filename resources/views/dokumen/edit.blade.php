@extends('admin.layout')

@section('content')
    <div class="content-wrapper">
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <!-- left column -->
                    <div class="col-md-12">
                        <!-- general form elements -->
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">FORM EDIT DOKUMEN</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->

                            {{-- Menampilkan pesan eror --}}
                            @if($errors->any())
                                <ul style="color:red;">
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            @endif

                            {{-- Form untuk mengirimkan data (post) ke route dokumen.update --}}
                            <form action="{{ route('dokumen.update', $dokumen->id) }}" method="post" enctype="multipart/form-data">
                                <div class="card-body">
                                    @csrf {{-- Token keamanan sistem --}}
                                    {{-- Menginput nama dokumen --}}
                                    <div class="form-group">
                                        <label>Nama Dokumen</label>
                                        <input type="text" class="form-control" name="nama_dokumen"
                                            placeholder="Input Nama Dokumen" value="{{ $dokumen->nama_dokumen }}">
                                    </div>
                                    {{-- Menginput file dokumen --}}
                                    <div class="form-group">
                                        <label for="file">Upload Pdf (Opsional)</label>
                                        <input type="file" class="form-control" name="file" accept=".pdf">
                                    </div>
                                </div>

                                {{-- Tombol Ubah --}}
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Ubah</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection