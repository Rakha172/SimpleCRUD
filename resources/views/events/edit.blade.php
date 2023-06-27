@extends('adminlte::page') 
@section('title', 'Edit Events') 
@section('content_header') 
    <h1 class="m-0 text-dark">Edit Events</h1>
@stop
@section('content') 
    <form action="{{route('events.update', $events)}}" method="post">
        @method('PUT') 
        @csrf
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
 
                <div class="form-group">
                    <label for="exampleInputevent_name">Event Name</label>
                    <input type="text" class="form-control 
@error('event_name') is-invalid @enderror" id="exampleInputevent_name"
placeholder="Event Name" name="event_name"
value="{{$events->event_name ?? old('event_name')}}">
                    @error('Event Name') <span class="text-
danger">{{$message}}</span> @enderror
                    </div> 
                    <div class="form-group">
                    <label for="exampleInputevent_date">Event Date</label>
                    <input type="date" class="form-control 
@error('event_date') is-invalid @enderror" id="exampleInputevent_date"
placeholder="Event Date" name="event_date"
value="{{$events->event_date ?? old('event_date')}}">
                    @error('Event Date') <span class="text-
danger">{{$message}}</span> @enderror
<div class="form-group">
                    <label for="exampleInputevent_location">Event Location</label>
                    <input type="text" class="form-control 
@error('event_location') is-invalid @enderror" id="exampleInputevent_location"
placeholder="Event Location" name="event_location"
value="{{$events->event_location ?? old('event_location')}}">
                    @error('Event Location') <span class="text-
danger">{{$message}}</span> @enderror
<div class="form-group">
                    <label for="exampleInputevent_type">Event Type</label>
                    <input type="text" class="form-control 
@error('event_type') is-invalid @enderror" id="exampleInputevent_type"
placeholder="Event Type" name="event_type"
value="{{$events->event_type ?? old('event_type')}}">
                    @error('Event Type') <span class="text-
danger">{{$message}}</span> @enderror
<div class="form-group">
                    <label for="exampleInputevent_packetday">Event Packet Day</label>
                    <input type="text" class="form-control 
@error('event_packetday') is-invalid @enderror" id="exampleInputevent_packetday"
placeholder="Event Packet Day" name="event_packetday"
value="{{$events->event_packetday ?? old('event_packetday')}}">
                    @error('Event Packet Day') <span class="text-
danger">{{$message}}</span> @enderror
<div class="form-group">
                <div class="card-footer">
                     <button type="submit" class="btn btn-primary">
                        Simpan</button>
                    <a href="{{route('events.index')}}" class="btn 
btn-secondary">
                        Batal
                    </a>
                </div>
            </div>
        </div>
    </div>
@stop