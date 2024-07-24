@extends('layouts.master')

@section('title')
Task | Add
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
                            <h5>Add Task</h5>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-12 p-20">
                            <div class="wizard">
                                <form method="POST" class="p-3" action="{{ route('task.store') }}" enctype="multipart/form-data">
                                    @csrf

                                    <input type="hidden" id="lead_by" name="lead_by" value="{{ Auth::user()->id }}">

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

                                        <li class="nav-item flex-fill 03 box" role="presentation" data-bs-toggle="tooltip" data-bs-placement="top" title="Payment Details">
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
                                                            <input type="text" id="customer_name" name="customer_name" class="form-control @error('customer_name') is-invalid @enderror" value="{{ old('customer_name') }}" placeholder="Enter Name">

                                                            @error('customer_name')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-4 col-md-6 col-sm-12">
                                                        <div class="input-block mb-3">
                                                            <label><b>Email : </b></label>
                                                            <input type="email" id="customer_email" name="customer_email" class="form-control @error('customer_email') is-invalid @enderror" value="{{ old('customer_email') }}" placeholder="Enter Email">

                                                            @error('customer_email')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-4 col-md-6 col-sm-12">
                                                        <div class="input-block mb-3">
                                                            <label><b>Mobile Number : <span class="text-danger">*</span></b></label>
                                                            <input type="text" id="customer_phone" maxlength="10" name="customer_phone" class="form-control @error('customer_phone') is-invalid @enderror" value="{{ old('customer_phone') }}" placeholder="Enter Mobile Number">

                                                            @error('customer_phone')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-4 col-md-6 col-sm-12">
                                                        <div class="input-block mb-3">
                                                            <label><b>Address : <span class="text-danger">*</span></b></label>
                                                            <textarea type="text" id="customer_address" row="3"  name="customer_address" class="form-control @error('customer_address') is-invalid @enderror" value="{{ old('customer_address') }}" placeholder="Enter Address">{{ old('customer_address') }}</textarea>

                                                            @error('customer_address')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-4 col-md-6 col-sm-12">
                                                        <div class="input-block mb-3">
                                                            <label><b>Area : <span class="text-danger">*</span></b></label>
                                                            <input type="text" id="customer_area" name="customer_area" class="form-control @error('customer_area') is-invalid @enderror" value="{{ old('customer_area') }}" placeholder="Enter Area">

                                                            @error('customer_area')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-4 col-md-6 col-sm-12">
                                                        <div class="input-block mb-3">
                                                            <label><b>Pincode : <span class="text-danger">*</span></b></label>
                                                            <input type="text" maxlength="6" id="customer_pincode" name="customer_pincode" class="form-control @error('customer_pincode') is-invalid @enderror" value="{{ old('customer_pincode') }}" placeholder="Enter Pincode">

                                                            @error('customer_pincode')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-4 col-md-6 col-sm-12">
                                                        <div class="input-block mb-3">
                                                            <label><b>City : <span class="text-danger">*</span></b></label>
                                                            <input type="text" id="customer_city" name="customer_city" class="form-control @error('customer_city') is-invalid @enderror" value="{{ old('customer_city') }}" placeholder="Enter City">

                                                            @error('customer_city')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
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
                                                        {{-- <input type="checkbox" id="package_id" name="package_id" style="border: 1px solid #e77c09;"  class="form-check-input" value="1" > --}}
                                                        @foreach($packages as $package)
                                                        <div class="ptable-item">
                                                            <div class="ptable-single"  style="height: 500px !important;">
                                                                <img src="{{ url('/') }}/xoom_digital/package/image/{{ $package->image }}" alt="priceing Banner" style="height: 130px; width:100%" >

                                                                <div class="ptable-body p-3">
                                                                    <div class="ptable-title pb-2">
                                                                        <h3>
                                                                            {{ $package->name }}
                                                                        </h3>
                                                                        <h5>
                                                                            {{ $package->packageType?->name }}
                                                                        </h5>
                                                                    </div>

                                                                    <div class="ptable-description">
                                                                        <p>
                                                                            {!! $package->description !!}
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                                <div class="ptable-footer">
                                                                    <div class="ptable-price">
                                                                        <h5>
                                                                            <span>RS</span> {{ $package->amount }}
                                                                        </h5>
                                                                    </div>
                                                                    <div id="input-group-text">
                                                                        <input type="checkbox" id="package_id" name="package_id" style="border: 1px solid #e77c09;"  class="form-check-input" value="{{ $package->package_type_id }}" {{  ( old('package_id') == $package->package_type_id ? ' checked' : '') }}>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        @endforeach
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
                                            <fieldset>
                                                <div class="row">
                                                    <div class="col-lg-4 col-md-6 col-sm-12">
                                                        <div class="input-block mb-3" >
                                                            <label><b>Select Lead Source : <span class="text-danger">*</span></b></label>
                                                            <select class="@error('lead_source_id') is-invalid @enderror select" id="lead_source_id" name="lead_source_id">
                                                                <option value="">Select Lead Source</option>
                                                                <option value="1" {{ (old("lead_source_id") == "1" ? "selected":"") }}>Google</option>
                                                                <option value="2" {{ (old("lead_source_id") == "2" ? "selected":"") }}>Facebook</option>
                                                                <option value="3" {{ (old("lead_source_id") == "3" ? "selected":"") }}>Instagram</option>
                                                                <option value="4" {{ (old("lead_source_id") == "4" ? "selected":"") }}>WhatsApp</option>
                                                                <option value="5" {{ (old("lead_source_id") == "5" ? "selected":"") }}>Online</option>
                                                                <option value="6" {{ (old("lead_source_id") == "6" ? "selected":"") }}>Direct Call</option>
                                                                <option value="7" {{ (old("lead_source_id") == "7" ? "selected":"") }}>Social Media</option>
                                                            </select>
                                                            @error('lead_source_id')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-4 col-md-6 col-sm-12">
                                                        <div class="input-block mb-3">
                                                            <label><b>Lead Date : <span class="text-danger">*</span></b></b></label>
                                                            <div class="cal-icon cal-icon-info">
                                                                <input type="text"  id="lead_dt" name="lead_dt" class="form-control datetimepicker @error('lead_dt') is-invalid @enderror" value="{{ old('lead_dt') }}" placeholder="DD-MM-YYYY">
                                                                @error('lead_dt')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-4 col-md-6 col-sm-12">
                                                        <div class="input-block mb-3">
                                                            <label><b>Meating Date : <span class="text-danger">*</span></b></b></label>
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
                                                            <label><b>Meating Time : <span class="text-danger">*</span></b></label>
                                                            <input type="time" id="meating_time" name="meating_time" class="form-control @error('meating_time') is-invalid @enderror" value="{{ old('meating_time') }}" placeholder="Enter Meating Time">

                                                            @error('meating_time')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
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
                                            <fieldset>
                                                <div class="row">
                                                    <div class="col-lg-4 col-md-6 col-sm-12">
                                                        <div class="input-block mb-3" >
                                                            <label><b>Select Task Status : <span class="text-danger">*</span></b></label>
                                                            <select class="@error('task_status') is-invalid @enderror select" id="task_status" name="task_status">
                                                                <option value="">Select Task Status</option>
                                                                <option value="01" {{ (old("task_status") == "01" ? "selected":"") }}>Meating</option>
                                                                <option value="02" {{ (old("task_status") == "02" ? "selected":"") }}>Follow Up</option>
                                                                <option value="03" {{ (old("task_status") == "03" ? "selected":"") }}>Deal Closed</option>
                                                                <option value="04" {{ (old("task_status") == "04" ? "selected":"") }}>Not Interested</option>
                                                            </select>
                                                            @error('task_status')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-4 col-md-6 col-sm-12">
                                                        <div class="input-block mb-3" >
                                                            <label><b>Select Assign To : <span class="text-danger">*</span></b></label>
                                                            <select class="@error('user_id') is-invalid @enderror select" id="user_id" name="user_id">
                                                                <option value="">Select Assign To</option>
                                                                @foreach($users as $user)
                                                                <option value="{{ $user->id }}" {{ (old("user_id") == $user->id ? "selected":"") }}>{{ $user->name }}</option>
                                                                @endforeach
                                                            </select>
                                                            @error('user_id')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="row 02 box" style="display:none">
                                                        <h6 class="card-title text-primary mb-1">Follow-Up Details : -</h6>
                                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                                            <div class="input-block mb-3">
                                                                <label><b>Date : </b></b></label>
                                                                <div class="cal-icon cal-icon-info">
                                                                    <input type="text"  id="follow_up_dt" name="follow_up_dt" class="form-control datetimepicker @error('follow_up_dt') is-invalid @enderror" value="{{ old('follow_up_dt') }}" placeholder="DD-MM-YYYY">
                                                                    @error('follow_up_dt')
                                                                        <span class="invalid-feedback" role="alert">
                                                                            <strong>{{ $message }}</strong>
                                                                        </span>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                                            <div class="input-block mb-3">
                                                                <label><b>Notes : </b></b></label>
                                                                <textarea type="text"  id="comment" name="comment" class="form-control @error('comment') is-invalid @enderror" value="{{ old('comment') }}" placeholder="Enter Notes">{{ old('comment') }}</textarea>
                                                                @error('comment')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                                            <div class="input-block mb-3 ">
                                                                <label><b>Upload Purposel : </b></label>
                                                                <input type="file" onchange="agentPreviewFile()" id="perposel_doc" name="perposel_doc"  class="form-control @error('perposel_doc') is-invalid @enderror" value="{{ old('perposel_doc') }}" accept=".pdf, .png, .jpg, .jpeg">
                                                                <small class="text-secondary"><b>Note : The file size  should be less than 2MB .</b></small>
                                                                <br>
                                                                <small class="text-secondary"><b>Note : Only files in .jpg, .jpeg, .png, .pdf format can be uploaded .</b></small>
                                                                @error('perposel_doc')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>
                                                            <div id="agent-preview-container">
                                                                <div id="agent-file-preview"></div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </fieldset>

                                            <div class="col-sm-12 01 box" style="display:none !important; text-align: end;">
                                                <a class="btn btn-primary previous me-2">Back</a>
                                                <a href="{{ route('task.index') }}" class="btn btn-danger me-2">Cancel</a>
                                                <button type="submit" class="btn btn-success">Submit</button>
                                            </div>

                                            <div class="col-sm-12 02 box" style="display:none !important; text-align: end;">
                                                <a class="btn btn-primary previous me-2">Back</a>
                                                <a href="{{ route('task.index') }}" class="btn btn-danger me-2">Cancel</a>
                                                <button type="submit" class="btn btn-success">Submit</button>
                                            </div>

                                            <div class="col-sm-12 03 box"  style="display:none !important; text-align: end;">
                                                <a class="btn btn btn-primary previous me-2"> Back</a>
                                                <a class="btn btn btn-primary next">Continue</a>
                                            </div>

                                            <div class="col-sm-12 04 box" style="display:none !important; text-align: end;">
                                                <a class="btn btn-primary previous me-2">Back</a>
                                                <a href="{{ route('task.index') }}" class="btn btn-danger me-2">Cancel</a>
                                                <button type="submit" class="btn btn-success">Submit</button>
                                            </div>
                                        </div>

                                        {{-- Payment Details --}}
                                        <div class="tab-pane fade p-5" role="tabpanel" id="step5"  aria-labelledby="step5-tab">
                                            <div class="mb-4">
                                                <h5 class="card-title text-primary mb-2">Payment Details : -</h5>
                                            </div>
                                            <fieldset>
                                                <div class="row">
                                                    <div class="col-lg-4 col-md-6 col-sm-12">
                                                        <div class="input-block mb-3" >
                                                            <label><b>Select Payment Received Status : <span class="text-danger">*</span></b></label>
                                                            <select class="@error('payment_receive_status') is-invalid @enderror select" id="payment_receive_status" name="payment_receive_status">
                                                                <option value="">Select Payment Received Status</option>
                                                                <option value="1" {{ (old("payment_receive_status") == "1" ? "selected":"") }}>Pending</option>
                                                                <option value="2" {{ (old("payment_receive_status") == "2" ? "selected":"") }}>Received</option>
                                                                <option value="3" {{ (old("payment_receive_status") == "3" ? "selected":"") }}>Not Received</option>
                                                                <option value="4" {{ (old("payment_receive_status") == "4" ? "selected":"") }}>Cancelled</option>
                                                                <option value="5" {{ (old("payment_receive_status") == "5" ? "selected":"") }}>Refunded</option>
                                                            </select>
                                                            @error('payment_receive_status')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-4 col-md-6 col-sm-12">
                                                        <div class="input-block mb-3" >
                                                            <label><b>Select Payment Type : <span class="text-danger">*</span></b></label>
                                                            <select class="@error('payment_type') is-invalid @enderror select" id="payment_type" name="payment_type">
                                                                <option value="">Select Payment Type</option>
                                                                <option value="1" {{ (old("payment_type") == "1" ? "selected":"") }}>Cash</option>
                                                                <option value="2" {{ (old("payment_type") == "2" ? "selected":"") }}>Cheque</option>
                                                                <option value="3" {{ (old("payment_type") == "3" ? "selected":"") }}>Online Transfer</option>
                                                                <option value="4" {{ (old("payment_type") == "4" ? "selected":"") }}>GooglePay</option>
                                                                <option value="5" {{ (old("payment_type") == "5" ? "selected":"") }}>PhonePay</option>
                                                            </select>
                                                            @error('payment_type')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-4 col-md-6 col-sm-12">
                                                        <div class="input-block mb-3">
                                                            <label><b>Advanced Payment : <span class="text-danger">*</span></b></b></label>
                                                            <input type="hidden"  id="current_package_amt" name="current_package_amt" class="form-control" value="{{ old('current_package_amt') }}" >
                                                            <input type="text"  id="advanced_payment" name="advanced_payment" class="form-control @error('advanced_payment') is-invalid @enderror" value="{{ old('advanced_payment') }}" placeholder="Enter Advanced Payment">
                                                            @error('advanced_payment')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-4 col-md-6 col-sm-12">
                                                        <div class="input-block mb-3">
                                                            <label><b>Balance Payment : <span class="text-danger">*</span></b></b></label>
                                                            <input type="text" readonly  id="balance_payment" name="balance_payment" class="form-control @error('balance_payment') is-invalid @enderror" value="{{ old('balance_payment') }}" placeholder="Enter Balance Payment">
                                                            @error('balance_payment')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </fieldset>
                                            <div class="d-flex">
                                                <a class="btn btn-primary previous me-2">Back</a>
                                                <a href="{{ route('task.index') }}" class="btn btn-danger me-2">Cancel</a>
                                                <button type="submit" class="btn btn-success">Submit</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
{{-- Fetch Balance Amounts --}}
<script>
    $(document).ready(function(){
        $(document).on('change','#package_id', function() {
            let package_id = $(this).val();
            $('#current_package_amt').show();
            $.ajax({
                method: 'POST',
                url: "{{ route('task.package.amount') }}",
                data: {
                    packageId: package_id,
                    _token : '{{ csrf_token() }}'
                },
                dataType: 'json',
                success: function (result) {
                    $('#current_package_amt').val(result.amount);
                },
            });
        });
    });
