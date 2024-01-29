<?php
  
namespace App\Models;
  
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\SoftDeletes;

  
class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;
  
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'type',
        'unit_id'
    ];

    protected $dates = ['deleted_at'];
  
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];
  
    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
 
    /**
     * Interact with the user's first name.
     *
     * @param  string  $value
     * @return \Illuminate\Database\Eloquent\Casts\Attribute
     */
    protected function type(): Attribute
    {
        return new Attribute(
            get: fn ($value) =>  ["user", "admin", "manager"][$value],
        );
    }

    public function units(){
    	return $this->belongsTo(Unit::class, 'unit_id', 'id');
    }

    public function berita(){
    	return $this->belongsTo(Berita::class, 'id', 'created_by');
    }

    public function pengumuman(){
    	return $this->belongsTo(Pengumuman::class, 'id', 'created_by');
    }

    public function gallery(){
    	return $this->belongsTo(Gallery::class, 'id', 'created_by');
    }

    public function info(){
    	return $this->belongsTo(InfoGrafis::class, 'id', 'created_by');
    }



}