@extends('layouts.front')
@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 col-lg-4 col-xl-3 theiaStickySidebar">

                <!-- Search Filter -->
                <div class="card search-filter">
                    <div class="card-header">
                        <h4 class="card-title mb-0">Search Filter</h4>
                    </div>
                    <div class="card-body">
                        <div class="filter-widget">
                            <h4>Select Specialist</h4>
                        <form method="get" action="{{route('searchByCat')}}">
                            @foreach($cats as $cat)
                            <div>
                                <label class="custom_check">
                                    <input type="radio" name="cat_id" value="{{$cat->id}}">
                                    <span class="checkmark"></span> {{$cat->name}}
                                </label>
                            </div>
                            @endforeach
                        </div>
                        <div class="btn-search">
                            <button type="submit" class="btn btn-block">Search</button>
                        </div>
                        </form>

                    </div>
                </div>
                <!-- /Search Filter -->

            </div>

            <div class="col-md-12 col-lg-8 col-xl-9">

                <!-- Doctor Widget -->
                @foreach($doctor as $doc)

                <div class="card">
                    <div class="card-body">
                        <div class="doctor-widget">
                            <div class="doc-info-left">
                                <div class="doctor-img">
                                    <a href="doctor-profile.html">
                                        <img src="{{asset('assets/img/doctors/doctor-thumb-01.jpg')}}" class="img-fluid" alt="User Image">
                                    </a>
                                </div>
                                <div class="doc-info-cont">
                                    <h4 class="doc-name"><a href="#">{{$doc->name}}</a></h4>
                                    <p class="doc-speciality">{{''}}</p>
                                    <h5 class="doc-department"><img src="{{asset('assets/img/specialities/specialities-05.png')}}" class="img-fluid" alt="Speciality">{{$doc->designation}}</h5>
                                    <div class="rating">
                                        @for($i=0;$i<$doc->ratings();$i++)
                                            <i class="fas fa-star filled"></i>
                                        @endfor
                                        <span class="d-inline-block average-rating">({{$doc->reviews()}})</span>
                                    </div>
                                    <div class="clinic-details">
                                        <p class="doc-location"><i class="fas fa-map-marker-alt"></i>{{$doc->chamber_location}}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="doc-info-right">
                                <div class="clini-infos">
                                    <ul>
                                        <li><a href="{{url('reviews/show/'.$doc->id)}}"><i class="far fa-comment"></i>({{$doc->reviews()}}) reviews</a></li>
                                        <li><i class="fas fa-map-marker-alt"></i> {{$doc->city}}</li>
                                        <li><i class="far fa-money-bill-alt"></i> {{$doc->charge}}<i class="fas fa-info-circle" data-toggle="tooltip" title="Lorem Ipsum"></i> </li>
                                    </ul>
                                </div>

                                <div class="clinic-booking">
                                    <form method="post" action="{{route('appointment')}}">
                                        @csrf
                                        <div class="filter-widget">
                                            <div class="cal-icon">
                                                <input type="date" class="form-control datetimepicker" name="app_date" placeholder="Select Date">
                                            </div>
                                        </div>
                                        <input type="hidden" name="doctor_id" value="{{$doc->id}}">
                                        <div class="btn-search">
                                            <button class="btn btn-block" type="submit">Book Appointment</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /Doctor Widget -->
                @endforeach
            </div>
            <div class="offset-6">

            </div>
            {{ method_exists($doctor,'links') ? $doctor->links() : '' }}

        </div>
    </div>
</div>
@endsection
