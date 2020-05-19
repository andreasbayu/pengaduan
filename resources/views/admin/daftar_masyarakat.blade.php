@extends('admin.app')
@section('title')
    - Akun Masyarakat
@endsection
@section('activedms')
    active
@endsection
@section('content')
    <section class="main-section">
          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Tables</h1>
          <p class="mb-4">Akun Masyarakat</a>.</p>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Tabel Daftar Akun Masyarakat</h6>
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
                <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#modalTambah"><span>+ Tambah Masyarakat</span></a>
                <br>
                <br>
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nama</th>
                        <th>NIK</th>
                        <th>Email</th>
                        <th>Username</th>
                        <th>Telp</th>
                        <th>Tanggal Dibuat</th>
                        <th>Aksi</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>No.</th>
                      <th>Nama</th>
                      <th>NIK</th>
                      <th>Email</th>
                      <th>Username</th>
                      <th>Telp</th>
                      <th>Tanggal Dibuat</th>
                      <th>Aksi</th>
                    </tr>
                  </tfoot>
                  <tbody>
                  @foreach ($datas as $key => $data)
                    <tr>
                        <td>{{$key+1}}</td>
                        <td>{{$data->nama}}</td>
                        <td>{{$data->nik}}</td>
                        <td>{{$data->email}}</td>
                        <td>{{$data->username}}</td>
                        <td>{{$data->telp}}</td>
                        <td>{{$data->created_at}}</td>
                        <td>
                            <a href="#" class="btn btn-danger" data-toggle="modal" data-target="#modalHapus{{$data->nik}}"><li class="fas fa-trash"></li><span>Hapus</span></a>
                            <a href="#" class="btn btn-success" data-toggle="modal" data-target="#modalEdit{{$data->nik}}"><li class="fas fa-pencil"></li><span>Edit</span></a>
                        </td>                        <!-- Modal Hapus-->
                    <div class="modal fade" id="modalHapus{{$data->nik}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Hapus Akun</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            </div>
                            <div class="modal-body">
                            Yakin Akan Menghapus Akun ini ?
                            </div>
                            <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                            <a href="{{ url('/admin/delete_user',$data->nik)}}" class="btn btn-danger">hapus</a>
                            </div>
                        </div>
                        </div>
                    </div>
                    <!--modal tambah-->
                    <div class="modal fade" id="modalTambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Tambah Akun</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            </div>
                                <div class="modal-body">
                                    <form action="{{ url ('/admin/tambah_user')}}" method="post">
                                        @csrf
                                        <div class="form-group">
                                            <label for="nik">NIK :</label>
                                            <input type="number" name="nik" id="nik" required class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="nama">Nama : </label>
                                            <input type="text" name="nama" id="nama" required class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="email">Email : </label>
                                            <input type="email" name="email" id="email" required class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="useename">Username :</label>
                                            <input type="text" name="username" id="username" required class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="password">Password : </label>
                                            <input type="password" name="password" id="password" required class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="confirmation">Konfirmasi Sandi :</label>
                                            <input type="password" name="confirmation" id="confirmation" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <label class="radio" for="jenis_kelamin">Jenis Kelamin</label>
                                            <input type="radio" name="jenis_kelamin" id="jenis_kelamin" value="laki-laki" checked class="radio radio-inline"><span> Laki - Laki</span>
                                            <input type="radio" name="jenis_kelamin" id="jenis_kelamin" value="perempuan" class="radio radio-inline"><span> Perempuan</span>
                                        </div>
                                        <div class="form-group">
                                            <label for="telp">No HP :</label>
                                            <input type="number" name="telp" id="telp" required class="form-control">
                                        </div>
                                </div>
                            <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                            <button type="submit"class="btn btn-primary">Simpan</button>
                         </form>
                            </div>
                        </div>
                        </div>
                    </div>
                    <!--modal edit-->
                    <div class="modal fade" id="modalEdit{{$data->nik}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Tambah Akun</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            </div>
                                <div class="modal-body">
                                    <form action="{{ url ('/admin/update_user',$data->nik)}}" method="post">
                                        @csrf
                                        <div class="form-group">
                                            <label for="nik">NIK :</label>
                                            <input type="number" name="nik" id="nik" required class="form-control" value="{{$data->nik}}">
                                        </div>
                                        <div class="form-group">
                                            <label for="nama">Nama : </label>
                                            <input type="text" name="nama" id="nama" required class="form-control" value="{{$data->nama}}">
                                        </div>
                                        <div class="form-group">
                                            <label for="email">Email : </label>
                                            <input type="email" name="email" id="email" required class="form-control" value="{{$data->email}}">
                                        </div>
                                        <div class="form-group">
                                            <label for="useename">Username :</label>
                                            <input type="text" name="username" id="username" required class="form-control" value="{{$data->username}}">
                                        </div>
                                        <div class="form-group">
                                            <label for="password">Password : </label>
                                            <input type="password" name="password" id="password" required class="form-control" value="{{decrypt($data->password)}}">
                                        </div>
                                        <div class="form-group">
                                            <label class="radio" for="jenis_kelamin">Jenis Kelamin</label>
                                            <input type="radio" name="jenis_kelamin" id="jenis_kelamin" value="laki-laki" checked class="radio radio-inline"><span> Laki - Laki</span>
                                            <input type="radio" name="jenis_kelamin" id="jenis_kelamin" value="perempuan" class="radio radio-inline"><span> Perempuan</span>
                                        </div>
                                        <div class="form-group">
                                            <label for="telp">No HP :</label>
                                            <input type="number" name="telp" id="telp" required class="form-control" value="{{$data->telp}}">
                                        </div>
                                </div>
                            <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                            <button type="submit"class="btn btn-success">Update</button>
                         </form>
                            </div>
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
    </section>
@endsection
@section('script')
      <!-- Page level plugins -->
    <script src="{{ asset ('sb2/vendor/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{ asset ('sb2/vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>

    <!-- Page level custom scripts -->
    <script src="{{ asset ('sb2/js/demo/datatables-demo.js')}}"></script>

@endsection
