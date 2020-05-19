@extends('admin.app')
@section('title')
    - Laporan Ditangggapi
@endsection
@section('activedt')
    active
@endsection
@section('content')
    <section class="main-section">
          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Tables</h1>
          <p class="mb-4">Data Laporan Ditangggapi</a>.</p>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Laporan Ditanggapi</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <a class="btn btn-primary" href="{{ url('/refresh')}}"><i class="fas fa-sync-alt" aria-hidden="true"></i> Refresh</a>
                <br> <br>
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>No.</th>
                      <th>Nik</th>
                      <th>Isi Laporan</th>
                      <th>Status</th>
                      <th>Gambar</th>
                      <th>Tanggal Pengiriman</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>No.</th>
                      <th>Nik</th>
                      <th>Isi Laporan</th>
                      <th>Status</th>
                      <th>Gambar</th>
                      <th>Tanggal Pengiriman</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    @foreach ($datas as $key => $data)
                    <tr>
                        @php
                            $foto = $data->foto
                        @endphp
                        <td>{{ $key+1}}</td>
                        <td>{{ $data -> nik}}</td>
                        <td>{{ $data -> isi_laporan }}</td>
                        <td>
                          @if ($data->status == 'pending')
                            Belum Dikonfirmasi
                          @else
                            {{$data->status}}
                          @endif
                        </td>
                        <td>
                        @if ($data->gambar == NULL)
                          Tanpa Gambar
                        @else
                              <img width="100px" src={{ asset ("/gambar_laporan/$foto")}} alt="gambar"></td>
                        @endif
                        <td>{{ $data -> created_at }}</td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <!-- end -->
@endsection
@section('script')
    <script>
    // Auto Refresh
    $(document).ready(function(){
        $("#dataTable").DataTable({
            "paging": true
        });
      });
      setTimeout(function(){
        location.reload();
      }, none);
    </script>
      <!-- Page level plugins -->
    <script src="{{ asset ('sb2/vendor/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{ asset ('sb2/vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>

    <!-- Page level custom scripts -->
    <script src="{{ asset ('sb2/js/demo/datatables-demo.js')}}"></script>

@endsection
