@extends('admin.layout')

@section('content')
  <div class="content-wrapper">
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Data Gempa JSON</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                  <div class="row">
                    <div class="col-sm-12">
                      <table id="example1" class="table table-bordered table-striped">
                        <thead>
                          <tr>
                            <th>No</th>
                            <th>Tanggal</th>
                            <th>Jam</th>
                            <th>Koordinat</th>
                            <th>Wilayah</th>
                          </tr>
                        </thead>
                        <tbody>
                          {{-- Perulangan untuk menampilkan data gempa dengan menggunakan gempaData dari hasil kembalian
                          function listgempa --}}
                          <?php $i = 1; ?>
                          @foreach ($gempaData as $item)
                            <tr class="odd">
                              <td class="dtr-control sorting_1" tabindex="0"><?php  echo $i++; ?></td>
                              {{-- Menampilkan data gempa berupa Tanggal (sesuai di API) --}}
                              <td>{{ $item['Tanggal'] }}</td>
                              {{-- Menampilkan data gempa berupa Jam (sesuai di API) --}}
                              <td>{{ $item['Jam'] }}</td>
                              {{-- Menampilkan data gempa berupa Coordinates (sesuai di API) --}}
                              <td>{{ $item['Coordinates'] }}</td>
                              {{-- Menampilkan data gempa berupa Wilayah (sesuai di API) --}}
                              <td>{{ $item['Wilayah'] }}</td>
                            </tr>
                          @endforeach
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
  </div>
@endsection