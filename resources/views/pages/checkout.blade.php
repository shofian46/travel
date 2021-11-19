@extends('layouts.checkout')
@section('title','Chekout')
@section('content')
<main>
    <section class="section-details-header"></section>
    <section class="section-details-content">
        <div class="container">
            <div class="row">
                <div class="col p-0 pl-3 pl-lg-0">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item" aria-current="page">Paket Travel</li>
                            <li class="breadcrumb-item" aria-current="page">Details</li>
                            <li class="breadcrumb-item active" aria-current="page">Checkout</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 pl-lg-0">
                    <div class="card card-details mb-3">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <h1>Who is Going?</h1>
                        <p>Trip to {{ $item->travel_package->title }},{{ $item->travel_package->location }}</p>
                        <div class="attendee">
                            <table class="table table-responsive-sm text-center">
                                <thead>
                                    <tr>
                                        <td scope="col">Picture</td>
                                        <td scope="col">Name</td>
                                        <td scope="col">Nationality</td>
                                        <td scope="col">Visa</td>
                                        <td scope="col">Passport</td>
                                        <td scope="col"></td>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($item->details as $detail)
                                        <tr>
                                            <td>
                                                <img src="https://ui-avatars.com/api/?name={{ $detail->username }}" alt="" height="60" class="rounded-circle"/>
                                            </td>
                                            <td class="align-middle">{{ $detail->username }}</td>
                                            <td class="align-middle">{{ $detail->nationality }}</td>
                                            <td class="align-middle">{{ $detail->is_visa ? '30 Days':'N/A' }}</td>
                                            <td class="align-middle">{{ \Carbon\Carbon::createFromDate($detail->doe_passport) > \Carbon\Carbon::now() ? 'Active': 'Inactive' }}</td>
                                            <td class="align-middle">
                                                <a href="{{ route('checkout-remove',$detail->id) }}">
                                                    <img src="{{ url('frontend/images/ic_remove.png') }}" alt="" class="btn-remove" />
                                                </a>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td class="text-center" colspan="6">No Visitor</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                        <div class="member mt-3">
                            <h2>Add Member</h2>
                            <form class="form-inline user" method="POST" action="{{ route('checkout-create',$item->id) }}">
                                @csrf
                                <label class="sr-only" for="username">Name</label>
                                <input type="text" class="form-control form-control-user mb-1 pr-0 d-sm-block" id="username" name="username" placeholder="Username" />

                                <label class="sr-only" for="nationality">Nationality</label>
                                <input type="text" class="form-control my-1 mx-lg-2 form-control-user" style="width:110px" id="nationality" name="nationality" placeholder="Nationality" />

                                <label class="sr-only" class="mr-2" for="is_visa">Visa</label>
                                <select class="form-control mb-1 mx-lg-2 pr-0 custom-selected-user w-20 my-2" id="is_visa" name="is_visa">
                                    <option selected value="">VISA</option>
                                    <option value="1">30 Days</option>
                                    <option value="0">N/A</option>
                                </select>

                                <label class="sr-only" for="doe_passport">DOE Passport</label>
                                <div class="input-group mb-0 mr-sm-1 my-2">
                                    <input type="text" class="form-control datepicker" style="width: 110px" id="doe_passport" name="doe_passport" placeholder="DOE Passport" />
                                </div>

                                <button type="submit" class="btn btn-add-now mb-2 px-4">Add Now</button>
                            </form>
                            <h3 class="mt-2 mb-0">Note</h3>
                            <p class="disclaimer mb-0">You are only able to invite member that has registered in Nomads.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card card-details card-right">
                        <h2>Checkout Information</h2>
                        <table class="trip-informations">
                            <tr>
                                <th width="50%">Members</th>
                                <td width="50%" class="text-right">{{ $item->details->count() }} person</td>
                            </tr>
                            <tr>
                                <th width="50%">Additional Visa</th>
                                <td width="50%" class="text-right">@currency($item->additional_visa)</td>
                            </tr>
                            <tr>
                                <th width="50%">Trip Price</th>
                                <td width="50%" class="text-right">@currency($item->travel_package->price) / person</td>
                            </tr>
                            <tr>
                                <th width="50%">Sub Total</th>
                                <td width="50%" class="text-right">@currency($item->transaction_total)</td>
                            </tr>
                            <tr>
                                <th width="50%">Total (+Unique)</th>
                                <td width="50%" class="text-right text-total">
                                    <span class="text-blue">@currency($item->transaction_total),</span>
                                    <span class="text-orange">{{ mt_rand(0,99) }}</span>
                                </td>
                            </tr>
                        </table>

                        <hr />
                        <h2>Payment Instructions</h2>
                        <p class="payment-instructions">Please complete your payment before to continue the wonderful trip</p>
                        <div class="bank">
                            <div class="bank-item pb-3">
                                <img src="{{ url('frontend/images/ic_bank.png') }}" alt="" class="bank-image" />
                                <div class="description">
                                    <h3>PT SAF Travel</h3>
                                    <p>
                                        0881 8829 8800
                                        <br /> Bank Central Asia
                                    </p>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="bank-item pb-3">
                                <img src="{{ url('frontend/images/ic_bank.png') }}" alt="" class="bank-image" />
                                <div class="description">
                                    <h3>PT SAF Travel</h3>
                                    <p>
                                        0881 8829 8800
                                        <br /> Bank Central Asia
                                    </p>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                    <div class="join-container">
                        <a href="{{ route('checkout-success',$item->id) }}" class="btn btn-block btn-join-now mt-3 py-2">I Have Made Payment</a>
                    </div>
                    <div class="text-center mt-3 btn-cancel-booking">
                        <a href="{{ route('detail',$item->travel_package->slug) }}" class="text-muted text-decoration-none">Cancel Booking</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection
@push('prepend-style')
<link href="{{ url('frontend/libraries/gijgo/css/gijgo.min.css') }}" rel="stylesheet" type="text/css" />
@endpush

@push('addon-script')
<script src="{{ url('frontend/libraries/gijgo/js/gijgo.min.js') }}" type="text/javascript"></script>
<script>
    $(document).ready(function() {
        $('.datepicker').datepicker({
            format:'yyyy-mm-dd',
            uiLibrary: 'bootstrap4',
            icons: {
                rightIcon: '<img src="{{ url('frontend/images/ic_doe.png') }}" alt="" />',
            },
        });
    });
</script>
@endpush
