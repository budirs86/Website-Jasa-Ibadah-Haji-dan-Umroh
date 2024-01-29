<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Symfony\Component\HttpFoundation\Request;
use Illuminate\Support\Facades\Auth;


class BeritaViews extends Model
{
    protected $table = 'berita_views';
    protected $fillable = ['id_post','titleslug', 'url', 'session_id', 'ip', 'agent' ];

}
