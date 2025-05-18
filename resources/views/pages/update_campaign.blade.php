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
        <h1 class="page-title">Update Campaign</h1>
        <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="javascript:void(0);">Admin</a></li>
            <li class="breadcrumb-item"><a href="javascript:void(0);">Campaigns</a></li>
            <li class="breadcrumb-item active">Update Campaign</li>
        </ol>
    </div>

    <div class="main-container container-fluid">
        <div class="row justify-content-center">
            <div class="col-xl-8">
                <form action="{{ route('campaigns.update', $campaign->id) }}" method="POST">
                    @csrf
                    @method('PUT') <!-- Important for PUT -->

                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Update Campaign</h3>
                        </div>
                        <div class="card-body">
                            <!-- Campaign Title -->
                            <div class="mb-3">
                                <label class="form-label fw-semibold">Campaign Title</label>
                                <input type="text" name="title" class="form-control" placeholder="Enter Campaign title"
                                    value="{{ old('title', $campaign->title) }}">
                            </div>

                            <!-- Wrap Type -->
                            <div class="mb-3">
                                <label class="form-label fw-semibold">Wrap Type</label>
                                <input type="text" name="wrap_type" class="form-control" placeholder="Enter Wrap Type"
                                    value="{{ old('wrap_type', $campaign->wrap_type) }}">
                            </div>

                            <div class="row">
                                <!-- Multiple Drivers -->
                                <div class="col-md-6 mb-3">
                                    <label class="form-label fw-semibold">Multiple Drivers</label>
                                    <select class="form-control" name="multiple_drivers" required>
                                        <option value="1" {{ old('multiple_drivers', $campaign->multiple_drivers) ? 'selected' : '' }}>True</option>
                                        <option value="0" {{ !old('multiple_drivers', $campaign->multiple_drivers) ? 'selected' : '' }}>False</option>
                                    </select>
                                </div>

                                <!-- Status -->
                                <div class="col-md-6 mb-3">
                                    <label class="form-label fw-semibold">Status</label>
                                    <select class="form-control" name="status" required>
                                        <option value="Pending" {{ old('status', $campaign->status) === 'Pending' ? 'selected' : '' }}>Pending</option>
                                        <option value="active" {{ old('status', $campaign->status) === 'active' ? 'selected' : '' }}>Active</option>
                                        <option value="expired" {{ old('status', $campaign->status) === 'expired' ? 'selected' : '' }}>Expired</option>
                                        <option value="ongoing" {{ old('status', $campaign->status) === 'ongoing' ? 'selected' : '' }}>Ongoing</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row">
                                <!-- Budget -->
                                <div class="col-md-6 mb-3">
                                    <label class="form-label fw-semibold">Budget</label>
                                    <div class="input-group">
                                        <span class="input-group-text">$</span>
                                        <input type="text" name="budget" class="form-control" placeholder="0.000 /-"
                                            value="{{ old('budget', $campaign->budget) }}">
                                    </div>
                                </div>

                                <!-- Duration -->
                                <div class="col-md-6 mb-3">
                                    <label class="form-label fw-semibold">Duration</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="ri-time-line"></i></span>
                                        <input type="text" name="time" class="form-control" id="time"
                                            placeholder="Enter duration" value="{{ old('time', $campaign->time) }}">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <!-- Start Date -->
                                <div class="col-md-6 mb-3">
                                    <label class="form-label fw-semibold">Start Date</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="ri-calendar-line"></i></span>
                                        <input type="text" name="start_date" class="form-control" id="start-date"
                                            placeholder="Choose date" value="{{ old('start_date', $campaign->start_date) }}"
                                            readonly>
                                    </div>
                                </div>

                                <!-- End Date -->
                                <div class="col-md-6 mb-3">
                                    <label class="form-label fw-semibold">End Date</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="ri-calendar-line"></i></span>
                                        <input type="text" name="end_date" class="form-control" id="end-date"
                                            placeholder="Choose date" value="{{ old('end_date', $campaign->end_date) }}"
                                            readonly>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-semibold">Select Locations (Cities)</label>
                                <select name="locations[]" id="locations" class="form-control" multiple="multiple"
                                    style="width: 100%;" required>
                                    <option value="new_york" {{ in_array('new_york', old('locations', $campaign->locations ?? [])) ? 'selected' : '' }}>New York</option>
                                    <option value="los_angeles" {{ in_array('los_angeles', old('locations', $campaign->locations ?? [])) ? 'selected' : '' }}>Los Angeles</option>
                                    <option value="london" {{ in_array('london', old('locations', $campaign->locations ?? [])) ? 'selected' : '' }}>London</option>
                                    <option value="tokyo" {{ in_array('tokyo', old('locations', $campaign->locations ?? [])) ? 'selected' : '' }}>Tokyo</option>
                                    <option value="paris" {{ in_array('paris', old('locations', $campaign->locations ?? [])) ? 'selected' : '' }}>Paris</option>
                                    <option value="sydney" {{ in_array('sydney', old('locations', $campaign->locations ?? [])) ? 'selected' : '' }}>Sydney</option>
                                    <option value="berlin" {{ in_array('berlin', old('locations', $campaign->locations ?? [])) ? 'selected' : '' }}>Berlin</option>
                                    <option value="mumbai" {{ in_array('mumbai', old('locations', $campaign->locations ?? [])) ? 'selected' : '' }}>Mumbai</option>
                                    <option value="beijing" {{ in_array('beijing', old('locations', $campaign->locations ?? [])) ? 'selected' : '' }}>Beijing</option>
                                    <option value="moscow" {{ in_array('moscow', old('locations', $campaign->locations ?? [])) ? 'selected' : '' }}>Moscow</option>
                                </select>
                                <small class="form-text text-muted">You can select multiple cities and search by city
                                    name.</small>
                            </div>
                        </div>

                        <div class="card-footer d-flex justify-content-end">
                            <a href="{{ url()->previous() }}" class="btn btn-light me-2">Discard</a>
                            <button type="submit" class="btn btn-primary">Update Campaign</button>
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