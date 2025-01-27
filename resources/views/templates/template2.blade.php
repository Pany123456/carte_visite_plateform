<head>
    <!-- Importer Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Importer Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <!-- Importer Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
</head>

<style>
    body {
        margin: 0;
        font-family: Arial, sans-serif;
        display: flex;
        justify-content: center;
        align-items: center;
        background-color: #f8f9fa;
        height: 100vh;
    }


    .business-card {
        width: 400px;
        border-radius: 20px;
        overflow: hidden;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
        background-color: #fff;
        text-align: center;
        font-size: 16px;
        position: relative;


    }

    .business-card {
    --primary-color: #000000;
    --secondary-color: #ffffff;
    --text-color: #000000;

    background-color: var(--secondary-color);
    border: 2px solid var(--primary-color);
}

    /* Assurez-vous que tous les éléments de texte utilisent la variable --text-color */
    .business-card .details h2, .business-card .details p {
    color: var(--text-color);
    }

    /* Et pour les liens sociaux, si nécessaire */
    .business-card .social-links a {
    color: var(--text-color);
    }

    .header {
        background-size: cover;
        background-position: center;
        height: 200px;
    }

    .profile {
        position: absolute;
        top: 45%;
        left: 50%;
        transform: translate(-50%, -50%);
        width: 180px;
        height: 180px;
        background-color: #fff;
        border-radius: 50%;
        display: flex;
        justify-content: center;
        align-items: center;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
    }

    .profile img {
        width: 170px;
        height: 170px;
        border-radius: 50%;
        object-fit: cover;
    }

    .details {
        margin-top: 70px;
        padding: 15px;
    }

    .details h2 {
        margin: 10px 0 5px;
        font-size: 20px;
        color: #333;
    }

    .details p {
        margin: 0;
        color: #555;
    }

    .contact {
        display: flex;
        justify-content: space-around;
        margin: 15px 0;
    }

    .contact a {
        display: flex;
        flex-direction: column;
        align-items: center;
        text-decoration: none;
        color: #00070e;
    }

    .contact a i {
        font-size: 24px;
        margin-bottom: 5px;
    }

    .social-links {
        padding: 15px;
        display: flex;
        justify-content: center;
        gap: 10px;
    }

    .social-links a {
        color: #555;
        font-size: 18px;
        text-decoration: none;
        transition: color 0.3s;
    }

    .social-links a:hover {
        color: #007bff;
    }

    .footer {
        padding: 10px 15px;
        border-top: 1px solid #eee;
        font-size: 14px;
        color: #777;
    }

    .footer a {
        color: #00070f;
        text-decoration: none;
    }
</style>

<!-- Template de prévisualisation -->
<div class="business-card">
    <!-- Image de fond -->
<div id="background-image"
style="
    background-image: url('{{ isset($businessCard->photo_url) ? asset('storage/' . $businessCard->photo_url) : '' }}');
    height: 44vh;
    width:50%
    background-size: 20%; /* Diminue la taille de l'image */
    background-position: center; /* Centre l'image */
    background-repeat: no-repeat; /* Ne répète pas l'image */
    background-attachment: fixed; /* Rendre l'image de fond fixe */"
data-preview="background-image">
</div>


    <!-- Élément pour la prévisualisation des couleurs -->
    <div id="color-preview" style="width: 20px; height: 20px; display: none;" data-preview="colors"></div>

    <!-- Image de profil -->
    <div class="profile" style="margin-top: -10px;">
        <img id="profile-image"
             src="{{ isset($businessCard->photo_url) ? asset('storage/' . $businessCard->photo_url) : '' }}"
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
        <a href="{{ $businessCard->facebook_link ?? '#' }}" aria-label="Facebook" data-preview="facebook-link">
            <i class="bi bi-facebook secondary"></i>
        </a>
        <a href="{{ $businessCard->instagram_link ?? '#' }}" aria-label="Instagram" data-preview="instagram-link">
            <i class="bi bi-instagram secondary"></i>
        </a>
        <a href="{{ $businessCard->twitter_link ?? '#' }}" aria-label="Twitter" data-preview="twitter-link">
            <i class="bi bi-twitter secondary"></i>
        </a>
        <a href="{{ $businessCard->tiktok_link ?? '#' }}" aria-label="TikTok" data-preview="tiktok-link">
            <i class="bi bi-tiktok secondary"></i>
        </a>
        <a href="{{ $businessCard->linkedin_link ?? '#' }}" aria-label="LinkedIn" data-preview="linkedin-link">
            <i class="bi bi-linkedin secondary"></i>
        </a>
    </div>

    <!-- Pied de page -->
    <div class="footer">
        <span class="text" data-preview="full_name">@ {{ $businessCard->full_name ?? 'Nom utilisateur' }}</span>
        <a href="{{ $businessCard->website ?? '#' }}" aria-label="Site web">
            <span class="text" data-preview="website">{{ $businessCard->website ?? 'Site web' }}</span>
        </a>
    </div>
</div>

<!-- Définition des variables de couleur -->



<script src="path/to/your/script.js" defer></script>
