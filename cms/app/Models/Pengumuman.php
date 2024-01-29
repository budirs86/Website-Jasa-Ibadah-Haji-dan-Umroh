<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengumuman extends Model
{
    protected $table = 'pengumuman';
    
    protected $fillable = [
        'title',
        'content',
        'unit_id',
        'created_by',
        'updated_by',
        'slug'
    ];

    public function setSlug()
    {
        $this->attributes['slug'] = strtolower(str_replace(' ','-', 'title'));
    }

    public function penulis(){
    	return $this->belongsTo(User::class, 'created_by', 'id');
    }

    public function unit(){
    	return $this->belongsTo(Unit::class, 'unit_id', 'id');
    }
}
