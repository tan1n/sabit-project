@extends('layouts.front')
@include('layouts.menu')
@section('content')
<div class="content success-page-cont">
    <div class="container-fluid">

        <div class="row justify-content-center">
            <div class="col-lg-6">

                <!-- Success Card -->
                <div class="card success-card">
                    <div class="card-body">
                        <div class="success-cont">
                            <i class="fas fa-check"></i>
                            <h3>Appointment booked Successfully!</h3>
                            <p>Appointment booked with <strong>{{$doctor->name}}</strong><br> on <strong>{{$appointed_at}}</strong></p>
                            <a href="{{route('home')}}" class="btn btn-primary view-inv-btn">Go to home</a>
                        </div>
                    </div>
                </div>
                <!-- /Success Card -->

            </div>
        </div>

    </div>
</div>
@endsection
