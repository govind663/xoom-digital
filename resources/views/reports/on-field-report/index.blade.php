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
        /* align-items: center;
        justify-content: center; */
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
        width: 213px;
        background: #262626;
        top: -60px;
        left: -125px;
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
        text-align: center;
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
                            <div class="table-responsive">
                                <div class="wrapper">
                                    <div class="user-card">
                                        <div class="user-card-img">
                                            <img src="https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEjxivAs4UknzmDfLBXGMxQkayiZDhR2ftB4jcIV7LEnIEStiUyMygioZnbLXCAND-I_xWQpVp0jv-dv9NVNbuKn4sNpXYtLIJk2-IOdWQNpC2Ldapnljifu0pnQqAWU848Ja4lT9ugQex-nwECEh3a96GXwiRXlnGEE6FFF_tKm66IGe3fzmLaVIoNL/s1600/img_avatar.png" alt="">
                                        </div>
                                        <div class="user-card-info">
                                            <h2>{{ $value->customer_name }}</h2>
                                            <p><span>Email : - </span> {{ $value->customer_email }}</p>
                                            <p><span>Mobile Number : - </span> {{ $value->customer_phone }}</p>
                                            <p><span>Pincode : - </span> {{ $value->customer_pincode }}</p>
                                            <p><span>City : - </span> {{ $value->customer_city }}</p>
                                            <p><span>Address : - </span> {{ $value->customer_address }}</p>
                                        </div>
                                        <div class="col-6 float-end">
                                            <a href="{{ route('task.create') }}" class="btn btn-primary btn-sm">
                                                <i class="fa fa-plus-circle me-2" aria-hidden="true"></i>Update
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
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
