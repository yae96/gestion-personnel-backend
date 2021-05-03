<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Systeme extends Model
{
    use HasFactory;
    protected $fillable=[
        'logo',
        'adresse',
        'telephone',
        'annee',
    ];
}
