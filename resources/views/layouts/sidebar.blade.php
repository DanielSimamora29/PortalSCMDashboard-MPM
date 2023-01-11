<!-- Sidebar -->
<div class="sidebar sidebar-style-2">			
    <div class="sidebar-wrapper scrollbar scrollbar-inner">
        <div class="sidebar-content">
            <div class="user">
                <div class="avatar-sm float-left mr-2">
                    @if ( auth()->user()->profile == NULL)
                    <img src="{{ asset('../assets/profile/default.png') }}"  alt="..." class="avatar-img rounded-circle">
                    @else
                    <img src="{{ asset('profile/user/'. auth()->user()->profile) }}" alt="..." class="avatar-img rounded-circle">
                    @endif
                    {{-- <img src="{{ asset('profile/user/'. auth()->user()->profile) }}" alt="..." class="avatar-img rounded-circle"> --}}
                </div>
                <div class="info">
                    <a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
                        <span>
                            <b>
                                {{ auth()->user()->name }}
                            </b>
                            <span class="user-level">
                                {{ auth()->user()->roles->name }}
                            </span>
                        </span>
                    </a>
                </div>
            </div>
            @if (Auth::user()->role_id == "1")   
            <ul class="nav nav-primary">
                <li class="nav-item"> 
                    <a class="nav-link" href="{{ route ('scmdashboard') }}"><i class="far fa-chart-bar"></i><span>SCM Dashboard</span></a>
                    {{-- <div class="collapse" id="dashboard">
                    </div> --}}
                </li>
                <li class="nav-section">
                    <span class="sidebar-mini-icon">
                        <i class="fa fa-ellipsis-h"></i>
                    </span>
                    <h4 class="text-section">Mastering User</h4>
                </li>
                <li class="nav-item">
                    <a data-toggle="collapse" href="#forms">
                        <i class="fas fa-pen-square"></i>
                        <p>Tambah User</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="forms">
                        <ul class="nav nav-collapse">
                            <li>
                                <a class="nav-link" href="{{route('DaftarUserAdmin')}}"><i class="fas fa-user"></i><span>Admin</span></a>
                                <a class="nav-link" href="{{route('DaftarUserPegawai')}}"><i class="fas fa-user-graduate"></i><span>Pegawai</span></a>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>  
            @elseif (Auth::user()->role_id == "2")
            <ul class="nav nav-primary">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route ('scmdashboard') }}"><i class="far fa-chart-bar"></i><span>SCM Dashboard</span></a>
                    {{-- <div class="collapse" id="dashboard">
                    </div> --}}
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('SettingAdmin')}}"><i class="fa fa-cog"></i><span>Account Setting</span></a>
                    {{-- <div class="collapse" id="dashboard">
                    </div> --}}
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('logout') }}"><i class="fas fa-sign-out-alt logout"></i><span>Logout</span></a>
                    {{-- <div class="collapse" id="dashboard">
                    </div> --}}
                </li>
            </ul>
            @elseif (Auth::user()->role_id == "3")
            <ul class="nav nav-primary">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route ('scmdashboard') }}"><i class="far fa-chart-bar"></i><span>SCM Dashboard</span></a>
                    {{-- <div class="collapse" id="dashboard">
                    </div> --}}
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('SettingPegawai')}}"><i class="fa fa-cog"></i><span>Account Setting</span></a>
                    {{-- <div class="collapse" id="dashboard">
                    </div> --}}
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('logout') }}"><i class="fas fa-sign-out-alt logout"></i><span>Logout</span></a>
                    {{-- <div class="collapse" id="dashboard">
                    </div> --}}
                </li>
            </ul>
        @endif
        </div>
    </div>
</div>
<!-- End Sidebar -->