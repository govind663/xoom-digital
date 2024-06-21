@extends('layouts.master')

@section('title')
Task | List
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
                    <h3 class="page-title">Task</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                        @if($task_status == 1)
                        <li class="breadcrumb-item active">All Pending Task List</li>
                        @elseif($task_status == 2)
                        <li class="breadcrumb-item active">All In Progress Task List</li>
                        @elseif($task_status == 3)
                        <li class="breadcrumb-item active">All Completed Task List</li>
                        @elseif($task_status == 4)
                        <li class="breadcrumb-item active">All Cancelled Task List</li>
                        @endif
                    </ul>
                </div>
            </div>
        </div>
        <!-- /Page Header -->

        <div class="row">
            <div class="col-sm-12">
                <div class="card p-3">
                    <div class="card-body">
                        {{-- <form method="POST" action="{{ route('task.search') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="row">
                                <div class="col-lg-3 col-md-12 col-sm-12">
                                    <div class="input-block">
                                        <label><b>Task Id : </b></b></label>
                                        <input type="text" id="task_id" name="task_id" class="form-control @error('task_id') is-invalid @enderror" value="{{ old('task_id', request('task_id')) }}" placeholder="Enter Task Id">
                                        @error('task_id')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-lg-3 col-md-12 col-sm-12">
                                    <div class="input-block mb-3">
                                        <label><b>Mobile Number : <span class="text-danger">*</span></b></b></label>
                                        <input type="text" id="customer_phone" name="customer_phone" class="form-control @error('customer_phone') is-invalid @enderror" value="{{ old('customer_phone', request('customer_phone')) }}" placeholder="Enter Mobile Number">
                                        @error('customer_phone')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-lg-3 col-md-12 col-sm-12">
                                    <div class="input-block mt-2 text-start">
                                        <br>
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </div>
                            </div>

                        </form> --}}
                        {{-- <div class="invoices-main-tabs">
                            <div class="row align-items-center">
                                <div class="col-lg-12">
                                    <div class="invoices-tabs">
                                        <ul>
                                            <li><a href="{{ route('sales-report-list.index', ['task_status'=>1]) }}">Pending</a></li>
                                            <li><a href="{{ route('sales-report-list.index', ['task_status'=>2]) }}">In Progress</a></li>
                                            <li><a href="{{ route('sales-report-list.index', ['task_status'=>3]) }}">Completed</a></li>
                                            <li><a href="{{ route('sales-report-list.index', ['task_status'=>4]) }}">Cancelled</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div> --}}
                    </div>

                    <div class="row card-body">
                        <div class="col-10">
                            @if($task_status == 1)
                            <h5 class="card-title">All Pending Task List</h5>
                            @elseif($task_status == 2)
                            <h5 class="card-title">All In Progress Task List</h5>
                            @elseif($task_status == 3)
                            <h5 class="card-title">All Completed Task List</h5>
                            @elseif($task_status == 4)
                            <h5 class="card-title">All Cancelled Task List</h5>
                            @endif
                        </div>
                    </div>

                    <div class="row card-body">

                        <div class="table-responsive">
                            <table class="data-table-export1 table table-responsive table-hover">
                                <thead>
                                    <tr>
                                        <th>Sr. No.</th>
                                        <th>Customer Name</th>
                                        <th>Package</th>
                                        <th>Amount</th>
                                        <th>Task Status</th>
                                        <th class="no-export d-flex">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($tasks as $key=>$value )
                                    <tr>
                                        <td>{{ ++$key }}</td>
                                        <td>{{ $value->customer_name }}</td>
                                        <td>{{ $value->package?->name }}</td>
                                        <td>{{ $value->package?->amount }}</td>

                                        @if($value->task_status == 1)
                                        <td><span class="badge bg-warning">Pending</span></td>
                                        @elseif($value->task_status == 2)
                                        <td><span class="badge bg-info">In Progress</span></td>
                                        @elseif($value->task_status == 3)
                                        <td><span class="badge bg-success">Completed</span></td>
                                        @elseif($value->task_status == 4)
                                        <td><span class="badge bg-danger">Cancelled</span></td>
                                        @endif

                                        @if (Auth::user()->user_type == '3')
                                        <td class="no-export d-flex">
                                            <a href="{{ route('sales-report-list.view', ['task_status'=>$value->task_status, 'task_id' => $value->id]) }}" class="btn btn-warning btn-sm text-dark">
                                                <i class="far fa-eye me-2"></i>view
                                            </a>
                                        </td>
                                        @elseif (Auth::user()->user_type == '2')
                                        <td class="no-export d-flex">
                                            <a href="{{ route('sales-report-list.edit', ['task_status'=>$value->task_status, 'task_id' => $value->id]) }}" class="btn btn-warning btn-sm text-dark">
                                                <i class="far fa-edit me-2"></i>Edit
                                            </a>
                                        </td>
                                        @endif
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
