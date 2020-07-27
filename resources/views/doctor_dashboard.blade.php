@extends('layouts.front')

@section('content')
    <div class="content">
        <div class="container-fluid">

            <div class="row">

                @include('layouts.doctor_sidebar')

                <div class="col-md-7 col-lg-8 col-xl-9">

                    <div class="row">
                        <div class="col-md-12">
                            <div class="card dash-card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-12 col-lg-4">
                                            <div class="dash-widget dct-border-rht">
                                                <div class="circle-bar circle-bar1">
                                                    <div class="circle-graph1" data-percent="75">
                                                        <img src="{{asset('assets/img/icon-01.png')}}" class="img-fluid" alt="patient">
                                                    </div>
                                                </div>
                                                <div class="dash-widget-info">
                                                    <h6>Total Patient</h6>
                                                    <h3>{{$total_patient}}</h3>
                                                    <p class="text-muted">Till Today</p>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-12 col-lg-4">
                                            <div class="dash-widget dct-border-rht">
                                                <div class="circle-bar circle-bar2">
                                                    <div class="circle-graph2" data-percent="65">
                                                        <img src="{{asset('assets/img/icon-02.png')}}" class="img-fluid" alt="Patient">
                                                    </div>
                                                </div>
                                                <div class="dash-widget-info">
                                                    <h6>Today Patient</h6>
                                                    <h3>{{$todays_patient}}</h3>
                                                    <p class="text-muted">06, Nov 2019</p>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-12 col-lg-4">
                                            <div class="dash-widget">
                                                <div class="circle-bar circle-bar3">
                                                    <div class="circle-graph3" data-percent="50">
                                                        <img src="{{asset('assets/img/icon-03.png')}}" class="img-fluid" alt="Patient">
                                                    </div>
                                                </div>
                                                <div class="dash-widget-info">
                                                    <h6>Appoinments</h6>
                                                    <h3>{{$total_appointment}}</h3>
                                                    <p class="text-muted">06, Apr 2019</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <h4 class="mb-4">Patient Appoinment</h4>
                            <div class="appointment-tab">

                                <!-- Appointment Tab -->
                                <ul class="nav nav-tabs nav-tabs-solid nav-tabs-rounded">
                                    <li class="nav-item">
                                        <a class="nav-link active" href="#upcoming-appointments" data-toggle="tab">Upcoming</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#today-appointments" data-toggle="tab">Today</a>
                                    </li>
                                </ul>
                                <!-- /Appointment Tab -->

                                <div class="tab-content">

                                    <!-- Upcoming Appointment Tab -->
                                    <div class="tab-pane show active" id="upcoming-appointments">
                                        <div class="card card-table mb-0">
                                            <div class="card-body">
                                                <div class="table-responsive">
                                                    <table class="table table-hover table-center mb-0">
                                                        <thead>
                                                        <tr>
                                                            <th>Patient Name</th>
                                                            <th>Appt Date</th>
                                                            <th class="text-center">Paid Amount</th>
                                                            <th>Transcation ID</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        @foreach($upcoming as $up)
                                                        <tr>
                                                            <td>{{$up->patient->name}}</td>
                                                            <td>{{$up->appointed_at}}</td>
                                                            <td class="text-center">{{auth()->guard('doctor')->user()->charge}}</td>
                                                            <td>{{$up->payment_id}}</td>
                                                        </tr>
                                                        @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /Upcoming Appointment Tab -->

                                    <!-- Today Appointment Tab -->
                                    <div class="tab-pane" id="today-appointments">
                                        <div class="card card-table mb-0">
                                            <div class="card-body">
                                                <div class="table-responsive">
                                                    <table class="table table-hover table-center mb-0">
                                                        <tr>
                                                            <th>Patient Name</th>
                                                            <th>Appt Date</th>
                                                            <th class="text-center">Paid Amount</th>
                                                            <th>Transcation ID</th>
                                                        </tr>
                                                        <tbody>
                                                        <tr>
                                                        @foreach($today as $to)
                                                            <tr>
                                                                <td>{{$to->patient->name}}</td>
                                                                <td>{{$to->appointed_at}}</td>
                                                                <td class="text-center">{{auth()->guard('doctor')->user()->charge}}</td>
                                                                <td>{{$to->payment_id}}</td>
                                                            </tr>
                                                        @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /Today Appointment Tab -->

                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>

    </div>
@endsection

