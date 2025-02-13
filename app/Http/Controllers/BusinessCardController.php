<?php

namespace App\Http\Controllers;

use App\Models\Template;
use App\Models\User;
use App\Models\BusinessCard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rule;

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
            'form_type' => ['required', Rule::in(['entreprise', 'particulier'])],
        ]);

        $data = [];

        // Validation et traitement selon le type de formulaire
        if ($request->form_type === 'entreprise') {
            $data = $request->validate([
                'company_name' => 'required|string|max:255',
                'job_title' => 'nullable|string|max:255',
                'email' => 'nullable|email|max:255',
                'phone' => 'required|array',
                'phone.*' => 'required|string|max:20',
                'address' => 'nullable|string|max:255',
                'website' => 'nullable|url',
                'social_links' => 'nullable|array',
                'social_links.*' => 'nullable|url',
                'logo' => 'nullable|image|max:2048',
                'qr_code_url' => 'nullable|string|max:255',
                'photo_url' => 'nullable|image|max:2048',
                'description' => 'nullable|string|max:1000',
                'whatsapp_number' => 'nullable|string|max:20',
                'company_size' => 'nullable|string|max:255',
                'registration_number' => 'nullable|string|max:255',
                'industry' => 'nullable|string|max:255',
                'tax_id' => 'nullable|string|max:255',
                'contact_person' => 'nullable|string|max:255',
                'position_contact_person' => 'nullable|string|max:255',
                'additional_services' => 'nullable|array',
                'colors' => 'nullable|array',
                
            ]);

            // Sérialisation des champs JSON
            $data['phone'] = json_encode($data['phone']);
            $data['social_links'] = json_encode($data['social_links'] ?? []);
            $data['additional_services'] = json_encode($data['additional_services'] ?? []);
            $data['colors'] = json_encode($data['colors'] ?? []);
        } elseif ($request->form_type === 'particulier') {
            $data = $request->validate([
                'full_name' => 'required|string|max:255',
                'email' => 'nullable|email|max:255',
                'phone' => 'required|string|max:20',
                'social_links' => 'nullable|array',
                'social_links.*' => 'nullable|url',
                'logo' => 'nullable|image|max:2048',
                'qr_code_url' => 'nullable|string|max:255',
                'photo_url' => 'nullable|string|max:255',
                'description' => 'nullable|string|max:1000',
                'whatsapp_number' => 'nullable|string|max:20',
                'personal_message' => 'nullable|string|max:1000',
                'date_of_birth' => 'nullable|date',
                'gender' => ['nullable', Rule::in(['male', 'female', 'other'])],
                'user_id' => 'required|exists:users,id',
                'template_id' => 'required|exists:templates,id',
                'colors' => 'nullable|array',
                
            ]);
            $data['colors'] = json_encode($data['colors'] ?? []);
            $data['name'] = $data['full_name'];

            // Sérialisation des champs JSON
            $data['social_links'] = json_encode($data['social_links'] ?? []);

            Log::info('Request Data', $request->all());
            Log::info('Data sent to db' , $data);
        } else {
            abort(400, "Type de formulaire invalide.");
        }

        // 📌 Gestion des fichiers (logo et photo)
        $data = $this->handleFileUpload($request, $data);

        // Création de la carte de visite
        try {
            $businessCard = BusinessCard::create($data);
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => "Une erreur est survenue lors de la création de la carte : " . $e->getMessage()]);
        }

        
        return redirect()->route('business-cards.show', $businessCard->id)
                         ->with('success', "Carte de visite créée avec succès.");
    }
/**
 * Gère l'upload des fichiers et met à jour le tableau de données.
 */
private function handleFileUpload(Request $request, array $data): array
{
    $files = ['logo' => 'logos', 'photo_url' => 'photos'];

    foreach ($files as $field => $directory) {
        if ($request->hasFile($field)) {
            $file = $request->file($field);

            // Génère un nom de fichier unique
            $filename = uniqid() . '_' . $file->getClientOriginalName();

            // Stocke le fichier sur le disque "public" dans le répertoire spécifié avec le nom de fichier unique
            $filePath = $file->storeAs($directory, $filename, 'public');

            // Supprime l'ancien fichier s'il existe
            if (!empty($data[$field])) {
                Storage::disk('public')->delete($data[$field]);
            }

            // Générer l'URL accessible du fichier
            $data[$field] = "storage/" . $filePath;

            // Vérification si le fichier est bien stocké
            if (Storage::disk('public')->exists($filePath)) {
                \Log::info("✅ Le fichier '$filePath' a été stocké avec succès.");
            } else {
                \Log::error("❌ Problème de stockage du fichier '$filePath'.");
            }
        }
    }

    

    return $data;
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

        // Vérifiez si $businessCard->colors est un tableau ou une chaîne JSON
        $colors = is_array($businessCard->colors)
            ? $businessCard->colors
            : json_decode($businessCard->colors, true);

       
        return view('business_cards.show', [
            'businessCard' => $businessCard,
            'templateName' => $templateName,
            'colors' => $colors
        ]);
    }
}
