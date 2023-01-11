@extends('layouts.master')

@section('style', asset('../assets/css/profile.css'))

@section('content')

@section('page_name', 'Profile Pegawai')

<div class="row">
    <div class="col-xl-4">
        <!-- Profile picture card-->
        <div class="card mb-4 mb-xl-0">
            <div class="card-header"><h2><b>Foto Profile</b></h2></div>
            <div class="card-body box-profile">
                <div class="text-center">
                    @if ( auth()->user()->profile == NULL)
                    <img src="{{ asset('../assets/profile/default.png') }}" height="245" width="245" class="rounded-circle profile-widget-picture" alt="">
                  @else
                  <img src="{{ asset('profile/user/'. auth()->user()->profile) }}" height="245" width="245" class="rounded-circle profile-widget-picture" alt="">
                  @endif
                    <!-- Profile picture image-->
                    {{-- <img src="{{ asset('profile/user/'. auth()->user()->profile) }}" height="245" width="245" class="rounded-circle profile-widget-picture" alt=""> --}}
                    <!-- Profile picture help block-->
                    <div class="small font-italic text-muted mb-4">{{ auth()->user()->name }}</div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-8">
        <!-- Account details card-->
        <div class="card mb-4">
            <div class="card-header"><h2><b>Detail Akun</b></h2></div>
            <div class="card-body">
                <form action="{{ route('EditProfilePegawai') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <!-- Form Group (username)-->
                    <div class="mb-3">
                        <label for="username"><b>Username</b></label>
                        <input class="form-control" name="username" id="username" type="text" placeholder="" value="{{ auth()->user()->username }}" required disabled>
                    </div>
                    <div class="mb-3">
                        <label for="name"><b>Nama</b></label>
                        <input class="form-control" name="name" id="name" type="text" placeholder="" value="{{ auth()->user()->name }}" required disabled>
                    </div>
                    <div class="mb-3">
                        <label for="name"><b>Profile</b></label>
                        <input type="file" name="profile" class="form-control" id="profile">
                    </div>
                    <!-- Save changes button-->
                    <br>
                    <div class="mb-3">
                        <td><button type="button" class="btn btn-warning" onclick="edituser()">Ubah</button></td>
                        <button type="submit" id="tblSave" class="btn btn-success" disabled>Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    function edituser() {
        var elements = document.getElementById("username"),
            elements0 = document.getElementById("name"),
            elements1 = document.getElementById("profile"),
            tblSave = document.getElementById("tblSave");
        if(elements.disabled == true && 
            elements0.disabled == true && 
            // elements1.disabled == true &&
           tblSave.disabled == true) { 
            
            elements.disabled = false;
            elements0.disabled = false;
            // elements1.disabled = false;
            tblSave.disabled = false;
        }
        else {
            elements.disabled = true;
            elements0.disabled = true;
            elements1.disabled = true;
            tblSave.disabled = true;
        }
    }
    </script>

@endsection