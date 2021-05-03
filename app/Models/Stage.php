<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stage extends Model
{
    use HasFactory;
    protected $fillable=[
        'sujet',
        'date_debut',
        'date_fin',
        'description',
    ];
    public function employes(){
        $this->hasMany(Stagiaire::class);
    }
}
