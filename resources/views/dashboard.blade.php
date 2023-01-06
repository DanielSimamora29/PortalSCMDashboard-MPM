@extends('layouts.master')

@section('content')


@if (auth()->user()->role_id == "1")
        @include('SuperAdmin.DashboardSuperAdmin')
    @elseif (auth()->user()->role_id == "2")
        @include('Admin.DashboardAdmin')
    @elseif (auth()->user()->role_id == "3")
        @include('Pegawai.DashboardPegawai')
@endif


@endsection