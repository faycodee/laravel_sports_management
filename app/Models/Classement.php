<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classement extends Model
{
    use HasFactory;

    protected $fillable = ['equipe_id', 'points', 'victoires', 'defaites', 'nuls'];

    public function equipe()
    {
        return $this->belongsTo(Equipe::class);
    }
}
