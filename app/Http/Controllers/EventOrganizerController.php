<?php

namespace App\Http\Controllers;

use App\Models\EventOrganizer;
use Illuminate\Http\Request;

class EventOrganizerController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
   {
    //Menampilkan Semua Data Eventorganizer
    $eventorganizer = EventOrganizer ::all();
    return view('eventorganizer.index', [ 
        'eventorganizer' => $eventorganizer
    ]);
   } 

   /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
   { 
    //Menampilkan Form Tambah EventOrganizer
    return view('eventorganizer.create');
   } 

   /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function store(Request $request)
 { 
    //Menyimpan Data eventorganizer Baru
    $request->validate([
        'nama_tim' => 'required',
        'kategori_EO' => 'required',
        'kelebihan' => 'required',
        'email' => 'required', 
        'notelepon' => 'required'
    ]);
    $array = $request->only([
        'nama_tim','kategori_EO','kelebihan','email','notelepon'
    ]);
    $eventorganizer = EventOrganizer::create($array);
    return redirect()->route('eventorganizer.index')->with('success_message', 'Berhasil Menambah EventOrganizer Baru');
 } 

 /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
   { 
    //Menampilkan Form Edit
     $eventorganizer = EventOrganizer::find($id);
    if (!$eventorganizer) return redirect()->route('eventorganizer.index') 
    ->with('error_message', 'eventorganizer dengan id = '.$id.' tidak ditemukan');
    return view('eventorganizer.edit', [ 
        'eventorganizer' => $eventorganizer
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
    //Mengedit EventOrganizer User
    $request->validate([
        'nama_tim' => 'required',
        'kategori_EO' => 'required',
        'kelebihan' => 'required',
        'email' => 'required',
        'notelepon' => 'required',
 ]);
    $eventorganizer = EventOrganizer::find($id);
    $eventorganizer->nama_tim = $request->nama_tim;
    $eventorganizer->kategori_EO = $request->kategori_EO;
    $eventorganizer->kelebihan = $request->kelebihan;
    $eventorganizer->email = $request->email;
    $eventorganizer->notelepon = $request->notelepon;
    $eventorganizer->save();
    return redirect()->route('eventorganizer.index') 
    ->with('success_message', 'Berhasil Mengubah EventOrganizer');
 } 

 /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
 { 
    //Menghapus EventOrganizer
    $eventorganizer = EventOrganizer::find($id);
    if ($eventorganizer) $eventorganizer->delete();
     return redirect()->route('eventorganizer.index') 
    ->with('success_message', 'Berhasil Menghapus EventOrganizer');
 } 
}
