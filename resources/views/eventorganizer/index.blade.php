@extends('adminlte::page')
@section('title', 'List EventOrganizer')
@section('content_header')
    <h1 class="m-0 text-dark">List EventOrganizer</h1>
@stop
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <a href="{{route('eventorganizer.create')}}" class="btn btn-info mb-2">
                        Tambah
                    </a>
                    <table class="table table-hover table-bordered 
table-stripped" id="example2">
                        <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama Tim Kami</th>
                            <th>Kategori EO</th>
                            <th>Kelebihan</th>
                            <th>Email</th>
                            <th>Nomor Telepon</th>
                            <th>Opsi</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($eventorganizer as $key => $eventorganizer)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$eventorganizer->nama_tim}}</td>
                                <td>{{$eventorganizer->kategori_EO}}</td>
                                <td>{{$eventorganizer->kelebihan}}</td>
                                <td>{{$eventorganizer->email}}</td>
                                <td>{{$eventorganizer->notelepon}}</td>
                                <td>
                                    <a href="{{route('eventorganizer.edit', 
$eventorganizer)}}" class="btn btn-primary btn-xs">
                                        Edit
                                    </a>
                                <a href="{{route('eventorganizer.destroy', 
$eventorganizer)}}" onclick="notificationBeforeDelete(event, this)" class="btn 
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