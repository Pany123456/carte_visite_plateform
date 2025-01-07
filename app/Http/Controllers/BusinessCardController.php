<?php

namespace App\Http\Controllers;

use App\Models\Template;
use App\Models\BusinessCard;
use App\Models\User;
use Illuminate\Http\Request;

class BusinessCardController extends Controller
{

        public function index()
    {
        $templates = ['template1.html', 'template2.html','template3.html']; // Liste de templates disponibles
        return view('business_cards.index');
    }
    // Formulaire pour créer une nouvelle carte
    public function create()
    {
        $templates = Template::all();
        $users = User::all(); // Récupérer tous les utilisateurs
        return view('business_cards.create', compact('templates', 'users'));
    }

    // Sauvegarder une nouvelle carte
public function store(Request $request)
{
    if ($request->form_type === 'entreprise') {
        $data = $request->validate([
            'form_type' => 'required|in:entreprise,particulier',
            'company_name' => 'required|string|max:255',
            'job_title' => 'nullable|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|array',
            'phone.*' => 'required|string|max:20',
            'address' => 'nullable|string|max:255',
            'website' => 'nullable|url',
        ]);

        $data['phone'] = json_encode($data['phone']);
    } elseif ($request->form_type === 'particulier') {
        $data = $request->validate([
            'form_type' => 'required|in:entreprise,particulier',
            'full_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'biography' => 'nullable|string|max:1000',
            'social_links' => 'nullable|array',
            'social_links.*' => 'nullable|url',
        ]);

        $data['social_links'] = json_encode($data['social_links']);
    } else {
        abort(400, 'Type de formulaire invalide.');
    }

    $businessCard = BusinessCard::create($data);

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
