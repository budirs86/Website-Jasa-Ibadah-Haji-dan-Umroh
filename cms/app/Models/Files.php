<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Files extends Model
{
    protected $table = 'files';

    protected $fillable = ['title', 'file_name', 'unit_id', 'created_by', 'updated_by', 'deleted_at'];

}
