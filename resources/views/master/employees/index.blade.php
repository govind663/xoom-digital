@extends('layouts.master')

@section('title')
Employee | List
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
    .d-flex1 {
        display: flex !important;
        flex-wrap: nowrap;
        flex-direction: row;
        align-content: center;
        justify-content: space-between;
        align-items: stretch;
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
                    <h3 class="page-title">Manage Employee</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">All Employee List</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- /Page Header -->

        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body d-flex1">
                        <div class="justify-content-start">
                            <h5 class="card-title">All Employee List</h5>
                        </div>
                        <div class="justify-content-end">
                            <a href="{{ route('employee.create') }}" class="btn btn-primary btn-sm">
                                <i class="fa fa-plus me-2" aria-hidden="true"></i>Employee
                            </a>
                        </div>
                    </div>
                    <div class="card-body">

                        <div class="table-responsive">
                            <table class="data-table-export1 table">
                                <thead>
                                    <tr>
                                        <th>Sr. No.</th>
                                        <th>Employee Id</th>
                                        <th>Name</th>
                                        <th>Mobile No.</th>
                                        <th>Email Id</th>
                                        <th>Employee Type</th>
                                        <th class="no-export">Edit </th>
                                        <th class="no-export">Delete </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($employees as $key=>$value )
                                    <tr>
                                        <td>{{ ++$key }}</td>
                                        <td>{{ $value->employee_code }}</td>
                                        <td>{{ $value->name }}</td>
                                        <td>{{ $value->mobile_no }}</td>
                                        <td>{{ $value->email }}</td>

                                        <td>
                                            @if($value->user_type == '2')
                                            <span class="badge bg-success" >Marketing Executive</span>
                                            @elseif($value->user_type == '3')
                                            <span class="badge bg-dark" >Telesales</span>
                                            @endif
                                        </td>

                                        <td class="no-export">
                                            <a href="{{ route('employee.edit', $value->id) }}">
                                                <button class="btn btn-warning btn-sm text-dark">
                                                    <i class="far fa-edit"></i>
                                                </button>
                                            </a>
                                        </td>

                                        <td class="no-export">
                                            <form action="{{ route('employee.destroy', $value->id) }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <input name="_method" type="hidden" value="DELETE">
                                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure to delete?')">
                                                    <i class="far fa-trash-alt"></i>
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
               title: 'All Employee List',
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
