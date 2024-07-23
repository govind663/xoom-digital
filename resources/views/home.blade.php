@extends('layouts.master')

@section('title')
Xoom Digital | Home
@endsection

@push('styles')
<style>
    img {
        max-width: 100%;
        /* height: 100% !important; */
    }
    .card-body {
        color: #1a1a1b;
        border-bottom: 5px solid #e77c09 !important;
        border-bottom-left-radius: 3px;
        border-bottom-right-radius: 3px;
    }
</style>
@endpush

@section('content')
<!-- Page Wrapper -->
<div class="page-wrapper">
    <div class="content container-fluid">

        <!-- Page Header -->
        <div class="page-header">
            <div class="row">
                <div class="col">
                    <h3 class="page-title">Dashboard</h3>
                    <ul class="breadcrumb">
                        {{-- <li class="breadcrumb-item active">Home</li> --}}
                    </ul>
                </div>
            </div>
        </div>
        <!-- /Page Header -->

        @if(Auth::user()->user_type == 1)
            <div class="row">
                {{-- Total Employee Count --}}
                <div class="col-xl-3 col-sm-6 col-12">
                    <div class="card">
                        <div class="card-body border shadow">
                            <div class="dash-widget-header">
                                <span class="dash-widget-icon bg-2">
                                    <i class="fas fa-users"></i>
                                </span>
                                <div class="dash-count">
                                    <div class="dash-title text-dark">Total Employee</div>
                                    <div class="dash-counts text-dark">
                                        <p>{{ $totalEmployee ? $totalEmployee : 0 }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Total Task Counts --}}
                <div class="col-xl-3 col-sm-6 col-12">
                    <div class="card">
                        <div class="card-body border shadow">
                            <div class="dash-widget-header">
                                <span class="dash-widget-icon bg-3">
                                    <i class="fas fa-file-edit"></i>
                                </span>
                                <div class="dash-count">
                                    <div class="dash-title text-dark">Total Task</div>
                                    <div class="dash-counts text-dark">
                                        <p>{{ $totalTask ? $totalTask : 0 }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Total Pending Task Counts --}}
                <div class="col-xl-3 col-sm-6 col-12">
                    <div class="card">
                        <div class="card-body border shadow">
                            <div class="dash-widget-header">
                                <span class="dash-widget-icon bg-3">
                                    <i class="fas fa-file-edit"></i>
                                </span>
                                <div class="dash-count">
                                    <div class="dash-title text-dark">Total Pending Task</div>
                                    <div class="dash-counts text-dark">
                                        <p>
                                            {{ $totalPendingTask ? $totalPendingTask : 0 }}</p>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Total In Progress Task Counts --}}
                <div class="col-xl-3 col-sm-6 col-12">
                    <div class="card">
                        <div class="card-body border shadow">
                            <div class="dash-widget-header">
                                <span class="dash-widget-icon bg-3">
                                    <i class="fas fa-file-edit"></i>
                                </span>
                                <div class="dash-count">
                                    <div class="dash-title text-dark">Total In Progress Task</div>
                                    <div class="dash-counts text-dark">
                                        <p>
                                            {{ $totalInProgressTask ? $totalInProgressTask : 0 }}</p>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Total Completed Task Counts --}}
                <div class="col-xl-3 col-sm-6 col-12">
                    <div class="card">
                        <div class="card-body border shadow">
                            <div class="dash-widget-header">
                                <span class="dash-widget-icon bg-3">
                                    <i class="fas fa-file-edit"></i>
                                </span>
                                <div class="dash-count">
                                    <div class="dash-title text-dark">Total Completed Task</div>
                                    <div class="dash-counts text-dark">
                                        <p>
                                            {{ $totalCompletedTask ? $totalCompletedTask : 0 }}</p>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Total Cancelled Task Counts --}}
                <div class="col-xl-3 col-sm-6 col-12">
                    <div class="card">
                        <div class="card-body border shadow">
                            <div class="dash-widget-header">
                                <span class="dash-widget-icon bg-3">
                                    <i class="fas fa-file-edit"></i>
                                </span>
                                <div class="dash-count">
                                    <div class="dash-title text-dark">Total Cancelled Task</div>
                                    <div class="dash-counts text-dark">
                                        <p>
                                            {{ $totalCancelledTask ? $totalCancelledTask : 0 }}</p>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @elseif (Auth::user()->user_type == 3)
            <div class="row">
                {{-- Total Task Counts --}}
                <div class="col-xl-3 col-sm-6 col-12">
                    <div class="card">
                        <div class="card-body border shadow">
                            <div class="dash-widget-header">
                                <span class="dash-widget-icon bg-3">
                                    <i class="fas fa-file-edit"></i>
                                </span>
                                <div class="dash-count">
                                    <div class="dash-title text-dark">Total Task</div>
                                    <div class="dash-counts text-dark">
                                        <p>{{ $totalSalesTask ? $totalSalesTask : 0 }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Total Pending Task Counts --}}
                <div class="col-xl-3 col-sm-6 col-12">
                    <div class="card">
                        <div class="card-body border shadow">
                            <div class="dash-widget-header">
                                <span class="dash-widget-icon bg-3">
                                    <i class="fas fa-file-edit"></i>
                                </span>
                                <div class="dash-count">
                                    <div class="dash-title text-dark">Total Pending Task</div>
                                    <div class="dash-counts text-dark">
                                        <p>
                                            {{ $totalSalesPendingTask ? $totalSalesPendingTask : 0 }}</p>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Total In Progress Task Counts --}}
                <div class="col-xl-3 col-sm-6 col-12">
                    <div class="card">
                        <div class="card-body border shadow">
                            <div class="dash-widget-header">
                                <span class="dash-widget-icon bg-3">
                                    <i class="fas fa-file-edit"></i>
                                </span>
                                <div class="dash-count">
                                    <div class="dash-title text-dark">Total In Progress Task</div>
                                    <div class="dash-counts text-dark">
                                        <p>
                                            {{ $totalSalesInProgressTask ? $totalSalesInProgressTask : 0 }}</p>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Total Completed Task Counts --}}
                <div class="col-xl-3 col-sm-6 col-12">
                    <div class="card">
                        <div class="card-body border shadow">
                            <div class="dash-widget-header">
                                <span class="dash-widget-icon bg-3">
                                    <i class="fas fa-file-edit"></i>
                                </span>
                                <div class="dash-count">
                                    <div class="dash-title text-dark">Total Completed Task</div>
                                    <div class="dash-counts text-dark">
                                        <p>
                                            {{ $totalSalesCompletedTask ? $totalSalesCompletedTask : 0 }}</p>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Total Cancelled Task Counts --}}
                <div class="col-xl-3 col-sm-6 col-12">
                    <div class="card">
                        <div class="card-body border shadow">
                            <div class="dash-widget-header">
                                <span class="dash-widget-icon bg-3">
                                    <i class="fas fa-file-edit"></i>
                                </span>
                                <div class="dash-count">
                                    <div class="dash-title text-dark">Total Cancelled Task</div>
                                    <div class="dash-counts text-dark">
                                        <p>
                                            {{ $totalSalesCancelledTask ? $totalSalesCancelledTask : 0 }}</p>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        @elseif (Auth::user()->user_type == 2)
            <div class="row">
                {{-- Total Assigned Task Counts --}}
                <div class="col-xl-3 col-sm-6 col-12">
                    <div class="card">
                        <div class="card-body border shadow">
                            <div class="dash-widget-header">
                                <span class="dash-widget-icon bg-3">
                                    <i class="fas fa-file-edit"></i>
                                </span>
                                <div class="dash-count">
                                    <div class="dash-title text-dark">Total Assigned Task</div>
                                    <div class="dash-counts text-dark">
                                        <p>{{ $totalOnFiledAssignedTask ? $totalOnFiledAssignedTask : 0 }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Total Pending Task Counts --}}
                <div class="col-xl-3 col-sm-6 col-12">
                    <div class="card">
                        <div class="card-body border shadow">
                            <div class="dash-widget-header">
                                <span class="dash-widget-icon bg-3">
                                    <i class="fas fa-file-edit"></i>
                                </span>
                                <div class="dash-count">
                                    <div class="dash-title text-dark">Total Pending Task</div>
                                    <div class="dash-counts text-dark">
                                        <p>
                                            {{ $totalOnFiledPendingTask ? $totalOnFiledPendingTask : 0 }}</p>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Total In Progress Task Counts --}}
                <div class="col-xl-3 col-sm-6 col-12">
                    <div class="card">
                        <div class="card-body border shadow">
                            <div class="dash-widget-header">
                                <span class="dash-widget-icon bg-3">
                                    <i class="fas fa-file-edit"></i>
                                </span>
                                <div class="dash-count">
                                    <div class="dash-title text-dark">Total In Progress Task</div>
                                    <div class="dash-counts text-dark">
                                        <p>
                                            {{ $totalOnFiledInProgressTask ? $totalOnFiledInProgressTask : 0 }}</p>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Total Completed Task Counts --}}
                <div class="col-xl-3 col-sm-6 col-12">
                    <div class="card">
                        <div class="card-body border shadow">
                            <div class="dash-widget-header">
                                <span class="dash-widget-icon bg-3">
                                    <i class="fas fa-file-edit"></i>
                                </span>
                                <div class="dash-count">
                                    <div class="dash-title text-dark">Total Completed Task</div>
                                    <div class="dash-counts text-dark">
                                        <p>
                                            {{ $totalOnFiledCompletedTask ? $totalOnFiledCompletedTask : 0 }}</p>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Total Cancelled Task Counts --}}
                <div class="col-xl-3 col-sm-6 col-12">
                    <div class="card">
                        <div class="card-body border shadow">
                            <div class="dash-widget-header">
                                <span class="dash-widget-icon bg-3">
                                    <i class="fas fa-file-edit"></i>
                                </span>
                                <div class="dash-count">
                                    <div class="dash-title text-dark">Total Cancelled Task</div>
                                    <div class="dash-counts text-dark">
                                        <p>
                                            {{ $totalOnFiledCancelledTask ? $totalOnFiledCancelledTask : 0 }}</p>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        @endif

    </div>
</div>
<!-- /Page Wrapper -->
@endsection

@push('scripts')
@endpush
