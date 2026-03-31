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
                <h3 class="card-title">FORM HITUNG PENJUMLAHAN</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              {{-- Menampilkan eror ketika validasi dari function calculate (route /proseshitung) --}}
              @if($errors->any())
              <ul style="color:red;">
                @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
              </ul>
              @endif
              {{-- Form untuk mengirimkan data (post) ke route proseshitung --}}
              <form action="{{ route('proseshitung') }}" method="post">
                <div class="card-body">
                  @csrf {{-- Token keamanan sistem --}}
                  {{-- Menginput angka 1 --}}
                  <div class="form-group">
                    <label>Input Angka 1</label>
                    <input type="text" class="form-control" name="angka1" placeholder="Input Angka 1" value="{{ old('number1', $number1 ?? '') }}">
                    {{-- old digunakan supaya angka yang diinputkan tidak hilang ketika diklik tombol Submit, nilainya number1 dari fungsi calculate --}}
                  </div>
                  {{-- Menginput angka 2 --}}
                  <div class="form-group">
                    <label>Input Angka 2</label>
                    <input type="text" class="form-control" name="angka2" placeholder="Input Angka 2" value="{{ old('number2', $number2 ?? '') }}">
                    {{-- old digunakan supaya angka yang diinputkan tidak hilang ketika diklik tombol Submit, nilainya number2 dari fungsi calculate --}}
                  </div>
                </div>

                {{-- Tombol Submit --}}
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
              {{-- Jika hasil penjumlahan tidak kosong, maka ditampilkan angka1 + angka2 = hasil penjumlahannya --}}
              @isset($result)
                <h2>Hasil Penjumlahan: </h2>
                <p>{{ $number1 }} + {{ $number2 }} = {{ $result }}</p>
              @endisset
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
@endsection