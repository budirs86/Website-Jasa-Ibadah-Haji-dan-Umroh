<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MenuFrontDetail extends Model
{
    protected $table = 'menu_front_details';
    protected $fillable = [
        'menu_id',
        'link',
        'title',
        'created_by',
        'deleted_at',   
        'unit_id',
        'sort',
    ];
    
    public function induk(){
    	return $this->belongsTo(MenuFront::class, 'menu_id', 'id');
    }

   
}
