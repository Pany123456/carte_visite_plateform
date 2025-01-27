<?php

namespace App\Http\Controllers;

use App\Models\Template;
use App\Models\User;
use App\Models\BusinessCard;
use Illuminate\Http\Request;

class BusinessCardController extends Controller
{

      // Formulaire pour créer une nouvelle carte
      public function create()
      {
          $templates = Template::all();
          $clients = User::all(); // Récupérer tous les utilisateurs
          return view('business_cards.create', compact('templates', 'clients'));
      }

    // Sauvegarder une nouvelle carte
    public function store(Request $request)
{
    // Validation initiale pour vérifier le type de formulaire
    $request->validate([
        'form_type' => 'required|in:entreprise,particulier',
    ]);

    $data = [];

    if ($request->form_type === 'entreprise') {
        // Validation des données pour les entreprises
        $data = $request->validate([
            'company_name' => 'required|string|max:255',
            'job_title' => 'nullable|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|array',
            'phone.*' => 'required|string|max:20',
            'address' => 'nullable|string|max:255',
            'website' => 'nullable|url',
            'social_links' => 'nullable|array',
            'social_links.*' => 'nullable|url',
            'logo' => 'nullable|image|max:2048',
            'qr_code_url' => 'nullable|string',
            'photo_url' => 'nullable|image|max:2048',
            'description' => 'nullable|string',
            'whatsapp_number' => 'nullable|string|max:20',
            'company_size' => 'nullable|string|max:255',
            'registration_number' => 'nullable|string|max:255',
            'industry' => 'nullable|string|max:255',
            'tax_id' => 'nullable|string|max:255',
            'contact_person' => 'nullable|string|max:255',
            'position_contact_person' => 'nullable|string|max:255',
            'additional_services' => 'nullable|array',
        ]);

        // Sérialisation des champs JSON
        $data['phone'] = json_encode($data['phone']);
        $data['social_links'] = json_encode($data['social_links'] ?? []);
        $data['additional_services'] = json_encode($data['additional_services'] ?? []);
    } elseif ($request->form_type === 'particulier') {
        // Validation des données pour les particuliers
        $data = $request->validate([
            'full_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'biography' => 'nullable|string|max:1000',
            'social_links' => 'nullable|array',
            'social_links.*' => 'nullable|url',
            'logo' => 'nullable|image|max:2048',
            'qr_code_url' => 'nullable|string',
            'photo_url' => 'nullable|image|max:2048',
            'description' => 'nullable|string',
            'whatsapp_number' => 'nullable|string|max:20',
            'personal_message' => 'nullable|string|max:1000',
            'date_of_birth' => 'nullable|date',
            'gender' => 'nullable|string|in:male,female,other',
        ]);

        // Sérialisation des champs JSON
        $data['social_links'] = json_encode($data['social_links'] ?? []);
    } else {
        abort(400, 'Type de formulaire invalide.');
    }

    // Gestion des fichiers (logos et photos)
    if ($request->hasFile('logo')) {
        $data['logo'] = $request->file('logo')->store('logos', 'public');
    }

    if ($request->hasFile('photo_url')) {
        $data['photo_url'] = $request->file('photo_url')->store('photos', 'public');
    }

    // Création de la carte de visite
    try {
        $businessCard = BusinessCard::create($data);
    } catch (\Exception $e) {
        return redirect()->back()->withErrors(['error' => 'Une erreur est survenue lors de la création de la carte.']);
    }

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

        // Ajout des couleurs par défaut si elles n'existent pas
        $defaultColors = [
            'primary' => '#000000',
            'secondary' => '#ffffff',
            'text' => '#000000',
        ];

        // Vérifiez si $businessCard->colors est un tableau ou une chaîne JSON
        $colors = is_array($businessCard->colors)
            ? $businessCard->colors
            : json_decode($businessCard->colors, true);

        $colors = array_merge($defaultColors, $colors ?? []);

        return view('business_cards.show', [
            'businessCard' => $businessCard,
            'templateName' => $templateName,
            'colors' => $colors,
            'phone' => json_decode($businessCard->phone, true),
            'socialLinks' => json_decode($businessCard->social_links, true),
        ]);
    }
}
