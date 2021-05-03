<?php

namespace App\Models;


use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class Employe extends Authenticatable
{
    use HasApiTokens,HasFactory, Notifiable;
    protected $guard = 'employe';
    protected $fillable=[
        'nom',
        'email',
        'password',
        'date_naissance',
        'email_verified_at',
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
    public function postes(){
        $this->hasMany(Poste::class);
    } 
    public function conges(){
        $this->hasMany(Conge::class);
    } 
        public function avances(){
        $this->hasMany(Avance::class);
    }
    public function paiements(){
        $this->hasMany(Paiement::class);
    }
    public function attestations(){
        $this->hasMany(Attestation::class);
    }
    public function AauthAcessToken(){
        return $this->hasMany(OauthAccessToken::class);
    }
}