</script>

{{-- Calculate Balance Amount Based on (current_package_amt) --}}
<script>
    $(document).ready(function(){
        $(document).on('keyup','#advanced_payment', function() {
            let current_package_amt = $('#current_package_amt').val();
            let advanced_payment = $('#advanced_payment').val();
            let balance_payment = current_package_amt - advanced_payment;
            $('#balance_payment').val(balance_payment);
        });
    });
</script>

{{-- Add Search Filter Lead Source --}}
<script>
    var typed = "";
    $('#lead_source_id').select2({
        language: {
            noResults: function(term) {
                typed = $('.select2-search__field').val();
            }
        }

    });
    $('#lead_source_id').on('select2:select', function(e) {
        typed = ""; // clear
    });
    $("#but").on("click", function() {
        if (typed) {
            // var value = prompt("Do you have a state abbriviation for "+typed+"?"); // change typed to value where necessary

            // Set the value, creating a new option if necessary
            if ($('#lead_source_id').find("option[value='" + typed + "']").length) {
                $('#lead_source_id').val(typed).trigger('change');
            } else {
                // Create a DOM Option and pre-select by default

                var newOption = new Option(typed, typed, true, true);
                // Append it to the select
                $('#lead_source_id').append(newOption).trigger('change');
            }
        }
    });
