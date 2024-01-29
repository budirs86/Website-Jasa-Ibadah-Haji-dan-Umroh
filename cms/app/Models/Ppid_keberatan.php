<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ppid_keberatan extends Model
{
    protected $table = 'ppid_keberatan';

    protected $fillable = [
        'unit_id',
        'nomor_identitas',
        'nama',
        'alamat',
        'no_tlp',
        'email',
        'alasan',
        'tujuan',
        'file_name',
        'benar',
        'status',
        'tracking_no',
        'kuasa',

    ];
}
