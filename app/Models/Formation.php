<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Inscrits;
use App\Models\FormationFormateur;

class Formation extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function inscrits()
    {
        return $this->hasMany(Inscrits::class, 'formation_id');
    }
    
}
