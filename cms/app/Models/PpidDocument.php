<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PpidDocument extends Model
{
   protected $table = 'ppid_documents';
   protected $fillable  = [
                            'category_id',
                            'unit_id',
                            'title',
                            'description',
                            'created_by',
                            'update_by',
                            'file_name',
                            'slug',
                            'view',
                            'download',
                            'aktif'
                        ];

    public function setSlug()
    {
        $this->attributes['slug'] = strtolower(str_replace(' ','-', 'title'));
    }

    public function category(){
        return $this->belongsTo(PpidCategory::class, 'category_id', 'id');
    }

    public function penulis(){
        return $this->belongsTo(User::class, 'created_by', 'id');
    }

    public function unit(){
        return $this->belongsTo(Unit::class, 'unit_id', 'id');
    }
}
