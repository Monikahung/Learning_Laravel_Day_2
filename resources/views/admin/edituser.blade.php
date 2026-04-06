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
                <h3 class="card-title">FORM EDIT</h3>
              </div>
              {{-- Form untuk mengirimkan data (post) ke route updateuser --}}
              <form action="{{ route('updateuser', $user->id) }}" method="post">
                <div class="card-body">
                  @csrf {{-- Token keamanan sistem --}}
                  {{-- Menginput nama --}}
                  <div class="form-group">
                    <label>Nama</label>
                    <input type="text" class="form-control" name="nama" value="{{ $user->nama }}" placeholder="Input Nama">
                  </div>
                  {{-- Menginput no hp --}}
                  <div class="form-group">
                    <label>No HP</label>
                    <input type="text" class="form-control" name="no_hp" value="{{ $user->no_hp }}" placeholder="Input No HP">
                  </div>
                  {{-- Menginput email --}}
                  <div class="form-group">
                    <label>Email</label>
                    <input type="email" class="form-control" name="email" value="{{ $user->email }}" placeholder="Input Email">
                  </div>
                  {{-- Menginput password --}}
                  <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" name="password" placeholder="Input Password">
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