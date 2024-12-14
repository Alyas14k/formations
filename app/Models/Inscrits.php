<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inscrits extends Model
{
    use HasFactory;
    protected $guarded=[];
    // protected $fillable = [
    //     'nom', 'prenom', 'sexe', 'email', 'mobile_1', 'mobile_2',
    //     'formation_id', 'objectif', 'statut', 'type', 'user'
    // ];
}
