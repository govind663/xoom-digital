@extends('layouts.master')

@section('title')
  Employee | Update
@endsection

@push('styles')
<style>
    .form-control {
        border: 1px solid #e77c09 !important;
    }
</style>
@endpush

@section('content')
<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="card mb-0">
            <div class="card-body">

                <div class="page-header">
                    <div class="content-page-header">
                        <h5>Edit Employee</h5>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <form method="POST" action="{{ route('employee.update', $employee->id) }}"  enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                            <input type="text" id="id" name="id" hidden  value="{{ $employee->id }}" >

                            <div class="form-group-customer customer-additional-form">
                                <div class="row">

                                    <div class="col-lg-4 col-md-12 col-sm-12">
                                        <div class="input-block mb-3">
                                            <label><b>Employee Type : <span class="text-danger">*</span></b></label>
                                            <select  class="form-control select @error('user_type') is-invalid @enderror" id="user_type" name="user_type">
                                                <option value="">Select Employee Type</option>
                                                {{-- <option value="1" {{ ( $employee->user_type == "1" ? "selected":"") }}>Admin</option> --}}
                                                <option value="2" {{ ( $employee->user_type == "2" ? "selected":"") }}>Marketing Executive</option>
                                                <option value="3" {{ ( $employee->user_type == "3" ? "selected":"") }}>Telesales</option>
                                            </select>
                                            @error('user_type')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-lg-4 col-md-6 col-sm-12">
                                        <div class="input-block mb-3">
                                            <label><b>Name : <span class="text-danger">*</span></b></label>
                                            <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ $employee->name }}" placeholder="Enter Name">

                                            @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-lg-4 col-md-6 col-sm-12">
                                        <div class="input-block mb-3">
                                            <label><b>Mobile Number : <span class="text-danger">*</span></b></label>
                                            <input type="text" maxlength="10" id="mobile_no" name="mobile_no" class="form-control @error('mobile_no') is-invalid @enderror" value="{{ $employee->mobile_no }}" placeholder="Enter Mobile Number">

                                            @error('mobile_no')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-lg-4 col-md-6 col-sm-12">
                                        <div class="input-block mb-3">
                                            <label><b>Email Id : <span class="text-danger">*</span></b></label>
                                            <input type="email" id="email" name="email" class="form-control @error('mobile_no') is-invalid @enderror" value="{{ $employee->email }}" placeholder="Enter Email Id">
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-lg-4 col-md-6 col-sm-12">
                                        <div class="input-block mb-3">
                                            <label><b>City : <span class="text-danger">*</span></b></label>
                                            <input type="text" id="city" name="city" class="form-control @error('city') is-invalid @enderror" value="{{ $employee->city }}" placeholder="Enter City">

                                            @error('city')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-lg-4 col-md-6 col-sm-12">
                                        <div class="input-block mb-3">
                                            <label><b>Designation : <span class="text-danger">*</span></b></label>
                                            <input type="text" id="designation" name="designation" class="form-control @error('designation') is-invalid @enderror" value="{{ $employee->designation }}" placeholder="Enter Designation">

                                            @error('designation')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="add-customer-btns text-start">
                                <a href="{{ route('employee.index') }}" class="btn btn-danger">Cancel</a>
                                <button type="submit" class="btn btn-success">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    var typed = "";
    $('#user_type').select2({
        language: {
            noResults: function(term) {
                typed = $('.select2-search__field').val();
            }
        }

    });
    $('#user_type').on('select2:select', function(e) {
        typed = ""; // clear
    });
    $("#but").on("click", function() {
        if (typed) {
            // var value = prompt("Do you have a state abbriviation for "+typed+"?"); // change typed to value where necessary

            // Set the value, creating a new option if necessary
            if ($('#user_type').find("option[value='" + typed + "']").length) {
                $('#user_type').val(typed).trigger('change');
            } else {
                // Create a DOM Option and pre-select by default

                var newOption = new Option(typed, typed, true, true);
                // Append it to the select
                $('#user_type').append(newOption).trigger('change');
            }
        }
    });
</script>
@endpush
