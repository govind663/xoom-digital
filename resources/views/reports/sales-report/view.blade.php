@extends('layouts.master')

@section('title')
  View Task | Update
@endsection

@push('styles')
<style>
    .form-control {
        border: 1px solid #e77c09 !important;
    }
    .d-flex {
        display: flex !important;
        flex-wrap: nowrap !important;
        justify-content: flex-end !important;
    }
    .pricing-table {
        display: flex;
        flex-flow: row wrap;
        width: 100%;
        max-width: 1100px;
        margin: 0 auto;
        background: #ffffff;
    }

    .pricing-table .ptable-item {
        width: 33.33%;
        padding: 0 15px;
        margin-bottom: 30px;
    }

        @media (max-width: 992px) {
        .pricing-table .ptable-item {
            width: 33.33%;
        }
    }

        @media (max-width: 768px) {
        .pricing-table .ptable-item {
            width: 50%;
        }
    }

        @media (max-width: 576px) {
        .pricing-table .ptable-item {
            width: 100%;
        }
    }

    .pricing-table .ptable-single {
        position: relative;
        width: 100%;
        overflow: hidden;
    }

    .pricing-table .ptable-body,
    .pricing-table .ptable-footer {
        position: relative;
        width: 100%;
        text-align: center;
        overflow: hidden;
    }

    .pricing-table .ptable-status ,
    .pricing-table .ptable-title {
        position: relative;
        width: 100%;
        text-align: justify;
    }
    .pricing-table .ptable-price {
        position: relative;
        width: 100%;
        text-align: center;
    }

    .pricing-table .ptable-description {
        position: relative;
        width: 100%;
        text-align:justify;
    }

    .pricing-table .ptable-single {
        background: #f6f8fa;
    }

    .pricing-table .ptable-single:hover {
        box-shadow: 0 0 10px #999999;
    }

    .pricing-table .ptable-status {
        margin-top: -30px;
    }

    .pricing-table .ptable-status span {
        position: relative;
        display: inline-block;
        width: 50px;
        height: 30px;
        padding: 5px 0;
        text-align: justify;
        color: #FF6F61;
        font-size: 14px;
        font-weight: 300;
        letter-spacing: 1px;
        background: #2A293E;
    }

    .pricing-table .ptable-status span::before,
    .pricing-table .ptable-status span::after {
        content: "";
        position: absolute;
        bottom: 0;
        width: 0;
        height: 0;
        border-bottom: 10px solid #FF6F61;
    }

    .pricing-table .ptable-status span::before {
        right: 50%;
        border-right: 25px solid transparent;
    }

    .pricing-table .ptable-status span::after {
        left: 50%;
        border-left: 25px solid transparent;
    }

    .pricing-table .ptable-title h2 {
        color: #0c0c0c;
        font-size: 22px;
        font-weight: 300;
        letter-spacing: 2px;
        text-align: justify;
    }
    .pricing-table .ptable-title h3 {
        color: #0c0c0c;
        font-size: 23px;
        font-weight: 500;
        text-align: justify;
    }

    .pricing-table .ptable-title h4 {
        color: #443e3e;
        font-size: 18px;
        font-weight: 200;
        letter-spacing: 2px;
        text-align: justify;
    }

    .pricing-table .ptable-title h5 {
        color: #1f1818;
        font-size: 18px;
        font-weight: 500;
        text-align: justify;
    }

    .pricing-table .ptable-price h2 {
        margin: 0;
        color: #443e3e;
        font-size: 45px;
        font-weight: 700;
        margin-left: 15px;
    }

    .pricing-table .ptable-price h2 small {
        position: absolute;
        font-size: 18px;
        font-weight: 300;
        margin-top: 16px;
        margin-left: -15px;
    }

    .pricing-table .ptable-price h2 span {
        margin-left: 3px;
        font-size: 16px;
        font-weight: 300;
    }

    .pricing-table .ptable-body {
        padding: 20px 0;
    }

    .pricing-table .ptable-footer {
        padding-bottom: 30px;
    }
    #input-group-text {
        align-items: center !important;
        padding: .375rem .75rem !important;
        font-size: 2rem !important;
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
                        <h5>View Task</h5>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="wizard">
                            <ul class="nav nav-tabs justify-content-center" id="myTab" role="tablist">
                                <li class="nav-item flex-fill" role="presentation" data-bs-toggle="tooltip" data-bs-placement="top" title="Customer Details">
                                    <a class="nav-link active rounded-circle mx-auto d-flex align-items-center justify-content-center" href="#step1" id="step1-tab" data-bs-toggle="tab" role="tab" aria-controls="step1" aria-selected="true">
                                        <i class="far fa-user"></i>
                                    </a>
                                </li>

                                <li class="nav-item flex-fill" role="presentation" data-bs-toggle="tooltip" data-bs-placement="top" title="Package Details">
                                    <a class="nav-link rounded-circle mx-auto d-flex align-items-center justify-content-center" href="#step2" id="step2-tab" data-bs-toggle="tab" role="tab" aria-controls="step2" aria-selected="false">
                                        <i class="fe fe-file-text"></i>
                                    </a>
                                </li>

                                <li class="nav-item flex-fill" role="presentation" data-bs-toggle="tooltip" data-bs-placement="top" title="Lead Details">
                                    <a class="nav-link rounded-circle mx-auto d-flex align-items-center justify-content-center" href="#step3" id="step3-tab" data-bs-toggle="tab" role="tab" aria-controls="step3" aria-selected="false">
                                        <i class="fe fe-clipboard"></i>
                                    </a>
                                </li>

                                <li class="nav-item flex-fill" role="presentation" data-bs-toggle="tooltip" data-bs-placement="top" title="Task Details">
                                    <a class="nav-link rounded-circle mx-auto d-flex align-items-center justify-content-center" href="#step4" id="step4-tab" data-bs-toggle="tab" role="tab" aria-controls="step4" aria-selected="false">
                                        <i class="fe fe-clipboard"></i>
                                    </a>
                                </li>

                                <li class="nav-item flex-fill" role="presentation" data-bs-toggle="tooltip" data-bs-placement="top" title="Payment Details">
                                    <a class="nav-link rounded-circle mx-auto d-flex align-items-center justify-content-center" href="#step5" id="step5-tab" data-bs-toggle="tab" role="tab" aria-controls="step5" aria-selected="false">
                                        <i class="fas fa-credit-card"></i>
                                    </a>
                                </li>
                            </ul>

                            <div class="tab-content" id="myTabContent">
                                {{-- Customer Details --}}
                                <div class="tab-pane fade show active p-5" role="tabpanel" id="step1" aria-labelledby="step1-tab">
                                    <div class="mb-4">
                                        <h5 class="card-title text-primary mb-2">Customer Details : -</h5>
                                    </div>
                                    <fieldset>
                                        <div class="row">
                                            <div class="col-lg-4 col-md-6 col-sm-12">
                                                <div class="input-block mb-3">
                                                    <label><b>Name : <span class="text-danger">*</span></b></label>
                                                    <input type="text" readonly class="form-control" value="{{ $task->customer_name }}">
                                                </div>
                                            </div>

                                            <div class="col-lg-4 col-md-6 col-sm-12">
                                                <div class="input-block mb-3">
                                                    <label><b>Email : </b></label>
                                                    <input type="email" readonly class="form-control" value="{{ $task->customer_email }}">
                                                </div>
                                            </div>

                                            <div class="col-lg-4 col-md-6 col-sm-12">
                                                <div class="input-block mb-3">
                                                    <label><b>Mobile Number : <span class="text-danger">*</span></b></label>
                                                    <input type="text" readonly class="form-control" value="{{ $task->customer_phone }}">
                                                </div>
                                            </div>

                                            <div class="col-lg-4 col-md-6 col-sm-12">
                                                <div class="input-block mb-3">
                                                    <label><b>Pincode : <span class="text-danger">*</span></b></label>
                                                    <input type="text" readonly class="form-control" value="{{ $task->customer_pincode }}">
                                                </div>
                                            </div>

                                            <div class="col-lg-4 col-md-6 col-sm-12">
                                                <div class="input-block mb-3">
                                                    <label><b>City : <span class="text-danger">*</span></b></label>
                                                    <input type="text" readonly class="form-control" value="{{ $task->customer_city }}">
                                                </div>
                                            </div>

                                            <div class="col-lg-4 col-md-6 col-sm-12">
                                                <div class="input-block mb-3">
                                                    <label><b>Address : <span class="text-danger">*</span></b></label>
                                                    <textarea type="text" readonly class="form-control" value="{{ $task->customer_address }}">{{ $task->customer_address }}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </fieldset>
                                    <div class="d-flex">
                                        <a class="btn btn btn-primary next">Next</a>
                                    </div>
                                </div>

                                {{-- Packages Details --}}
                                <div class="tab-pane fade p-5" role="tabpanel" id="step2" aria-labelledby="step2-tab">
                                    <div class="mb-4">
                                        <h5 class="card-title text-primary mb-2">Packages Details : -</h5>
                                    </div>
                                    <fieldset>
                                        <div class="row">

                                            {{-- Pricing Section Start --}}
                                            <div class="pricing-table">
                                                <div class="ptable-item">
                                                    <div class="ptable-single" style="height: 500px !important;">
                                                        <img src="{{ url('/') }}/xoom_digital/package/image/{{ $packages->image }}" alt="priceing Banner" style="height: 130px; width:100%" >

                                                        <div class="ptable-body p-3">
                                                            <div class="ptable-title pb-2">
                                                                <h3 style="text-align: left !important;">
                                                                    {{ $packages->name }}
                                                                </h3>
                                                                <h5 style="text-align: left !important;">
                                                                    {{ $packages->packageType?->name }}
                                                                </h5>
                                                            </div>

                                                            <div class="ptable-description">
                                                                <p>
                                                                    {!! $packages->description !!}
                                                                </p>
                                                            </div>
                                                        </div>
                                                        <div class="ptable-footer">
                                                            <div class="ptable-price">
                                                                <h5>
                                                                    <span>RS</span> {{ $packages->amount }}
                                                                </h5>
                                                            </div>
                                                            <div id="input-group-text">
                                                                <input type="checkbox" id="package_id" name="package_id" style="border: 1px solid #e77c09;"  class="form-check-input" value="{{ $packages->package_type_id }}" {{  ($task->package_id == $packages->package_type_id ? ' checked' : '') }} >
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            {{-- Pricing Section End --}}
                                        </div>
                                    </fieldset>
                                    <div class="d-flex">
                                        <a class="btn btn btn-primary previous me-2"> Back</a>
                                        <a class="btn btn btn-primary next">Continue</a>
                                    </div>
                                </div>

                                {{-- Lead Details --}}
                                <div class="tab-pane fade p-5" role="tabpanel" id="step3"  aria-labelledby="step3-tab">
                                    <div class="mb-4">
                                        <h5 class="card-title text-primary mb-2">Lead Details : -</h5>
                                    </div>
                                    @php
                                        $leadBy = '';
                                        if($task->lead_source_id == 1){
                                            $leadBy = "Google";
                                        } elseif($task->lead_source_id == 2){
                                            $leadBy = "Facebook";
                                        } elseif($task->lead_source_id == 3){
                                            $leadBy = "Instagram";
                                        } elseif($task->lead_source_id == 4){
                                            $leadBy = "WhatsApp";
                                        } elseif($task->lead_source_id == 5){
                                            $leadBy = "Online";
                                        } elseif($task->lead_source_id == 6){
                                            $leadBy = "Direct Call";
                                        } elseif($task->lead_source_id == 7){
                                            $leadBy = "Social Media";
                                        }
                                    @endphp
                                    <fieldset>
                                        <div class="row">
                                            <div class="col-lg-4 col-md-6 col-sm-12">
                                                <div class="input-block mb-3" >
                                                    <label><b>Select Lead Source : <span class="text-danger">*</span></b></label>
                                                    <input type="text" readonly class="form-control" value="{{ $leadBy }}">
                                                </div>
                                            </div>

                                            <div class="col-lg-4 col-md-6 col-sm-12">
                                                <div class="input-block mb-3">
                                                    <label><b>Lead Date : <span class="text-danger">*</span></b></b></label>
                                                    <div class="cal-icon cal-icon-info">
                                                        <input type="text" readonly class="form-control" value="{{ $task->lead_dt }}">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-lg-4 col-md-6 col-sm-12">
                                                <div class="input-block mb-3">
                                                    <label><b>Meating Date : <span class="text-danger">*</span></b></b></label>
                                                    <div class="cal-icon cal-icon-info">
                                                        <input type="text" readonly class="form-control" value="{{ $task->meating_dt }}">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-lg-4 col-md-6 col-sm-12">
                                                <div class="input-block mb-3">
                                                    <label><b>Meating Time : <span class="text-danger">*</span></b></label>
                                                    <input type="time" readonly class="form-control" value="{{ $task->meating_time }}">
                                                </div>
                                            </div>
                                        </div>
                                    </fieldset>
                                    <div class="d-flex">
                                        <a class="btn btn btn-primary previous me-2"> Back</a>
                                        <a class="btn btn btn-primary next">Continue</a>
                                    </div>
                                </div>

                                {{-- Task Details --}}
                                <div class="tab-pane fade p-5" role="tabpanel" id="step4"  aria-labelledby="step4-tab">
                                    <div class="mb-4">
                                        <h5 class="card-title text-primary mb-2">Task Details : -</h5>
                                    </div>
                                    @php
                                        $taskStatus = '';
                                        if($task->task_status == 1){
                                            $taskStatus = "Pending";
                                        } elseif($task->task_status == 2){
                                            $taskStatus = "In Progress";
                                        } elseif($task->task_status == 3){
                                            $taskStatus = "Completed";
                                        } elseif($task->task_status == 4){
                                            $taskStatus = "Cancelled";
                                        }
                                    @endphp
                                    <fieldset>
                                        <div class="row">
                                            <div class="col-lg-4 col-md-6 col-sm-12">
                                                <div class="input-block mb-3" >
                                                    <label><b>Select Task Status : <span class="text-danger">*</span></b></label>
                                                    <input type="text" readonly class="form-control" value="{{ $taskStatus }}">
                                                </div>
                                            </div>

                                            <div class="col-lg-4 col-md-6 col-sm-12">
                                                <div class="input-block mb-3" >
                                                    <label><b>Select Assign To : <span class="text-danger">*</span></b></label>
                                                    <input type="text" readonly class="form-control" value="{{ $task->user?->name }}">
                                                </div>
                                            </div>
                                        </div>
                                    </fieldset>
                                    <div class="d-flex">
                                        <a class="btn btn btn-primary previous me-2"> Back</a>
                                        <a class="btn btn btn-primary next">Continue</a>
                                    </div>
                                </div>

                                {{-- Payment Details --}}
                                <div class="tab-pane fade p-5" role="tabpanel" id="step5"  aria-labelledby="step5-tab">
                                    <div class="mb-4">
                                        <h5 class="card-title text-primary mb-2">Payment Details : -</h5>
                                    </div>
                                    @php
                                        $paymentRecivedStatus = '';
                                        if($task->payment_receive_status == 1){
                                            $paymentRecivedStatus = "Pending";
                                        } elseif($task->payment_receive_status == 2){
                                            $paymentRecivedStatus = "In Progress";
                                        } elseif($task->payment_receive_status == 3){
                                            $paymentRecivedStatus = "Completed";
                                        } elseif($task->payment_receive_status == 4){
                                            $paymentRecivedStatus = "Cancelled";
                                        }

                                        $paymentType = '';
                                        if($task->payment_type == 1){
                                            $paymentType = "Cash";
                                        } elseif($task->payment_type == 2){
                                            $paymentType = "Cheque";
                                        } elseif($task->payment_type == 3){
                                            $paymentType = "Online Transfer";
                                        } elseif($task->payment_type == 4){
                                            $paymentType = "GooglePay";
                                        } elseif($task->payment_type == 5){
                                            $paymentType = "PhonePay";
                                        }
                                    @endphp
                                    <fieldset>
                                        <div class="row">
                                            <div class="col-lg-4 col-md-6 col-sm-12">
                                                <div class="input-block mb-3" >
                                                    <label><b>Select Payment Received Status : <span class="text-danger">*</span></b></label>
                                                    <input type="text" readonly class="form-control" value="{{ $paymentRecivedStatus }}">
                                                </div>
                                            </div>

                                            <div class="col-lg-4 col-md-6 col-sm-12">
                                                <div class="input-block mb-3" >
                                                    <label><b>Select Payment Type : <span class="text-danger">*</span></b></label>
                                                    <input type="text" readonly class="form-control" value="{{ $paymentType }}">
                                                </div>
                                            </div>

                                            <div class="col-lg-4 col-md-6 col-sm-12">
                                                <div class="input-block mb-3">
                                                    <label><b>Advanced Payment : <span class="text-danger">*</span></b></b></label>
                                                    <input type="text" readonly class="form-control" value="{{ $task->advanced_payment }}">
                                                </div>
                                            </div>

                                            <div class="col-lg-4 col-md-6 col-sm-12">
                                                <div class="input-block mb-3">
                                                    <label><b>Balance Payment : <span class="text-danger">*</span></b></b></label>
                                                    <input type="text" readonly class="form-control" value="{{ $task->balance_payment }}">
                                                </div>
                                            </div>
                                        </div>
                                    </fieldset>
                                    <div class="d-flex">
                                        <a class="btn btn-primary previous me-2">Previous</a>
                                        @if($task_status == 1 || $task_status == 2 || $task_status == 3 || $task_status == 4)
                                        <a href="{{ route('sales-report-list.index', ['task_status'=>$task_status]) }}" class="btn btn-danger me-2">Cancel</a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
@endpush
