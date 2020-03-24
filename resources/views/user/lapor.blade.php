@extends('user.app')
@section('title')
    - Lapor
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
                        <h2>Kirim Laporan Pengaduan</h2>
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
                            <div class="form-group">
                                <label for="id_kategori">Kategori</label>
                                <select name="id_kategori" id="id_kategori" class="form-control" required>
                                    <option value="" disabled selected>-- Pilih Kategori --</option>
                                    @foreach ($kategori as $kt)
                                        <option value="{{ $kt->id }}">{{ $kt->kategori }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="isi_laporan">Masukkan Teks</label>
                                <textarea placeholder="Masukkan Laporan Anda...." name="isi_laporan" id="isi_laporan" cols="30" rows="10" class="form-control" required></textarea>
                            </div>
                            <div class="form-group">
                                <label for="foto">Sisipkan Gambar ( Tidak Wajib )</label>
                                <input type="file" name="foto" id="foto">
                                <small id="fileHelp" class="form-text text-muted"> Masukan gambar. Dengan ukuran tidak lebih dari 2MB</small>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-primary" type="submit" id="kirim">Kirim</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