</script>

{{-- Add Search Filter Task Status --}}
<script>
    var typed = "";
    $('#task_status').select2({
        language: {
            noResults: function(term) {
                typed = $('.select2-search__field').val();
            }
        }

    });
    $('#task_status').on('select2:select', function(e) {
        typed = ""; // clear
    });
    $("#but").on("click", function() {
        if (typed) {
            // var value = prompt("Do you have a state abbriviation for "+typed+"?"); // change typed to value where necessary

            // Set the value, creating a new option if necessary
            if ($('#task_status').find("option[value='" + typed + "']").length) {
                $('#task_status').val(typed).trigger('change');
            } else {
                // Create a DOM Option and pre-select by default

                var newOption = new Option(typed, typed, true, true);
                // Append it to the select
                $('#task_status').append(newOption).trigger('change');
            }
        }
    });
</script>

{{-- Add Search Filter Assign To --}}
<script>
    var typed = "";
    $('#user_id').select2({
        language: {
            noResults: function(term) {
                typed = $('.select2-search__field').val();
            }
        }

    });
    $('#user_id').on('select2:select', function(e) {
        typed = ""; // clear
    });
    $("#but").on("click", function() {
        if (typed) {
            // var value = prompt("Do you have a state abbriviation for "+typed+"?"); // change typed to value where necessary

            // Set the value, creating a new option if necessary
            if ($('#user_id').find("option[value='" + typed + "']").length) {
                $('#user_id').val(typed).trigger('change');
            } else {
                // Create a DOM Option and pre-select by default

                var newOption = new Option(typed, typed, true, true);
                // Append it to the select
                $('#user_id').append(newOption).trigger('change');
            }
        }
    });
