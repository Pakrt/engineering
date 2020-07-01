@extends('layouts.master')
@section('tittle') Master Component @endsection
@section('content')
{{-- <link href="/assets/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet"> --}}


<div class="row bg-title">
    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
        <h4 class="page-title">Komponen PAM B</h4> </div>
    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
        <button class="right-side-toggle waves-effect waves-light btn-info btn-circle pull-right m-l-20"><i class="ti-settings text-white"></i></button>
        <ol class="breadcrumb">
            <li><a href="{{ url('/home') }}">Dashboard</a></li>
            <li><a href="{{ url('/maintenance') }}">Maintenance</a></li>
            <li><a href="{{ url('/packaging') }}">Packaging</a></li>
            <li class="active">PAM B</li>
        </ol>
    </div>
    <!-- /.col-lg-12 -->
</div>
<div class="row">
    <div class="col-sm-12 col-md-8">
        <div class="panel">
            <div class="white-box">
                <div class="table-responsive">
                    <table id="myTable" class="table table-striped">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>ID Komponen</th>
                                <th>Nama Komponen</th>
                                <th>Posisi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pamb as $pamb)
                            <tr>
                                <th scope="row">&emsp; {{ $loop->iteration}}</th>
                                <td><a href="/history/{{$pamb->id_komponen}}/detail">{{$pamb->id_komponen}}</a></td>
                                <td><a href="/history/{{$pamb->id_komponen}}/detail">{{$pamb->komponen}}</a></td>
                                <td>{{$pamb->position->nama}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</div>

<!-- jQuery -->
<script src="/assets/plugins/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap Core JavaScript -->
<script src="/assets/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Menu Plugin JavaScript -->
<script src="/assets/plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.js"></script>
<!--slimscroll JavaScript -->
<script src="/assets/js/jquery.slimscroll.js"></script>
<!--Wave Effects -->
<script src="/assets/js/waves.js"></script>
<!-- Custom Theme JavaScript -->
<script src="/assets/js/custom.min.js"></script>


@endsection