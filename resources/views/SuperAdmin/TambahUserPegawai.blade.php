@extends('layouts.master')

@section('content')

@section('page_name', 'Tambah User Pegawai')

@if (session()->has('success'))
                <script>
                    Swal.fire(
                        'success',
                        '{{ session('success') }}'
                    )
                    </script>
            @endif

<div class="col-12 p-3 bg-white shadow rounded">
    <div class="card-header">
        <div class="card-title">Form Tambah User Pegawai</div>
    </div>
    <form class="mt-3" action="{{ route('TambahUserPegawai.submit') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="form-group col-12 col-md-6 mt-3">
                <label for="name">Nama Lengkap</label>
                <input type="text" class="form-control" name="name" placeholder="Masukkan Nama Lengkap" value="">
                <span class="invalid-feedback font-weight-bold"></span>
            </div>
            <div class="form-group col-12 col-md-6 mt-3">
                <label for="username">Username</label>
                <input type="text" class="form-control" name="username" placeholder="Masukkan Username" value="">
                <span class="invalid-feedback font-weight-bold"></span>
            </div>
            <div class="form-group mt-3 col-6">
                <label for="role_id">Role</label>
                <select name="role_id" id="role_id" class="form-select">
                    <option disabled selected>Pilih Role</option>
                    @foreach ($roles as $role)
                        <option value="{{ $role['id'] }}">{{ $role['name'] }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group mt-3 col-6">
                <label for="plant">Plant</label>
                <select name="plants_id" id="plants_id" class="form-select">
                    <option disabled selected>Pilih Plant</option>
                    @foreach ($plants as $plant)
                        <option value="{{ $plant['id'] }}">{{ $plant['name'] }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group col-12 col-md-6 mt-3">
                <label for="dashboard_link">Link Dashboard</label>
                <textarea name="dashboard_link" class="form-control" placeholder="Masukkan Link Dashboard" value="" id="" cols="30" rows="10"></textarea>
                {{-- <input type="url" class="form-control" name="dashboard_link" placeholder="Masukkan Link Dashboard" value=""> --}}
                <span class="invalid-feedback font-weight-bold"></span>
            </div>    
            <div class="col-12 col-md-6 mt-5">
                <button type="submit" class="btn btn-success">Simpan</button>
                <button type="reset" class="btn btn-secondary">Reset</button>
                <a href="{{route('DaftarUserPegawai')}}" class="btn btn-primary"><span>Kembali</span></a>
            </div>
            </div>
        </div>
    </form>

    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
    @include('sweetalert::alert')
@endsection