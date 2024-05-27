@extends('layouts.master')

@section('title')
Leads | List
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
                    <h3 class="page-title">Leads</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">All Leads List</li>
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
                            <h5 class="card-title">All Leads List</h5>
                        </div>
                    </div>
                    <div class="card-body">

                        <div class="table-responsive">
                            <table class="data-table-export1 table table-responsive table-hover">
                                <thead>
                                    <tr>
                                        <th>Sr. No.</th>
                                        <th>Customer Name</th>
                                        <th>Package</th>
                                        <th>Date</th>
                                        <th>Lead By</th>
                                        <th>Task Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($tasks as $key=>$value )
                                    <tr>
                                        <td>{{ ++$key }}</td>
                                        <td>{{ $value->customer_name }}</td>
                                        <td>{{ $value->package?->name }}</td>
                                        <td>{{ date('d-m-Y', strtotime($value->inserted_at)) }}</td>
                                        <td>{{ $value->leadSource?->name }}</td>

                                        @if(!empty($value->task_status == '1'))
                                        <td><span class="badge bg-warning">{{ $status }}</span></td>
                                        @elseif(!empty($value->task_status == '2'))
                                        <td><span class="badge bg-info">{{ $status }}</span></td>
                                        @elseif(!empty($value->task_status == '3'))
                                        <td><span class="badge bg-success">Completed</span></td>
                                        @elseif(!empty($value->task_status == '4'))
                                        <td><span class="badge bg-danger">{{ $status }}</span></td>
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
               title: 'All Leads List',
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
