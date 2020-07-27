<div class="col-md-5 col-lg-4 col-xl-3 theiaStickySidebar">

    <!-- Profile Sidebar -->
    <div class="profile-sidebar">
        <div class="widget-profile pro-widget-content">
            <div class="profile-info-widget">
                <a href="#" class="booking-doc-img">
                    <img src="{{asset('assets/img/doctors/doctor-thumb-02.jpg')}}" alt="User Image">
                </a>
                <div class="profile-det-info">
                    <h3>{{Auth::guard('doctor')->user()->name}}</h3>

                    <div class="patient-details">
                        <h5 class="mb-0">{{Auth::guard('doctor')->user()->designation}}</h5>
                    </div>
                </div>
            </div>
        </div>
        <div class="dashboard-widget">
            <nav class="dashboard-menu">
                <ul>
                    <li class="active">
                        <a href="{{route('doctor.dashboard')}}">
                            <i class="fas fa-columns"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('doctor.appointments')}}">
                            <i class="fas fa-calendar-check"></i>
                            <span>Appointments</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('doctor.shifts')}}">
                            <i class="fas fa-hourglass-start"></i>
                            <span>Schedule Timings</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('doctor.reviews')}}">
                            <i class="fas fa-star"></i>
                            <span>Reviews</span>
                        </a>
                    </li>

                    <li>
                        <a href="{{route('doctor.profile')}}">
                            <i class="fas fa-user-cog"></i>
                            <span>Profile Settings</span>
                        </a>
                    </li>
                    <li>
                        <form method="post" id="logout" action="{{route('logout')}}">@csrf</form>
                        <a onclick="submitLogout()">
                            <i class="fas fa-sign-out-alt"></i>
                            <span>Logout</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
    <!-- /Profile Sidebar -->

</div>
