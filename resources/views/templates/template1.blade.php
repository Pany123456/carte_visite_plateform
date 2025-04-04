<head>
    <!-- Importer Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Importer Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <!-- Importer Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link href="{{ asset('templates/css/template1.css') }}" rel="stylesheet">
</head>

<body>
    <!-- Template de prévisualisation -->

    <div class="business-card" style="
    --primary-color: {{ $colors['primary'] ?? '#000000' }};
    --secondary-color: {{ $colors['secondary'] ?? '#ffffff' }};
    --text-color: {{ $colors['text'] ?? '#000000' }};">
        <!-- Élément pour la prévisualisation des couleurs -->
 <div id="color-preview" style="width: 20px; height: 20px; display: none;" data-preview="colors"></div>

      <!-- En-tête avec logo et image de fond -->
<div class="header"
style="background: url('{{ isset($businessCard->background_image) ? asset($businessCard->background_image) : asset("images/default-bg.jpg") }}') no-repeat center/cover; height: 200px;"
data-preview="background-image">

<!-- Logo Dynamique -->
<div class="logo">
   <img src="{{ isset($businessCard->logo) ? asset($businessCard->logo) : asset('images/default-logo.png') }}"
        alt="Logo"
        data-preview="logo">
</div>

<!-- Bouton Ajouter un Contact -->
<div class="add-contact">
   <div class="save-contact">
       <a href="data:text/vcard;charset=utf-8,BEGIN:VCARD
VERSION:3.0
FN:{{ $businessCard->full_name ?? 'Nom utilisateur' }}
TITLE:{{ $businessCard->job_title ?? 'Titre professionnel' }}
TEL:{{ $businessCard->phone ?? '' }}
URL:{{ $businessCard->website ?? '#' }}
END:VCARD" download="{{ $businessCard->full_name ?? 'contact' }}.vcf">
           <i class="fas fa-user-plus"></i>
       </a>
   </div>
</div>

<!-- Photo de Profil Dynamique -->
<div class="profile-pic">
   <img src="{{ isset($businessCard->photo_url) ? asset($businessCard->photo_url) : asset('images/default-profile.jpg') }}"
        alt="{{ $businessCard->full_name ?? 'Utilisateur' }}"
        data-preview="profile-image">
</div>
</div>


            <!-- Détails personnels -->
            <div class="details">
                <h2 data-preview="full_name">{{ $businessCard->full_name ?? 'Nom utilisateur' }}</h2>
                <p data-preview="job_title">{{ $businessCard->job_title ?? 'Titre professionnel' }}</p>
            </div>

           <!-- Boutons de contact -->
<div class="contact">
    <a href="https://wa.me/{{ $businessCard->whatsapp_number ?? '' }}" aria-label="WhatsApp" >
        <i class="fab fa-whatsapp"></i>
    </a>
    <a href="tel:{{ $businessCard->phone ?? '' }}" aria-label="Téléphone" >
        <i class="bi bi-telephone"></i>
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

    <a href="https://www.snapchat.com/add/{{ $businessCard->snapchat_link ?? '' }}" aria-label="Snapchat" target="_blank" rel="noopener noreferrer">
        <i class="bi bi-snapchat secondary"></i>
    </a>
</div>


            <!-- Pied de page -->
            <div class="footer">
                <a href="#" data-preview="full_name">{{ '@' . ($businessCard->full_name ?? 'Nom utilisateur') }}</a>
                <a href="{{ $businessCard->website ?? '#' }}" data-preview="website">
                    {{ $businessCard->website ?? 'Aucun site web' }}
                </a>
            </div>
        </div>
    </body>


