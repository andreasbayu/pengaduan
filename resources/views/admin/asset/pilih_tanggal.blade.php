@extends('admin.app')
@section('title')
- Generate PDF
@endsection
@section('content')
<section class="main-section">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Generate Laporan</h1>
      </div>

      <!-- Content Row -->
      <div class="row">

        <div class="col-xl-4 col-lg-5">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                   <h6 class="m-0 font-weight-bold text-primary">Pilih Tanggal</h6>
                </div>
                    <!-- Card Body -->
                <div class="card-body"> <div class="alert alert-warning">Format Tanggal Contoh Tahun : 2020 Bulan : 01</div>
                    <form target="blank" action="{{ url ('admin/generate_pdf/generate') }}" method="GET">
                        @csrf
                        <div class="form-group">
                        <table cellpadding="6px">
                            <tr>
                                <th><span>Tahun : </span> </th>
                                <th></th>
                                <th><span>Bulan : </span></th>
                            </tr>
                            <tr>
                                <td><input type="text" name="tahun" id="tahun" size="4" class="form-control" required maxlength="4"></td>
                                <td> - </td>
                                <td><input type="text" name="bulan" id="bulan" size="2" class="form" required maxlength="2"></td>
                            </tr>
                            </table>
                       </div>
                        <div class="form-group">
                            <button class="btn btn-primary" type="submit"><i class="fas fa-download fa-sm text-white-50"></i> Generate</button>
                        </div>
                    </form>
                </div>
            </div>
          </div>


    </div>
</section>
@endsection
