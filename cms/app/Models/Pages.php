<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pages extends Model
{
    protected $table = 'pages';

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
}
