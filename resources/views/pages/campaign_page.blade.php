@extends('layouts.master')

@section('styles')
@endsection

@section('content')

    <!-- PAGE-HEADER -->
    <div class="page-header d-flex align-items-center justify-content-between border-bottom mb-4">
        <h1 class="page-title">Campaigns List</h1>
        <div>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">Admin UI</a></li>
                <li class="breadcrumb-item active" aria-current="page">Campaigns List</li>
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
                                <form method="GET" action="{{ route('campaigns.index') }}" id="searchForm">
                                    <div class="input-group w-500">
                                        <input type="text" class="form-control" name="search"
                                            value="{{ request('search') }}" placeholder="Search title"
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
                                <a href="{{ url('add-campaigns') }}" class="btn btn-primary btn-block float-end my-2">
                                    <i class="fa fa-plus-square me-2"></i>Add Campaign
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
                                {{ $campaigns->firstItem() }} - {{ $campaigns->lastItem() }} of {{ $campaigns->total() }}
                                Campaigns{{ $campaigns->total() > 1 ? 's' : '' }}
                            </h2>

<form method="GET" action="{{ route('campaigns.index') }}">
    <input type="hidden" name="search" value="{{ request('search') }}">

    <div class="row g-2 align-items-center">
        <div class="col-md-3">
            <select class="form-control" name="sort" style="min-width: 130px;" onchange="this.form.submit()">
                <option value="">Sort by Date</option>
                <option value="desc" {{ request('sort') == 'desc' ? 'selected' : '' }}>Latest</option>
                <option value="asc" {{ request('sort') == 'asc' ? 'selected' : '' }}>Oldest</option>
            </select>
        </div>

        <div class="col-md-3">
            <select class="form-control" name="budget_sort" style="min-width: 130px;" onchange="this.form.submit()">
                <option value="">Sort by Budget</option>
                <option value="low_to_high" {{ request('budget_sort') == 'low_to_high' ? 'selected' : '' }}>Low to High</option>
                <option value="high_to_low" {{ request('budget_sort') == 'high_to_low' ? 'selected' : '' }}>High to Low</option>
            </select>
        </div>

        <div class="col-md-3">
            <select class="form-control" name="status" style="min-width: 130px;" onchange="this.form.submit()">
                <option value="">Filter by Status</option>
                <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>Pending</option>
                <option value="approved" {{ request('status') == 'approved' ? 'selected' : '' }}>Approved</option>
                <option value="expired" {{ request('status') == 'expired' ? 'selected' : '' }}>Expired</option>
            </select>
        </div>

        <div class="col-md-3">
            <a href="{{ route('campaigns.index') }}" class="btn btn-outline-secondary w-100">
                Reset Filters
            </a>
        </div>
    </div>
</form>

                        </div>

                        <div class="e-table px-5 pb-5">
                            <div class="table-responsive table-lg">
                                <table class="table border-top table-bordered mb-0 text-nowrap">
                                    <thead>
                                        <tr>
                                            <th class="text-center">ID</th>
                                            <th>title</th>
                                            <th>time</th>
                                            <th>budget</th>
                                            <th>status</th>
                                            <th>start date</th>
                                            <th>end date</th>
                                            <th>created at</th>

                                            <th class="text-center">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($campaigns as $campaign)
                                            <tr class="user-list">
                                                <td class="align-middle text-center">
                                                    {{ $campaign->id }}
                                                </td>

                                                <td class="align-middle text-center">
                                                    <div class="d-flex align-items-center flex-wrap gap-1">
                                                        <p class="text-nowrap align-middle mb-0">{{ $campaign->title }}</p>
                                                    </div>
                                                </td>
                                                <td class="text-nowrap align-middle">{{ $campaign->time }}</td>
                                                <td class="text-nowrap align-middle">{{ $campaign->budget }}</td>
                                                <td class="text-nowrap align-middle">
                                                    <span
                                                        class="badge bg-{{ $campaign->status === 'active' ? 'success' : 'danger' }}-transparent">{{ ucfirst($campaign->status) }}</span>
                                                </td>

                                                <td class="text-nowrap align-middle">{{ $campaign->start_date }}</td>
                                                <td class="text-nowrap align-middle">{{ $campaign->end_date }}</td>
                                                <td class="text-nowrap align-middle">
                                                    <span>{{ $campaign->created_at->format('d M Y') }}</span>
                                                </td>

                                                <td class="align-middle">
                                                    <div class="btn-list">
                                                        <a href="{{ url('show/update/campaign/' . $campaign->id) }}"
                                                            class="btn btn-sm btn-icon btn-info-light rounded-circle">
                                                            <button class="btn btn-sm btn-icon btn-info-light rounded-circle"
                                                                type="button" data-bs-toggle="modal"
                                                                data-bs-target="#viewUserModal"
                                                                data-user-id="{{ $campaign->id }}">
                                                                <i class="bi bi-pencil-square"></i>
                                                            </button>
                                                        </a>
                                                        <a href="{{ url('show/campaign/' . $campaign->id) }}"
                                                            class="btn btn-sm btn-icon btn-info-light rounded-circle">
                                                            <button class="btn btn-sm btn-icon btn-info-light rounded-circle"
                                                                type="button" data-bs-toggle="modal"
                                                                data-bs-target="#viewUserModal"
                                                                data-user-id="{{ $campaign->id }}">
                                                                <i class="bi bi-eye"></i>
                                                            </button>
                                                        </a>

                                                        <button class="btn btn-sm btn-icon btn-secondary-light rounded-circle"
                                                            type="button" data-bs-toggle="modal"
                                                            data-bs-target="#deleteUserModal"
                                                            data-user-id="{{ $campaign->id }}">
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

                    <!-- Fake Pagination -->
                    <div class="d-flex justify-content-end">
                        {{ $campaigns->links('pagination::bootstrap-5') }}
                    </div>

                </div>
            </div>
        </div>
    </div>
    @include('modals.delete_campaign')

@endsection