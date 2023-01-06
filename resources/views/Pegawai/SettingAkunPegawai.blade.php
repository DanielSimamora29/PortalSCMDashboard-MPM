@extends('layouts.master')

{{-- @section('style', asset('../assets/css/profile.css')) --}}

@section('content')

@section('page_name', 'Setting Akun Pegawai')

<div class="col-12 p-3 bg-white shadow rounded">
    <div class="card-header">
        <div class="card-title">Ubah Password</div>
    </div>
    <form class="mt-3" action="{{ route('EditProfile') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="form-group col-12 col-md-12 mt-3 {{ session()->has('old_password') ? 'has-danger' : '' }} {{ $errors->has('old_password') ? 'has-danger' : '' }}">
                <label for="passwordlama">Password Lama</label>
                <input type="Password" class="form-control" name="old_password" id="old_password" placeholder="Masukkan Password Lama" {{ session()->has('old_password') ? 'form-control-danger' : '' }} {{ $errors->has('old_password') ? 'form-control-danger' : '' }} value="">
            @if (session()->has('old_password'))
            <div class="col-form-label">
                {{ session('old_password') }}
            </div>
            @endif
            @if ($errors->has('old_password'))
                <div class="col-form-label">
                    {{ $errors->first('old_password') }}
                </div>
            @endif                
            </div>
            <div class="form-group col-12 col-md-6 mt-3 {{ $errors->has('password') ? 'has-danger' : '' }}" >
                <label for="username">Password Baru</label>
                <input type="Password" class="form-control" name="password" id="password" placeholder="Masukkan Password Baru"  {{ $errors->has('password') ? 'form-control-danger' : '' }} value="">
                @if ($errors->has('password'))
                <div class="col-form-label">
                    @foreach ($errors->all() as $error)
                        {{ $error }} <br>
                    @endforeach
                    Password format : Minimum 12 characters, at least one uppercase letter, one lowercase letter, one number, one special character
                </div>
            @endif
            </div>
            <div class="form-group col-12 col-md-6 mt-3 {{ $errors->has('password_confirmation') ? 'has-danger' : '' }}">
                <label for="username">Konfirmasi Password Baru</label>
                <input type="Password" class="form-control" name="password_confirmation" id="password_confirmation" placeholder="Konfirmasi Password baru" {{ $errors->has('password_confirmation') ? 'form-control-danger' : '' }} value="">
                @if ($errors->has('password_confirmation'))
                <div class="col-form-label">
                    {{ $errors->first('password_confirmation') }}
                </div>
            @endif
            </div>
            <div class="col-12 col-md-6 mt-5">
                <button type="submit" class="btn btn-success">Simpan</button>
                <button type="reset" class="btn btn-secondary">Reset</button>
            </div>
        </div>
    </form>
</div>

    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>


@endsection