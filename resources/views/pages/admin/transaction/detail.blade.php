@extends('layouts.admin')

@section('title','Detail Transaction')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

      <!-- Page Heading -->
      <div class="d-sm-flex align-items-center justify-content-between mb-4">
          <h1 class="h3 mb-0 text-gray-800">Detail Transaction {{ $item->user->name }}</h1>
          <a href="{{ route('transaction.index') }}" class="btn btn-sm btn-outline-warning shadow-lg">
            <i class="fas fa-fw fa-spinner"></i> Kembali
          </a>
      </div>
      <div class="card shadow border-bottom-primary">
          <div class="card-body">
            <table class="table table-bordered table-responsive mx-auto">
                <tr>
                    @php $no = 1; @endphp
                    <th>#</th>
                    <td>{{ $no++ }}</td>
                </tr>
                <tr>
                    <th>Travel Package</th>
                    <td>{{ $item->travel_package->title }}</td>
                </tr>
                <tr>
                    <th>Pembeli</th>
                    <td>{{ $item->user->name }}</td>
                </tr>
                <tr>
                    <th>Additional Visa</th>
                    <td>@currency($item->additional_visa)</td>
                </tr>
                <tr>
                    <th>Total Transaksi</th>
                    <td>@currency($item->transaction_total)</td>
                </tr>
                <tr>
                    <th>Status Transaksi</th>
                    <td>{{ $item->transaction_status }}</td>
                </tr>
                <tr>
                    <th>Pembelian</th>
                    <td>
                        <table class="table table-hover table-responsive table-bordered">
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Nationality</th>
                                <th>Visa</th>
                                <th>DOE Passport</th>
                            </tr>
                            @foreach ($item->details as $detail)
                                <tr>
                                 <td>{{ $loop->iteration }}</td>
                                 <td>{{ $detail->username }}</td>
                                 <td>{{ $detail->nationality }}</td>
                                 <td>{{ $detail->is_visa ? '30 Days' : 'N/A' }}</td>
                                 <td>{{ \Carbon\Carbon::parse($detail->doe_passport)->format('d F, Y') }}</td>
                                </tr>
                            @endforeach
                        </table>
                    </td>
                </tr>
            </table>
          </div>
      </div>

  </div>
  <!-- /.container-fluid -->
@endsection
