<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class Stagiaire extends Authenticatable
{
    use HasApiTokens,HasFactory, Notifiable;
    protected $guard = 'stagiaire';
    protected $fillable=[
        'stage_id',
        'nom',
        'email',
        'email_verified_at',
        'password',
        'date_naissance',
        'archive',
        'acces',
        'adresse',
        'telephone',
        'avatar',
        'cv_fichier',
    ];
    protected $hidden = [
        'password', 'remember_token',
    ];
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function employes(){
        $this->belongsTo(Stage::class);
    }
    public function attestations(){
        $this->hasMany(Attestation::class);
    }
    public function AauthAcessToken(){
        return $this->hasMany(OauthAccessToken::class);
    }
}
