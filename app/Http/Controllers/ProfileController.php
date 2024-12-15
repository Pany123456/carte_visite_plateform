<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function show()
    {
        $user = Auth::user();  // Récupérer l'utilisateur authentifié
        return view('profile', compact('user'));  // Retourner la vue profile avec les données de l'utilisateur
    }
}
