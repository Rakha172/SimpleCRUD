@extends('adminlte::page')
@section('title', 'List Events')
@section('content_header')
    <h1 class="m-0 text-dark">List Events</h1>
@stop
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <a href="{{route('events.create')}}" class="btn btn-info mb-2">
                        Tambah
                    </a>
                    <table class="table table-hover table-bordered 
table-stripped" id="example2">
                        <thead>
                        <tr>
                            <th>No.</th>
                            <th>Event Name</th>
                            <th>Event Date</th>
                            <th>Event Location</th>
                            <th>Event Type</th>
                            <th>Event Packet Day</th>
                            <th>Opsi</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($events as $key => $events)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$events->event_name}}</td>
                                <td>{{$events->event_date}}</td>
                                <td>{{$events->event_location}}</td>
                                <td>{{$events->event_type}}</td>
                                <td>{{$events->event_packetday}}</td>
                                <td>
                                    <a href="{{route('events.edit', 
$events)}}" class="btn btn-primary btn-xs">
                                        Edit
                                    </a>
                                <a href="{{route('events.destroy', 
$events)}}" onclick="notificationBeforeDelete(event, this)" class="btn 
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