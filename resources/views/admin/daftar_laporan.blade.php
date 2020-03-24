@extends('admin.app')
@section('title')
    - Laporan Terkirim
@endsection
@section('activedl')
    active
@endsection
@section('content')
    <section class="main-section">
          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Tables</h1>
          <p class="mb-4">Data Pengaduan Masyarakat</a>.</p>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
               <a class="btn btn-primary" href="{{ url('/refresh')}}"><i class="fas fa-sync-alt" aria-hidden="true"></i> Refresh</a>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>No.</th>
                      <th>Nik</th>
                      <th>Isi Laporan</th>
                      <th>Status</th>
                      <th>Gambar</th>
                      <th>Tanggal Pengiriman</th>
                      <th>Aksi</th>
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
                      <th>Aksi</th>
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
                        <td>
                          <a href="#" class="btn btn-danger" data-toggle="modal" data-target="#modalTolak{{$data->id}}"><li class="fas fa-times-circle"></li><span>Tolak</span></a>
                          <a href="#" class="btn btn-success" data-toggle="modal" data-target="#modalTanggapi{{$data->id}}"><li class="fas fa-check-circle"></li><span>Tanggapi</span></a>
                        </td>
                    </tr>
                    {{-- Modal Tanggapi --}}
                    <div class="modal fade" id="modalTanggapi{{$data->id}}" tabindex="-1" role="dialog" aria-labelledby="modalTanggapiLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="modalTanggapiLabel">Tanggapi Keluhan Untuk Ditindak Lanjuti</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <form action="{{ url("terima/$data->id")}}" method="post">
                              @csrf
                              <div class="form-group">
                                <input type="text" name="id_pengaduan" id="id_pengaduan" value="{{ $data->id }}" readonly class="form-control">
                                <label for="id_petugas">ID Petugas</label>
                                <input type="number" name="id_petugas" id="id_petugas" value="1" class="form-control">
                              </div>
                              <div class="form-group">
                                <label for="message-text" class="col-form-label">Tanggapan :</label>
                                <textarea class="form-control" id="message-text" name="tanggapan" required></textarea>
                              </div>
                          </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                <button type="submit" class="btn btn-primary"><i class="fa fa-paper-plane"></i> Kirim Tanggapan</button>
                              </div>
                        </form>
                        </div>
                      </div>
                    </div>
                    {{-- Modal Tolak --}}
                    <div class="modal fade" id="modalTolak{{$data->id}}" tabindex="-1" role="dialog" aria-labelledby="modalTolakLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="modalTolakLabel">Tolak Laporan</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <form action="{{ url("tolak/$data->id")}}" method="post">
                              @csrf
                              <div class="form-group">
                                <input type="text" name="id_pengaduan" id="id_pengaduan" value="{{ $data->id }}" readonly class="form-control">
                                <label for="id_petugas">ID Petugas</label>
                                <input type="number" name="id_petugas" id="id_petugas" value="1" class="form-control">
                              </div>
                              <div class="form-group">
                                <label for="message-text" class="col-form-label">Alasan Penolakan :</label>
                                <textarea class="form-control" id="message-text" name="tanggapan" required></textarea>
                              </div>
                          </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                <button type="submit" class="btn btn-danger"><i class="fa fa-paper-plane"></i> Kirim Tanggapan</button>
                              </div>
                        </form>
                        </div>
                      </div>
                    </div>
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

    <script>
        // $(document).ready(function() {

        //    function RefreshTable() {
        //        $( "#dataTable" ).load( "{{ url('admin/daftar_laporan')}} #dataTable" );
        //    }

        //    $("#refresh-btn").on("click", RefreshTable);

           // OR CAN THIS WAY
           //
        //    $("#refresh-btn").on("click", function() {
        //       $( "#dataTable" ).load( "{{ url('admin/daftar_laporan')}} #dataTable" );
        //    });+
      </script>

@endsection
