<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InfoGrafis extends Model
{
    protected $table = 'info_grafis';

    protected $fillable = [
        'title',
        'description',
        'pic',
        'slug',
        'unit_id',
        'created_by',
        'updated_by'
    ];

    public function penulis(){
    	return $this->belongsTo(User::class, 'created_by', 'id');
    }
}
