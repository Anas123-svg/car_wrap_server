@extends('layouts.master')

@section('styles')
@endsection

@section('content')
    <!-- PAGE-HEADER -->
    <div class="page-header d-flex align-items-center justify-content-between border-bottom mb-4">
        <h1 class="page-title">Settings</h1>
        <div>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">Extension</a></li>
                <li class="breadcrumb-item active" aria-current="page">Settings</li>
            </ol>
        </div>
    </div>
    <!-- PAGE-HEADER END -->

    <!-- CONTAINER -->
    <div class="main-container container-fluid">
        <!-- ROW-1 OPEN -->
        <div class="row justify-content-center">
            <div class="col-lg-7 col-xl-10 col-xxl-8">
                <div class="card custom-card">
                    <form action="{{ isset($admin) ? route('admins.update', $admin->id) : route('admins.store') }}"
                        method="POST" enctype="multipart/form-data" id="admin-form">
                        @csrf
                        @if(isset($admin))
                            @method('PUT')
                        @endif
                        @csrf

                        <!-- Hidden input to store Cloudinary uploaded image URL -->
                        <input type="hidden" name="profile_photo" id="photo-url" value="{{ $admin->profile_photo ?? '' }}">

                        <div class="card-body p-0">
                            <div class="tab-content">
                                <div class="tab-pane show active fs-13 p-5" id="personal-info" role="tabpanel">
                                    <div class="d-flex align-items-center justify-content-center flex-wrap gap-2">
                                        <div class="d-sm-flex align-items-center flex-wrap gap-2 justify-content-center">
                                            <div class="mb-0 me-5 d-flex align-items-center justify-content-center">
                                                <span class="avatar-xl rounded-circle position-relative">
                                                    <img src="{{ $admin->profile_photo ?: asset('build/assets/images/users/15.jpg') }}"
                                                        alt="Profile Image" class="avatar-xl rounded-circle"
                                                        id="profile-img">
                                                    <a href="javascript:void(0);"
                                                        class="badge position-absolute rounded-pill bg-primary tx-fixed-white avatar-icons">
                                                        <input type="file" name="photo_file" accept="image/*"
                                                            class="position-absolute w-100 h-100 op-0" id="profile-change">
                                                        <i class="fe fe-camera lh-base"></i>
                                                    </a>
                                                </span>
                                            </div>
                                        </div>
                                    </div>

                                    <h6 class="mt-4">Personal Information :</h6>
                                    <div class="row gy-4 mb-4">
                                        <div class="col-xl-6">
                                            <label for="first-name" class="form-label">Name</label>
                                            <input type="text" name="name" class="form-control" id="first-name"
                                                value="{{ $admin->name }}" required>
                                        </div>
                                        <div class="col-xl-6">
                                            <label for="email-address" class="form-label">Email Address</label>
                                            <input type="email" name="email" class="form-control" id="email-address"
                                                value="{{ $admin->email }}" required>
                                        </div>
                                    </div>
                                    <div class="row gy-4 mb-4">
                                        <div class="col-xl-6">
                                            <label for="phone" class="form-label">Phone Number</label>
                                            <input type="text" name="phone" class="form-control" id="phone"
                                                value="{{ $admin->phone }}" required>
                                        </div>
                                        <div class="col-xl-6">
                                            <label for="role-select" class="form-label">Role</label>
                                            <select class="form-control" name="role" id="role-select" required>
                                                <option value="Admin" {{ $admin->role == 'Admin' ? 'selected' : '' }}>Admin
                                                </option>
                                                <option value="SuperAdmin" {{ $admin->role == 'SuperAdmin' ? 'selected' : '' }}>SuperAdmin</option>
                                                <option value="Manager" {{ $admin->role == 'Manager' ? 'selected' : '' }}>
                                                    Manager</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row gy-4 mb-4">
                                        <div class="col-xl-6">
                                            <label for="password" class="form-label">Password</label>
                                            <input type="password" name="password" class="form-control" id="password"
                                                placeholder="Password" required>
                                        </div>
                                        <div class="col-xl-6">
                                            <label for="confirmation_password" class="form-label">Confirm Password</label>
                                            <input type="password" name="password_confirmation" class="form-control"
                                                id="confirmation_password" 
                                                placeholder="Confirm Password" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card-footer">
                            <div class="float-end">
                                <button class="btn btn-light m-1" type="reset">Reset All</button>
                                <button class="btn btn-primary m-1" type="submit" id="submit-btn">Save Changes</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- ROW-1 CLOSED -->
    </div>
    <!-- CONTAINER CLOSED -->
@endsection

@section('scripts')
    <script>
        document.getElementById('profile-change').addEventListener('change', async function (event) {
            const file = event.target.files[0];
            if (!file) return;

            const cloudName = 'dfkblx72b'; // Replace with your Cloudinary cloud name
            const unsignedUploadPreset = 'needle-assets'; // Replace with your unsigned upload preset name

            const url = `https://api.cloudinary.com/v1_1/${cloudName}/upload`;

            const formData = new FormData();
            formData.append('file', file);
            formData.append('upload_preset', unsignedUploadPreset);

            // Disable submit button while uploading
            const submitBtn = document.getElementById('submit-btn');
            submitBtn.disabled = true;
            submitBtn.textContent = 'Uploading image...';

            try {
                const response = await fetch(url, {
                    method: 'POST',
                    body: formData
                });

                const data = await response.json();

                if (data.secure_url) {
                    document.getElementById('photo-url').value = data.secure_url;

                    document.getElementById('profile-img').src = data.secure_url;
                } else {
                    alert('Image upload failed: ' + (data.error?.message || 'Unknown error'));
                }
            } catch (error) {
                alert('Upload error: ' + error.message);
            } finally {
                submitBtn.disabled = false;
                submitBtn.textContent = 'Save Changes';
            }
        });
    </script>
@endsection