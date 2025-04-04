<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="{{ asset('templates/css/template3.css') }}" rel="stylesheet">
    <title>Carte de visite</title>
</head>

<body>

    <!-- Template de prévisualisation -->

    <div class="business-card" style="
    --primary-color: {{ $colors['primary'] ?? '#000000' }};
    --secondary-color: {{ $colors['secondary'] ?? '#ffffff' }};
    --text-color: {{ $colors['text'] ?? '#000000' }};">


        <!-- Élément pour la prévisualisation des couleurs -->
 <div id="color-preview" style="width: 20px; height: 20px; display: none;" data-preview="colors"></div>


 <div class="v158_4"></div>
 <div class="v158_5"></div>
 <div class="v158_6"
     data-preview="background-image"
     style="background-image: url('{{ isset($businessCard->background_image) ? asset($businessCard->background_image) : asset('images/default-bg.jpg') }}');
            background-size: cover;
            background-position: center;">
</div>
        <span class="v158_24" data-preview="full_name">{{ $businessCard->full_name ?? 'Nom' }}</span>
        <span class="v158_26" data-preview="job_title">{{ $businessCard->job_title ?? 'Profession' }}</span>
        <div class="v158_9" >
            <h1>Biographie</h1>
            <p data-preview="description">{{ $businessCard->description ?? 'Aucune biographie disponible.' }}</p>
        </div>

        <div class="v158_13">
            <div class="v158_19">
                <a href="tel:{{ $businessCard->phone ?? '' }}">
                    <i class="fas fa-phone-alt"></i>
                    <span data-preview="phone">{{ $businessCard->phone ?? 'Non disponible' }}</span>
                </a>
            </div>
            <div class="v158_20">
                <a href="mailto:{{ $businessCard->email ?? '' }}">
                    <i class="fas fa-envelope"></i>
                    <span data-preview="email">{{ $businessCard->email ?? 'Non disponible' }}</span>
                </a>
            </div>
            <div class="v158_21">
                <a href="{{ $businessCard->website ?? '#' }}" target="_blank" rel="noopener noreferrer">
                    <i class="fas fa-globe"></i>
                    <span data-preview="website">{{ $businessCard->website ?? 'Non disponible' }}</span>
                </a>
            </div>
        </div>


        <div class="Contact">
            <div class="social-icons">
                <div class="icon-wrapper v158_11">
                    <a href="https://wa.me/{{ $businessCard->whatsapp_number ?? '' }}" aria-label="WhatsApp" target="_blank" rel="noopener noreferrer" >
                        <i class="fab fa-whatsapp"></i>
                    </a>
                </div>
                <div class="icon-wrapper v158_10">
                    <a href="tel:{{ $businessCard->phone ?? '' }}" aria-label="Téléphone" data-preview="phone">
                        <i class="fas fa-phone-alt"></i>
                    </a>
                </div>
                <div class="icon-wrapper v158_12">
                    <a href="https://facebook.com/{{ $businessCard->facebook_link ?? '' }}" aria-label="Facebook" target="_blank" rel="noopener noreferrer" data-preview="facebook_link">
                        <i class="fab fa-facebook"></i>
                    </a>
                </div>
            </div>

        </div>

        <div class="v158_23">
            <a href="data:text/vcard;charset=utf-8,BEGIN:VCARD
            VERSION:3.0
            FN:{{ $businessCard->full_name ?? 'Nom Prénom' }}
            TITLE:{{ $businessCard->job_title ?? 'Profession' }}
            TEL:{{ $businessCard->phone ?? '' }}
            EMAIL:{{ $businessCard->email ?? '' }}
            URL:{{ $businessCard->website ?? '' }}
            END:VCARD" download="{{ $businessCard->full_name ?? 'contact' }}.vcf" data-preview="vcard">
            Ajouter Contact
            </a>
        </div>
    </div>
</body>

