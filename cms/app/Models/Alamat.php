<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alamat extends Model
{
   protected $table = 'alamat';

   protected $fillable = ['unit_id', 'alamat', 'kota', 'provinsi', 'kode_pos', 'telepon', 'fax', 'email', 'created_by', 'updated_by'];
}
