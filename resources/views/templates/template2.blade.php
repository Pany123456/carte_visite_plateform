<head>
    <!-- Importer Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Importer Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <!-- Importer Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link href="{{ asset('templates/css/template2.css') }}" rel="stylesheet">
</head>



<!-- Template de prévisualisation -->
<div class="business-card" style="
    --primary-color: {{ $colors['primary'] ?? '#000000' }};
    --secondary-color: {{ $colors['secondary'] ?? '#ffffff' }};
    --text-color: {{ $colors['text'] ?? '#000000' }};">
 <!-- Image de fond -->
 <div id="background-image"
 style="
     background-image: url('{{ isset($businessCard->background_image) ? asset($businessCard->background_image) : asset('images/default-bg.jpg') }}');
     height: 44vh;
     background-size: cover; /* Ajuste automatiquement l'image */
     background-position: center;
     background-repeat: no-repeat;
     background-attachment: fixed;
     position: relative;
     z-index: 1;
 "
 data-preview="background-image">
 </div>

 <!-- Élément pour la prévisualisation des couleurs -->
 <div id="color-preview" style="width: 20px; height: 20px; display: none;" data-preview="colors"></div>

 <!-- Image de profil -->
 <div class="profile" style="margin-top: -10px;">
     <img id="profile-image"
         src="{{ isset($businessCard->photo_url) ? asset($businessCard->photo_url) : asset('images/default-profile.jpg') }}"
         alt="Photo de {{ $businessCard->full_name ?? 'utilisateur' }}"
         data-preview="profile-image">
 </div>

    <!-- Informations personnelles -->
    <div class="details" style="margin-top: 80px;">
        <h2 class="primary" data-preview="full_name">{{ $businessCard->full_name ?? 'Nom utilisateur' }}</h2>
        <p class="text" data-preview="job_title">{{ $businessCard->job_title ?? 'Titre professionnel' }}</p>
    </div>

    <!-- Coordonnées -->
    <div class="contact">
        <a href="tel:{{ $businessCard->phone ?? '' }}" aria-label="Téléphone">
            <i class="bi bi-telephone secondary"></i> <span class="text" data-preview="phone">{{ $businessCard->phone ?? 'Téléphone' }}</span>
        </a>
        <a href="https://wa.me/{{ $businessCard->whatsapp_number ?? '' }}" aria-label="WhatsApp">
            <i class="bi bi-whatsapp secondary"></i> <span class="text" data-preview="whatsapp_number">{{ $businessCard->whatsapp_number ?? 'WhatsApp' }}</span>
        </a>
    </div>

   <!-- Liens sociaux -->
<div class="social-links">
    <a href="https://www.facebook.com/{{ $businessCard->facebook_link ?? '' }}" aria-label="Facebook" target="_blank" rel="noopener noreferrer">
        <i class="bi bi-facebook secondary"></i>
    </a>

    <a href="https://www.instagram.com/{{ $businessCard->instagram_link ?? '' }}" aria-label="Instagram" target="_blank" rel="noopener noreferrer">
        <i class="bi bi-instagram secondary"></i>
    </a>

    <a href="https://twitter.com/{{ $businessCard->twitter_link ?? '' }}" aria-label="Twitter" target="_blank" rel="noopener noreferrer">
        <i class="bi bi-twitter secondary"></i>
    </a>

    <a href="https://www.tiktok.com/@{{ $businessCard->tiktok_link ?? '' }}" aria-label="TikTok" target="_blank" rel="noopener noreferrer">
        <i class="bi bi-tiktok secondary"></i>
    </a>

    <a href="https://www.linkedin.com/in/{{ $businessCard->linkedin_link ?? '' }}" aria-label="LinkedIn" target="_blank" rel="noopener noreferrer">
        <i class="bi bi-linkedin secondary"></i>
    </a>
</div>


    <!-- Pied de page -->
    <div class="footer">
        <span class="text" data-preview="full_name">@ {{ $businessCard->full_name ?? 'Nom utilisateur' }}</span>
        <a href="{{ $businessCard->website ?? '#' }}" >
            <span class="text" data-preview="website">{{ $businessCard->website ?? 'Site web' }}</span>
        </a>
    </div>
</div>

<!-- Définition des variables de couleur -->
