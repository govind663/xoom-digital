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
                        <li class="breadcrumb-item active">All Task List</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- /Page Header -->

        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <form method="POST" action="{{ route('task.search') }}" enctype="multipart/form-data">
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

                        </form>
                    </div>

                    <div class="row card-body">
                        <div class="col-10">
                            <h5 class="card-title">All Task List</h5>
                        </div>
                        <div class="col-2 float-right">
                            <a href="{{ route('task.create') }}" class="btn btn-primary btn-sm">
                                <i class="fa fa-plus-circle me-2" aria-hidden="true"></i>Task
                            </a>
                        </div>
                    </div>
                    <div class="row card-body">

                        <div class="table-responsive">
                            <table class="data-table-export1 table table-responsive table-hover">
                                <thead>
                                    <tr>
                                        <th>Sr. No.</th>
                                        <th>Task Id</th>
                                        <th>Customer Name</th>
                                        <th>Package</th>
                                        <th>Mobile Number</th>
                                        <th>Date</th>
                                        <th class="no-export d-flex">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($tasks as $key=>$value )
                                    <tr>
                                        <td>{{ ++$key }}</td>
                                        <td>{{ $value->task_id }}</td>
                                        <td>{{ $value->customer_name }}</td>
                                        <td>{{ $value->package?->name }}</td>
                                        <td>{{ $value->customer_phone }}</td>
                                        <td>{{ date('d-m-Y', strtotime($value->inserted_at)) }}</td>

                                        <td class="no-export d-flex">
                                            <a href="{{ route('task.edit', $value->id) }}" class="btn btn-warning btn-sm text-dark">
                                                <i class="far fa-edit me-2"></i>Edit
                                            </a>
                                            &nbsp;
                                            <form action="{{ route('task.destroy', $value->id) }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <input name="_method" type="hidden" value="DELETE">
                                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure to delete?')">
                                                    <i class="far fa-trash-alt me-2"></i>Delete
                                                </button>
                                            </form>
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
