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
                    <div class="card-body p-0">
                        <div class="tab-content">
                            <div class="tab-pane show active fs-13 p-5" id="personal-info" role="tabpanel">
                                <h6 class="mb-4">Profile Photo :</h6>
                                <div
                                    class="mb-4 border p-4 br-5 d-flex align-items-center justify-content-between flex-wrap gap-2">
                                    <div class="d-sm-flex align-items-center flex-wrap gap-2">
                                        <div class="mb-0 me-5 d-flex align-items-center">
                                            <span class="avatar-xl rounded-circle position-relative">
                                                <img src="{{asset('build/assets/images/users/15.jpg')}}" alt=""
                                                    class="avatar-xl rounded-circle" id="profile-img">
                                                <a href="javascript:void(0);"
                                                    class="badge position-absolute rounded-pill bg-primary tx-fixed-white avatar-icons">
                                                    <input type="file" name="photo"
                                                        class="position-absolute w-100 h-100 op-0" id="profile-change">
                                                    <i class="fe fe-camera lh-base"></i>
                                                </a>
                                            </span>
                                            <div class="ms-3">
                                                <h5 class="mb-1">Taylor Json</h5>
                                                <p class="mb-0">Web Designer</p>
                                            </div>
                                        </div>
                                        <div class="btn-group mt-sm-0 mt-2">
                                            <button class="btn btn-primary">Change</button>
                                            <button class="btn btn-light">Remove</button>
                                        </div>
                                    </div>
                                    <div class="text-end">
                                        <button class="btn btn-secondary-light"><i class="ri-vip-crown-2-line"></i> Premium
                                            Membership</button>
                                    </div>
                                </div>
                                <h6>Personal Information :</h6>
                                <div class="row gy-4 mb-4">
                                    <div class="col-xl-6">
                                        <label for="first-name" class="form-label">First Name</label>
                                        <input type="text" class="form-control" id="first-name" placeholder="Firt Name">
                                    </div>
                                    <div class="col-xl-6">
                                        <label for="last-name" class="form-label">Last Name</label>
                                        <input type="text" class="form-control" id="last-name" placeholder="Last Name">
                                    </div>
                                </div>
                                <div class="row gy-4 mb-4">
                                    <div class="col-xl-6">
                                        <label for="email-address" class="form-label">Email Address :</label>
                                        <input type="text" class="form-control" id="email-address"
                                            placeholder="xyz@gmail.com">
                                    </div>
                                    <div class="col-xl-6">
                                        <label for="phone" class="form-label">Phone Number :</label>
                                        <input type="number" class="form-control" id="phone" placeholder="Phone Number">
                                    </div>
                                    <div class="col-xl-6">
                                        <label class="form-label">Language :</label>
                                        <select class="form-control" name="choices-multiple-remove-button"
                                            id="choices-multiple-remove-button" multiple>
                                            <option value="Choice 1" selected> English</option>
                                            <option value="Choice 2">French</option>
                                            <option value="Choice 3">Arabic</option>
                                            <option value="Choice 4">Malayalam</option>
                                        </select>
                                    </div>
                                    <div class="col-xl-6">
                                        <label class="form-label">Country :</label>
                                        <select class="form-control" name="country-select" id="country-select">
                                            <option value="Choice 1" selected> India</option>
                                            <option value="Choice 2">USA</option>
                                            <option value="Choice 4">Australia</option>
                                        </select>
                                    </div>
                                    <div class="col-xl-12">
                                        <label for="bio" class="form-label">Bio :</label>
                                        <textarea class="form-control overflow-auto" id="bio"
                                            rows="5">Lorem ipsum dolor sit amet consectetur adipisicing elit. At sit impedit, officiis non minima saepe voluptates a magnam enim sequi porro veniam ea suscipit dolorum vel mollitia voluptate iste nemo!</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fs-13 p-5" id="account-settings" role="tabpanel">
                                <div class="row gy-3">
                                    <div class="col-xl-7">
                                        <div class="card custom-card shadow-none mb-0 border">
                                            <div class="card-body">
                                                <div class="d-sm-flex d-block align-items-top mb-4 justify-content-between">
                                                </div>
                                                <div class="d-sm-flex d-block align-items-top mb-4 justify-content-between">
                                                </div>
                                                <div class="d-flex align-items-top justify-content-between">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fs-13 p-0" id="email-settings" role="tabpanel">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">
                                        <div class="row gy-2 d-sm-flex align-items-center justify-content-between">
                                            <div class="col-xl-3 col-lg-4 col-md-4 col-sm-12">
                                                <span class="fs-14 fw-semibold mb-0">Menu View :</span>
                                            </div>
                                            <div class="col-xl-4">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="flexRadioDefault"
                                                        id="flexRadioDefault1">
                                                    <label class="form-check-label" for="flexRadioDefault1">
                                                        Default View
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="flexRadioDefault"
                                                        id="flexRadioDefault2" checked="">
                                                    <label class="form-check-label" for="flexRadioDefault2">
                                                        Advanced View
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-xl-5">
                                                <div class="custom-toggle-switch float-sm-end">
                                                    <input id="menu-view" name="toggleswitchsize" type="checkbox"
                                                        checked="">
                                                    <label for="menu-view" class="label-primary mb-1"></label>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="list-group-item">
                                        <div class="row gy-3 d-sm-flex align-items-center justify-content-between">
                                            <div class="col-xl-3">
                                                <span class="fs-14 fw-semibold mb-0">Language :</span>
                                            </div>
                                            <div class="col-xl-4">
                                                <select class="form-control" name="choices-multiple-remove-button2"
                                                    id="choices-multiple-remove-button2" multiple>
                                                    <option value="Choice 1" selected> English</option>
                                                    <option value="Choice 2">French</option>
                                                    <option value="Choice 3">Arabic</option>
                                                    <option value="Choice 4">Malayalam</option>
                                                </select>
                                            </div>
                                            <div class="col-xl-5">
                                                <div class="custom-toggle-switch float-sm-end">
                                                    <input id="mail-languages" name="toggleswitchsize" type="checkbox">
                                                    <label for="mail-languages" class="label-primary mb-1"></label>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="list-group-item">
                                        <div class="row gy-2 d-sm-flex align-items-center justify-content-between">
                                            <div class="col-xl-3">
                                                <span class="fs-14 fw-semibold mb-0">Images :</span>
                                            </div>
                                            <div class="col-xl-4">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="images-default"
                                                        id="images-open">
                                                    <label class="form-check-label" for="images-open">
                                                        Always Open Images
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="images-default"
                                                        id="images-hide" checked="">
                                                    <label class="form-check-label" for="images-hide">
                                                        Ask For Permission
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-xl-5">
                                                <div class="custom-toggle-switch float-sm-end">
                                                    <input id="mails-images" name="toggleswitchsize" type="checkbox">
                                                    <label for="mails-images" class="label-primary mb-1"></label>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="float-end">
                            <button class="btn btn-light m-1">
                                Reset All
                            </button>
                            <button class="btn btn-primary m-1">
                                Save Changes
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ROW-1 CLOSED -->
    </div>
    <!-- CONTAINER CLOSED -->

@endsection

@section('scripts')

    <!-- Internal Settngs JS -->
    @vite('resources/assets/js/setting.js')

@endsection