<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Survey extends Model
{
    protected $table = 'survey';
    protected $fillable = ['unit_id', 'pertanyaan','j_1', 'j_2', 'j_3', 'j_4', 'j_5', 'status', 'created_by', 'updated_by'];
}
