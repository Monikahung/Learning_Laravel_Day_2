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
                <h3 class="card-title">FORM REGISTER</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->

              {{-- Menampilkan eror ketika validasi dari function daftar (route /prosesregister) --}}
              @if($errors->any())
                <ul style="color:red;">
                  @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                  @endforeach
                </ul>
              @endif

              {{-- Form untuk mengirimkan data (post) ke route prosesregister --}}
              <form action="{{ route('prosesregister') }}" method="post">
                <div class="card-body">
                  @csrf {{-- Token keamanan sistem --}}
                  {{-- Menginput nama --}}
                  <div class="form-group">
                    <label>Nama</label>
                    <input type="text" class="form-control" name="nama" placeholder="Input Nama">
                  </div>
                  {{-- Menginput no hp --}}
                  <div class="form-group">
                    <label>No HP</label>
                    <input type="text" class="form-control" name="no_hp" placeholder="Input No HP">
                  </div>
                  {{-- Menginput email --}}
                  <div class="form-group">
                    <label>Email</label>
                    <input type="email" class="form-control" name="email" placeholder="Input Email">
                  </div>
                  {{-- Menginput password --}}
                  <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" name="password" placeholder="Input Password" required>
                  </div>
                  {{-- Menginput konfirmasi password --}}
                  <div class="form-group">
                    <label for="password_confirmation">Konfirmasi Password</label>
                    <input type="password" class="form-control" name="password_confirmation"
                      placeholder="Konfirmasi Password" required>
                  </div>
                </div>

                {{-- Tombol Daftar --}}
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Daftar</button>
                </div>
              </form>
            </div>
          </div>

          {{-- Menampilkan pesan sukses jika pendaftaran berhasil dari function daftar (route /prosesregister) --}}
          @if(session('success'))
            <p style="color: green;">{{ session('success') }}</p>
          @endif

          <div class="col-sm-12">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>Id</th>
                  <th>Nama</th>
                  <th>No HP</th>
                  <th>Email</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                {{-- Perulangan untuk menampilkan data user --}}
                @foreach ($users as $user)
                  <tr>
                    {{-- Menampilkan data user berupa id --}}
                    <td>{{ $user->id }}</td>
                    {{-- Menampilkan data user berupa nama --}}
                    <td>{{ $user->nama }}</td>
                    {{-- Menampilkan data user berupa no hp --}}
                    <td>{{ $user->no_hp }}</td>
                    {{-- Menampilkan data user berupa email --}}
                    <td>{{ $user->email }}</td>
                    <td>
                      <a href="{{ route('useredit', $user->id) }}">Edit</a> |
                      <form action="{{ route('userdelete', $user->id) }}" style="display: inline;" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</button>
                      </form>
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </section>
  </div>
@endsection