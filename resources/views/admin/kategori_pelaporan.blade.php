@extends('admin.app')
@section('title')
    - Kategori Pelaporan
@endsection
@section('activedkt')
    active
@endsection
@section('content')
    <section class="main-section">
          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Tables</h1>
          <p class="mb-4">Kategori Pelaporan</a>.</p>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Tabel Kategori</h6>
            </div>
            <div class="card-body">
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li> {{ $error }} </li>
                        @endforeach
                    </ul>
                </div>
            @endif
              <div class="table-responsive">
                <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#modalTambah"><span>+ Tambah Kategori</span></a>
                <br>
                <br>
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nama Kategori</th>
                        <th>Status Aktif</th>
                        <th>Aksi</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>No.</th>
                      <th>Nama Kategori</th>
                      <th>Status Aktif</th>
                      <th>Aksi</th>
                    </tr>
                  </tfoot>
                  <tbody>
                  @foreach ($datas as $key => $data)
                    <tr>
                        <td>{{$key+1}}</td>
                        <td>{{$data->kategori}}</td>
                        <td>
                            <select id="status" class="form-control" onchange ="location =this.value;">
                                <option disabled selected value="">{{$data->status}}</option>
                                @if ($data->status == 'Aktif')
                                    <option value="{{ url('/admin/update_status_pelaporan',$data->id)}}">Tidak</option>
                                @else
                                    <option value="{{ url('/admin/update_status_pelaporan',$data->id)}}">Aktif</option>
                                @endif
                            </select>
                        </td>
                        <td>
                            <a href="#" class="btn btn-danger" data-toggle="modal" data-target="#modalHapus{{$data->id}}"><li class="fas fa-trash"></li><span>Hapus</span></a>
                            <a href="#" class="btn btn-success" data-toggle="modal" data-target="#modalEdit{{$data->id}}"><li class="fas fa-pencil"></li><span>Edit</span></a>
                                                <!-- Modal Hapus-->
                    <div class="modal fade" id="modalHapus{{$data->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Hapus Item</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            </div>
                            <div class="modal-body">
                            Yakin Akan Menghapus Item ?
                            </div>
                            <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                            <a href="{{ url('/admin/delete_kategori',$data->id)}}" class="btn btn-danger">hapus</a>
                            </div>
                        </div>
                        </div>
                    </div>
                    <!-- Modal edit-->
                    <div class="modal fade" id="modalEdit{{$data->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Edit Item</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            </div>
                            <div class="modal-body">
                            <form action="{{ url ('/admin/update_kategori',$data->id)}}" method="post" class="form-group">
                            @csrf
                            <span>Kategori :</span>
                            <input type="text" name="kategori" id="kategori" value="{{$data->kategori}}" class="form-control">
                            </div>
                            <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-primary">Edit</button>
                            </form>
                            </div>
                        </div>
                        </div>
                    </div>
                     <!-- Modal Tambah-->
                     <div class="modal fade" id="modalTambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Tambah Item</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            </div>
                            <div class="modal-body">
                            <form action="{{ url ('/admin/tambah_kategori')}}" method="post" class="form-group">
                                @csrf
                                <span>Kategori :</span>
                                <input type="text" name="kategori" id="kategori" class="form-control">
                                <span>Status</span>
                                <select name="status" id="tambahStatus" class="form-control">
                                    <option value="Aktif">Aktif</option>
                                    <option value="Tidak">Tidak</option>
                                </select>
                            </div>
                            <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            </form>
                            </div>
                        </div>
                        </div>
                    </div>
                        </td>
                    </tr>

                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <!-- end -->
    </section>
@endsection
@section('script')
      <!-- Page level plugins -->
    <script src="{{ asset ('sb2/vendor/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{ asset ('sb2/vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>

    <!-- Page level custom scripts -->
    <script src="{{ asset ('sb2/js/demo/datatables-demo.js')}}"></script>
@endsection
