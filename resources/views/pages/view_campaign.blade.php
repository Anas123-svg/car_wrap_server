@extends('layouts.master')

@section('styles')
@endsection

@section('content')

    <!-- PAGE-HEADER -->
    <div class="page-header d-flex align-items-center justify-content-between border-bottom mb-4">
        <h1 class="page-title">Campaign Details</h1>

        <div>

            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">Admin</a></li>
                <li class="breadcrumb-item"><a href="javascript:void(0);">Campaigns</a></li>
                <li class="breadcrumb-item active" aria-current="page">details</li>
            </ol>
        </div>
    </div>
    <div class="main-container container-fluid">

        <!-- ROW-1 OPEN -->
        <div class="row">
            <div class="col-xxl-9 col-xl-12 col-lg-12">
                <div class="card cart">

                    <div class="row mb-3 px-3">
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Campaign Title</label>
                            <input type="text" name="title" class="form-control" placeholder="Enter Campaign title"
                                value="{{ $campaign->title }}" readonly>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Wrap Type</label>
                            <input type="text" name="wrap_type" class="form-control" placeholder="Enter Wrap Type"
                                value="{{ $campaign->wrap_type }}" readonly>
                        </div>
                    </div>
                    <div class="row mb-3 px-3">
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Multiple Drivers</label>
                            <input type="text" name="multiple_drivers" class="form-control"
                                value="{{ $campaign->multiple_drivers == 1 ? 'Yes' : 'No' }}" readonly>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Status</label>
                            <input type="text" name="Status" class="form-control" placeholder="Enter Status"
                                value="{{ $campaign->status }}" readonly>
                        </div>
                    </div>
                    <div class="row mb-3 px-3">
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Budget</label>
                            <div class="input-group">
                                <span class="input-group-text">$</span>
                                <input type="text" name="budget" class="form-control" placeholder="0.000 /-"
                                    value="{{ $campaign->budget }}" readonly>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Duration</label>
                            <input type="text" name="Duration" class="form-control" value="{{ $campaign->time }}" readonly>
                        </div>
                    </div>
                    <div class="row mb-3 px-3">
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Start Date</label>
                            <input type="text" name="start_date" class="form-control" value="{{ $campaign->start_date }}"
                                readonly>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">End Date</label>
                            <input type="text" name="end_date" class="form-control" value="{{ $campaign->end_date }}"
                                readonly>
                        </div>
                    </div>
                    <div class="mb-3 px-3">
                        <label class="form-label fw-semibold">Selected Locations (Cities)</label>
                        <div class="form-control bg-light" style="min-height: 50px;">
                            @foreach ($campaign->locations as $city)
                                <span class="badge bg-primary me-1 mb-1">{{ ucfirst(str_replace('_', ' ', $city)) }}</span>
                            @endforeach
                        </div>
                        <small class="form-text text-muted">These are the cities selected for this campaign.</small>
                    </div>



                    <div class="e-table px-5 pb-5">
                        <div class="table-responsive table-lg">
                            <table class="table border-top table-bordered mb-0 text-nowrap">
                                <thead>
                                    <tr>
                                        <th class="text-center">ID</th>
                                        <th>Driver</th>
                                        <th>Email</th>
                                        <th>Status</th>
                                        <th>Created At</th>
                                        <th class="text-center">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($campaign->users as $user)
                                        <tr class="user-list">
                                            <td class="align-middle text-center">
                                                {{ $user->id }}
                                            </td>

                                            <td class="align-middle">
                                                <div class="d-flex align-items-center flex-wrap gap-1">
                                                    <img alt="Driver Profile" class="avatar avatar-sm br-7 me-2"
                                                        src="{{ $user->profile_photo ?? asset('build/assets/images/drivers/default.jpg') }}">
                                                    <p class="text-nowrap align-middle mb-0">{{ $user->name }}</p>
                                                </div>
                                            </td>

                                            <td class="text-nowrap align-middle">{{ $user->email }}</td>

                                            <td class="text-nowrap align-middle">
                                                <span
                                                    class="badge bg-{{ $user->pivot->status === 'active' ? 'success' : 'warning' }}-transparent">
                                                    {{ ucfirst($user->pivot->status) }}
                                                </span>
                                            </td>

                                            <td class="text-nowrap align-middle">
                                                <span>{{ $user->pivot->created_at->format('d M Y') }}</span>
                                            </td>

                                            <td class="align-middle text-center">
                                                <div class="btn-list">
                                                    <button class="btn btn-sm btn-icon btn-info-light rounded-circle"
                                                        type="button">
                                                        <i class="bi bi-eye"></i>
                                                    </button>
                                                    <button class="btn btn-sm btn-icon btn-secondary-light rounded-circle"
                                                        type="button" data-bs-toggle="modal" data-bs-target="#deleteUserModal"
                                                        data-user-id="{{ $user->id }}">
                                                        <i class="bi bi-trash"></i>
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="6" class="text-center">No users assigned to this campaign.</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xxl-3 col-xl-12 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Cart Totals</div>
                    </div>
                    <div class="card-body pb-3">
                        <p class="mb-0 fw-bold">Have a Coupon code ?</p>
                        <div class="mb-3 mt-2">
                            <div class="input-group mb-1">
                                <input type="text" class="form-control" placeholder="Enter Coupon Code here...">
                                <span class="input-group-text btn btn-primary">Apply Coupon</span>
                            </div>
                        </div>
                        <div>
                            <table class="table table-borderless text-nowrap mb-0">
                                <tbody>
                                    <tr>
                                        <td class="text-start fs-16 fw-bold py-2">Sub Total</td>
                                        <td class="text-end py-2"><span class="fw-bold  ms-auto">$568</span></td>
                                    </tr>
                                    <tr>
                                        <td class="text-start py-2">Shipping Charges</td>
                                        <td class="text-end py-2"><span class="fw-bold text-green">0 (Free)</span></td>
                                    </tr>
                                    <tr>
                                        <td class="text-start py-2">Tax</td>
                                        <td class="text-end py-2"><span class="fw-bold text-danger">+ $39</span></td>
                                    </tr>
                                    <tr>
                                        <td class="text-start py-2">Coupon Discount</td>
                                        <td class="text-end py-2"><span class="fw-bold text-success">- $15%</span></td>
                                    </tr>
                                    <tr>
                                        <td class="text-start fs-18 py-2">Total Bill</td>
                                        <td class="text-end py-2"><span class="ms-2 fw-bold fs-23">$568</span></td>
                                    </tr>
                                </tbody>
                            </table>
                            <div>
                                <a href="{{url('checkout')}}" class="btn btn-success btn-lg btn-block">Proceed to Check
                                    out<i class="fa fa-arrow-right ms-1"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <a href="{{url('shop')}}" class="btn btn-secondary btn-lg btn-block"><i
                                class="fa fa-arrow-left me-1"></i>Return to Shopping</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- ROW-1 CLOSED -->

    </div>
@endsection

@section('scripts')

    <!-- Internal Cart JS -->
    @vite('resources/assets/js/cart.js')

@endsection