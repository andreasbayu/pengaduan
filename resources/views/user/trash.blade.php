@extends('user.app')
@section('title')
    - Laporan Dihapus
@endsection
@section('activetr')
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
                            <h2 class="panel-title">Data Laporan Dihapus</h2>
                            @php
                                $date = date('j F Y')
                            @endphp
                            <p class="panel-subtitle">Tanggal : {{$date}} Jam : <a id="waktu"></a></p>
                            @if (Session::has('alert-success'))
                                <div class="alert alert-success">
                                    {{Session::get('alert-success')}}
                                </div>
                            @endif
                        </div>

						<div class="panel-body" style="overflow-x:auto;">
                            <table class="table">
                                <col width="50">
                                <col width="400">
                                <thead class="thead">
                                    <th>No.</th>
                                    <th>Isi Laporan</th>
                                    <th>Foto</th>
                                    <th>Tanggal Pengiriman</th>
                                    <th>Aksi</th>
                                </thead>
                                    @php
                                        $i = 1;
                                    @endphp
                                    @foreach ($datas as $data)
                                    <tbody>
                                        @php
                                            $foto = $data->foto
                                        @endphp
                                        <td>{{$i++}}</td>
                                        <td>{{$data->isi_laporan}}</td>
                                        <td>
                                            {{-- Jika data kosong --}}
                                            @if ($foto == null)
                                                Tanpa Gambar
                                            @else
                                                <img src="{{ asset("gambar_laporan/$foto")}}" alt="gambar_laporan" width="100">
                                            @endif
                                        </td>
                                        <td>{{$data->created_at}}</td>
                                        <td>@if ($data->status == 'proses')
                                                <a href="{{ url("user/reportRestore",$data->id)}}" class="btn btn-success">Restore</a>
                                                <a href="{{url("user/reportDeletePermanent",$data->id)}}" class="btn btn-danger">Hapus Permanen</a>
                                            @endif
                                        </td>
                                    </tbody>
                                    @endforeach
                                <tfoot>
                                    <th>No.</th>
                                    <th>Isi Laporan</th>
                                    <th>Foto</th>
                                    <th>Tanggal Pengiriman</th>
                                    <th>Aksi</th>
                                </tfoot>
                            </table>
                        </div>
                        <div class="panel-footer">
                            {{$datas->links()}}
                        </div>
					</div>
					<!-- END OVERVIEW -->
				</div>
            </div>
			<!-- END MAIN CONTENT -->
    </section>
@endsection
