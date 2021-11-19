@extends('layouts.admin')

@section('title','Travel Package')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

      <!-- Page Heading -->
      <div class="d-sm-flex align-items-center justify-content-between mb-4">
          <h1 class="h3 mb-0 text-gray-800">Travel Package</h1>
          <a href="{{ route('travel-package.create') }}" class="btn btn-sm btn-outline-primary shadow-lg">
              <i class="fas fa-plus-circle fa-sm"></i> Add Travel Package
          </a>
      </div>
      <div class="row">
          <div class="card-body shadow-lg border-bottom-danger">
              @if (session()->has('pesan'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('pesan') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                @endif
                <div class="table-responsive">
                    <table class="table table-hover table-bordered table-striped">
                        <thead>
                            <tr>
                            <th class="text-center">#</th>
                            <th class="text-center">Title</th>
                            <th class="text-center">Location</th>
                            <th class="text-center">Type</th>
                            <th>Departure Date</th>
                            <th class="text-center">Price</th>
                            <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($items as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->title }}</td>
                                <td>{{ $item->location }}</td>
                                <td>{{ $item->type }}</td>
                                <td>{{ \Carbon\Carbon::parse($item->departure_date)->format('d F, Y') }}</td>
                                <td>@currency($item->price)</td>
                                <td class="text-center">
                                    <a href="{{ route('travel-package.edit', $item->id) }}" class="btn btn-outline-primary btn-sm">
                                        <i class="far fa-fw fa-edit"></i>
                                    </a>
                                    <form action="{{ route('travel-package.destroy', $item->id) }}" method="post" class="d-inline">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger btn-sm border-0" onclick="return confirm('Are you sure?')">
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
