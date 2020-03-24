@extends('user.app')
@section('title')
    - Edit Laporan
@endsection
@section('activel')
    active
@endsection
@section('content')
    <section class="main-section">
        <div class="main-content">
            <div class="content-fluid">
                <div class="panel panel-headline">
                    <div class="panel-heading">
                        <h2>Edit Laporan Pengaduan</h2>
                    </div>
                    <div class="panel-body">
                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                        @if (\Session::has('alert-success'))
                            <div class="alert-sucess">
                                <div class="alert alert-success">{{Session::get('alert-success')}}</div>
                            </div>
                        @endif
                        <!-- Tambah enctype="multipart/form-data" -->
                        <form action="{{ url('/user/postReport')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="nik" value="{{Session::get('nik')}}">
                            <input type="hidden" name="status" value="0">
                            <div class="form-group">
                                <label for="isi_laporan">Masukkan Teks</label>
                                <textarea placeholder="Masukkan Laporan Anda...." name="isi_laporan" id="isi_laporan" cols="30" rows="10" class="form-control" required></textarea>
                            </div>
                            <div class="form-group">
                                <label for="foto">Sisipkan Gambar</label>
                                <input type="file" name="foto" id="foto">
                                <small id="fileHelp" class="form-text text-muted"> Masukan gambar. Dengan ukuran tidak lebih dari 2MB</small>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-primary" type="submit">Edit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
