<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Joueur extends Model
{
    use HasFactory;

    protected $fillable = ['nom', 'prenom', 'date_naissance', 'equipe_id'];

    public function equipe()
    {
        return $this->belongsTo(Equipe::class);
    }
}
