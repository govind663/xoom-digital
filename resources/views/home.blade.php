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

        <div class="row">
            {{-- Total Earning Money --}}
            {{-- <div class="col-xl-3 col-sm-6 col-12">
                <div class="card">
                    <div class="card-body border shadow">
                        <div class="dash-widget-header">
                            <span class="dash-widget-icon bg-1">
                                <img src="{{ asset('assets/img/indian_rupees_curancy.png') }}" alt="">
                                <i class="fa fa-file-alt"></i>
                            </span>
                            <div class="dash-count">
                                <div class="dash-title text-dark">Total Earning</div>
                                <div class="dash-counts text-dark">
                                    <p>0</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}

            {{-- Total Agents Count --}}
            {{-- <div class="col-xl-3 col-sm-6 col-12">
                <div class="card">
                    <div class="card-body border shadow">
                        <div class="dash-widget-header">
                            <span class="dash-widget-icon bg-2">
                                <i class="fas fa-user"></i>
                            </span>
                            <div class="dash-count">
                                <div class="dash-title text-dark">Total Agents</div>
                                <div class="dash-counts text-dark">
                                    <p>0</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}

            {{-- Total Retailer Count --}}
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
                                    <p>{{ $totalEmployee }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Total Policy Count --}}
            {{-- <div class="col-xl-3 col-sm-6 col-12">
                <div class="card">
                    <div class="card-body border shadow">
                        <div class="dash-widget-header">
                            <span class="dash-widget-icon bg-3">
                                <i class="fas fa-file-alt"></i>
                            </span>
                            <div class="dash-count">
                                <div class="dash-title text-dark">Total Policy</div>
                                <div class="dash-counts text-dark">
                                    <p>0</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}
        </div>

    </div>
</div>
<!-- /Page Wrapper -->
@endsection

@push('scripts')
@endpush
