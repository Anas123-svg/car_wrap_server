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
                            <form id="searchForm">
                                <div class="input-group w-500">
                                    <input type="text" class="form-control" placeholder="Search by name, email or phone" aria-describedby="button-addon2" id="searchInput">
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
                            <a href="javascript:void(0);" class="btn btn-primary btn-block float-end my-2" data-bs-toggle="modal" data-bs-target="#add-user">
                                <i class="fa fa-plus-square me-2"></i>Add Driver
                            </a>
                            <div class="modal fade" id="add-user" tabindex="-1" aria-labelledby="add-userLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h6 class="modal-title" id="add-userLabel">Add Driver</h6>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body px-4">
                                            <div class="row gy-3">
                                                <div class="col-xl-12">
                                                    <label for="user-name" class="form-label">Driver Name</label>
                                                    <input type="text" class="form-control" id="user-name" placeholder="Enter Name">
                                                </div>
                                                <div class="col-xl-12">
                                                    <label class="form-label">Designation</label>
                                                    <input type="text" class="form-control" id="user-designation" placeholder="Enter Designation">
                                                </div>
                                                <div class="col-xl-12">
                                                    <div class="file-upload-text">
                                                        <input type="file" id="user-file-input" multiple>
                                                        <label for="user-file-input" class="text-primary fs-13">
                                                            <img src="https://via.placeholder.com/40" class="rounded-circle h-20p w-20p" alt="">
                                                            Upload Profile
                                                        </label>
                                                        <i class="fa fa-times-circle remove"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
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
                    <div class="card-header border-bottom-0 px-5 d-flex justify-content-between align-items-center">
                        <h2 class="card-title mb-0">Drivers Table</h2>
                    </div>
                    <div class="e-table px-5 pb-5">
                        <div class="table-responsive table-lg">
                            <table class="table border-top table-bordered mb-0 text-nowrap">
                                <thead>
                                    <tr>
                                        <th class="text-center">ID</th>
                                        <th>Drivers</th>
                                        <th>Phone</th>
                                        <th>Status</th>
                                        <th>Date</th>
                                        <th class="text-center">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="user-list">
                                        <td class="align-middle text-center">1</td>
                                        <td class="align-middle text-center">
                                            <div class="d-flex align-items-center flex-wrap gap-1">
                                                <img alt="Driver Profile" class="avatar avatar-sm br-7 me-2" src="https://via.placeholder.com/40">
                                                <p class="text-nowrap align-middle mb-0">John Doe</p>
                                            </div>
                                        </td>
                                        <td class="text-nowrap align-middle">+123456789</td>
                                        <td class="text-nowrap align-middle">
                                            <span class="badge bg-success-transparent">Active</span>
                                        </td>
                                        <td class="text-nowrap align-middle">
                                            <span>01 Jan 2024</span>
                                        </td>
                                        <td class="align-middle">
                                            <div class="btn-list">
                                                <button class="btn btn-sm btn-icon btn-info-light rounded-circle" data-bs-toggle="modal" data-bs-target="#user-form-modal">
                                                    <i class="bi bi-pencil-square"></i>
                                                </button>
                                                <button class="btn btn-sm btn-icon btn-secondary-light rounded-circle" data-bs-toggle="modal" data-bs-target="#deleteUserModal">
                                                    <i class="bi bi-trash"></i>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                    <!-- You can duplicate the above row for more static entries -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- Fake Pagination -->
                <div class="d-flex justify-content-end mt-3">
                    <nav>
                        <ul class="pagination">
                            <li class="page-item disabled"><a class="page-link" href="#">Previous</a></li>
                            <li class="page-item active"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">Next</a></li>
                        </ul>
                    </nav>
                </div>

            </div>
        </div>
    </div>
</div>

@endsection