</script>

{{-- Add Search Filter Payment Received Status --}}
<script>
    var typed = "";
    $('#payment_receive_status').select2({
        language: {
            noResults: function(term) {
                typed = $('.select2-search__field').val();
            }
        }

    });
    $('#payment_receive_status').on('select2:select', function(e) {
        typed = ""; // clear
    });
    $("#but").on("click", function() {
        if (typed) {
            // var value = prompt("Do you have a state abbriviation for "+typed+"?"); // change typed to value where necessary

            // Set the value, creating a new option if necessary
            if ($('#payment_receive_status').find("option[value='" + typed + "']").length) {
                $('#payment_receive_status').val(typed).trigger('change');
            } else {
                // Create a DOM Option and pre-select by default

                var newOption = new Option(typed, typed, true, true);
                // Append it to the select
                $('#payment_receive_status').append(newOption).trigger('change');
            }
        }
    });
</script>

{{-- Add Search Filter Payment Type --}}
<script>
    var typed = "";
    $('#payment_type').select2({
        language: {
            noResults: function(term) {
                typed = $('.select2-search__field').val();
            }
        }

    });
    $('#payment_type').on('select2:select', function(e) {
        typed = ""; // clear
    });
    $("#but").on("click", function() {
        if (typed) {
            // var value = prompt("Do you have a state abbriviation for "+typed+"?"); // change typed to value where necessary

            // Set the value, creating a new option if necessary
            if ($('#payment_type').find("option[value='" + typed + "']").length) {
                $('#payment_type').val(typed).trigger('change');
            } else {
                // Create a DOM Option and pre-select by default

                var newOption = new Option(typed, typed, true, true);
                // Append it to the select
                $('#payment_type').append(newOption).trigger('change');
            }
        }
    });
</script>

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

{{-- preview both image and PDF --}}
<script>
    function agentPreviewFile() {
        const fileInput = document.getElementById('perposel_doc');
        const previewContainer = document.getElementById('agent-preview-container');
        const filePreview = document.getElementById('agent-file-preview');
        const file = fileInput.files[0];

        if (file) {
            const fileType = file.type;
            const validImageTypes = ['image/jpeg', 'image/jpg', 'image/png'];
            const validPdfTypes = ['application/pdf'];

            if (validImageTypes.includes(fileType)) {
                // Image preview
                const reader = new FileReader();
                reader.onload = function(e) {
                    filePreview.innerHTML = `<img src="${e.target.result}" alt="File Preview" width="50%" height="50">`;
                };
                reader.readAsDataURL(file);
            } else if (validPdfTypes.includes(fileType)) {
                // PDF preview using an embed element
                filePreview.innerHTML =
                    `<embed src="${URL.createObjectURL(file)}" type="application/pdf" width="100%" height="150px" />`;
            } else {
                // Unsupported file type
                filePreview.innerHTML = '<p>Unsupported file type</p>';
            }

            previewContainer.style.display = 'block';
        } else {
            // No file selected
            previewContainer.style.display = 'none';
        }

    }

</script>
@endpush
