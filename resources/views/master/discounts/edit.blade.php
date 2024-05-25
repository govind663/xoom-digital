@extends('layouts.master')

@section('title')
  Discount | Update
@endsection

@push('styles')
<style>
    .form-control {
        border: 1px solid #e77c09 !important;
    }
    .note-editor.note-airframe, .note-editor.note-frame {
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
                        <h5>Edit Discount</h5>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <form method="POST" action="{{ route('discount.update', $discount->id) }}"  enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                            <input type="text" id="id" name="id" hidden  value="{{ $discount->id }}" >

                            <div class="form-group-customer customer-additional-form">
                                <div class="row">

                                    <div class="col-lg-4 col-md-6 col-sm-12">
                                        <div class="input-block mb-3">
                                            <label><b>Coupon Name : <span class="text-danger">*</span></b></label>
                                            <input type="text" id="coupon_name" name="coupon_name" class="form-control @error('coupon_name') is-invalid @enderror" value="{{ $discount->coupon_name }}" placeholder="Enter Coupon Name">

                                            @error('coupon_name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-lg-4 col-md-6 col-sm-12">
                                        <div class="input-block mb-3">
                                            <label><b>Coupon Code : <span class="text-danger">*</span></b></label>
                                            <input type="text" id="coupon_code" name="coupon_code" class="form-control @error('coupon_code') is-invalid @enderror" value="{{ $discount->coupon_code }}" placeholder="Enter Coupon Code">

                                            @error('coupon_code')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-lg-3 col-md-12 col-sm-12">
                                        <div class="input-block mb-3">
                                            <label><b>Valid Till Date : <span class="text-danger">*</span></b></b></label>
                                            <div class="cal-icon cal-icon-info">
                                                <input type="text"  id="coupon_valid_to" name="coupon_valid_to" class="form-control datetimepicker @error('coupon_valid_to') is-invalid @enderror" value="{{ $discount->coupon_valid_to }}" placeholder="DD-MM-YYYY">
                                                @error('coupon_valid_to')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-4 col-md-12 col-sm-12">
                                        <div class="input-block mb-3" >
                                            <label><b>Discount Type : <span class="text-danger">*</span></b></label>
                                            <select class="@error('coupon_type') is-invalid @enderror select" id="coupon_type" name="coupon_type">
                                                <option value="">Select Discount Type</option>
                                                <option value="1" {{ ($discount->coupon_type == '1' ? "selected":"") }}>Percentage</option>
                                                <option value="2" {{ ($discount->coupon_type == '2' ? "selected":"") }}>Fixed</option>
                                            </select>
                                            @error('coupon_type')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-lg-4 col-md-12 col-sm-12 1 box" style="display:none">
                                        <div class="input-block mb-3" >
                                            <label><b>Percentage : </b></label>
                                            <input type="text" id="coupon_value_percentage" name="coupon_value_percentage" class="form-control" value="{{ $discount->coupon_value_percentage }}" placeholder="Enter Percentage">
                                        </div>
                                    </div>

                                    <div class="col-lg-4 col-md-12 col-sm-12 2 box" style="display:none">
                                        <div class="input-block mb-3" >
                                            <label><b>Fixed :</b></label>
                                            <input type="text" id="coupon_value_fixed" name="coupon_value_fixed" class="form-control" value="{{ $discount->coupon_value_fixed }}" placeholder="Enter Fixed">
                                        </div>
                                    </div>



                                </div>
                            </div>

                            <div class="add-customer-btns text-start">
                                <a href="{{ route('discount.index') }}" class="btn btn-danger">Cancel</a>
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
    $(document).ready(function(){
        $("select").change(function(){
            $(this).find("option:selected").each(function(){
                var optionValue = $(this).attr("value");
                if(optionValue){
                    $(".box").not("." + optionValue).hide();
                    $("." + optionValue).show();
                } else{
                    $(".box").hide();
                }
            });
        }).change();
    });
</script>
@endpush
