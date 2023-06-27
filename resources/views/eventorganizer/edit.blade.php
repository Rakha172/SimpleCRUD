@extends('adminlte::page') 
@section('title', 'Edit EventOrganizer') 
@section('content_header') 
    <h1 class="m-0 text-dark">Edit EventOrganizer</h1>
@stop
@section('content') 
    <form action="{{route('eventorganizer.update', $eventorganizer)}}" method="post">
        @method('PUT') 
        @csrf
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
 
                <div class="form-group">
                    <label for="exampleInputnama_tim">Nama Tim Kami</label>
                    <input type="text" class="form-control 
@error('nama_tim') is-invalid @enderror" id="exampleInputnama_tim"
placeholder="Nama Tim Kami" name="nama_tim"
value="{{$eventorganizer->nama_tim ?? old('nama_tim')}}">
                    @error('Nama Tim Kami') <span class="text-
danger">{{$message}}</span> @enderror
                    </div> 
                    <div class="form-group">
                    <label for="exampleInputkategori_EO">Kategori EO</label>
                    <input type="text" class="form-control 
@error('kategori_EO') is-invalid @enderror" id="exampleInputkategori_EO"
placeholder="Kategori EO" name="kategori_EO"
value="{{$eventorganizer->kategori_EO ?? old('kategori_EO')}}">
                    @error('Kategori EO') <span class="text-
danger">{{$message}}</span> @enderror
<div class="form-group">
                    <label for="exampleInputkelebihan">Kelebihan Kami</label>
                    <input type="text" class="form-control 
@error('kelebihan') is-invalid @enderror" id="exampleInputkelebihan"
placeholder="Kelebihan Kami" name="kelebihan"
value="{{$eventorganizer->kelebihan ?? old('kelebihan')}}">
                    @error('Kelebihan Kami') <span class="text-
danger">{{$message}}</span> @enderror
<div class="form-group">
                    <label for="exampleInputemail">Email</label>
                    <input type="text" class="form-control 
@error('email') is-invalid @enderror" id="exampleInputemail"
placeholder="Email" name="email"
value="{{$eventorganizer->email ?? old('email')}}">
                    @error('Email') <span class="text-
danger">{{$message}}</span> @enderror
<div class="form-group">
                    <label for="exampleInputnotelepon">Nomor Telepon</label>
                    <input type="text" class="form-control 
@error('notelepon') is-invalid @enderror" id="exampleInputnotelepon"
placeholder="Nomor Telepon" name="notelepon"
value="{{$eventorganizer->notelepon ?? old('notelepon')}}">
                    @error('Nomor Telepon') <span class="text-
danger">{{$message}}</span> @enderror
<div class="form-group">
                <div class="card-footer">
                     <button type="submit" class="btn btn-primary">
                        Simpan</button>
                    <a href="{{route('eventorganizer.index')}}" class="btn 
btn-secondary">
                        Batal
                    </a>
                </div>
            </div>
        </div>
    </div>
@stop