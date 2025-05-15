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
                <li class="breadcrumb-item active" aria-current="page">Drivers List</li>
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
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Search Email"
                                        aria-describedby="button-addon2">
                                    <button class="btn border" type="button" id="button-addon2"><i
                                            class="bi bi-search text-muted"></i></button>
                                </div>
                            </div>
                            <div class="col-xl-5 col-lg-4 col-md-4 col-sm-4">
                                <ul class="nav item2-gl-menu float-end my-2">
                                    <li class="border-end"><a href="#tab-11" class="show active" data-bs-toggle="tab"
                                            title="List style"><i class="fa fa-list"></i></a></li>
                                    <li><a href="#tab-12" data-bs-toggle="tab" class="" title="Grid"><i
                                                class="fa fa-th"></i></a></li>
                                </ul>
                            </div>
                            <div class="col-xl-2 col-lg-12">
                                <a href="javascript:void(0);" class="btn btn-primary btn-block float-end my-2"
                                    data-bs-toggle="modal" data-bs-target="#add-user"><i
                                        class="fa fa-plus-square me-2"></i>Add Driver</a>
                                <div class="modal fade" id="add-user" tabindex="-1" aria-labelledby="add-userLabel"
                                    aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h6 class="modal-title" id="add-userLabel">Add Driver</h6>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body px-4">
                                                <div class="row gy-3">
                                                    <div class="col-xl-12">
                                                        <label for="user-name" class="form-label">Driver Name</label>
                                                        <input type="text" class="form-control" id="user-name"
                                                            placeholder="Enter Name">
                                                    </div>
                                                    <div class="col-xl-12">
                                                        <label class="form-label">Designation</label>
                                                        <input type="text" class="form-control" id="user-designation"
                                                            placeholder="Enter Designation">
                                                    </div>
                                                    <div class="col-xl-12">
                                                        <div class="file-upload-text">
                                                            <input type="file" id="user-file-input" multiple>
                                                            <label for="user-file-input" class="text-primary fs-13">
                                                                <img src="{{asset('build/assets/images/users/22.jpg')}}"
                                                                    class="rounded-circle h-20p w-20p" alt="">
                                                                Upload Profile
                                                                <span class="text-muted"></span>
                                                            </label>
                                                            <i class="fa fa-times-circle remove"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-light"
                                                    data-bs-dismiss="modal">Cancel</button>
                                                <button type="button" class="btn btn-primary">Add Driver</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-content mb-5">
                <div class="tab-pane active" id="tab-11">
                    <div class="card">
                        <div class="card-header border-bottom-0 px-5">
                            <<h2 class="card-title">1 - {{ $drivers->count() }} of {{ $drivers->count() }}
                                Driver{{ $drivers->count() > 1 ? 's' : '' }}</h2>
                                <div class="page-options ms-auto">
                                    <select class="form-control select2 w-100">
                                        <option value="asc">Latest</option>
                                        <option value="desc">Oldest</option>
                                    </select>
                                </div>
                        </div>
                        <div class="e-table px-5 pb-5">
                            <div class="table-responsive table-lg">
                                <table class="table border-top table-bordered mb-0 text-nowrap">
                                    <thead>
                                        <tr>
                                            <th class="text-center">
                                                <div
                                                    class="custom-control custom-control-inline custom-checkbox custom-control-nameless m-0 align-top">
                                                    <input class="custom-control-input check-all" id="all-products"
                                                        type="checkbox"> <label class="custom-control-label"
                                                        for="all-products"></label>
                                                </div>
                                            </th>
                                            <th>Drivers</th>
                                            <th>Phone</th>
                                            <th>Status</th>
                                            <th>Date</th>
                                            <th class="text-center">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($drivers as $driver)
                                            <tr class="user-list">
                                                <td class="align-middle text-center user-checkbox">
                                                    <div
                                                        class="custom-control custom-control-inline custom-checkbox custom-control-nameless m-0 align-top">
                                                        <input class="custom-control-input" id="user{{ $loop->iteration }}"
                                                            type="checkbox">
                                                        <label class="custom-control-label"
                                                            for="user{{ $loop->iteration }}"></label>
                                                    </div>
                                                </td>
                                                <td class="align-middle text-center">
                                                    <div class="d-flex align-items-center flex-wrap gap-1">
                                                        <img alt="Driver Profile" class="avatar avatar-sm br-7 me-2"
                                                            src="{{ $driver->profile_photo ?? asset('build/assets/images/drivers/default.jpg') }}">

                                                        <p class="text-nowrap align-middle mb-0">{{ $driver->name }}</p>
                                                    </div>
                                                </td>
                                                <td class="text-nowrap align-middle">{{ $driver->phone }}</td>
                                                <td class="text-nowrap align-middle">
                                                    <span
                                                        class="badge bg-{{ $driver->status === 'active' ? 'success' : 'danger' }}-transparent">{{ ucfirst($driver->status) }}</span>
                                                </td>
                                                <td class="text-nowrap align-middle">
                                                    <span>{{ $driver->created_at->format('d M Y') }}</span>
                                                </td>

                                                <td class="align-middle">
                                                    <div class="btn-list">
                                                        <button
                                                            class="btn btn-sm btn-icon btn-info-light rounded-circle edit-driver-btn"
                                                            data-bs-toggle="modal" data-bs-target="#user-form-modal"
                                                            type="button" data-id="{{ $driver->id }}"
                                                            data-name="{{ e($driver->name) }}" data-email="{{ $driver->email }}"
                                                            data-phone="{{ $driver->phone }}"
                                                            data-licence-photo="{{ $driver->licence_photo }}"
                                                            data-profile-photo="{{ $driver->profile_photo }}"
                                                            data-status="{{ $driver->status }}"
                                                            data-vehicles='@json($driver->vehicles)'>
                                                            <i class="bi bi-pencil-square"></i>
                                                        </button>




                                                        <button class="btn btn-sm btn-icon btn-secondary-light rounded-circle"
                                                            type="button">
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
                    <div class="">
                        <ul class="pagination float-end">
                            <li class="page-item page-prev disabled">
                                <a class="page-link" href="javascript:void(0);" tabindex="-1">Prev</a>
                            </li>
                            <li class="page-item active"><a class="page-link" href="javascript:void(0);">1</a></li>
                            <li class="page-item"><a class="page-link" href="javascript:void(0);">2</a></li>
                            <li class="page-item"><a class="page-link" href="javascript:void(0);">3</a></li>
                            <li class="page-item"><a class="page-link" href="javascript:void(0);">4</a></li>
                            <li class="page-item"><a class="page-link" href="javascript:void(0);">5</a></li>
                            <li class="page-item page-next">
                                <a class="page-link" href="javascript:void(0);">Next</a>
                            </li>
                        </ul>
                    </div>
                    <!-- COL-END -->
                </div>
                <div class="tab-pane" id="tab-12">
                    <div class="row">
                        <div class="col-sm-12 col-md-6 col-xl-4 col-xxl-3">
                            <div class="card user-card">
                                <div class="user-image">
                                    <img src="{{asset('build/assets/images/media/files/04.jpg')}}" class="card-img-top"
                                        alt="...">
                                    <span class="avatar avatar-xl rounded-circle">
                                        <img src="{{asset('build/assets/images/users/2.jpg')}}" alt=""
                                            class="rounded-circle">
                                    </span>
                                </div>
                                <div class="card-body text-center">
                                    <div class="text-center">
                                        <div class="dropdown text-end">
                                            <a href="javascript:;" class="option-dots text-muted" data-bs-toggle="dropdown"
                                                aria-haspopup="true" aria-expanded="false"> <i
                                                    class="fe fe-more-vertical fs-16 lh-sm"></i> </a>
                                            <div class="dropdown-menu dropdown-menu-end">
                                                <a class="dropdown-item" href="javascript:;">
                                                    <i class="fe fe-message-square me-2 d-inline-flex"></i> Message
                                                </a>
                                                <a class="dropdown-item" href="javascript:;">
                                                    <i class="fe fe-edit-2 me-2 d-inline-flex"></i> Edit
                                                </a>
                                                <a class="dropdown-item" href="javascript:;">
                                                    <i class="fe fe-eye me-2 d-inline-flex"></i> View
                                                </a>
                                                <a class="dropdown-item" href="javascript:;">
                                                    <i class="fe fe-trash-2 me-2 d-inline-flex"></i> Delete
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <a href="{{url('profile')}}" class="fs-18 fw-bold d-block">Adam Cotter</a>
                                    <p class="text-muted text-center">Web Designer</p>
                                    <span class="text-muted mx-3"><i
                                            class="fe fe-map-pin mx-2 text-secondary "></i>France</span>
                                    <span class="text-muted"><i class="fe fe-phone mx-2 text-success "></i>+1
                                        1456789867</span>
                                    <div class="text-center mt-3">
                                        <a class="btn btn-sm bg-primary-transparent rounded-circle me-1" role="button"
                                            href="javascript:void(0);"><i class="mdi mdi-facebook fs-16"></i></a>
                                        <a class="btn btn-sm bg-secondary-transparent rounded-circle me-1" role="button"
                                            href="javascript:void(0);"><i class="mdi mdi-linkedin fs-16"></i></a>
                                        <a class="btn btn-sm bg-success-transparent rounded-circle" role="button"
                                            href="javascript:void(0);"><i class="mdi mdi-twitter fs-16"></i></a>
                                    </div>
                                </div>
                                <div class="card-footer p-0">
                                    <div class="row row-sm">
                                        <div class="col-sm-4 border-end text-center">
                                            <div class="p-3 text-dark">
                                                <h5 class="mb-1 fs-16 fw-600">30k</h5>
                                                <span class="fs-11">TOTAL POSTS</span>
                                            </div>
                                        </div>
                                        <div class="col-sm-4 border-end text-center">
                                            <div class="text-center p-3 text-dark">
                                                <h5 class="mb-1 fs-16 fw-600">7,345</h5>
                                                <span class="fs-11">FOLLOWERS</span>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="text-center p-3 text-dark">
                                                <h5 class="mb-1 fs-16 fw-600">2,785</h5>
                                                <span class="fs-11">FOLLOWING</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6 col-xl-4 col-xxl-3">
                            <div class="card user-card">
                                <div class="user-image">
                                    <img src="{{asset('build/assets/images/media/files/05.jpg')}}" class="card-img-top"
                                        alt="...">
                                    <span class="avatar avatar-xl rounded-circle">
                                        <img src="{{asset('build/assets/images/users/3.jpg')}}" alt=""
                                            class="rounded-circle">
                                    </span>
                                </div>
                                <div class="card-body text-center">
                                    <div class="text-center">
                                        <div class="dropdown text-end">
                                            <a href="javascript:;" class="option-dots text-muted" data-bs-toggle="dropdown"
                                                aria-haspopup="true" aria-expanded="false"> <i
                                                    class="fe fe-more-vertical fs-16 lh-sm"></i> </a>
                                            <div class="dropdown-menu dropdown-menu-end">
                                                <a class="dropdown-item" href="javascript:;">
                                                    <i class="fe fe-message-square me-2 d-inline-flex"></i> Message
                                                </a>
                                                <a class="dropdown-item" href="javascript:;">
                                                    <i class="fe fe-edit-2 me-2 d-inline-flex"></i> Edit
                                                </a>
                                                <a class="dropdown-item" href="javascript:;">
                                                    <i class="fe fe-eye me-2 d-inline-flex"></i> View
                                                </a>
                                                <a class="dropdown-item" href="javascript:;">
                                                    <i class="fe fe-trash-2 me-2 d-inline-flex"></i> Delete
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <a href="{{url('profile')}}" class="fs-18 fw-bold d-block">Dennis Trexy</a>
                                    <p class="text-muted text-center">Web Designer</p>
                                    <span class="text-muted mx-3"><i class="fe fe-map-pin mx-2 text-secondary "></i>United
                                        States</span>
                                    <span class="text-muted"><i class="fe fe-phone mx-2 text-success "></i>+1
                                        135792468</span>
                                    <div class="text-center mt-3">
                                        <a class="btn btn-sm bg-primary-transparent rounded-circle me-1" role="button"
                                            href="javascript:void(0);"><i class="mdi mdi-facebook fs-16"></i></a>
                                        <a class="btn btn-sm bg-secondary-transparent rounded-circle me-1" role="button"
                                            href="javascript:void(0);"><i class="mdi mdi-linkedin fs-16"></i></a>
                                        <a class="btn btn-sm bg-success-transparent rounded-circle" role="button"
                                            href="javascript:void(0);"><i class="mdi mdi-twitter fs-16"></i></a>
                                    </div>
                                </div>
                                <div class="card-footer p-0">
                                    <div class="row row-sm">
                                        <div class="col-sm-4 border-end text-center">
                                            <div class="p-3 text-dark">
                                                <h5 class="mb-1 fs-16 fw-600">18k</h5>
                                                <span class="fs-11">TOTAL POSTS</span>
                                            </div>
                                        </div>
                                        <div class="col-sm-4 border-end text-center">
                                            <div class="text-center p-3 text-dark">
                                                <h5 class="mb-1 fs-16 fw-600">6,452</h5>
                                                <span class="fs-11">FOLLOWERS</span>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="text-center p-3 text-dark">
                                                <h5 class="mb-1 fs-16 fw-600">6,452</h5>
                                                <span class="fs-11">FOLLOWING</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6 col-xl-4 col-xxl-3">
                            <div class="card user-card">
                                <div class="user-image">
                                    <img src="{{asset('build/assets/images/media/files/06.jpg')}}" class="card-img-top"
                                        alt="...">
                                    <span class="avatar avatar-xl rounded-circle">
                                        <img src="{{asset('build/assets/images/users/4.jpg')}}" alt=""
                                            class="rounded-circle">
                                    </span>
                                </div>
                                <div class="card-body text-center">
                                    <div class="text-center">
                                        <div class="dropdown text-end">
                                            <a href="javascript:;" class="option-dots text-muted" data-bs-toggle="dropdown"
                                                aria-haspopup="true" aria-expanded="false"> <i
                                                    class="fe fe-more-vertical fs-16 lh-sm"></i> </a>
                                            <div class="dropdown-menu dropdown-menu-end">
                                                <a class="dropdown-item" href="javascript:;">
                                                    <i class="fe fe-message-square me-2 d-inline-flex"></i> Message
                                                </a>
                                                <a class="dropdown-item" href="javascript:;">
                                                    <i class="fe fe-edit-2 me-2 d-inline-flex"></i> Edit
                                                </a>
                                                <a class="dropdown-item" href="javascript:;">
                                                    <i class="fe fe-eye me-2 d-inline-flex"></i> View
                                                </a>
                                                <a class="dropdown-item" href="javascript:;">
                                                    <i class="fe fe-trash-2 me-2 d-inline-flex"></i> Delete
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <a href="{{url('profile')}}" class="fs-18 fw-bold d-block">Terrie Boaler</a>
                                    <p class="text-muted text-center">Web Designer</p>
                                    <span class="text-muted mx-3"><i
                                            class="fe fe-map-pin mx-2 text-secondary "></i>Canada</span>
                                    <span class="text-muted"><i class="fe fe-phone mx-2 text-success "></i>+1
                                        1567843567</span>
                                    <div class="text-center mt-3">
                                        <a class="btn btn-sm bg-primary-transparent rounded-circle me-1" role="button"
                                            href="javascript:void(0);"><i class="mdi mdi-facebook fs-16"></i></a>
                                        <a class="btn btn-sm bg-secondary-transparent rounded-circle me-1" role="button"
                                            href="javascript:void(0);"><i class="mdi mdi-linkedin fs-16"></i></a>
                                        <a class="btn btn-sm bg-success-transparent rounded-circle" role="button"
                                            href="javascript:void(0);"><i class="mdi mdi-twitter fs-16"></i></a>
                                    </div>
                                </div>
                                <div class="card-footer p-0">
                                    <div class="row row-sm">
                                        <div class="col-sm-4 border-end text-center">
                                            <div class="p-3 text-dark">
                                                <h5 class="mb-1 fs-16 fw-600">25k</h5>
                                                <span class="fs-11">TOTAL POSTS</span>
                                            </div>
                                        </div>
                                        <div class="col-sm-4 border-end text-center">
                                            <div class="text-center p-3 text-dark">
                                                <h5 class="mb-1 fs-16 fw-600">2,765</h5>
                                                <span class="fs-11">FOLLOWERS</span>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="text-center p-3 text-dark">
                                                <h5 class="mb-1 fs-16 fw-600">4,876</h5>
                                                <span class="fs-11">FOLLOWING</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6 col-xl-4 col-xxl-3">
                            <div class="card user-card">
                                <div class="user-image">
                                    <img src="{{asset('build/assets/images/media/files/07.jpg')}}" class="card-img-top"
                                        alt="...">
                                    <span class="avatar avatar-xl rounded-circle">
                                        <img src="{{asset('build/assets/images/users/5.jpg')}}" alt=""
                                            class="rounded-circle">
                                    </span>
                                </div>
                                <div class="card-body text-center">
                                    <div class="text-center">
                                        <div class="dropdown text-end">
                                            <a href="javascript:;" class="option-dots text-muted" data-bs-toggle="dropdown"
                                                aria-haspopup="true" aria-expanded="false"> <i
                                                    class="fe fe-more-vertical fs-16 lh-sm"></i> </a>
                                            <div class="dropdown-menu dropdown-menu-end">
                                                <a class="dropdown-item" href="javascript:;">
                                                    <i class="fe fe-message-square me-2 d-inline-flex"></i> Message
                                                </a>
                                                <a class="dropdown-item" href="javascript:;">
                                                    <i class="fe fe-edit-2 me-2 d-inline-flex"></i> Edit
                                                </a>
                                                <a class="dropdown-item" href="javascript:;">
                                                    <i class="fe fe-eye me-2 d-inline-flex"></i> View
                                                </a>
                                                <a class="dropdown-item" href="javascript:;">
                                                    <i class="fe fe-trash-2 me-2 d-inline-flex"></i> Delete
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <a href="{{url('profile')}}" class="fs-18 fw-bold d-block">Dorothea Joicey</a>
                                    <p class="text-muted text-center">Web Designer</p>
                                    <span class="text-muted mx-3"><i
                                            class="fe fe-map-pin mx-2 text-secondary "></i>Indonesia</span>
                                    <span class="text-muted"><i class="fe fe-phone mx-2 text-success "></i>+1
                                        135792468</span>
                                    <div class="text-center mt-3">
                                        <a class="btn btn-sm bg-primary-transparent rounded-circle me-1" role="button"
                                            href="javascript:void(0);"><i class="mdi mdi-facebook fs-16"></i></a>
                                        <a class="btn btn-sm bg-secondary-transparent rounded-circle me-1" role="button"
                                            href="javascript:void(0);"><i class="mdi mdi-linkedin fs-16"></i></a>
                                        <a class="btn btn-sm bg-success-transparent rounded-circle" role="button"
                                            href="javascript:void(0);"><i class="mdi mdi-twitter fs-16"></i></a>
                                    </div>
                                </div>
                                <div class="card-footer p-0">
                                    <div class="row row-sm">
                                        <div class="col-sm-4 border-end text-center">
                                            <div class="p-3 text-dark">
                                                <h5 class="mb-1 fs-16 fw-600">34k</h5>
                                                <span class="fs-11">TOTAL POSTS</span>
                                            </div>
                                        </div>
                                        <div class="col-sm-4 border-end text-center">
                                            <div class="text-center p-3 text-dark">
                                                <h5 class="mb-1 fs-16 fw-600">1,789</h5>
                                                <span class="fs-11">FOLLOWERS</span>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="text-center p-3 text-dark">
                                                <h5 class="mb-1 fs-16 fw-600">2,456</h5>
                                                <span class="fs-11">FOLLOWING</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6 col-xl-4 col-xxl-3">
                            <div class="card user-card">
                                <div class="user-image">
                                    <img src="{{asset('build/assets/images/media/files/08.jpg')}}" class="card-img-top"
                                        alt="...">
                                    <span class="avatar avatar-xl rounded-circle">
                                        <img src="{{asset('build/assets/images/users/6.jpg')}}" alt=""
                                            class="rounded-circle">
                                    </span>
                                </div>
                                <div class="card-body text-center">
                                    <div class="text-center">
                                        <div class="dropdown text-end">
                                            <a href="javascript:;" class="option-dots text-muted" data-bs-toggle="dropdown"
                                                aria-haspopup="true" aria-expanded="false"> <i
                                                    class="fe fe-more-vertical fs-16 lh-sm"></i> </a>
                                            <div class="dropdown-menu dropdown-menu-end">
                                                <a class="dropdown-item" href="javascript:;">
                                                    <i class="fe fe-message-square me-2 d-inline-flex"></i> Message
                                                </a>
                                                <a class="dropdown-item" href="javascript:;">
                                                    <i class="fe fe-edit-2 me-2 d-inline-flex"></i> Edit
                                                </a>
                                                <a class="dropdown-item" href="javascript:;">
                                                    <i class="fe fe-eye me-2 d-inline-flex"></i> View
                                                </a>
                                                <a class="dropdown-item" href="javascript:;">
                                                    <i class="fe fe-trash-2 me-2 d-inline-flex"></i> Delete
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <a href="{{url('profile')}}" class="fs-18 fw-bold d-block">Donnell Farries</a>
                                    <p class="text-muted text-center">Web Designer</p>
                                    <span class="text-muted mx-3"><i
                                            class="fe fe-map-pin mx-2 text-secondary "></i>Poland</span>
                                    <span class="text-muted"><i class="fe fe-phone mx-2 text-success "></i>+1
                                        1456789456</span>
                                    <div class="text-center mt-3">
                                        <a class="btn btn-sm bg-primary-transparent rounded-circle me-1" role="button"
                                            href="javascript:void(0);"><i class="mdi mdi-facebook fs-16"></i></a>
                                        <a class="btn btn-sm bg-secondary-transparent rounded-circle me-1" role="button"
                                            href="javascript:void(0);"><i class="mdi mdi-linkedin fs-16"></i></a>
                                        <a class="btn btn-sm bg-success-transparent rounded-circle" role="button"
                                            href="javascript:void(0);"><i class="mdi mdi-twitter fs-16"></i></a>
                                    </div>
                                </div>
                                <div class="card-footer p-0">
                                    <div class="row row-sm">
                                        <div class="col-sm-4 border-end text-center">
                                            <div class="p-3 text-dark">
                                                <h5 class="mb-1 fs-16 fw-600">46k</h5>
                                                <span class="fs-11">TOTAL POSTS</span>
                                            </div>
                                        </div>
                                        <div class="col-sm-4 border-end text-center">
                                            <div class="text-center p-3 text-dark">
                                                <h5 class="mb-1 fs-16 fw-600">2,567</h5>
                                                <span class="fs-11">FOLLOWERS</span>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="text-center p-3 text-dark">
                                                <h5 class="mb-1 fs-16 fw-600">3,345</h5>
                                                <span class="fs-11">FOLLOWING</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6 col-xl-4 col-xxl-3">
                            <div class="card user-card">
                                <div class="user-image">
                                    <img src="{{asset('build/assets/images/media/files/09.jpg')}}" class="card-img-top"
                                        alt="...">
                                    <span class="avatar avatar-xl rounded-circle">
                                        <img src="{{asset('build/assets/images/users/7.jpg')}}" alt=""
                                            class="rounded-circle">
                                    </span>
                                </div>
                                <div class="card-body text-center">
                                    <div class="text-center">
                                        <div class="dropdown text-end">
                                            <a href="javascript:;" class="option-dots text-muted" data-bs-toggle="dropdown"
                                                aria-haspopup="true" aria-expanded="false"> <i
                                                    class="fe fe-more-vertical fs-16 lh-sm"></i> </a>
                                            <div class="dropdown-menu dropdown-menu-end">
                                                <a class="dropdown-item" href="javascript:;">
                                                    <i class="fe fe-message-square me-2 d-inline-flex"></i> Message
                                                </a>
                                                <a class="dropdown-item" href="javascript:;">
                                                    <i class="fe fe-edit-2 me-2 d-inline-flex"></i> Edit
                                                </a>
                                                <a class="dropdown-item" href="javascript:;">
                                                    <i class="fe fe-eye me-2 d-inline-flex"></i> View
                                                </a>
                                                <a class="dropdown-item" href="javascript:;">
                                                    <i class="fe fe-trash-2 me-2 d-inline-flex"></i> Delete
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <a href="{{url('profile')}}" class="fs-18 fw-bold d-block">Letizia Puncher</a>
                                    <p class="text-muted text-center">Web Designer</p>
                                    <span class="text-muted mx-3"><i
                                            class="fe fe-map-pin mx-2 text-secondary "></i>Ukraine</span>
                                    <span class="text-muted"><i class="fe fe-phone mx-2 text-success "></i>+1
                                        1234567893</span>
                                    <div class="text-center mt-3">
                                        <a class="btn btn-sm bg-primary-transparent rounded-circle me-1" role="button"
                                            href="javascript:void(0);"><i class="mdi mdi-facebook fs-16"></i></a>
                                        <a class="btn btn-sm bg-secondary-transparent rounded-circle me-1" role="button"
                                            href="javascript:void(0);"><i class="mdi mdi-linkedin fs-16"></i></a>
                                        <a class="btn btn-sm bg-success-transparent rounded-circle" role="button"
                                            href="javascript:void(0);"><i class="mdi mdi-twitter fs-16"></i></a>
                                    </div>
                                </div>
                                <div class="card-footer p-0">
                                    <div class="row row-sm">
                                        <div class="col-sm-4 border-end text-center">
                                            <div class="p-3 text-dark">
                                                <h5 class="mb-1 fs-16 fw-600">24k</h5>
                                                <span class="fs-11">TOTAL POSTS</span>
                                            </div>
                                        </div>
                                        <div class="col-sm-4 border-end text-center">
                                            <div class="text-center p-3 text-dark">
                                                <h5 class="mb-1 fs-16 fw-600">5,765</h5>
                                                <span class="fs-11">FOLLOWERS</span>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="text-center p-3 text-dark">
                                                <h5 class="mb-1 fs-16 fw-600">7,345</h5>
                                                <span class="fs-11">FOLLOWING</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6 col-xl-4 col-xxl-3">
                            <div class="card user-card">
                                <div class="user-image">
                                    <img src="{{asset('build/assets/images/media/files/01.jpg')}}" class="card-img-top"
                                        alt="...">
                                    <span class="avatar avatar-xl rounded-circle">
                                        <img src="{{asset('build/assets/images/users/10.jpg')}}" alt=""
                                            class="rounded-circle">
                                    </span>
                                </div>
                                <div class="card-body text-center">
                                    <div class="text-center">
                                        <div class="dropdown text-end">
                                            <a href="javascript:;" class="option-dots text-muted" data-bs-toggle="dropdown"
                                                aria-haspopup="true" aria-expanded="false"> <i
                                                    class="fe fe-more-vertical fs-16 lh-sm"></i> </a>
                                            <div class="dropdown-menu dropdown-menu-end">
                                                <a class="dropdown-item" href="javascript:;">
                                                    <i class="fe fe-message-square me-2 d-inline-flex"></i> Message
                                                </a>
                                                <a class="dropdown-item" href="javascript:;">
                                                    <i class="fe fe-edit-2 me-2 d-inline-flex"></i> Edit
                                                </a>
                                                <a class="dropdown-item" href="javascript:;">
                                                    <i class="fe fe-eye me-2 d-inline-flex"></i> View
                                                </a>
                                                <a class="dropdown-item" href="javascript:;">
                                                    <i class="fe fe-trash-2 me-2 d-inline-flex"></i> Delete
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <a href="{{url('profile')}}" class="fs-18 fw-bold d-block">Dennis Trexy</a>
                                    <p class="text-muted text-center">Web Designer</p>
                                    <span class="text-muted mx-3"><i
                                            class="fe fe-map-pin mx-2 text-secondary "></i>California, USA</span>
                                    <span class="text-muted"><i class="fe fe-phone mx-2 text-success "></i>+1
                                        135792468</span>
                                    <div class="text-center mt-3">
                                        <a class="btn btn-sm bg-primary-transparent rounded-circle me-1" role="button"
                                            href="javascript:void(0);"><i class="mdi mdi-facebook fs-16"></i></a>
                                        <a class="btn btn-sm bg-secondary-transparent rounded-circle me-1" role="button"
                                            href="javascript:void(0);"><i class="mdi mdi-linkedin fs-16"></i></a>
                                        <a class="btn btn-sm bg-success-transparent rounded-circle" role="button"
                                            href="javascript:void(0);"><i class="mdi mdi-twitter fs-16"></i></a>
                                    </div>
                                </div>
                                <div class="card-footer p-0">
                                    <div class="row row-sm">
                                        <div class="col-sm-4 border-end text-center">
                                            <div class="p-3 text-dark">
                                                <h5 class="mb-1 fs-16 fw-600">16K</h5>
                                                <span class="fs-11">TOTAL POSTS</span>
                                            </div>
                                        </div>
                                        <div class="col-sm-4 border-end text-center">
                                            <div class="text-center p-3 text-dark">
                                                <h5 class="mb-1 fs-16 fw-600">6,452</h5>
                                                <span class="fs-11">FOLLOWERS</span>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="text-center p-3 text-dark">
                                                <h5 class="mb-1 fs-16 fw-600">6,452</h5>
                                                <span class="fs-11">FOLLOWING</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6 col-xl-4 col-xxl-3">
                            <div class="card user-card">
                                <div class="user-image">
                                    <img src="{{asset('build/assets/images/media/files/05.jpg')}}" class="card-img-top"
                                        alt="...">
                                    <span class="avatar avatar-xl rounded-circle">
                                        <img src="{{asset('build/assets/images/users/1.jpg')}}" alt=""
                                            class="rounded-circle">
                                    </span>
                                </div>
                                <div class="card-body text-center">
                                    <div class="text-center">
                                        <div class="dropdown text-end">
                                            <a href="javascript:;" class="option-dots text-muted" data-bs-toggle="dropdown"
                                                aria-haspopup="true" aria-expanded="false"> <i
                                                    class="fe fe-more-vertical fs-16 lh-sm"></i> </a>
                                            <div class="dropdown-menu dropdown-menu-end">
                                                <a class="dropdown-item" href="javascript:;">
                                                    <i class="fe fe-message-square me-2 d-inline-flex"></i> Message
                                                </a>
                                                <a class="dropdown-item" href="javascript:;">
                                                    <i class="fe fe-edit-2 me-2 d-inline-flex"></i> Edit
                                                </a>
                                                <a class="dropdown-item" href="javascript:;">
                                                    <i class="fe fe-eye me-2 d-inline-flex"></i> View
                                                </a>
                                                <a class="dropdown-item" href="javascript:;">
                                                    <i class="fe fe-trash-2 me-2 d-inline-flex"></i> Delete
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <a href="{{url('profile')}}" class="fs-18 fw-bold d-block">Sherilyn Metzel</a>
                                    <p class="text-muted text-center">Web Designer</p>
                                    <span class="text-muted mx-3"><i
                                            class="fe fe-map-pin mx-2 text-secondary "></i>Australia</span>
                                    <span class="text-muted"><i class="fe fe-phone mx-2 text-success "></i>+1
                                        1567893456</span>
                                    <div class="text-center mt-3">
                                        <a class="btn btn-sm bg-primary-transparent rounded-circle me-1" role="button"
                                            href="javascript:void(0);"><i class="mdi mdi-facebook fs-16"></i></a>
                                        <a class="btn btn-sm bg-secondary-transparent rounded-circle me-1" role="button"
                                            href="javascript:void(0);"><i class="mdi mdi-linkedin fs-16"></i></a>
                                        <a class="btn btn-sm bg-success-transparent rounded-circle" role="button"
                                            href="javascript:void(0);"><i class="mdi mdi-twitter fs-16"></i></a>
                                    </div>
                                </div>
                                <div class="card-footer p-0">
                                    <div class="row row-sm">
                                        <div class="col-sm-4 border-end text-center">
                                            <div class="p-3 text-dark">
                                                <h5 class="mb-1 fs-16 fw-600">23k</h5>
                                                <span class="fs-11">TOTAL POSTS</span>
                                            </div>
                                        </div>
                                        <div class="col-sm-4 border-end text-center">
                                            <div class="text-center p-3 text-dark">
                                                <h5 class="mb-1 fs-16 fw-600">4,765</h5>
                                                <span class="fs-11">FOLLOWERS</span>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="text-center p-3 text-dark">
                                                <h5 class="mb-1 fs-16 fw-600">2,765</h5>
                                                <span class="fs-11">FOLLOWING</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ROW CLOSED -->
    </div>
    @include('modals.user-form-modal')
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