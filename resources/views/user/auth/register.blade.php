@extends('user.auth.auth')
@section('title')
    - Registrasi
@endsection
@section('content')
    <!-- Main Section -->
    <section class="main-section">
        <!--content -->
        <div class="content">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li> {{ $error }} </li>
                        @endforeach
                    </ul>
                </div>
            @endif
<div class="content">
    <div class="container" style="margin-top:60px;margin-right:0px;">
        <div class="col-md-7">
            <div class="panel panel-default">
            <div class="panel-heading"><h3 class="panel-title"><strong>Daftar </strong></h3></div>
                <div class="panel-body">
            <form action="{{ url('user/registerPost')}}" method="post">
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
                    <input type="password" name="confirmation" id="confirmation" class="form-control">
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
                <div class="form-group">
                    <button class="btn btn-md btn-primary">Simpan</button>
                    <button type="reset" class="btn btn-md btn-danger">Batal</button>
                </div>
                <div class="form-group">
                    <a href="{{ url('/user/login')}}">Sudah Punya Akun ? Login</a>
                </div>
            </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
        </div>
    </section>
@endsection
