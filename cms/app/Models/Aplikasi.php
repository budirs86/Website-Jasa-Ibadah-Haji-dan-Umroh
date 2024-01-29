<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aplikasi extends Model
{
    protected $table = 'aplikasi';

    protected $fillable = ['title', 'description', 'link', 'unit_id', 'created_by', 'updated_by', 'slug', 'pic'];


    public function setSlug()
    {
        $this->attributes['slug'] = strtolower(str_replace(' ','-', 'title'));
    }
}
