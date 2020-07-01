@extends('layouts.master')
@section('tittle') Data Downtime @endsection
@section('content')
<div class="row bg-title">
    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
        <h4 class="page-title">Data Downtime</h4> </div>
    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
        <button class="right-side-toggle waves-effect waves-light btn-info btn-circle pull-right m-l-20"><i class="ti-settings text-white"></i></button>
        <ol class="breadcrumb">
            <li><a href="{{ url('/home') }}">Dashboard</a></li>
            <li class="active"><a href="#">Data Downtime</a></li>
        </ol>
    </div>
    <!-- /.col-lg-12 -->
</div>
<div class="row">
    <div class="col-md-12 col-xs-12">
            <div class="white-box">
                <div class="panel-heading">
                    <a href="/downtime/form" class="btn btn-info btn-outline"><i class="mdi mdi-plus"></i></a>
                </div>
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status')}}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                @endif
                <div class="table-responsive">
                    <table id="example23" class="display block" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Mesin</th>
                                <th>Durasi<br>(menit)</th>
                                <th>Tanggal</th>
                                <th>Jam Mulai</th>
                                <th>Keterangan</th>
                                <th>PIC</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($downtime as $downtime)
                            <tr>
                                <th scope="row">&emsp;{{ $loop->iteration }}</th>
                                <td>&emsp;{{ $downtime->id_posisi }}</td>
                                <td>&emsp;{{ $downtime->durasi}}</td>
                                <td>&emsp;{{ $downtime->tanggal }}</td>
                                <td>&emsp;{{ $downtime->jam }}</td>
                                <td>{{ $downtime->keterangan }}</td>
                                <td>{{ $downtime->user }}</td>
                                <td>
                                    <form action="/downtime/{{ $downtime->id }}/delete" method="POST">
                                        @method('delete')
                                        @csrf
                                        <a href="/downtime/{{ $downtime->id }}/edit" class="btn btn-info btn-outline btn-circle btn-md m-r-5"><i class="ti-pencil-alt"></i></a>
                                        <button type="submit" class="btn btn-danger btn-outline btn-circle btn-md m-r-5" onclick="return confirm('Yakin mau hapus datanya niiih ??')"><i class="ti-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
    </div>
</div>
@endsection