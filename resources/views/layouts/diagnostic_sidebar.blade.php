<div class="col-md-5 col-lg-4 col-xl-3 theiaStickySidebar">

    <!-- Profile Sidebar -->
    <div class="profile-sidebar">
        <div class="widget-profile pro-widget-content">
            <div class="profile-info-widget">
                <a href="#" class="booking-doc-img">
                    <img src="{{asset('assets/img/doctors/doctor-thumb-02.jpg')}}" alt="User Image">
                </a>
                <div class="profile-det-info">
                    <h3>{{Auth::guard('diagnostic')->user()->name}}</h3>

                    <div class="patient-details">
                        <h5 class="mb-0">{{Auth::guard('diagnostic')->user()->location}}</h5>
                    </div>
                </div>
            </div>
        </div>
        <div class="dashboard-widget">
            <nav class="dashboard-menu">
                <ul>
                    <li class="active">
                        <a href="{{route('diagnostic.dashboard')}}">
                            <i class="fas fa-columns"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('diagnostic.report.create')}}">
                            <i class="fas fa-calendar-check"></i>
                            <span>Add tests report</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('diagnostic.reports')}}">
                            <i class="fas fa-star"></i>
                            <span>All reports</span>
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
