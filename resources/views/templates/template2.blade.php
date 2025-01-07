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

.header {
    position: relative;
    background-image: url('images/v158_181.png');
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
<div class="business-card">
    <!-- Image de fond -->
    <div style="background-image: url('{{ asset('storage/' . $businessCard->background_image) }}'); background-size: cover; background-position: center; height: 44vh; position: relative; color: white;"></div>

    <!-- Image de profil centrée -->
    <div class="profile">
        <img src="{{ asset('storage/' . $businessCard->profile_image) }}" alt="Photo de {{ $businessCard->name }}">
    </div><br>

    <!-- Informations personnelles -->
    <div class="details">
        <h2>{{ $businessCard->name }}</h2>
        <p>{{ $businessCard->profession }}</p>
    </div>

    <!-- Coordonnées -->
    <div class="contact">
        <a href="tel:{{ $businessCard->phone }}" aria-label="Téléphoner à {{ $businessCard->name }}">
            <i class="fas fa-phone-alt"></i> {{ $businessCard->phone }}
        </a>
        <a href="https://wa.me/{{ $businessCard->whatsapp }}" aria-label="Contacter {{ $businessCard->name }} sur WhatsApp">
            <i class="fab fa-whatsapp"></i> {{ $businessCard->whatsapp }}
        </a>
    </div>

    <!-- Liens sociaux -->
    <div class="social-links">
        @if(isset($businessCard->social_links['facebook']))
            <a href="{{ $businessCard->social_links['facebook'] }}" aria-label="Facebook">
                <i class="fab fa-facebook"></i>
            </a>
        @endif

        @if(isset($businessCard->social_links['instagram']))
            <a href="{{ $businessCard->social_links['instagram'] }}" aria-label="Instagram">
                <i class="fab fa-instagram"></i>
            </a>
        @endif

        @if(isset($businessCard->social_links['twitter']))
            <a href="{{ $businessCard->social_links['twitter'] }}" aria-label="Twitter">
                <i class="fab fa-twitter"></i>
            </a>
        @endif

        @if(isset($businessCard->social_links['tiktok']))
            <a href="{{ $businessCard->social_links['tiktok'] }}" aria-label="TikTok">
                <i class="fab fa-tiktok"></i>
            </a>
        @endif

        @if(isset($businessCard->social_links['linkedin']))
            <a href="{{ $businessCard->social_links['linkedin'] }}" aria-label="LinkedIn">
                <i class="fab fa-linkedin"></i>
            </a>
        @endif
    </div>


    <!-- Pied de page -->
    <div class="footer">
        @ {{ $businessCard->name }} | <a href="{{ $businessCard->website }}" aria-label="Visiter le site web de {{ $businessCard->name }}">{{ $businessCard->website }}</a>
    </div>
</div>
