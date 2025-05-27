@extends('layouts.master')

@section('styles')



@endsection

@section('content')

    <!-- PAGE-HEADER -->
    <div class="page-header d-flex align-items-center justify-content-between border-bottom mb-4">
        <h1 class="page-title">Dashboard</h1>
        <div>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">Admin</a></li>
                <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
            </ol>
        </div>
    </div>
    <!-- PAGE-HEADER END -->

    <!-- CONTAINER -->
    <div class="main-container container-fluid">

        <!-- Start::Row-1 -->
        <div class="row">
            <div class="col-xxl-9">
                <div class="row">
                    <div class="col-xxl-5 col-xl-12">
                        <div class="row">
                            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xxl-6">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="d-flex align-items-start">
                                            <div class="flex-grow-1">
                                                <p class="mb-0">Total Drivers</p>
                                                <span class="fs-5">{{$drivers->count()}}</span>
                                            </div>
                                            <div class="min-w-fit-content ms-3">
                                                <span class="avatar avatar-md br-5 bg-primary-transparent text-primary">
                                                    <i class="fe fe-user fs-18"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xxl-6">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="d-flex align-items-start">
                                            <div class="flex-grow-1">
                                                <p class="mb-0">Total Campaigns</p>
                                                <span class="fs-5">{{$campaigns->count()}}</span>
                                            </div>
                                            <div class="min-w-fit-content ms-3">
                                                <span class="avatar avatar-md br-5 bg-secondary-transparent text-secondary">
                                                    <i class="fe fe-package fs-18"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xxl-6">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="d-flex align-items-start">
                                            <div class="flex-grow-1">
                                                <p class="mb-0">Total Payments</p>
                                                <span class="fs-5">60</span>
                                            </div>
                                            <div class="min-w-fit-content ms-3">
                                                <span class="avatar avatar-md br-5 bg-warning-transparent text-warning">
                                                    <i class="fe fe-credit-card fs-18"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xxl-6">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="d-flex align-items-start flex-wrap gap-1">
                                            <div class="flex-grow-1">
                                                <p class="mb-0">Subscriptions </p>
                                                <span class="fs-5">10</span>
                                            </div>
                                            <div class="min-w-fit-content">
                                                <span class="avatar avatar-md br-5 bg-info-transparent">
                                                    <i class="fe fe-user-plus fs-18"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center mb-3 flex-wrap gap-1">
                                            <span
                                                class="avatar avatar-md stat-avatar rounded-circle text-bg-warning fs-18 min-w-fit-content me-2">
                                                <i class="bi bi-bag-check"></i>
                                            </span>
                                            <p class="mb-0 flex-grow-1">Total Sales by Unit
                                            </p>
                                        </div>
                                        <span class="fs-5">$12,897</span>
                                        <span class="fs-12 text-warning ms-1"><i
                                                class="ti ti-trending-up mx-1"></i>3.5%</span>
                                        <div class="fw-normal d-flex align-items-center mb-2 mt-4">
                                            <p class="mb-0 flex-grow-1">Active Sales</p>
                                            <span>3,274</span>
                                        </div>
                                        <div class="progress custom-progress-1" style="height: 5px;">
                                            <div class="progress-bar bg-warning" role="progressbar" style="width: 50%;"
                                                aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                    <div class="card-footer p-0 text-center">
                                        <div class="d-grid">
                                            <a href="javascript:void(0);" class="px-3 py-2 text-warning">View Details <i
                                                    class="ti ti-external-link"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                                <div class="card overflow-hidden">
                                    <div class="card-body p-0">
                                        <div class="px-3 pt-3">
                                            <div class="d-flex align-items-center mb-3">
                                                <span
                                                    class="avatar avatar-md stat-avatar rounded-circle text-bg-primary fs-18 min-w-fit-content me-2">
                                                    <i class="bi bi-bar-chart"></i>
                                                </span>
                                                <p class="mb-0 flex-grow-1">Total Revenue</p>
                                            </div>
                                            <span class="fs-5">$8,889</span>
                                            <span class="fs-12 text-success ms-1"><i
                                                    class="ti ti-trending-up mx-1"></i>5.5%</span>
                                        </div>
                                        <div id="totalRevenue"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-7 col-xl-12">
                        <div class="card">
                            <!---  <div class="card-header justify-content-between">
                                    <h6 class="card-title flex-grow-1 text-truncate me-3">Monthly Campaigns Analytics</h6>
                                </div>
                                <div class="card-body">
                                    <div id="column-basic"></div>
                                </div> -->
                        </div>
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="card">
                                    <div class="card-header border-bottom justify-content-between">
                                        <h6 class="card-title flex-grow-1 text-truncate me-3">Campaigns</h6>
                                        <div class="dropdown">
                                            <a href="javascript:void(0);" class="btn btn-primary-light btn-sm"
                                                data-bs-toggle="dropdown" aria-expanded="false">
                                                View All<i
                                                    class="ri-arrow-down-s-line align-middle ms-1 d-inline-block"></i>
                                            </a>
                                            <ul class="dropdown-menu" role="menu">
                                                <li><a class="dropdown-item"
                                                        href="{{ route('index', ['filter' => 'today']) }}">Today</a></li>
                                                <li><a class="dropdown-item"
                                                        href="{{ route('index', ['filter' => 'this_week']) }}">This Week</a>
                                                </li>
                                                <li><a class="dropdown-item"
                                                        href="{{ route('index', ['filter' => 'last_week']) }}">Last Week</a>
                                                </li>
                                                <li><a class="dropdown-item"
                                                        href="{{ route('index', ['filter' => 'this_month']) }}">This
                                                        Month</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="card-body p-0">
                                        <div class="table-responsive">
                                            <table class="table table-hover card-table mb-0">
                                                <thead>
                                                    <tr>
                                                        <th class="ps-3">Title</th>
                                                        <th>budget</th>
                                                        <th>status</th>
                                                        <th>created at</th>
                                                        <th class="pe-3">Assigned Users</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($campaigns as $campaign)
                                                        <tr>
                                                            <td class="ps-3">
                                                                <div class="d-flex align-items-center position-relative">
                                                                    <a href="javascript:void(0);" class="stretched-link"
                                                                        title="{{ $campaign->title }}"></a>
                                                                    <div class="flex-grow-1">
                                                                        <p class="mb-0">{{ $campaign->title }}</p>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td>${{ number_format($campaign->budget, 2) }}</td>
                                                            <td>
                                                                <span
                                                                    class="badge rounded-pill bg-primary-transparent">{{ $campaign->status }}</span>
                                                            </td>
                                                            <td>
                                                                <span>{{ $campaign->created_at->format('Y-m-d') }}</span>
                                                            </td>
                                                            <td>
                                                                <span>{{ $campaign->users_count }}</span>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xxl-3">
                <div class="row">
                    <div class="col-xxl-12 col-xl-12">
                        <div class="row">
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between align-items-center flex-wrap mb-3">
                                            <div id="ethCoin"></div>
                                            <div class="min-w-fit-content mb-3">
                                                <span
                                                    class="avatar avatar-md br-5 bg-primary-transparent rounded-circle text-primary">
                                                    <i class="bi bi-briefcase fs-18"></i>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="flex-grow-1">
                                            <p class="mb-0">Total Campaigns</p>
                                            <div class="d-flex justify-content-between align-items-center">
                                                <span class="fs-5">60</span>
                                                <span class="fs-12 text-primary ms-1"><i
                                                        class="ti ti-trending-down mx-1"></i>8.0%</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between align-items-center flex-wrap mb-3">
                                            <div id="ethCoin1"></div>
                                            <div class="min-w-fit-content mb-3">
                                                <span
                                                    class="avatar avatar-md br-5 bg-secondary-transparent rounded-circle text-secondary">
                                                    <i class="fe fe-airplay fs-18"></i>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="flex-grow-1">
                                            <p class="mb-0">Completed Campaigns</p>
                                            <div class="d-flex justify-content-between align-items-center">
                                                <span class="fs-5">40</span>
                                                <span class="fs-12 text-secondary ms-1"><i
                                                        class="ti ti-trending-down mx-1"></i>4.0%</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                           <!-- <div class="col-xl-12">
                                <div class="card">
                                    <div class="card">
                                        <div class="card-header border-bottom justify-content-between">
                                            <h6 class="card-title flex-grow-1 text-truncate me-3">Order Status
                                            </h6>
                                        </div>
                                        <div class="card-body d-flex justify-content-center">
                                            <div id="donut-update"></div>
                                        </div>
                                    </div>
                                </div>
                            </div> -->
                        </div>
                    </div>
                </div>
                <!-- End::Row-1 -->

            </div>
            <!-- CONTAINER END -->

@endsection

        @section('scripts')

            <!-- INTERNAL APEXCHART JS -->
            <script src="{{asset('build/assets/libs/apexcharts/apexcharts.min.js')}}"></script>

            <!-- Color Picker JS -->
            <script src="{{asset('build/assets/libs/@simonwep/pickr/pickr.es5.min.js')}}"></script>

            <!-- Checkbox selectall JS -->
            @vite('resources/assets/js/checkbox-selectall.js')

            <!-- INTERNAL INDEX JS -->
            @vite('resources/assets/js/index1.js')

        @endsection