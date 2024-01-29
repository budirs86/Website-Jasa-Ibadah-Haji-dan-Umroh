<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Berita extends Model
{

    use SoftDeletes;

    protected $table = 'berita';

    protected $fillable = [
        'title',
        'content',
        'unit_id',
        'category_id',
        'created_by',
        'updated_by',
        'slug',
        'show',
        'pic',
        'hit',
        'like',
        'portal'
    ];

    protected $dates = ['deleted_at'];

    public function setSlug()
    {
        $this->attributes['slug'] = strtolower(str_replace(' ','-', 'title'));
    }

    public function category(){
    	return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function penulis(){
    	return $this->belongsTo(User::class, 'created_by', 'id');
    }

    public function unit(){
    	return $this->belongsTo(Unit::class, 'unit_id', 'id');
    }


}
