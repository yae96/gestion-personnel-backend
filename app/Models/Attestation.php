<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attestation extends Model
{
    use HasFactory;
    protected $fillable=[
        'employe_id',
        'stagiaire_id',
        'type_attestation',
        'description',
        'date',
        'fichier'
    ];
    public function employes(){
        $this->belongsTo(Employe::class);
    }
    public function stagiaires(){
        $this->belongsTo(Stagiaire::class);
    }
}
