<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    // use HasFactory;
    protected $table = 'unit';

    protected $fillable = [
        'unit_kerja',
        'link',
        'title',
        'created_by',
        'edited_by',
        'deleted_by'
    ];

    public function users(){
    	return $this->hasMany(User::class, 'id', 'unit_id');
    }

    public function document(){
    	return $this->hasMany(PpidDocument::class, 'id', 'unit_id');
    }

    public function ppid_permohonan(){
    	return $this->hasMany(Ppid_permohonan::class, 'id', 'unit_id_tujuan');
    }

    public function berita(){
    	return $this->hasMany(Berita::class, 'id', 'unit_id');
    }

    public function pengumuman(){
    	return $this->hasMany(Pengumuman::class, 'id', 'unit_id');
    }

    public function images(){
    	return $this->hasMany(Logo::class, 'unit_id', 'id');
    }

}
