@extends('layouts.master')

@section('content')

@section('page_name', 'SCM Dashboard Admin')

<div class="d-flex flex-wrap justify-content-around pb-2 pt-4">
    <iframe width="1080" height="760" src="{{ auth()->user()->dashboard_link }}" frameborder="0"
        allowfullscreen></iframe>
</div>

{{-- <div class="d-flex flex-wrap justify-content-around pb-2 pt-4">
    <iframe title="SCM Dashboard - MPM_Manual - Procurement YTD (1)" width="800" height="486" src="{{ auth()->user()->dashboard_link }}" frameborder="0" allowFullScreen="true"></iframe>
</div> --}}


@endsection