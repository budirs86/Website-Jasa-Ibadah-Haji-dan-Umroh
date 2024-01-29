<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
    protected $table = 'link';

    protected $fillable = ['title', 'link', 'unit_id', 'created_by', 'updated_by', 'pic'];

}
