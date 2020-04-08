@extends('user.app')
@section('title')
    - Laporan Terkirim
@endsection
@section('activelk')
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
                            <h2 class="panel-title">Data Laporan Terkirim</h2>
                            @php
                                $date = date('j F Y ')
                            @endphp
                            <p class="panel-subtitle" >Tanggal : {{$date}}  Jam : <a id="waktu"></a> </p>
                            <div class="alert alert-warning">
                                Perhatian !! Laporan Yang Sudah Tidak Diterima (Ditolak) Atau Selesai Tidak Dapat Dirubah & Dihapus ...
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            @if (Session::has('alert-success-del'))
                                <div class="alert alert-success">
                                    {{Session::get('alert-success-del')}} <a href="{{ url ('user/laporan_dihapus')}}">Disini</a>
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
                                    <th>Status</th>
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
                                        <td>
                                            @if ($data->status == '0')
                                            <span style="color:red">Laporan Ditolak</div>
                                            @else
                                                {{$data->status}}
                                            @endif
                                        </td>
                                        <td>{{$data->created_at}}</td>
                                        <td>@if ($data->status == 'proses')
                                                {{-- <a href="#" class="btn btn-primary"><i class="lnr lnr-pencil"></i></a> --}}
                                                <a href="{{ url("user/deleteReport/$data->id") }}" class="btn btn-danger"><i class="lnr lnr-trash"></i></a>
                                            @endif
                                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                                                <i class="fa fa-eye"></i>
                                            </button>
                                        </td>
                                     <!-- Modal -->
                                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                                </div>
                                                <div class="modal-body">
                                                ...
                                                </div>
                                                <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <button type="button" class="btn btn-primary">Save changes</button>
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                    </tbody>
                                    @endforeach
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

