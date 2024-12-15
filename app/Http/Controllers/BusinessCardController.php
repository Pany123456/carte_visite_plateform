<?php

namespace App\Http\Controllers;

use App\Models\Template;
use App\Models\BusinessCard;
use App\Models\User;
use Illuminate\Http\Request;

class BusinessCardController extends Controller
{
    // Formulaire pour créer une nouvelle carte
    public function create()
    {
        $templates = Template::all();
        return view('business_cards.create', compact('templates'));
    }

    // Sauvegarder une nouvelle carte
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'job_title' => 'nullable|string|max:255',
            'company' => 'nullable|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'website' => 'nullable|url',
            'address' => 'nullable|string|max:255',
            'template_id' => 'required|exists:templates,id', // Vérifie que le template existe
            'colors' => 'nullable|array',
            'user_id' => 'required|exists:users,id', // Vérifie que l'utilisateur existe
        ]);

        $data['colors'] = json_encode($data['colors']); // Encode les couleurs en JSON

        // Création de la carte de visite
        $businessCard = BusinessCard::create($data);
        

        // Redirige vers la page d'affichage de la carte
        return redirect()->route('business-cards.show', $businessCard->id)
            ->with('success', 'Carte de visite créée avec succès.');
    }



    // Afficher une carte spécifique
    public function show($id)
    {
       

        $businessCard = BusinessCard::findOrFail($id);

        $template = Template::findOrFail($businessCard->template_id);
        $templateName = strtolower(str_replace(' ', '', $template->name));

        if (!view()->exists('templates.' . $templateName)) {
            abort(404, 'Le template spécifié est introuvable.');
        }

        // Retourner la vue avec les données
        return view('business_cards.show', [
            'businessCard' => $businessCard,
            'templateName' => $templateName,
            'colors' => json_decode($businessCard->colors),
        ]);
    }


}
