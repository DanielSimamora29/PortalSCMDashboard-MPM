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
                    <!-- Profile picture image-->
                    <img class="img-account-profile rounded-circle mb-2" src="{{ auth()->user()->profile }}" alt="">
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
                <form action="{{ route('EditProfile') }}" method="POST">
                    @csrf
                    <!-- Form Group (username)-->
                    <div class="mb-3">
                        <label for="username"><b>Username</b></label>
                        <input class="form-control" id="username" type="text" placeholder="" value="{{ auth()->user()->username }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="name"><b>Nama</b></label>
                        <input class="form-control" id="name" type="text" placeholder="" value="{{ auth()->user()->name }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="name"><b>Profile</b></label>
                        <input type="file" name="profile" class="form-control" id="profile">
                    </div>
                    <!-- Save changes button-->
                    <div class="mb-3">
                        <button type="submit" class="btn btn-success">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


@endsection