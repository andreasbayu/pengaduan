<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{$judul}}</title>
</head>
<body>
    <h1>{{ $judul }}</h1>
    <table class="table" border="1">
        <thead>
            <tr>
                <th>No.</th>
                <th>Isi Laporan</th>
                <th>Status</th>
                <th>Tanggapan</th>
                <th>Terkirim</th>
                <th>Dibalas</th>
            </tr>
        </thead>
            @foreach ($datas as $key => $data)
                  <tbody>
                      <tr>
                        <td>{{$key+1}}</td>
                        <td>{{$data->isi_laporan}}</td>
                        <td>@if ($data->status == '0')
                            <span style="color:red">Laporan Ditolak</div>
                            @else
                                {{$data->status}}
                            @endif</td>
                        <td>
                            @if ($data->tanggapan['tanggapan'] != null)
                                {{$data->tanggapan->tanggapan }}
                            @endif
                        </td>
                        <td>{{$data->created_at}}</td>
                        <td>
                            @if ($data->tanggapan['created_at'] != null)
                                {{$data->tanggapan->created_at}}
                            @endif
                        </td>
                      </tr>
                  </tbody>
            @endforeach
    </table>
</body>
</html>
