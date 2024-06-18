@extends('layouts.master')

@section('title')
Task | Add
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
                            <h5>Add Task</h5>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-12 p-20">
                            <div class="wizard">
                                <ul class="nav nav-tabs justify-content-center" id="myTab" role="tablist">
                                    <li class="nav-item flex-fill" role="presentation" data-bs-toggle="tooltip"
                                        data-bs-placement="top" title="Customer Details">
                                        <a class="nav-link active rounded-circle mx-auto d-flex align-items-center justify-content-center"
                                            href="#step1" id="step1-tab" data-bs-toggle="tab" role="tab"
                                            aria-controls="step1" aria-selected="true">
                                            <i class="far fa-user"></i>
                                        </a>
                                    </li>

                                    <li class="nav-item flex-fill" role="presentation" data-bs-toggle="tooltip"
                                        data-bs-placement="top" title="Packages Details">
                                        <a class="nav-link rounded-circle mx-auto d-flex align-items-center justify-content-center"
                                            href="#step2" id="step2-tab" data-bs-toggle="tab" role="tab"
                                            aria-controls="step2" aria-selected="false">
                                            <i class="fe fe-file-text"></i>
                                        </a>
                                    </li>

                                    <li class="nav-item flex-fill" role="presentation" data-bs-toggle="tooltip"
                                        data-bs-placement="top" title="Lead Details">
                                        <a class="nav-link rounded-circle mx-auto d-flex align-items-center justify-content-center"
                                            href="#step2" id="step3-tab" data-bs-toggle="tab" role="tab"
                                            aria-controls="step3" aria-selected="false">
                                            <i class="fe fe-clipboard"></i>
                                        </a>
                                    </li>

                                    <li class="nav-item flex-fill" role="presentation" data-bs-toggle="tooltip"
                                        data-bs-placement="top" title="Task Details">
                                        <a class="nav-link rounded-circle mx-auto d-flex align-items-center justify-content-center"
                                            href="#step2" id="step4-tab" data-bs-toggle="tab" role="tab"
                                            aria-controls="step4" aria-selected="false">
                                            <i class="fe fe-clipboard"></i>
                                        </a>
                                    </li>

                                    <li class="nav-item flex-fill" role="presentation" data-bs-toggle="tooltip"
                                        data-bs-placement="top" title="Payment Details">
                                        <a class="nav-link rounded-circle mx-auto d-flex align-items-center justify-content-center"
                                            href="#step5" id="step5-tab" data-bs-toggle="tab" role="tab"
                                            aria-controls="step3" aria-selected="false">
                                            <i class="fas fa-credit-card"></i>
                                        </a>
                                    </li>
                                </ul>
                                <div class="tab-content" id="myTabContent">

                                    <form method="POST" class="p-3" action="{{ route('task.store') }}" enctype="multipart/form-data">
                                        @csrf

                                        <input type="hidden" id="lead_by" name="lead_by" value="{{ Auth::user()->id }}">

                                        <div class="tab-pane fade show active" role="tabpanel" id="step1" aria-labelledby="step1-tab">
                                            <div class="mb-4">
                                                <h5>Enter Your Personal Details</h5>
                                            </div>
                                            <form>
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="input-block mb-3">
                                                            <label for="basicpill-firstname-input"
                                                                class="form-label">First name</label>
                                                            <input type="text" class="form-control"
                                                                id="basicpill-firstname-input">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="input-block mb-3">
                                                            <label for="basicpill-lastname-input"
                                                                class="form-label">Last name</label>
                                                            <input type="text" class="form-control"
                                                                id="basicpill-lastname-input">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="input-block mb-3">
                                                            <label for="basicpill-phoneno-input"
                                                                class="form-label">Phone</label>
                                                            <input type="text" class="form-control"
                                                                id="basicpill-phoneno-input">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="input-block mb-3">
                                                            <label for="basicpill-email-input"
                                                                class="form-label">Email</label>
                                                            <input type="email" class="form-control"
                                                                id="basicpill-email-input">
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                            <div class="d-flex">
                                                <a class="btn btn btn-primary next">Next</a>
                                            </div>
                                        </div>

                                        <div class="tab-pane fade" role="tabpanel" id="step2"
                                            aria-labelledby="step2-tab">
                                            <div class="mb-4">
                                                <h5>Enter Your Address</h5>
                                            </div>
                                            <form>
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="input-block mb-3">
                                                            <label for="basicpill-pancard-input"
                                                                class="form-label">Address 1</label>
                                                            <input type="text" class="form-control"
                                                                id="basicpill-pancard-input">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="input-block mb-3">
                                                            <label for="basicpill-vatno-input"
                                                                class="form-label">Address 2</label>
                                                            <input type="text" class="form-control"
                                                                id="basicpill-vatno-input">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="input-block mb-3">
                                                            <label for="basicpill-cstno-input"
                                                                class="form-label">Landmark</label>
                                                            <input type="text" class="form-control"
                                                                id="basicpill-cstno-input">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="input-block mb-3">
                                                            <label for="basicpill-servicetax-input"
                                                                class="form-label">Town</label>
                                                            <input type="text" class="form-control"
                                                                id="basicpill-servicetax-input">
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                            <div class="d-flex">
                                                <a class="btn btn btn-primary previous me-2"> Back</a>
                                                <a class="btn btn btn-primary next">Continue</a>
                                            </div>
                                        </div>

                                        <div class="tab-pane fade" role="tabpanel" id="step3"
                                            aria-labelledby="step3-tab">
                                            <div class="mb-4">
                                                <h5>Payment Details</h5>
                                            </div>
                                            <form>
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="input-block mb-3">
                                                            <label for="basicpill-namecard-input"
                                                                class="form-label">Name on Card</label>
                                                            <input type="text" class="form-control"
                                                                id="basicpill-namecard-input">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="input-block mb-3">
                                                            <label>Credit Card Type</label>
                                                            <select class="form-select">
                                                                <option selected>Select Card Type</option>
                                                                <option value="AE">American Express</option>
                                                                <option value="VI">Visa</option>
                                                                <option value="MC">MasterCard</option>
                                                                <option value="DI">Discover</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="input-block mb-3">
                                                            <label for="basicpill-cardno-input"
                                                                class="form-label">Credit Card Number</label>
                                                            <input type="text" class="form-control"
                                                                id="basicpill-cardno-input">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="input-block mb-3">
                                                            <label for="basicpill-card-verification-input"
                                                                class="form-label">Card Verification Number</label>
                                                            <input type="text" class="form-control"
                                                                id="basicpill-card-verification-input">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="input-block mb-3">
                                                            <label for="basicpill-expiration-input"
                                                                class="form-label">Expiration Date</label>
                                                            <input type="text" class="form-control"
                                                                id="basicpill-expiration-input">
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                            <div class="d-flex">
                                                <a class="btn btn-primary previous me-2">Previous</a>
                                                <a class="btn btn-primary next" data-bs-toggle="modal"
                                                    data-bs-target="#save_modal">Save Changes</a>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <form method="POST" action="{{ route('task.store') }}" enctype="multipart/form-data">
                                @csrf

                                <input type="hidden" id="lead_by" name="lead_by" value="{{ Auth::user()->id }}">
                                <div class="form-group-customer customer-additional-form">
                                    <div class="row">
                                        <h5 class="card-title text-primary mb-2">Customer Details : -</h5>
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

                                        <div class="col-lg-4 col-md-6 col-sm-12">
                                            <div class="input-block mb-3" >
                                                <label><b>Select Package Type : <span class="text-danger">*</span></b></label>
                                                <select class="@error('package_id') is-invalid @enderror select" id="package_id" name="package_id">
                                                    <option value="">Select Package Type</option>
                                                    @foreach($packages as $package)
                                                    <option value="{{ $package->id }}" {{ (old("package_id") == $package->id ? "selected":"") }}>{{ $package->name }}</option>
                                                    @endforeach
                                                </select>
                                                @error('package_id')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-lg-4 col-md-6 col-sm-12">
                                            <div class="input-block mb-3">
                                                <label><b>Amount : <span class="text-danger">*</span></b></label>
                                                <input type="text" readonly id="package_amt" name="package_amt" class="form-control @error('package_amt') is-invalid @enderror" value="{{ old('package_amt') }}" placeholder="Enter Amount">

                                                @error('package_amt')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

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

                                        <h5 class="card-title text-primary mb-2">Payment Details : -</h5>
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
                                                <label><b>Payment Date : <span class="text-danger">*</span></b></b></label>
                                                <div class="cal-icon cal-icon-info">
                                                    <input type="text"  id="payment_date" name="payment_date" class="form-control datetimepicker @error('payment_date') is-invalid @enderror" value="{{ old('payment_date') }}" placeholder="DD-MM-YYYY">
                                                    @error('payment_date')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        <h5 class="card-title text-primary mb-2">Task Details : -</h5>
                                        <div class="col-lg-4 col-md-6 col-sm-12">
                                            <div class="input-block mb-3" >
                                                <label><b>Select Task Status : <span class="text-danger">*</span></b></label>
                                                <select class="@error('task_status') is-invalid @enderror select" id="task_status" name="task_status">
                                                    <option value="">Select Task Status</option>
                                                    <option value="1" {{ (old("task_status") == "1" ? "selected":"") }}>Pending</option>
                                                    <option value="2" {{ (old("task_status") == "2" ? "selected":"") }}>In Progress</option>
                                                    <option value="3" {{ (old("task_status") == "3" ? "selected":"") }}>Completed</option>
                                                    <option value="4" {{ (old("task_status") == "4" ? "selected":"") }}>Cancelled</option>
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

                                    </div>
                                </div>

                                <div class="add-customer-btns text-start">
                                    <a href="{{ route('task.index') }}" class="btn btn-danger">Cancel</a>
                                    <button type="submit" class="btn btn-success">Submit</button>
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
{{-- fetch amount --}}
<script>
    $(document).ready(function(){
        $(document).on('change','#package_id', function() {
            var package_id = $(this).val();

            $('#package_amt').show();
            $.ajax({
                method: 'post',
                url: "{{ route('task.package.amount') }}",
                data: {
                    packageId: package_id,
                    _token : '{{ csrf_token() }}'
                },
                success: function(response) {
                    $('#package_amt').val(response.amount);
                }
            })
        });
    });
</script>

<script>
</script>
@endpush
