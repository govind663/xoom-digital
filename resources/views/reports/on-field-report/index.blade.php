@extends('layouts.master')

@section('title')
Assigned Task Leads | List
@endsection

@push('styles')
<style>
    .btn-secondary {
        color: #fff;
        background-color: #e77c09 !important;
        border-color: #e77c09 !important;
    }
    .pagination li.active a.page-link {
        background: #e77c09 !important;
        border-color: #e77c09 !important;
        border-radius: 5px;
    }
    table.dataTable thead > tr > th.dt-orderable-asc, table.dataTable thead > tr > th.dt-orderable-desc, table.dataTable thead > tr > th.dt-ordering-asc, table.dataTable thead > tr > th.dt-ordering-desc, table.dataTable thead > tr > td.dt-orderable-asc, table.dataTable thead > tr > td.dt-orderable-desc, table.dataTable thead > tr > td.dt-ordering-asc, table.dataTable thead > tr > td.dt-ordering-desc {
        position: relative;
        padding-right: 0px !important;
    }
    table.dataTable th.dt-type-numeric, table.dataTable th.dt-type-date, table.dataTable td.dt-type-numeric, table.dataTable td.dt-type-date {
        text-align: left !important;
    }
    .form-control {
        border: 1px solid #e77c09 !important;
    }
    .form-group-customer {
        border-bottom: 0px solid #efefef !important;
        margin: 0 0 0px !important;
        padding: 0 0 0px !important;
    }
    .user-card {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: space-evenly;
        background-color: #fff;
        border-radius: 10px;
        padding: 40px;
        width: 100%;
        position: relative;
        overflow: hidden;
        box-shadow: 0 2px 20px -5px rgba(0,0,0,0.5);
        border: 1px solid #e77c09 !important;
    }

    .user-card:before {
        content: '';
        position: absolute;
        height: 300%;
        width: 300px;
        background: #1a1716;
        top: -70px;
        left: -135px;
        z-index: 0;
        transform: rotate(17deg);
    }

    .user-card-img {
        display: flex;
        justify-content: center;
        align-items: center;
        z-index: 3;
    }

    .user-card-img img {
        width: 200px;
        height: 200px;
        object-fit: cover;
        border-radius: 50%;
    }

    .user-card-info {
        text-align: justify;
    }

    .user-card-info h2 {
        font-size: 24px;
        margin: 0;
        margin-bottom: 10px;
        font-family: 'Bebas Neue', sans-serif;
        letter-spacing: 3px;
    }

    .user-card-info p {
        font-size: 14px;
        margin-bottom: 2px;
    }

    .user-card-info p span {
        font-weight: 700;
        margin-right: 10px;
    }

    @media only screen and (min-width: 768px) {
        .user-card {
            flex-direction: row;
            align-items: flex-start;
        }
        .user-card-img {
            margin-right: 20px;
            margin-bottom: 0;
        }

        .user-card-info {
            text-align: left;
        }
    }

    @media (max-width: 767px){
        .wrapper{
            padding-top: 3%;
        }
        .user-card:before {
            width: 300%;
            height: 200px;
            transform: rotate(0);
        }
        .user-card-info h2 {
            margin-top: 25px;
            font-size: 35px;
        }
        .user-card-info p span {
            display: block;
            margin-bottom: 15px;
            font-size: 18px;
        }
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
                    <h3 class="page-title">Assigned Task Leads</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">All Assigned Task Leads List</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- /Page Header -->

        <div class="row">
            <div class="col-sm-12">
                <div class="card">

                    <div class="row card-body">
                        <div class="col-10">
                            <h5 class="card-title">All Assigned Task Leads List</h5>
                        </div>
                    </div>

                    <div class="row card-body">
                        @foreach ($tasks as $key=>$value )
                            <div class="table-responsive pb-3">
                                <div class="wrapper">
                                    <div class="user-card">
                                        <div class="user-card-img">
                                            <img src="{{ asset('assets/profile/img_avatar.png') }}" alt="">
                                        </div>
                                        <div class="user-card-info">
                                            <h2>{{ $value->customer_name }}</h2>
                                            <p><span>Email : - </span> {{ $value->customer_email }}</p>
                                            <p><span>Mobile Number : - </span> {{ $value->customer_phone }}</p>
                                            <p><span>Pincode : - </span> {{ $value->customer_pincode }}</p>
                                            <p><span>City : - </span> {{ $value->customer_city }}</p>
                                            <p><span>Address : - </span> {{ $value->customer_address }}</p>
                                        </div>
                                        <div style="col-2 float-end">
                                            <a class="btn btn-primary" href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#add_followup">
                                                <i class="fa fa-edit me-2" aria-hidden="true"></i>Update
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{-- Update Followup Model Start --}}
                            <div class="modal custom-modal fade" id="add_followup" role="dialog">
                                <div class="modal-dialog modal-dialog-centered modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header border-0 pb-0">
                                            <div class="form-header modal-header-title text-start mb-0">
                                                <h4 class="mb-0">Update Follow Up</h4>
                                            </div>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <form action="#">
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-lg-4 col-md-6 col-sm-12">
                                                        <div class="input-block mb-3" >
                                                            <label><b>Select Status : <span class="text-danger">*</span></b></label>
                                                            <select class="@error('task_status') is-invalid @enderror select" id="task_status" name="task_status">
                                                                <option value="">Select Status</option>
                                                                <option value="1" {{ (old("task_status") == "1" ? "selected":"") }}>Pending</option>
                                                                <option value="2" {{ (old("task_status") == "2" ? "selected":"") }}>In Progress</option>
                                                                <option value="3" {{ (old("task_status") == "3" ? "selected":"") }}>Completed</option>
                                                                <option value="4" {{ (old("task_status") == "4" ? "selected":"") }}>Cancelled</option>
                                                            </select>
                                                            @error('task_status')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-4 col-md-6 col-sm-12">
                                                        <div class="input-block mb-3">
                                                            <label><b>Date : <span class="text-danger">*</span></b></b></label>
                                                            <div class="cal-icon cal-icon-info">
                                                                <input type="text"  id="meating_dt" name="meating_dt" class="form-control datetimepicker @error('meating_dt') is-invalid @enderror" value="{{ old('meating_dt') }}" placeholder="DD-MM-YYYY">
                                                                @error('meating_dt')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-4 col-md-6 col-sm-12">
                                                        <div class="input-block mb-3">
                                                            <label><b>Time : <span class="text-danger">*</span></b></label>
                                                            <input type="time" id="meating_time" name="meating_time" class="form-control @error('meating_time') is-invalid @enderror" value="{{ old('meating_time') }}" placeholder="Enter Time">

                                                            @error('meating_time')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                                        <div class="input-block mb-3">
                                                            <label><b>Description : <span class="text-danger">*</span></b></label>
                                                            <textarea type="text" id="customer_address" row="5" col="5"  name="customer_address" class="form-control @error('customer_address') is-invalid @enderror" value="{{ old('customer_address') }}" placeholder="Enter Description">{{ old('customer_address') }}</textarea>

                                                            @error('customer_address')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" data-bs-dismiss="modal" class="btn btn-danger me-2">Cancel</button>
                                                <button type="submit" data-bs-dismiss="modal" class="btn btn-success me-2">Update</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            {{-- Update Followup Model End --}}
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
<!-- /Page Wrapper -->
@endsection

