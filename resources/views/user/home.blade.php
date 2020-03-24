@extends('user.app')
@section('title')
    - {{Session::get('username')}}
@endsection
@section('activeh')
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
                            <h3 class="panel-title">Selamat Datang</h3>
                            @php
                                $date = date('j F Y')
                            @endphp
							<p class="panel-subtitle">Tanggal : {{$date}} Jam : <a id="waktu"></a></p>
						</div>
						<div class="panel-body">

                           hai,&nbsp;<strong id="haloOm"> {{ Session::get('nama')}}</strong>  <em id="halo"></em>
                        </div>
                        <div class="panel-footer">
                            <a href="{{url('user/report')}}" class="btn btn-success">Laporkan Keluhan</a>
                        </div>
					</div>
					<!-- END OVERVIEW -->
				</div>
            </div>
            <!-- END MAIN CONTENT -->
            <script>
             
                var greeting;
                    var time = new Date().getHours();
                    if (time < 7) {
                        greeting = "Pagi";
                    }
                    else if (time < 15){
                        greeting = "Siang";
                    } 
                    else if (time < 18) {
                        greeting = "Sore";
                    }
                    else if(time < 3){
                        greeting = "Malam Menjelang Pagi"
                    }
                    else {
                        greeting = "Malam";
                    }
                    document.getElementById("halo").innerHTML = "Selamat "+greeting;
                    
                    var notif = document.getElementById('haloOm');
                        notif.addEventListener('mouseover', function() {
                            alert('hai :), Selamat '+greeting);
                        });
            </script>
    </section>
@endsection