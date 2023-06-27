@extends('adminlte::page')
@section('title', 'List Attendees')
@section('content_header')
    <h1 class="m-0 text-dark">List Attendees</h1>
@stop
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <a href="{{route('attendees.create')}}" class="btn btn-info mb-2">
                        Tambah
                    </a>
                    <table class="table table-hover table-bordered 
table-stripped" id="example2">
                        <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama Depan</th>
                            <th>Nama Akhir</th>
                            <th>Alamat</th>
                            <th>Email</th>
                            <th>Nomor Telepon</th>
                            <th>Opsi</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($attendees as $key => $attendees)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$attendees->namadepan}}</td>
                                <td>{{$attendees->namaakhir}}</td>
                                <td>{{$attendees->alamat}}</td>
                                <td>{{$attendees->email}}</td>
                                <td>{{$attendees->notelepon}}</td>
                                <td>
                                    <a href="{{route('attendees.edit', 
$attendees)}}" class="btn btn-primary btn-xs">
                                        Edit
                                    </a>
                                <a href="{{route('attendees.destroy', 
$attendees)}}" onclick="notificationBeforeDelete(event, this)" class="btn 
btn-danger btn-xs">
                                    Delete
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
 </div>
@stop
@push('js') 
    <form action="" id="delete-form" method="post"> 
        @method('delete') 
        @csrf 
    </form> 
    <script> 
        $('#example2').DataTable({ 
            "responsive": true, 
        }); 
        function notificationBeforeDelete(event, el) { 
            event.preventDefault(); 
            if (confirm('Apakah anda yakin akan menghapus data ? ')) { 
                $("#delete-form").attr('action', $(el).attr('href')); 
                $("#delete-form").submit(); 
            } 
        } 
    </script> 
@endpush