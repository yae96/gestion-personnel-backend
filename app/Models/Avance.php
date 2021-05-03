<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Avance extends Model
{
    use HasFactory;
    protected $fillable=[
        'employe_id',
        'montant',
        'date',
        'description',
        'etat',
    ];
    public function employes(){
        $this->belongsTo(Employe::class);
    }
}
