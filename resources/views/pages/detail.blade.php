@extends('layouts.detail')

@section('title', 'Detail Travel')

@section('content')
    <!-- Header details -->
    <main>
        <section class="section-details-header"></section>
        <section class="section-details-content">
            <div class="container">
                <div class="row">
                    <div class="col p-0">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item" aria-current="page">Paket Travel</li>
                                <li class="breadcrumb-item active" aria-current="page">Details</li>
                            </ol>
                        </nav>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8 pl-lg-0">
                        <div class="card card-details">
                            <h1>{{ $item->title }}</h1>
                            <p>{{ $item->location }}</p>

                            @if ($item->galleries->count())
                                <div class="gallery">
                                    <div class="xzoom-container">
                                        <div class="card">
                                            <img class="xzoom" id="xzoom-default"
                                            src="{{ Storage::url($item->galleries->first()->image) }}"
                                            xoriginal="{{ Storage::url($item->galleries->first()->image) }}" />
                                        </div>
                                    </div>
                                    <div class="xzoom-thumbs my-2">
                                        @foreach ($item->galleries as $gallery)
                                        <a href="{{ Storage::url($gallery->image) }}">
                                            <img
                                            src="{{ Storage::url($gallery->image) }}"
                                            class="xzoom-gallery" width="128"
                                            xpreview="{{ Storage::url($gallery->image) }}" />
                                        </a>
                                        @endforeach
                                    </div>
                                </div>
                            @endif
                            <h2>Tentang Wisata</h2>
                                <p>
                                   {!! $item->about !!}
                                </p>
                            <div class="features row">
                                <div class="col-md-4">
                                    <div class="description">
                                        <img src="{{ url('frontend/images/icon/ic_event.png') }}" alt="Ticket" class="featured-image" />
                                        <div class="description">
                                            <h3>Featured Event</h3>
                                            <p>{{ $item->featured_event }}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 border-left">
                                    <div class="description">
                                        <img src="{{ url('frontend/images/icon/ic_language.png') }}" alt="" class="featured-image" />
                                        <div class="description">
                                            <h3>Language</h3>
                                            <p>{{ $item->language }}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 border-left">
                                    <div class="description">
                                        <img src="{{ url('frontend/images/icon/ic_food.png') }}" alt="" class="featured-image" />
                                        <div class="description">
                                            <h3>Foods</h3>
                                            <p>{{ $item->foods }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="card card-details card-right">
                            <h2>Members are going</h2>
                            <div class="members my-2">
                                <img src="{{ url('frontend/images/user/pic-1.png') }}" class="member-image rounded-circle mr-1" />
                                <img src="{{ url('frontend/images/user/pic-2.png') }}" class="member-image rounded-circle mr-1" />
                                <img src="{{ url('frontend/images/user/pic-3.png') }}" class="member-image rounded-circle mr-1" />
                                <img src="{{ url('frontend/images/icon/member.jpg') }}" class="member-image rounded-circle mr-1" />
                            </div>
                            <hr />
                            <h2>Trip Information</h2>
                            <table class="trip-information">
                                <tr>
                                    <th width="50%">Date of Depature</th>
                                    <td width="50%" class="text-right">{{ \Carbon\Carbon::parse($item->date_of_depature)->format('F d, Y') }}</td>
                                </tr>
                                <tr>
                                    <th width="50%">Duration</th>
                                    <td width="50%" class="text-right">{{ $item->duration }}</td>
                                </tr>
                                <tr>
                                    <th width="50%">Type</th>
                                    <td width="50%" class="text-right">{{ $item->type }}</td>
                                </tr>
                                <tr>
                                    <th width="50%">Price</th>
                                    <td width="50%" class="text-right">@currency($item->price) / person</td>
                                </tr>
                            </table>
                        </div>
                        <div class="join-container">
                           @auth
                                <form action="{{ route('checkout_process', $item->id) }}" method="POST">
                                    @csrf
                                    <button class="btn btn-join-now btn-block mt-3 py-2" type="submit">
                                        Join Now
                                    </button>
                                </form>
                           @endauth
                           @guest
                                <a href="{{ route('login') }}" class="btn btn-join-now btn-block mt-3 py-2 mx-md-1">Login / Register To Join</a>
                           @endguest
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <!-- End Header -->
@endsection

@push('prepend-style')
    <!-- Xzomm CSS -->
    <link rel="stylesheet" href="{{ url('frontend/libraries/xzoom/xzoom.css') }}" />
@endpush

@push('addon-script')
     <!-- Xzoom -->
     <script src="{{ url('frontend/libraries/xzoom/xzoom.min.js') }}"></script>

     <!-- Script Xzoom -->
     <script>
         $(document).ready(function() {
             $('.xzoom, .xzoom-gallery').xzoom({
                 zoomWidth: 500,
                 title: false,
                 tint: '#333',
                 Xoffset: 15,
             });
         });
     </script>
@endpush
