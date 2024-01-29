<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pimpinan extends Model
{
    protected $table = 'pimpinan';
    
    protected $fillable = [
        'nama_pimpinan',
        'nama_jabatan',
        'masa_jabatan',
        'pic',
        'unit_id',
        'created_by',
        'updated_by',
        'active',
        'link'
    ];
}
