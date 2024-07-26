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
    .d-flex1 {
        display: flex !important;
        flex-wrap: nowrap;
        flex-direction: row;
        align-content: flex-start;
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
                                @if($task_status == 01 || $task_status == 02 || $task_status == 04)
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
                                @elseif($task_status == 01 || $task_status == 02 || $task_status == 03 || $task_status == 04)
                                    <li class="nav-item flex-fill" role="presentation" data-bs-toggle="tooltip" data-bs-placement="top" title="Payment Details">
                                        <a class="nav-link rounded-circle mx-auto d-flex align-items-center justify-content-center" href="#step5" id="step5-tab" data-bs-toggle="tab" role="tab" aria-controls="step5" aria-selected="false">
                                            <i class="fas fa-credit-card"></i>
                                        </a>
                                    </li>
                                @endif
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
                                                    <label><b>Name : </b></label>
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
                                                    <label><b>Mobile Number : </b></label>
                                                    <input type="text" readonly class="form-control" value="{{ $task->customer_phone }}">
                                                </div>
                                            </div>

                                            <div class="col-lg-4 col-md-6 col-sm-12">
                                                <div class="input-block mb-3">
                                                    <label><b>Address : </b></label>
                                                    <textarea type="text" readonly class="form-control" value="{{ $task->customer_address }}">{{ $task->customer_address }}</textarea>
                                                </div>
                                            </div>

                                            <div class="col-lg-4 col-md-6 col-sm-12">
                                                <div class="input-block mb-3">
                                                    <label><b>Area : </b></label>
                                                    <input type="text" readonly class="form-control" value="{{ $task->customer_area }}">
                                                </div>
                                            </div>

                                            <div class="col-lg-4 col-md-6 col-sm-12">
                                                <div class="input-block mb-3">
                                                    <label><b>Pincode : </b></label>
                                                    <input type="text" readonly class="form-control" value="{{ $task->customer_pincode }}">
                                                </div>
                                            </div>

                                            <div class="col-lg-4 col-md-6 col-sm-12">
                                                <div class="input-block mb-3">
                                                    <label><b>City : </b></label>
                                                    <input type="text" readonly class="form-control" value="{{ $task->customer_city }}">
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
                                        <div class="row d-flex1 align-items-center justify-content-centers">
                                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-4">
                                                <div class="packages card" style="border: 1px solid #e77c09 !important;">
                                                    <div class="package-header d-flex justify-content-between">
                                                        <div class="d-flex1 justify-content-between w-100">
                                                            <div class>
                                                                <h6>{{ $packages->packageType?->name }}</h6>
                                                                <h5>{{ $packages->name }}</h5>
                                                            </div>
                                                            <span class="icon-frame d-flex1 align-items-center justify-content-center">
                                                                <img src="{{ url('/') }}/xoom_digital/package/image/{{ $packages->image }}" alt="img">
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <p style="text-align: justify !important;">
                                                        {!! $packages->description !!}
                                                    </p>
                                                    <h2>
                                                        <span>RS</span> {{ $packages->amount }}
                                                    </h2>

                                                    <div id="input-group-text">
                                                        <input type="checkbox"  style="border: 1px solid #e77c09;"  class="form-check-input" value="{{ $packages->package_type_id }}" checked>
                                                    </div>

                                                    {{-- <div class="justify-content-center package-edit">
                                                        <a class="btn-action-icon me-2" href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#edit_package">
                                                            <i class="fe fe-edit"></i>
                                                        </a>
                                                    </div> --}}
                                                </div>
                                            </div>
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
                                                    <label><b>Select Lead Source : </b></label>
                                                    <input type="text" readonly class="form-control" value="{{ $leadBy }}">
                                                </div>
                                            </div>

                                            <div class="col-lg-4 col-md-6 col-sm-12">
                                                <div class="input-block mb-3">
                                                    <label><b>Lead Date : </b></b></label>
                                                    <div class="cal-icon cal-icon-info">
                                                        <input type="text" readonly class="form-control" value="{{ $task->lead_dt }}">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-lg-4 col-md-6 col-sm-12">
                                                <div class="input-block mb-3">
                                                    <label><b>Meeting Date : </b></b></label>
                                                    <div class="cal-icon cal-icon-info">
                                                        <input type="text" readonly class="form-control" value="{{ $task->meating_dt }}">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-lg-4 col-md-6 col-sm-12">
                                                <div class="input-block mb-3">
                                                    <label><b>Meeting Time : </b></label>
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
                                        if($task->task_status == 01){
                                            $taskStatus = "Meeting";
                                        } elseif($task->task_status == 02){
                                            $taskStatus = "Follow Up";
                                        } elseif($task->task_status == 03){
                                            $taskStatus = "Deal Closed";
                                        } elseif($task->task_status == 04){
                                            $taskStatus = "Not Interested";
                                        }
                                    @endphp
                                    <fieldset>
                                        <div class="row">
                                            <div class="col-lg-4 col-md-6 col-sm-12">
                                                <div class="input-block mb-3" >
                                                    <label><b>Select Task Status : </b></label>
                                                    <input type="text" readonly class="form-control" value="{{ $taskStatus }}">
                                                </div>
                                            </div>

                                            <div class="col-lg-4 col-md-6 col-sm-12">
                                                <div class="input-block mb-3" >
                                                    <label><b>Select Assign To : </b></label>
                                                    <input type="text" readonly class="form-control" value="{{ $task->user?->name }}">
                                                </div>
                                            </div>

                                            @if ($task_status == 03)
                                                <div class="row ">
                                                    <h6 class="card-title text-primary mb-1">Follow-Up Details : -</h6>
                                                    <div class="col-lg-4 col-md-6 col-sm-12">
                                                        <div class="input-block mb-3">
                                                            <label><b>Date : </b></b></label>
                                                            <div class="cal-icon cal-icon-info">
                                                                <input type="text" readonly class="form-control" value="{{ $tasks->follow_up_dt }}">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-4 col-md-6 col-sm-12">
                                                        <div class="input-block mb-3">
                                                            <label><b>Notes : </b></b></label>
                                                            <textarea type="text"  readonly class="form-control" value="{{ $tasks->comment }}">{{ $tasks->comment }}</textarea>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-4 col-md-6 col-sm-12">
                                                        <div class="input-block mb-3 ">
                                                            <label><b>Upload Purposel : </b></label>
                                                            @if(!empty($task->perposel_doc))
                                                                <a href="{{url('/')}}/xoom_digital/perposel_doc/{{ $task->perposel_doc }}" target="_blank" class="btn btn-primary btn-sm">
                                                                    <b> View Document</b>
                                                                </a>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif
                                        </div>
                                    </fieldset>
                                    @if($task_status == 01 || $task_status == 02 || $task_status == 04)
                                    <div class="d-flex">
                                        <a class="btn btn-primary previous me-2">Previous</a>
                                        @if($task_status == 01 || $task_status == 02 || $task_status == 03 || $task_status == 04)
                                             <a href="{{ route('sales-report-list.index', ['task_status'=>$task_status]) }}" class="btn btn-danger me-2">Cancel</a>
                                        @endif
                                    </div>
                                    @elseif ( $task_status == 03)
                                        <div class="d-flex">
                                            <a class="btn btn btn-primary previous me-2"> Back</a>
                                            <a class="btn btn btn-primary next">Continue</a>
                                        </div>
                                    @endif
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
                                                    <label><b>Select Payment Received Status : </b></label>
                                                    <input type="text" readonly class="form-control" value="{{ $paymentRecivedStatus }}">
                                                </div>
                                            </div>

                                            <div class="col-lg-4 col-md-6 col-sm-12">
                                                <div class="input-block mb-3" >
                                                    <label><b>Select Payment Type : </b></label>
                                                    <input type="text" readonly class="form-control" value="{{ $paymentType }}">
                                                </div>
                                            </div>

                                            <div class="col-lg-4 col-md-6 col-sm-12">
                                                <div class="input-block mb-3">
                                                    <label><b>Advanced Payment : </b></b></label>
                                                    <input type="text" readonly class="form-control" value="{{ $task->advanced_payment }}">
                                                </div>
                                            </div>

                                            <div class="col-lg-4 col-md-6 col-sm-12">
                                                <div class="input-block mb-3">
                                                    <label><b>Balance Payment : </b></b></label>
                                                    <input type="text" readonly class="form-control" value="{{ $task->balance_payment }}">
                                                </div>
                                            </div>
                                        </div>
                                    </fieldset>
                                    <div class="d-flex">
                                        <a class="btn btn-primary previous me-2">Previous</a>
                                        @if($task_status == 01 || $task_status == 02 || $task_status == 03 || $task_status == 04)
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
