@extends('layouts.master')

{{-- @section('style', asset('../assets/css/profile.css')) --}}

@section('content')

@section('page_name', 'Setting Akun Pegawai')

<div class="col-12 p-3 bg-white shadow rounded">
    <div class="card-header">
        <div class="card-title">Ubah Password</div>
    </div>
    <form class="mt-3" action="{{ route('EditSettingPegawai') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="form-group col-12 col-md-12 mt-3">
                <label for="passwordlama">Password Lama</label>
                <input type="Password" class="form-control" name="password_lama" id="password_lama" placeholder="Masukkan Password Lama">
                @error('password_lama')
                    <div class="text-red-500 mt-2 text-sm" style="color: red">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group col-12 col-md-6 mt-3" >
                <label for="username">Password Baru</label>
                <input type="Password" class="form-control" name="password" id="password" placeholder="Masukkan Password Baru" value="">
                @error('password')
                    <div class="text-red-500 mt-2 text-sm" style="color: red">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group col-12 col-md-6 mt-3">
                <label for="username">Konfirmasi Password Baru</label>
                <input type="Password" class="form-control" name="password_confirmation" id="password_confirmation" placeholder="Konfirmasi Password baru" value="">
                @error('password_confirmation')
                    <div class="text-red-500 mt-2 text-sm" style="color: red">{{ $message }}</div>
                @enderror
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