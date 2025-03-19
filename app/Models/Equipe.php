<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipe extends Model
{
    use HasFactory;

    protected $fillable = ['nom', 'sport_id'];

    public function sport()
    {
        return $this->belongsTo(Sport::class);
    }

    public function joueurs()
    {
        return $this->hasMany(Joueur::class);
    }
}
