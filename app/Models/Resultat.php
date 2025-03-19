<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resultat extends Model
{
    use HasFactory;

    protected $fillable = ['match_id', 'score_equipe1', 'score_equipe2'];

    public function match()
    {
        return $this->belongsTo(Matche::class);
    }
}
