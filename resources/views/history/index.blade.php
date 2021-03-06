@extends('layouts.master')
@section('tittle') Component History @endsection
@section('content')
<div class="row bg-title">
    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
        <h4 class="page-title text-white">Component History</h4> </div>
    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
        <!-- <button class="right-side-toggle waves-effect waves-light btn-info btn-circle pull-right m-l-20"><i class="ti-settings text-white"></i></button> -->
        <ol class="breadcrumb">
            <li class="btn btn-info btn-xs"><a href="{{ url('/home') }}">Dashboard</a></li>
            <li class="btn btn-info btn-xs"><a href="{{ url('/master') }}">Master</a></li>
            <li class="active">Component History</li>
        </ol>
    </div>
    <!-- /.col-lg-12 -->
</div>
<div class="row">
    <div class="col-md-8 col-xs-12">
            <div class="white-box">
                <div class="panel-heading">
                    <a href="/history/form" class="btn btn-info btn-outline"><i class="mdi mdi-plus"></i></a>
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
                                <th>ID Komponen</th>
                                <th>Nama Komponen</th>
                                <th>Dibuat tanggal</th>
                                <th>Keterangan</th>
                                {{-- <th>PIC</th>
                                <th>Action</th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($history as $history)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td><a href="/history/{{ $history->id}}/rinci">{{ $history->id_komponen }}</a></td>
                                <td><a href="/history/{{ $history->id}}/rinci">{{ $history->component->alias }}</a></td>
                                <td>{{ $history->tanggal }}</td>
                                <td>{{ $history->keterangan }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
    </div>
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="exampleModalLabel1">Masukkan Data Baru</h4> </div>
                <div class="modal-body">
                    <form action="/history/create" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="id_komponen" class="control-label">ID Komponen</label>
                            <select class="form-control select2" name="id_komponen" required>
                                @foreach ($component as $component)
                                <option value="{{ $component->id_komponen }}">{{ $component->id_komponen }} - {{ $component->komponen }}</option>
                                @endforeach
                            </select>                        </div>
                        <div class="form-group">
                            <label for="tanggal" class="control-label">Tanggal</label>
                            <input type="date" name="tanggal" class="form-control" id="tanggal" required>
                        </div>
                        <div class="form-group">
                            <label for="keterangan" class="control-label">Keterangan</label>
                            <textarea name="keterangan" class="form-control" id="keterangan" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="user" class="control-label">PIC</label>
                            <select class="form-control select2" name="user_id" required>
                                <option value="{{ Auth::user()->id }}">{{ Auth::user()->crew->scope }} - {{ Auth::user()->crew->nama }}</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Simpan Data</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
