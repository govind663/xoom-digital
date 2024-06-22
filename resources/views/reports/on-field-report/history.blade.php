@extends('layouts.master')

@section('title')
History Log | View
@endsection

@push('styles')
<style>
    .user-card {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: space-evenly;
        background-color: #fff;
        border-radius: 10px;
        padding: 40px;
        width: 100%;
        position: relative;
        overflow: hidden;
        box-shadow: 0 2px 20px -5px rgba(0,0,0,0.5);
        border: 1px solid #e77c09 !important;
    }

    .user-card:before {
        content: '';
        position: absolute;
        height: 193%;
        width: 300px;
        background: #1a1716;
        top: -70px;
        left: -135px;
        z-index: 0;
        transform: rotate(17deg);
    }

    .user-card-img {
        display: flex;
        justify-content: center;
        align-items: center;
        z-index: 3;
    }

    .user-card-img img {
        width: 200px;
        height: 200px;
        object-fit: cover;
        border-radius: 50%;
    }

    .user-card-info {
        text-align: justify;
    }

    .user-card-info h2 {
        font-size: 24px;
        margin: 0;
        margin-bottom: 10px;
        font-family: 'Bebas Neue', sans-serif;
        letter-spacing: 3px;
    }

    .user-card-info p {
        font-size: 14px;
        margin-bottom: 2px;
    }

    .user-card-info p span {
        font-weight: 700;
        margin-right: 10px;
    }

    @media only screen and (min-width: 768px) {
        .user-card {
            flex-direction: row;
            align-items: flex-start;
        }
        .user-card-img {
            margin-right: 20px;
            margin-bottom: 0;
        }

        .user-card-info {
            text-align: left;
        }
    }

    @media (max-width: 767px){
        .wrapper{
            padding-top: 3%;
        }
        .user-card:before {
            width: 300%;
            height: 200px;
            transform: rotate(0);
        }
        .user-card-info h2 {
            margin-top: 25px;
            font-size: 35px;
        }
        .user-card-info p span {
            display: block;
            margin-bottom: 15px;
            font-size: 18px;
        }
    }
</style>
@endpush

@section('content')
    <div class="page-wrapper">
        <div class="content container-fluid">

             <!-- Page Header -->
             <div class="page-header">
                <div class="row">
                    <div class="col">
                        <h3 class="page-title">View History Log</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">View History Log</li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- /Page Header -->

            <div class="row card mb-4">
                <div class="card-body">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <div class="wrapper">
                                <div class="user-card">
                                    <div class="user-card-img">
                                        <img src="{{ asset('assets/profile/img_avatar.png') }}" alt="">
                                    </div>
                                    <div class="user-card-info">
                                        <h2>{{ $task->customer_name }}</h2>
                                        <p><span>Email : - </span> {{ $task->customer_email }}</p>
                                        <p><span>Mobile Number : - </span> {{ $task->customer_phone }}</p>
                                        <p><span>Pincode : - </span> {{ $task->customer_pincode }}</p>
                                        <p><span>City : - </span> {{ $task->customer_city }}</p>
                                        <p><span>Address : - </span> {{ $task->customer_address }}</p>
                                    </div>

                                    <div class="user-card-info">
                                    </div>
                                    <div class="user-card-info">
                                    </div>
                                    <div class="user-card-info">
                                    </div>
                                    <div class="user-card-info">
                                    </div>
                                    <div class="user-card-info">
                                    </div>

                                    <div class="user-card-info">
                                        <p><span>Lead Date : - </span> {{ date('d-m-Y', strtotime($task->lead_dt)) }}</p>
                                        <p><span>Lead By : - </span> {{ $task->leadSource?->name }}</p>
                                        <p><span>Meating Date : - </span> {{ date('d-m-Y', strtotime($task->meating_dt)) }}</p>
                                        <p><span>Meating Time : - </span> {{ date('h:i A', strtotime($task->meating_time)) }}</p>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row card">
                <div class="card-body>
                    <div class="col-md-12 p-4">
                        <ul class="timeline">
                            @foreach($taskHistory as $key => $value)
                                <li class="timeline-inverted">
                                    <p class="text-primary">{{ date('d-m-Y', strtotime($value->followup_date)) }}</p>
                                    <p class="text-primary">{{ date('h:i A', strtotime($value->followup_time)) }}</p>
                                    <div class="timeline-badge success">
                                        <i class="fas fa-user-tie"></i>
                                    </div>
                                    <div class="timeline-panel">
                                        <div class="timeline-heading">
                                            @if($value->followup_status == 1)
                                            <span class="badge bg-warning">Pending</span>
                                            @elseif($value->followup_status == 2)
                                            <span class="badge bg-info">In Progress</span>
                                            @elseif($value->followup_status == 3)
                                            <span class="badge bg-success">Completed</span>
                                            @elseif($value->followup_status == 4)
                                            <span class="badge bg-danger">Cancelled</span>
                                            @endif
                                        </div>
                                        <div class="timeline-body">
                                            <p>
                                                {{ $value->followup_description }}
                                            </p>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
@endpush
