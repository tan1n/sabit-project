<header class="header">
    <nav class="navbar navbar-expand-lg header-nav">
        <div class="navbar-header">
            <a id="mobile_btn" href="javascript:void(0);">
							<span class="bar-icon">
								<span></span>
								<span></span>
								<span></span>
							</span>
            </a>
            <a href="index-2.html" class="navbar-brand logo">
                <img src="assets/img/logo.png" class="img-fluid" alt="Logo">
            </a>
        </div>
        <div class="main-menu-wrapper">
            <div class="menu-header">
                <a href="index-2.html" class="menu-logo">
                    <img src="assets/img/logo.png" class="img-fluid" alt="Logo">
                </a>
                <a id="menu_close" class="menu-close" href="javascript:void(0);">
                    <i class="fas fa-times"></i>
                </a>
            </div>
            <ul class="main-nav">
                <li class="active">
                    <a href="{{url('/')}}">Home</a>
                </li>
                <li>
                    <a href="{{url('/about')}}">About Us</a>
                </li>
                @if(auth()->check())
                    <li>
                        <a href="{{url('/myappointments')}}">My appointments</a>
                    </li>
                    <li class="nav-item">
                        <a  href="{{url('/mytests')}}">My tests </a>
                    </li>
                @endif
            </ul>
        </div>
        <ul class="nav header-navbar-rht">
            <li class="nav-item contact-item">
                <div class="header-contact-img">
                    <i class="far fa-hospital"></i>
                </div>
                <div class="header-contact-detail">
                    <p class="contact-header">Contact</p>
                    <p class="contact-info-header"> +8801999933969 </p>
                </div>
            </li>
            @if(auth()->check())
                <form method="post" id="logout" action="{{route('logout')}}">@csrf</form>
                <li class="nav-item">
                    <a onclick="submitLogout()" href="#" class="nav-link header-login">
                        Logout
                    </a>
                </li>
            @else
            <li class="nav-item">
                <a class="nav-link header-login" href="{{route('login')}}">login / Signup </a>
            </li>
            @endif
        </ul>
    </nav>
</header>
