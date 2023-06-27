<?php

namespace App\Http\Controllers;

use App\Models\Attendees;
use Illuminate\Http\Request;

class AttendeesController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
   {
    //Menampilkan Semua Data Attendees
    $attendees = Attendees ::all();
    return view('attendees.index', [ 
        'attendees' => $attendees
    ]);
   } 

   /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
   { 
    //Menampilkan Form Tambah Attendees
    return view('attendees.create');
   } 

   /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function store(Request $request)
 { 
    //Menyimpan Data Attendees Baru
    $request->validate([
        'namadepan' => 'required',
        'namaakhir' => 'required',
        'alamat' => 'required',
        'email' => 'required', 
        'notelepon' => 'required'
    ]);
    $array = $request->only([
        'namadepan','namaakhir','alamat','email','notelepon'
    ]);
    $attendees = Attendees::create($array);
    return redirect()->route('attendees.index')->with('success_message', 'Berhasil Menambah Attendees Baru');
 } 

 /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
   { 
    //Menampilkan Form Edit
     $attendees = Attendees::find($id);
    if (!$attendees) return redirect()->route('attendees.index') 
    ->with('error_message', 'attendees dengan id = '.$id.' tidak ditemukan');
    return view('attendees.edit', [ 
        'attendees' => $attendees
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
    //Mengedit attendees User
    $request->validate([
        'namadepan' => 'required',
        'namaakhir' => 'required',
        'alamat' => 'required',
        'email' => 'required',
        'notelepon' => 'required',
 ]);
    $attendees = Attendees::find($id);
    $attendees->namadepan = $request->namadepan;
    $attendees->namaakhir = $request->namaakhir;
    $attendees->alamat = $request->alamat;
    $attendees->email = $request->email;
    $attendees->notelepon = $request->notelepon;
    $attendees->save();
    return redirect()->route('attendees.index') 
    ->with('success_message', 'Berhasil Mengubah Attendees');
 } 

 /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
 { 
    //Menghapus Attendees
    $attendees = Attendees::find($id);
    if ($attendees) $attendees->delete();
     return redirect()->route('attendees.index') 
    ->with('success_message', 'Berhasil Menghapus Attendees');
 } 
}
