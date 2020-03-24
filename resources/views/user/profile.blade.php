@extends('user.app')
@section('title')
    - {{Session::get('username')}}
@endsection
@section('activep')
    active
@endsection
@section('content')
    <section class="main-section">
        			<!-- MAIN CONTENT -->
			<div class="main-content">
				<div class="container-fluid">
					<!-- OVERVIEW -->
					<div class="panel panel-headline">
						<div class="panel-heading">
                            <h3 class="panel-title">{{Session::get('nama')}}</h3>
                            @php
                                $date = date('j F Y')
                            @endphp
                            <p class="panel-subtitle">Tanggal : {{$date}} Jam : <a id="waktu"></a></p>
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                  <ul>
                                      @foreach ($errors->all() as $er)
                                          <li> {{ $er }} </li>
                                      @endforeach
                                  </ul>
                                </div>
                            @endif

						</div>
						<div class="panel-body">
                            <img src="{{asset("user_profile/$data->foto_user")}}" alt="user-image" class="*img-circle" width="250px">
                            <form enctype="multipart/form-data" action="{{ url("user/updateProfile/$data->nik")}}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label for="foto_user">Edit Foto</label>
                                    <input type="file" name="foto_user" id="foto_user" value="{{$data->foto_user}}">
                                </div>
                                <div class="form-group">
                                    <label for="nik">NIK :</label>
                                <input readonly type="number" name="nik" id="nik" required class="form-control" value="{{$data->nik}}">
                                </div>
                                <div class="form-group">
                                    <label for="nama">Nama : </label>
                                <input type="text" name="nama" id="nama" required class="form-control" value="{{$data->nama}}">
                                </div>
                                <div class="form-group">
                                    <label for="email">Email : </label>
                                    <input type="email" name="email" id="email" required class="form-control" value="{{$data->email}}" required>
                                </div>
                                <div class="form-group">
                                    <label for="username">Username :</label>
                                    <input type="text" name="username" id="username" required class="form-control" value="{{$data->username}}" required>
                                </div>
                                <div class="form-group">
                                    <label hidden for="password">Password : </label>
                                    <input type="hidden" name="password" id="password" required class="form-control" value="{{$data->password}}">
                                </div>
                                <div class="form-group">
                                    <label for="telp">No HP :</label>
                                    <input type="number" name="telp" id="telp" required class="form-control" value="{{$data->telp}}" required>
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-md btn-primary">Simpan</button>
                                </div>
                            </form>
                        </div>
                        
					</div>
					<!-- END OVERVIEW -->
				</div>
            </div>
			<!-- END MAIN CONTENT -->
    </section>
@endsection
