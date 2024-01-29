<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Logo extends Model
{
    protected $table = 'logo';

    protected $fillable = ['unit_id', 'created_by', 'updated_by', 'pic'];

    
    protected function unit(){
        return $this->belongsTo(Unit::class, 'unit_id', 'id');
    }
}
