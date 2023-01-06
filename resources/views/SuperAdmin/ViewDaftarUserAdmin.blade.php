@extends('layouts.master')

@section('content')

@section('page_name', 'Detail User Admin')

<div class="col-12 p-3 bg-white shadow rounded">
    <div class="card-header">
        <div class="card-title">Detail</div>
    </div>
    
    <div class="table-responsive col-md-6 col-12">
        <table class="mt-2 table">
            <tr>
                <td>Nama</td>
                <td><b>{{ $detail['name'] }}</b></td>
            </tr>
            <tr>
                <td>Username</td>
                <td><b>{{ $detail['username'] }}</b></td>
            </tr>
            <tr>
                <td>Role</td>
                <td><b>{{ $detail['roles']->name }}</b></td>
            </tr>
            <tr>
                <td>Plant</td>
                <td><b>{{ $detail['plants']->name }}</b></td>
            </tr>
        </table>
    </div>
    <div class="card-title">Dashboard Link</div>
        <div class="d-flex flex-wrap justify-content-around pb-2 pt-4">
            <iframe width="100%" height="700" src="{{ $detail['dashboard_link'] }}"></iframe>
        </div>
</div>

    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>


@endsection

