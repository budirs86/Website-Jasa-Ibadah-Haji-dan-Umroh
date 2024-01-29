<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    // use HasFactory;
    protected $table = 'menu';
    
    protected $fillable = [
        'parent_id',
        'link',
        'title',
        'unit_id',
        'created_by',
        'updated_by',
        'deleted_by',
        'sort'    
    ];

    public function childs() {
        return $this->hasMany('App\Models\Menu','parent_id','id') ;
    }
}
