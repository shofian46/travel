@extends('layouts.admin')

@section('title','Transaction')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

      <!-- Page Heading -->
      <div class="d-sm-flex align-items-center justify-content-between mb-4">
          <h1 class="h3 mb-0 text-gray-800">Transaction</h1>
      </div>
      <div class="row">
          <div class="card-body shadow-lg border-bottom-primary">
              @if (session()->has('pesan'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('pesan') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                @endif
                <div class="table-responsive-sm">
                    <table class="table table-hover table-bordered table-striped">
                        <thead>
                            <tr>
                            <th class="text-center">#</th>
                            <th class="text-center">Travel</th>
                            <th class="text-center">User</th>
                            <th class="text-center">Visa</th>
                            <th class="text-center">Total</th>
                            <th class="text-center">Status</th>
                            <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($items as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->travel_package->title }}</td>
                                <td>{{ $item->user->name }}</td>
                                <td>@currency($item->additional_visa)</td>
                                <td>@currency($item->transaction_total)</td>
                                <td>{{ $item->transaction_status }}</td>
                                <td class="text-center">
                                    <a href="{{ route('transaction.show', $item->id) }}" class="btn btn-outline-warning btn-sm mb-2">
                                        <i class="fa fa-fw fa-eye"></i>
                                    </a>
                                    <a href="{{ route('transaction.edit', $item->id) }}" class="btn btn-outline-primary btn-sm mb-2">
                                        <i class="far fa-fw fa-edit"></i>
                                    </a>
                                    <form action="{{ route('transaction.destroy', $item->id) }}" method="post" class="d-inline">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger btn-sm border-0 mb-2" onclick="return confirm('Are you sure?')">
                                        <i class="fas fa-fw fa-dumpster"></i>
                                    </button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="text-center">Data Kosong</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
        </div>
      </div>

  </div>
  <!-- /.container-fluid -->
@endsection
