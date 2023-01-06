@extends('layouts.master')

@section('content')

@section('page_name', 'Daftar User Admin')

<div class="col-2 flex">
    <a href="{{ route('TambahUserAdmin') }}" title="Tambah User Admin"  class="btn btn-success p-2 ms-auto">
        <i class="fa fa-plus"></i>
        <span>Tambah User Admin</span>
    </a>
</div>
<br>
<div class="table-responsive">
    <table class="table table-bordered" id="list">
    <thead>
        <th style="width: 130px;">No</th>
        <th style="min-width: 140px;">Nama</th>
        <th class="col-3">Username</th>
        <th class="col-3">Role</th>
        <th class="col-3">Plant</th>

        <th>Aksi</th>
        </thead>
        <tbody name="data" id="data">
            @php
                $no = 1;
            @endphp
            @foreach ($daftarusers as $daftaruser)
                <tr>
                    <td>
                        {{ $no++ }}
                    </td>
                    <td>
                        {{ $daftaruser['name'] }}
                    </td>
                    <td>
                        {{ $daftaruser['username'] }}
                    </td>
                    <td>
                        {{ $daftaruser['roles']->name }}
                    </td>
                    <td>
                        {{ $daftaruser['plants']->name }}
                    </td> 

                    <td>
                        <div class="d-flex gap-3 flex-column flex-md-row">
                        <a href="/viewAdmin/{{ $daftaruser->id }}" data-toggle="tooltip" data-placement="bottom" title="Lihat daftar User Admin"
                                class="btn btn-secondary" ><i class="fa fa-eye"></i></a>
                            <a href="/editdataAdmin/{{ $daftaruser->id }}" data-toggle="tooltip" data-placement="bottom" title="Edit Daftar User Admin" 
                                class="btn btn-warning"><i class="fa fa-edit"></i></a>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection