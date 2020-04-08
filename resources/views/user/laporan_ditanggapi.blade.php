@extends('user.app')
@section('title')
    - Laporan Ditanggapi
@endsection
@section('activeld')
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
      <h2 class="panel-title">Data Laporan Ditanggapi</h2>
      @php
          $date = date('j F Y ')
      @endphp
      <p class="panel-subtitle" >Tanggal : {{$date}}  Jam : <a id="waktu"></a> </p>
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
              <th>Status</th>
              <th>Tanggapan</th>
              <th>Tanggal Terkirim</th>
              <th>Tanggal Dibalas</th>
          </thead>
              @foreach ($datas as $key => $data)
                  @php
                    $foto = $data->foto
                  @endphp
                  @if (isset($data->tanggapan))
                    <tbody>
                        <td>{{$key+1}}</td>
                        <td>{{$data->isi_laporan}}</td>
                        <td>@if ($data->status == '0')
                            <span style="color:red">Laporan Ditolak</div>
                            @else
                                {{$data->status}}
                            @endif</td>
                        <td>{{$data->tanggapan->tanggapan }}</td>
                        <td>{{$data->created_at}}</td>
                        <td>{{$data->tanggapan->created_at}}</td>
                    </tbody>
                  @endif
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
