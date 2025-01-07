<div class="card" style="
    background-color: var(--primary-color) !important;
    color: var(--text-color) !important;
    --primary-color: {{ $colors['primary'] ?? '#000000' }};
    --secondary-color: {{ $colors['secondary'] ?? '#ffffff' }};
    --text-color: {{ $colors['text'] ?? '#000000' }};
">
    <div class="company_name" style="font-size: 24px; font-weight: bold;">{{ $businessCard->company_name ?? 'Nom de l\'entreprise non défini' }}</div>
    <div class="job_title" style="font-size: 18px; font-style: italic;">{{ $businessCard->job_title ?? 'Poste non défini' }}</div>
    <div class="full_name" style="font-size: 24px; font-weight: bold;">{{ $businessCard->full_name ?? 'Nom complet non défini' }}</div>
    <div class="biography" style="font-size: 16px; font-style: italic;">{{ $businessCard->biography ?? 'Biographie non définie' }}</div>
    <div class="email">Email : {{ $businessCard->email ?? 'Email non défini' }}</div>
    <div class="phone">Téléphone : {{ $businessCard->phone ?? 'Téléphone non défini' }}</div>
    <div class="website">Site Web : {{ $businessCard->website ?? 'Site Web non défini' }}</div>
    <div class="address">Adresse : {{ $businessCard->address ?? 'Adresse non définie' }}</div>
    <div class="social_links">Réseaux Sociaux : {{ $businessCard->social_links ?? 'Réseaux sociaux non définis' }}</div>
</div>
