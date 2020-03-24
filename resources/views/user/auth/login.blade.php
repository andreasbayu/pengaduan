@extends('user.auth.auth')
@section('title')
    - Login
@endsection
@section('content')
    <!--main section -->
<section class="main-section">
        <!-- content -->
        <div class="content">
            <div class="container" style="margin-top:150px">
                <div class="col-md-4"></div>
                <div class="col-md-4">
                    <div class="panel panel-default">
                    <div class="panel-heading"><h3 class="panel-title"><strong>Masuk </strong></h3></div>
                        <div class="panel-body">
                            <form action="{{ url('/user/loginPost')}}" method="post">
                                @csrf
                                <div class="form-group">
                                    @if (\Session::has('alert-danger'))
                                        <div class="alert alert-danger">
                                            <div>{{Session::get('alert-danger')}}</div>
                                        </div>
                                    @endif
                                    @if (\Session::has('alert-success'))
                                        <div class="alert alert-success">
                                            <div>{{Session::get('alert-success')}}</div>
                                        </div>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="username">Email atau Username</label>
                                    <input required type="text" name="username" id="username" class="form-control" placeholder="Masukan email atau username">
                                </div>
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input required type="password" name="password" id="password" class="form-control" placeholder="Masukan Sandi">
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-md btn-success">Login</button>
                                    <a href="{{ url('/user/register')}}" class="btn btn-md btn-primary">Buat Akun</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection