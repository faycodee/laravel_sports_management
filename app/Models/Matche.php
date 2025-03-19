<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Matche extends Model
{
    use HasFactory;

    protected $fillable = ['equipe1_id', 'equipe2_id', 'date_match', 'lieu'];

    protected $table = 'matchs'; // Spécifiez le nom de la table

    public function equipe1()
    {
        return $this->belongsTo(Equipe::class, 'equipe1_id');
    }

    public function equipe2()
    {
        return $this->belongsTo(Equipe::class, 'equipe2_id');
    }
}