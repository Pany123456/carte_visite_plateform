<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
     <!-- Importer Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link href="{{ asset('templates/css/template4.css') }}" rel="stylesheet">
</head>

<body>
    <!-- Template de prévisualisation -->
    <div class="business-card" style="
        --primary-color: {{ $colors['primary'] ?? '#000000' }};
        --secondary-color: {{ $colors['secondary'] ?? '#ffffff' }};
        --text-color: {{ $colors['text'] ?? '#000000' }};">


            <!-- Élément pour la prévisualisation des couleurs -->
     <div id="color-preview" style="width: 20px; height: 20px; display: none;" data-preview="colors"></div>

    >
        <!-- Add contact icon -->
        <div class="add-contact">
            <i class="fas fa-user-plus"></i>
        </div><br><br>

        <!-- Logo -->
        <div class="logo">
            <img src="{{ isset($businessCard->logo) ? asset($businessCard->logo) : asset('images/default-logo.png') }}"
                 alt="logo" data-preview="logo">
        </div>

        <!-- Profile picture -->
        <div class="profile-pic">
            <img src="{{ isset($businessCard->photo_url) ? asset($businessCard->photo_url) : asset('images/default-profile.png') }}"
                 alt="Photo de {{ $businessCard->full_name ?? 'Utilisateur' }}" data-preview="profile-image">
        </div>

        <!-- Name and details -->
        <div class="details">
            <h2 data-preview="full_name">{{ $businessCard->full_name ?? 'Nom' }}</h2>
            <p data-preview="job_title">{{ $businessCard->job_title ?? 'Profession' }}</p>
        </div>



        <!-- Contact information -->
        <div class="contact">
            <a href="https://wa.me/{{ $businessCard->whatsapp_number ?? '' }}" >
                <i class="fab fa-whatsapp" data-preview="whatsapp_number"></i> {{ $businessCard->whatsapp_number ?? '' }}
            </a>

            <a href="tel:{{ $businessCard->phone ?? '' }}" >
                <i class="fas fa-phone-alt" data-preview="phone"></i> {{ $businessCard->phone ?? '' }}
            </a>
        </div>



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

        <!-- Footer -->
        <div class="footer">
            <span>Nos produits et services</span>
            <button>Cliquez ici...</button>
        </div>
    </div>
</body>
