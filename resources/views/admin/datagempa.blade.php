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
                    <div class="col-sm-12 col-md-6">
                      <div class="dt-buttons btn-group flex-wrap"> <button
                          class="btn btn-secondary buttons-copy buttons-html5" tabindex="0" aria-controls="example1"
                          type="button"><span>Copy</span></button> <button
                          class="btn btn-secondary buttons-csv buttons-html5" tabindex="0" aria-controls="example1"
                          type="button"><span>CSV</span></button> <button
                          class="btn btn-secondary buttons-excel buttons-html5" tabindex="0" aria-controls="example1"
                          type="button"><span>Excel</span></button> <button
                          class="btn btn-secondary buttons-pdf buttons-html5" tabindex="0" aria-controls="example1"
                          type="button"><span>PDF</span></button> <button class="btn btn-secondary buttons-print"
                          tabindex="0" aria-controls="example1" type="button"><span>Print</span></button>
                        <div class="btn-group"><button
                            class="btn btn-secondary buttons-collection dropdown-toggle buttons-colvis" tabindex="0"
                            aria-controls="example1" type="button" aria-haspopup="true"><span>Column
                              visibility</span><span class="dt-down-arrow"></span></button></div>
                      </div>
                    </div>
                    <div class="col-sm-12 col-md-6">
                      <div id="example1_filter" class="dataTables_filter"><label>Search:<input type="search"
                            class="form-control form-control-sm" placeholder="" aria-controls="example1"></label></div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-12">
                      <table id="example1" class="table table-bordered table-striped dataTable dtr-inline"
                        aria-describedby="example1_info">
                        <thead>
                          <tr>
                            <th class="sorting sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                              aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">
                              No</th>
                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                              aria-label="Browser: activate to sort column ascending">Tanggal</th>
                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                              aria-label="Platform(s): activate to sort column ascending">Jam</th>
                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                              aria-label="Engine version: activate to sort column ascending">Koordinat</th>
                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                              aria-label="CSS grade: activate to sort column ascending">Wilayah</th>
                          </tr>
                        </thead>
                        <tbody>
                          {{-- Perulangan untuk menampilkan data gempa dengan menggunakan gempaData dari hasil kembalian function listgempa --}}
                          <?php $i=1; ?>
                          @foreach ($gempaData as $item)
                            <tr class="odd">
                              <td class="dtr-control sorting_1" tabindex="0"><?php echo $i++; ?></td>
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