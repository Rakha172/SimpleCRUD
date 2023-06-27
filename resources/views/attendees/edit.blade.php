@extends('adminlte::page') 
@section('title', 'Edit Attendees') 
@section('content_header') 
    <h1 class="m-0 text-dark">Edit Attendees</h1>
@stop
@section('content') 
    <form action="{{route('attendees.update', $attendees)}}" method="post">
        @method('PUT') 
        @csrf
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
 
                <div class="form-group">
                    <label for="exampleInputnamadepan">Nama Depan</label>
                    <input type="text" class="form-control 
@error('namadepan') is-invalid @enderror" id="exampleInputnamadepan"
placeholder="Nama Depan" name="namadepan"
value="{{$attendees->namadepan ?? old('namadepan')}}">
                    @error('Nama Depan') <span class="text-
danger">{{$message}}</span> @enderror
                    </div> 
                    <div class="form-group">
                    <label for="exampleInputnamaakhir">Nama Akhir</label>
                    <input type="text" class="form-control 
@error('namaakhir') is-invalid @enderror" id="exampleInputnamaakhir"
placeholder="Nama Akhir" name="namaakhir"
value="{{$attendees->namaakhir ?? old('namaakhir')}}">
                    @error('Nama Akhir') <span class="text-
danger">{{$message}}</span> @enderror
<div class="form-group">
                    <label for="exampleInputalamat">Alamat</label>
                    <input type="text" class="form-control 
@error('alamat') is-invalid @enderror" id="exampleInputalamat"
placeholder="Alamat" name="alamat"
value="{{$attendees->alamat ?? old('alamat')}}">
                    @error('Alamat') <span class="text-
danger">{{$message}}</span> @enderror
<div class="form-group">
                    <label for="exampleInputemail">Email</label>
                    <input type="text" class="form-control 
@error('email') is-invalid @enderror" id="exampleInputemail"
placeholder="Email" name="email"
value="{{$attendees->email ?? old('email')}}">
                    @error('Email') <span class="text-
danger">{{$message}}</span> @enderror
<div class="form-group">
                    <label for="exampleInputnotelepon">Nomor Telepon</label>
                    <input type="number" class="form-control 
@error('notelepon') is-invalid @enderror" id="exampleInputnotelepon"
placeholder="Nomor Telepon" name="notelepon"
value="{{$attendees->notelepon ?? old('notelepon')}}">
                    @error('Nomor Telepon') <span class="text-
danger">{{$message}}</span> @enderror
<div class="form-group">
                <div class="card-footer">
                     <button type="submit" class="btn btn-primary">
                        Simpan</button>
                    <a href="{{route('attendees.index')}}" class="btn 
btn-secondary">
                        Batal
                    </a>
                </div>
            </div>
        </div>
    </div>
@stop