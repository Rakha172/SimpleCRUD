<?php

namespace App\Http\Controllers;

use App\Models\Events;
use Illuminate\Http\Request;

class EventsController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
   {
    //Menampilkan Semua Data Events
    $events = Events ::all();
    return view('events.index', [ 
        'events' => $events
    ]);
   } 

   /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
   { 
    //Menampilkan Form Tambah Events
    return view('events.create');
   } 

   /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function store(Request $request)
 { 
    //Menyimpan Data events Baru
    $request->validate([
        'event_name' => 'required',
        'event_date' => 'required',
        'event_location' => 'required',
        'event_type' => 'required', 
        'event_packetday' => 'required'
    ]);
    $array = $request->only([
        'event_name','event_date','event_location','event_type','event_packetday'
    ]);
    $events = Events::create($array);
    return redirect()->route('events.index')->with('success_message', 'Berhasil Menambah Events Baru');
 } 

 /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
   { 
    //Menampilkan Form Edit
     $events = Events::find($id);
    if (!$events) return redirect()->route('events.index') 
    ->with('error_message', 'events dengan id = '.$id.' tidak ditemukan');
    return view('events.edit', [ 
        'events' => $events
]);
 } 

 /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
 { 
    //Mengedit Events User
    $request->validate([
        'event_name' => 'required',
        'event_date' => 'required',
        'event_location' => 'required',
        'event_type' => 'required',
        'event_packetday' => 'required',
 ]);
    $events = Events::find($id);
    $events->event_name = $request->event_name;
    $events->event_date = $request->event_date;
    $events->event_location = $request->event_location;
    $events->event_type = $request->event_type;
    $events->event_packetday = $request->event_packetday;
    $events->save();
    return redirect()->route('events.index') 
    ->with('success_message', 'Berhasil Mengubah Events');
 } 

 /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
 { 
    //Menghapus Events
    $events = Events::find($id);
    if ($events) $events->delete();
     return redirect()->route('events.index') 
    ->with('success_message', 'Berhasil Menghapus Events');
 } 
}
