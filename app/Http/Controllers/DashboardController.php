<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        // Récupérer tous les utilisateurs
        $users = User::all();  // Vous pouvez aussi filtrer ou paginer selon vos besoins

        // Passer la variable $users à la vue
        return view('dashboard', compact('users'));
    }


}
