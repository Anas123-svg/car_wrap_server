@extends('layouts.master')

@section('styles')
    <!-- Flatpickr Airbnb Theme for better UI -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/themes/airbnb.css">

    <link rel="stylesheet" href="{{ asset('build/assets/libs/quill/quill.snow.css') }}">
    <link rel="stylesheet" href="{{ asset('build/assets/libs/quill/quill.bubble.css') }}">
    <link rel="stylesheet" href="{{ asset('build/assets/libs/filepond/filepond.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('build/assets/libs/filepond-plugin-image-preview/filepond-plugin-image-preview.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('build/assets/libs/filepond-plugin-image-edit/filepond-plugin-image-edit.min.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css" />

    <!-- Select2 CSS for searchable multi-select -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

    <!-- Custom Style for UI -->
    <style>
        /* General popup style */
        .flatpickr-calendar {
            padding: 10px 0;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
            min-width: 280px;
            /* slightly wider for clock */
        }

        /* Hide seconds input since enableSeconds: false */
        .flatpickr-time .flatpickr-second {
            display: none !important;
        }

        /* Style the time input boxes */
        .flatpickr-time input {
            width: 40px;
            height: 34px;
            font-size: 14px;
            text-align: center;
            border: 1px solid #ccc;
            border-radius: 6px;
            background-color: #fff;
            padding: 0 4px;
        }
    </style>
@endsection

@section('content')
    <div class="page-header d-flex align-items-center justify-content-between border-bottom mb-4">
        <h1 class="page-title">Add Campaign</h1>
        <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="javascript:void(0);">Admin</a></li>
            <li class="breadcrumb-item"><a href="javascript:void(0);">Campaigns</a></li>
            <li class="breadcrumb-item active">Add Campaign</li>
        </ol>
    </div>

    <div class="main-container container-fluid">
        <div class="row justify-content-center">
            <div class="col-xl-8">
                <form action="{{ route('campaigns.store') }}" method="POST">
                    @csrf
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Add New Campaign</h3>
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <label class="form-label fw-semibold">Campaign Title</label>
                                <input type="text" name="title" class="form-control" placeholder="Enter Campaign title"
                                    required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-semibold">Wrap Type</label>
                                <input type="text" name="wrap_type" class="form-control" placeholder="Enter Wrap Type"
                                    required>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label fw-semibold">Multiple Drivers</label>
                                    <select class="form-control" name="multiple_drivers" required>
                                        <option value="1">True</option>
                                        <option value="0">False</option>
                                    </select>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label class="form-label fw-semibold">Status</label>
                                    <select class="form-control" name="status" required>
                                        <option value="Pending">Pending</option>
                                        <option value="active">Active</option>
                                        <option value="expired">Expired</option>
                                        <option value="ongoing">Ongoing</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label fw-semibold">Budget</label>
                                    <div class="input-group">
                                        <span class="input-group-text">$</span>
                                        <input type="text" name="budget" class="form-control" placeholder="0.000 /-"
                                            required>
                                    </div>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label class="form-label fw-semibold">Duration</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="ri-time-line"></i></span>
                                        <input type="text" name="duration" class="form-control" id="duration"
                                            placeholder="Enter duration" required>
                                    </div>
                                </div>

                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label fw-semibold">Start Date</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="ri-calendar-line"></i></span>
                                        <input type="text" name="start_date" class="form-control" id="start-date"
                                            placeholder="Choose date" readonly required>
                                    </div>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label class="form-label fw-semibold">End Date</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="ri-calendar-line"></i></span>
                                        <input type="text" name="end_date" class="form-control" id="end-date"
                                            placeholder="Choose date" readonly required>
                                    </div>
                                </div>
                            </div>

                            <!-- New Multi-select searchable field for Locations -->
                            <div class="mb-3">
                                <label class="form-label fw-semibold">Select Locations (Cities)</label>
                                <select name="locations[]" id="locations" class="form-control" multiple="multiple"
                                    style="width: 100%;" required>
                                    <option value="new_york">New York</option>
                                    <option value="los_angeles">Los Angeles</option>
                                    <option value="london">London</option>
                                    <option value="tokyo">Tokyo</option>
                                    <option value="paris">Paris</option>
                                    <option value="sydney">Sydney</option>
                                    <option value="berlin">Berlin</option>
                                    <option value="mumbai">Mumbai</option>
                                    <option value="beijing">Beijing</option>
                                    <option value="moscow">Moscow</option>
                                </select>
                                <small class="form-text text-muted">You can select multiple cities and search by city
                                    name.</small>
                            </div>
                        </div>

                        <div class="card-footer d-flex justify-content-end">
                            <a href="{{ url()->previous() }}" class="btn btn-light me-2">Discard</a>
                            <button type="submit" class="btn btn-primary">Add Campaign</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('build/assets/libs/quill/quill.min.js') }}"></script>
    <script src="{{ asset('build/assets/libs/@simonwep/pickr/pickr.es5.min.js') }}"></script>
    <script src="{{ asset('build/assets/libs/filepond/filepond.min.js') }}"></script>
    <script
        src="{{ asset('build/assets/libs/filepond-plugin-image-preview/filepond-plugin-image-preview.min.js') }}"></script>
    <script
        src="{{ asset('build/assets/libs/filepond-plugin-image-exif-orientation/filepond-plugin-image-exif-orientation.min.js') }}"></script>
    <script
        src="{{ asset('build/assets/libs/filepond-plugin-file-validate-size/filepond-plugin-file-validate-size.min.js') }}"></script>
    <script src="{{ asset('build/assets/libs/filepond-plugin-file-encode/filepond-plugin-file-encode.min.js') }}"></script>
    <script src="{{ asset('build/assets/libs/filepond-plugin-image-edit/filepond-plugin-image-edit.min.js') }}"></script>
    <script
        src="{{ asset('build/assets/libs/filepond-plugin-file-validate-type/filepond-plugin-file-validate-type.min.js') }}"></script>
    <script src="{{ asset('build/assets/libs/filepond-plugin-image-crop/filepond-plugin-image-crop.min.js') }}"></script>
    <script
        src="{{ asset('build/assets/libs/filepond-plugin-image-resize/filepond-plugin-image-resize.min.js') }}"></script>
    <script
        src="{{ asset('build/assets/libs/filepond-plugin-image-transform/filepond-plugin-image-transform.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

    <!-- Include jQuery (required for Select2) -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Include Select2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            // Time Picker with Clock UI
            flatpickr("#time", {
                enableTime: true,
                noCalendar: true,
                dateFormat: "H:i",
                time_24hr: true,
                enableSeconds: false,
            });

            // Date Pickers
            flatpickr("#start-date", {
                dateFormat: "Y-m-d"
            });

            flatpickr("#end-date", {
                dateFormat: "Y-m-d"
            });

            // Initialize Select2 on locations multi-select
            $('#locations').select2({
                placeholder: "Select cities",
                allowClear: true,
                width: 'resolve'
            });
        });
    </script>

    @vite('resources/assets/js/add-products.js')
@endsection