@push('scripts')
<script>
    $('.data-table-export1').DataTable({
        scrollCollapse: true,
        autoWidth: true,
        responsive: true,
        columnDefs: [{
            targets: "datatable-nosort",
            orderable: false,
        }],
        "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
        "pageLength": 10,
        "language": {
            "info": "_START_-_END_ of _TOTAL_ entries",
            searchPlaceholder: "Search",
            // paginate: {
            //     next: '<i class="ion-chevron-right"></i>',
            //     previous: '<i class="ion-chevron-left"></i>'
            // }
        },
        dom: 'Bfrtip',
        buttons: [
            {
                extend: 'copy',
                text: 'Copy',
                className: 'btn btn-default',
                exportOptions: {
                    columns: ':not(.no-export)'
                }
            },
            {
                extend: 'csv',
                text: 'Excel',
                className: 'btn btn-default',
                exportOptions: {
                    columns: ':not(.no-export)'
                }
            },
            {
                extend: 'pdf',
                text: 'PDF',
                className: 'btn btn-default',
                exportOptions: {
                    columns: ':not(.no-export)',
                },
               header: true,
               title: 'All Task List',
               orientation: 'landscape',
               pageSize: 'A4',
               customize: function(doc) {
                  doc.defaultStyle.fontSize = 16; //<-- set fontsize to 16 instead of 10
                  doc.defaultStyle.fontFamily = "sans-serif";
                // doc.defaultStyle.font = 'Arial';

               }
            },
            {
                extend: 'print',
                text: 'Print',
                className: 'btn btn-default',
                exportOptions: {
                    columns: ':not(.no-export)'
                }
            },
        ]
    });
</script>
@endpush
