<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Poste extends Model
{
    use HasFactory;
    protected $fillable=[
        'employe_id',
        'date_debut',
        'date_fin',
        'poste',
        'salaire',
        'type_contrat',
    ];
    public function employes(){
        $this->belongsTo(Employe::class);
    }
}
