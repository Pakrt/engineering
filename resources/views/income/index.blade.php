@extends('layouts.master')
@section('tittle') Barang Masuk @endsection
@section('content')
<div class="row bg-title">
    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
        <h4 class="page-title text-white">Barang Masuk</h4> </div>
    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
        <!-- <button class="right-side-toggle waves-effect waves-light btn-info btn-circle pull-right m-l-20"><i class="ti-settings text-white"></i></button> -->
        <ol class="breadcrumb">
            <li class="btn btn-info btn-xs"><a href="{{ url('/home') }}">Dashboard</a></li>
            <li class="active">Barang Masuk</li>
        </ol>
    </div>
    <!-- /.col-lg-12 -->
</div>
<div class="row">
    <div class="col-md-12 col-xs-12">
        <div class="white-box">
            <div class="panel-heading">
                <a href="/income/form" class="btn btn-info btn-outline"><i class="mdi mdi-plus"></i></a>
            </div>
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status')}}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            @endif
            <div class="table-responsive">
                <table id="myTable" class="table table-striped">
                    <thead>
                        <tr>
                            <th>Tanggal</th>
                            <th>Kode LBM</th>
                            <th>Sparepart</th>
                            <th>Jumlah</th>
                            <th>Satuan</th>
                            <th>Keterangan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($income as $income)
                        <tr>
                            <td>{{ $income->tanggal }}</td>
                            <td>{{ $income->kode }}</td>
                            <td><a href="/sparepart/{{$income->sparepart->id}}/detail">{{ $income->sparepart->nama }}</a></td>
                            <td>{{ $income->jumlah }}</td>
                            <td>{{ $income->sparepart->unit->kode }}</td>
                            <td>{{ $income->keterangan }}</td>
                            <td>
                                <form action="/income/{{$income->id}}/delete" method="POST">
                                    @method('delete')
                                    @csrf
                                    <a href="/income/{{ $income->id }}/edit" class="btn btn-info btn-outline btn-circle btn-md m-r-10 d-inline"><i class="ti-pencil-alt"></i></a>
                                    <button type="submit" class="btn btn-danger btn-outline btn-circle btn-md m-r-5 d-inline" onclick="return confirm('Yakin mau hapus datanya niiih ??')"><i class="ti-trash"></i></button>
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
