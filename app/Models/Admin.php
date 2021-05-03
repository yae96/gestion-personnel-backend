<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class Admin extends Authenticatable
{
    use HasApiTokens,HasFactory, Notifiable;
    protected $guard = 'admin';
    protected $fillable=[
        'nom',
        'email',
        'email_verified_at',
        'password',
        'date_naissance',
        'adresse',
        'telephone',
        'avatar'
    ];
    protected $hidden = [
        'password', 'remember_token',
    ];
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function gestions(){
        return $this->belongsToMany(Gestion::class,'autorisation');
    }
    public function AauthAcessToken(){
        return $this->hasMany(OauthAccessToken::class);
    }
}
