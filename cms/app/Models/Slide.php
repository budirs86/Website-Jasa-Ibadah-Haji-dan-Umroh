<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slide extends Model
{
    protected $table = 'slides';
    
    protected $fillable = [
        'title',
        'content',
        'link',
        'unit_id',
        'created_by',
        'updated_by',
        'slug',
        'pic'
    ];

    public function setSlug()
    {
        $this->attributes['slug'] = strtolower(str_replace(' ','-', 'title'));
    }
}
