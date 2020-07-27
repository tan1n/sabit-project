@extends('layouts.front')

@section('content')
    <div class="content">
        <div class="container-fluid">

            <div class="row">
    @include('layouts.doctor_sidebar')

    <div class="col-md-7 col-lg-8 col-xl-9">
        <div class="appointments">

            <!-- Appointment List -->
            @foreach($appointments as $apps)
            <div class="appointment-list">
                <div class="profile-info-widget">
                    <a href="patient-profile.html" class="booking-doc-img">
                        <img src="assets/img/patients/patient.jpg" alt="User Image">
                    </a>
                    <div class="profile-det-info">
                        <h3>{{$apps->patient->name}}</h3>
                        <div class="patient-details">
                            <h5><i class="far fa-clock"></i>{{$apps->appointed_at}}</h5>
                            <h5><i class="fas fa-envelope"></i> {{$apps->patient->email}}</h5>
                            <h5 class="mb-0"><i class="fas fa-phone"></i>{{$apps->patient->phone}}</h5>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
            </div>
        </div>
    </div>
@endsection
