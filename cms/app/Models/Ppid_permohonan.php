<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ppid_permohonan extends Model
{
    protected $table = 'ppid_permohonan';

    protected $fillable = [
        'kategori_permohonan',
        'unit_id',
        'unit_id_tujuan',
        'nomor_identitas',
        'nama',
        'alamat',
        'pekerjaan',
        'no_tlp',
        'email',
        'rincian',
        'tujuan',
        'cara_memperoleh',
        'cara_mendapatkan',
        'file_name',
        'setuju',
        'status',
        'tracking_no',
        'keterangan',
    ];

    public function unit(){
    	return $this->belongsTo(Unit::class, 'unit_id_tujuan', 'id');
    }
}
