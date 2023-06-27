<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventOrganizer extends Model
{
    use HasFactory;
    protected $table = 'eventorganizer'; 
    protected $fillable = [ 
        'nama_tim',
        'kategori_EO',
        'kelebihan',
        'email',
        'notelepon'
    ];
}
