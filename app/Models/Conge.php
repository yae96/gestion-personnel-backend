<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Conge extends Model
{
    use HasFactory;
    protected $fillable=[
        'employe_id',
        'type',
        'date_debut',
        'date_fin',
        'etat',
        'annee',
    ];
    public function employes(){
        $this->belongsTo(Employe::class);
    }
}
