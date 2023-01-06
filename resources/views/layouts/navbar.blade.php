<div class="main-header">
    <!-- Logo Header -->
    <div class="logo-header" data-background-color="blue">
        
        <div class="navbar-brand">
            &nbsp;&nbsp;&nbsp;&nbsp;<img class="logo" src="../assets/img/logoMPM.png" width="65%">
        </div>

        <button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse" data-target="collapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon">
                <i class="icon-menu"></i>
            </span>
        </button>
        <button class="topbar-toggler more"><i class="icon-options-vertical"></i></button>
        <div class="nav-toggle">
            <button class="btn btn-toggle toggle-sidebar">
                <i class="icon-menu"></i>
            </button>
        </div>
    </div>
    <!-- End Logo Header -->

    <!-- Navbar Header -->
    <nav class="navbar navbar-header navbar-expand-lg" data-background-color="blue2">
        <div class="container-fluid">
            <ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
                <li class="nav-item dropdown hidden-caret">
                    <a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#" aria-expanded="false">
                        <div class="avatar-sm">
                            <img src="../assets/profile/default.png" alt="..." class="avatar-img rounded-circle">
                        </div>
                    </a>
                @if (Auth::user()->role_id == "1")   
                    <ul class="dropdown-menu dropdown-user animated fadeIn">
                        <div class="dropdown-user-scroll scrollbar-outer">
                            <li>
                                <div class="user-box">
                                    <div class="avatar-lg"><img src="../assets/profile/default.png" alt="image profile" class="avatar-img rounded"></div>
                                    <div class="u-text">
                                        <h4>{{ auth()->user()->username }}</h4>
                                        <a href="{{route('ProfileSuperAdmin')}}" class="btn btn-xs btn-secondary btn-sm">View Profile</a>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{{route('SettingSuperAdmin')}}"><i class="fa fa-cog"></i>&nbsp;&nbsp;<span>Account Setting</span></a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{{ route('logout') }}"><i class="fas fa-sign-out-alt"></i>&nbsp;&nbsp;<span>Logout</span></a>
                            </li>
                        </div>
                    </ul>
                     @elseif (Auth::user()->role_id == "2")
                    <ul class="dropdown-menu dropdown-user animated fadeIn">
                        <div class="dropdown-user-scroll scrollbar-outer">
                            <li>
                                <div class="user-box">
                                    <div class="avatar-lg"><img src="../assets/profile/default.png" alt="image profile" class="avatar-img rounded"></div>
                                    <div class="u-text">
                                        <h4>{{ auth()->user()->username }}</h4>
                                        <a href="{{route('ProfileAdmin')}}" class="btn btn-xs btn-secondary btn-sm">View Profile</a>
                                    </div>
                                </div>
                            </li>
                        </div>
                    </ul>
                    @elseif (Auth::user()->role_id == "3")
                    <ul class="dropdown-menu dropdown-user animated fadeIn">
                        <div class="dropdown-user-scroll scrollbar-outer">
                            <li>
                                <div class="user-box">
                                    <div class="avatar-lg"><img src="../assets/profile/default.png" alt="image profile" class="avatar-img rounded"></div>
                                    <div class="u-text">
                                        <h4>{{ auth()->user()->username }}</h4>
                                        <a href="{{route('ProfilePegawai')}}" class="btn btn-xs btn-secondary btn-sm">View Profile</a>
                                    </div>
                                </div>
                            </li>
                        </div>
                    </ul>
                @endif
                </li>
            </ul>
        </div>
    </nav>
    <!-- End Navbar -->
</div>