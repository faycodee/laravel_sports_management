<?php

namespace App\Http\Controllers;

use App\Models\Equipe;
use App\Models\Classement;
use Illuminate\Http\Request;

class StatistiqueController extends Controller
{
    public function index()
    {
        $equipes = Equipe::with('classement')->get();
        return view('statistiques.index', compact('equipes'));
    }
}