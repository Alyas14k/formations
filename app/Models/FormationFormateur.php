<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Formation;
use App\Models\Formateur;

class FormationFormateur extends Model
{
    use HasFactory;
    protected $guarded=[];
    protected $table = 'formation_formateurs';

    public function formation()
    {
        return $this->belongsTo(Formation::class, 'formation_id');
    }

    public function formateur()
    {
        return $this->belongsTo(Formateur::class, 'formateur_id');
    }
}
