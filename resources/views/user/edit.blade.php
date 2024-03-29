@extends('layouts.master')
@section('tittle') Edit Data User @endsection
@section('content')
<div class="row bg-title">
    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
        <h4 class="page-title text-white text-white">Master User</h4> </div>
    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
        {{-- <!-- <button class="right-side-toggle waves-effect waves-light btn-info btn-circle pull-right m-l-20"><i class="ti-settings text-white"></i></button> --> --}}
        <ol class="breadcrumb">
            <li class="btn btn-info btn-xs"><a href="{{ url('/home') }}">Dashboard</a></li>
            <li class="btn btn-info btn-xs"><a href="/user/{{$user->id}}/detail">User</a></li>
            <li class="active">Edit Data User</li>
        </ol>
    </div>
    <!-- /.col-lg-12 -->
</div>
<div class="col-md-6">
<div class="white-box text-white">
    <div class="row">
        <div class="col-md-12">
            <form action="/user/{{ $user->id }}/update" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row col-md-12">
                    <div class="form-group col-md-6">
                        <label for="name" class="control-label">Nama</label>
                        <input name="name" type="text" class="form-control text-white" id="name" required value="{{ $user->name}}">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="jenis_kelamin" class="control-label">Jenis Kelamin</label>
                        <select type="text" name="jenis_kelamin" class="form-control text-white" id="jenis_kelamin">
                            <option value="Pria" @if($user->crew->jenis_kelamin=='Pria') selected @endif>Pria</option>
                            <option value="Wanita" @if($user->crew->jenis_kelamin=='Wanita') selected @endif>Wanita</option>
                            <option value="Bencong" @if($user->crew->jenis_kelamin=='Bencong') selected @endif>Lain-lain</option>
                        </select>
                    </div>
                </div>
                <div class="row col-md-12">
                    <div class="form-group col-md-6">
                        <label for="tanggal_lahir" class="control-label">Tanggal Lahir</label>
                        <input name="tanggal_lahir" type="date" class="form-control text-white" id="tanggal_lahir" required value="{{ $user->crew->tanggal_lahir}}">
                    </div>
                    <div class="form-group col-md-6">
                        <label>Nomor HP</label>
                        <div class="input-group">
                            <span class="input-group-addon" id="basic-addon1">+62</span>
                            <input type="text" name="kontak" class="form-control text-white" aria-describedby="basic-addon1" value="{{ $user->crew->kontak}}">
                        </div>
                    </div>
                </div>
                <div class="row col-md-12 col-xs-12">
                    @if (Auth::user()->role == 'admin')
                    <div class="form-group col-md-6">
                        <label for="scope" class="control-label">Scope</label>
                        <select type="text" name="scope" class="form-control text-white" id="scope">
                            <option value="Admin" @if($user->crew->scope =='admin') selected @endif>Admin</option>
                            <option value="Automasi" @if($user->crew->scope =='Automasi') selected @endif>Automasi</option>
                            <option value="Boiler" @if($user->crew->scope =='Boiler') selected @endif>Boiler</option>
                            <option value="Filling" @if($user->crew->scope =='Filling') selected @endif>Filling</option>
                            <option value="IT" @if($user->crew->scope =='IT') selected @endif>IT</option>
                            <option value="Packaging" @if($user->crew->scope =='Packaging') selected @endif>Packaging</option>
                            <option value="Support" @if($user->crew->scope =='Support') selected @endif>Support</option>
                            <option value="Utility" @if($user->crew->scope =='Utility') selected @endif>Utility</option>
                            <option value="Workshop" @if($user->crew->scope =='Workshop') selected @endif>Workshop</option>
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="role" class="control-label">Role</label>
                        <select type="text" name="role" class="form-control text-white" id="role">
                            <option value="Admin" @if($user->role=='admin') selected @endif>Admin</option>
                            <option value="Crew" @if($user->role=='Crew') selected @endif>Crew</option>
                            <option value="Lain" @if($user->role=='Lain') selected @endif>Lain-lain</option>
                        </select>
                    </div>
                    @endif
                </div>
                <div class="row col-md-12 col-xs-12">
                    <div class="form-group col-md-8">
                        <label for="alamat" class="control-label">Alamat</label>
                        <textarea name="alamat" class="form-control text-white" id="alamat" required>{{ $user->crew->alamat}}</textarea>
                    </div>
                </div>
                <div class="row col-md-12 col-xs-12">
                    <a href="/user/{{ $user->id }}/detail" class="btn btn-warning">Kembali</a>
                    <button type="submit" class="btn btn-success pull-right">Simpan Data</button>
                </div>
            </form>
        </div>
    </div>
</div>
</div>
@endsection
