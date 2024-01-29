<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MenuFront extends Model
{
    protected $table = 'menu_fronts';
    protected $fillable = [
       'unit_id',
        'pic',
        'link',
        'title',
        'created_by',
        'updated_by',
        'deleted_at',
        'sort', 
    ];

    public function child(){
    	return $this->hasMany(MenuFrontDetail::class, 'id', 'unit_id');
    }
}
