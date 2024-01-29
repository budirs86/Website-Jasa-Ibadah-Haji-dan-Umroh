<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PpidCategory extends Model
{
    protected $table = 'ppid_categories';
    protected $fillable = ['unit_id', 'category'];

    public function document(){
    	return $this->hasMany(PpidDocument::class, 'id', 'category_id');
    }
}
