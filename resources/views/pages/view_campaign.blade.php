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
                        <small class="form-text text-muted">These are the requests to join the campaign.</small>
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
                                                {{ $user->pivot->id }}
                                            </td>

                                            <td class="align-middle">
                                                <div class="d-flex align-items-center flex-wrap gap-1">
                                                    <img alt="Driver Profile" class="avatar avatar-sm br-7 me-2"
                                                        src="{{ $user->profile_photo ?? asset('build/assets/images/drivers/default.jpg') }}">
                                                    <p class="text-nowrap align-middle mb-0">{{ $user->name }}</p>
                                                </div>
                                            </td>

                                            <td class="text-nowrap align-middle">{{ $user->email }}</td>

                                            <!-- Separate Status Column with Dropdown -->
                                            <td class="text-nowrap align-middle">
                                                <form action="{{ route('campaign-assigned.update-status', $user->pivot->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="dropdown">
                                                        <select name="status" class="form-select form-select-sm"
                                                            onchange="this.form.submit()">
                                                            <option value="active" {{ $user->pivot->status === 'active' ? 'selected' : '' }}>Active</option>
                                                            <option value="pending" {{ $user->pivot->status === 'pending' ? 'selected' : '' }}>Pending</option>
                                                            <option value="inactive" {{ $user->pivot->status === 'inactive' ? 'selected' : '' }}>Inactive</option>
                                                        </select>
                                                    </div>
                                                </form>
                                            </td>

                                            <td class="text-nowrap align-middle">
                                                <span>{{ $user->pivot->created_at->format('d M Y') }}</span>
                                            </td>
                                            <td class="align-middle text-center">
                                                <div class="btn-list">
                                                    <button class="btn btn-sm btn-icon btn-secondary-light rounded-circle"
                                                        type="button" data-bs-toggle="modal" data-bs-target="#deleteUserModal"
                                                        data-user-id="{{ $user->pivot->id }}">
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
        </div>
        <!-- ROW-1 CLOSED -->

    </div>
    @include('modals.delete_campain_assigned_user')

@endsection

@section('scripts')

    <!-- Internal Cart JS -->
    @vite('resources/assets/js/cart.js')

@endsection