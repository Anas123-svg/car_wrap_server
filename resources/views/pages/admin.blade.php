@extends('layouts.master')

@section('styles')

@endsection
@section('content')

    <!-- PAGE-HEADER -->
    <div class="page-header d-flex align-items-center justify-content-between border-bottom mb-4">
        <h1 class="page-title">Drivers List</h1>
        <div>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">Admin UI</a></li>
                <li class="breadcrumb-item active" aria-current="page">Admins List</li>
            </ol>
        </div>
    </div>
    <!-- PAGE-HEADER END -->

    <!-- CONTAINER -->
    <div class="main-container container-fluid">

        <!-- ROW OPEN -->
        <div class="row row-cards">
            <div class="col-xl-12">
                <div class="card p-0">
                    <div class="card-body p-4">
                        <div class="row align-items-center">
                            <div class="col-xl-5 col-lg-8 col-md-8 col-sm-8">
                                <form method="GET" action="{{ route('admins.index') }}" id="searchForm">
                                    <div class="input-group w-500">
                                        <input type="text" class="form-control" name="search"
                                            value="{{ request('search') }}" placeholder="Search by name, email or phone"
                                            aria-describedby="button-addon2" id="searchInput">
                                        <button class="btn border" type="submit" id="button-addon2">
                                            <i class="bi bi-search text-muted"></i>
                                        </button>
                                    </div>
                                </form>

                                <script>
                                    document.getElementById('searchInput').addEventListener('input', function () {
                                        clearTimeout(this.delay);
                                        this.delay = setTimeout(function () {
                                            document.getElementById('searchForm').submit();
                                        }.bind(this), 500);
                                    });
                                </script>


                            </div>
                            <div class="col-xl-5 col-lg-4 col-md-4 col-sm-4"></div>
                            <div class="col-xl-2 col-lg-12">
                                <a href="{{ url('add/admin') }}" class="btn btn-primary btn-block float-end my-2">
                                    <i class="fa fa-plus-square me-2"></i>Add Admin
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-content mb-5">
                <div class="tab-pane active" id="tab-11">
                    <div class="card">
                        <div class="card-header border-bottom-0 px-5 d-flex justify-content-between align-items-center">
                            <h2 class="card-title mb-0">
                                {{ $admins->firstItem() }} - {{ $admins->lastItem() }} of {{ $admins->total() }}
                                Admins{{ $admins->total() > 1 ? 's' : '' }}
                            </h2>

                            <form method="GET" action="">
                                <input type="hidden" name="search" value="{{ request('search') }}">
                                <div class="col-md-3">
                                    <select class="form-control" name="role" style="min-width: 130px;"
                                        onchange="this.form.submit()">
                                        <option value="">All</option>
                                        <option value="Admin" {{ request('role') == 'Admin' ? 'selected' : '' }}>Admin
                                        </option>
                                        <option value="SuperAdmin" {{ request('role') == 'SuperAdmin' ? 'selected' : '' }}>
                                            SuperAdmin</option>
                                        <option value="Manager" {{ request('role') == 'Manager' ? 'selected' : '' }}>Manager
                                        </option>
                                    </select>
                                </div>
                            </form>
                        </div>

                        <div class="e-table px-5 pb-5">
                            <div class="table-responsive table-lg">
                                <table class="table border-top table-bordered mb-0 text-nowrap">
                                    <thead>
                                        <tr>
                                            <th class="text-center">ID</th>
                                            <th>Name</th>
                                            <th>email</th>
                                            <th>role</th>
                                            <th>created at</th>
                                            <th class="text-center">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($admins as $admin)
                                            <tr class="user-list">
                                                <td class="align-middle text-center">
                                                    {{ $admin->id }}
                                                </td>

                                                <td class="align-middle text-center">
                                                    <div class="d-flex align-items-center flex-wrap gap-1">
                                                        <img alt="Driver Profile" class="avatar avatar-sm br-7 me-2"
                                                            src="{{ $admin->profile_photo ?? asset('build/assets/images/drivers/default.jpg') }}">

                                                        <p class="text-nowrap align-middle mb-0">{{ $admin->name }}</p>
                                                    </div>
                                                </td>
                                                <td class="text-nowrap align-middle">{{ $admin->email }}</td>
                                                <td class="text-nowrap align-middle">{{ $admin->role }}</td>

                                                <td class="text-nowrap align-middle">
                                                    <span>{{ $admin->created_at->format('d M Y') }}</span>
                                                </td>

                                                <td class="align-middle text-center">
                                                    <div class="btn-list">
                                                        <!--   <button
                                                                    class="btn btn-sm btn-icon btn-info-light rounded-circle edit-driver-btn"
                                                                    data-bs-toggle="modal" data-bs-target="#user-form-modal">
                                                                    <i class="bi bi-pencil-square"></i>
                                                                </button> -->
                                                        <button class="btn btn-sm btn-icon btn-secondary-light rounded-circle"
                                                            type="button" data-bs-toggle="modal"
                                                            data-bs-target="#deleteUserModal" data-user-id="{{ $admin->id }}">
                                                            <i class="bi bi-trash"></i>
                                                        </button>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-end">
                        {{ $admins->links('pagination::bootstrap-5') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('modals.user-form-modal')
    @include('modals.delete_admin_modal')

@endsection

@section('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const editButtons = document.querySelectorAll('.edit-driver-btn');

            editButtons.forEach(button => {
                button.addEventListener('click', function () {
                    document.getElementById('user-id').value = this.dataset.id || '';
                    document.getElementById('user-name').value = this.dataset.name || '';
                    document.getElementById('user-email').value = this.dataset.email || '';
                    document.getElementById('user-phone').value = this.dataset.phone || '';
                    document.getElementById('user-status').value = this.dataset.status || 'active';

                    const licencePhoto = this.dataset.licencePhoto;
                    const profilePhoto = this.dataset.profilePhoto;

                    document.getElementById('licence-preview').src = licencePhoto ? licencePhoto : '{{ asset("build/assets/images/defaults/default-licence.jpg") }}';
                    document.getElementById('profile-preview').src = profilePhoto ? profilePhoto : '{{ asset("build/assets/images/drivers/default.jpg") }}';

                    // Parse vehicles JSON (assuming dataset.vehicles is JSON string)
                    let vehicles = [];
                    try {
                        vehicles = JSON.parse(this.dataset.vehicles || '[]');
                    } catch (e) {
                        vehicles = [];
                    }

                    const firstVehicle = vehicles[0] || {};

                    document.getElementById('vehicle-name').value = firstVehicle.name || '';
                    document.getElementById('vehicle-no').value = firstVehicle.vehicle_no || '';
                    document.getElementById('vehicle-type').value = firstVehicle.vehicle_type || '';

                    // Render images in slider
                    renderVehicleImages(firstVehicle.vehicle_images);
                });
            });

            function renderVehicleImages(images) {
                const slider = document.getElementById('vehicle-images-slider');
                slider.innerHTML = ''; // Clear existing images

                if (Array.isArray(images) && images.length > 0) {
                    images.forEach(url => {
                        const img = document.createElement('img');
                        img.src = url;
                        img.alt = 'Vehicle Image';
                        slider.appendChild(img);
                    });
                } else {
                    slider.innerHTML = '<p style="color:#777;">No vehicle images available.</p>';
                }
            }
        });

    </script>


@endsection