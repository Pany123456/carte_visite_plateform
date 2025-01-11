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
    <div id="background-image" 
         style="background-image: url('{{ isset($businessCard->photo_url) ? asset('storage/' . $businessCard->photo_url) : '' }}'); 
                background-size: cover; 
                background-position: center; 
                height: 44vh; 
                position: relative; 
                color: white;"
         data-preview="background-image">
    </div>

    <!-- Image de profil centrée -->
    <div class="profile">
        <img id="profile-image" 
             src="{{ isset($businessCard->photo_url) ? asset('storage/' . $businessCard->photo_url) : '' }}" 
             alt="Photo de {{ $businessCard->name ?? 'utilisateur' }}"
             data-preview="profile-image">
    </div>

    <!-- Informations personnelles -->
    <div class="details">
        <h2 data-preview="name">{{ $businessCard->full_name ?? 'Nom utilisateur' }}</h2>
        <p data-preview="job-title">{{ $businessCard->job_title ?? 'Titre professionnel' }}</p>
    </div>

    <!-- Coordonnées -->
    <div class="contact">
        <a href="#" aria-label="Téléphone" data-preview="phone">
            <i class="fas fa-phone-alt"></i> {{ $businessCard->phone ?? 'Téléphone' }}
        </a>
        <a href="#" aria-label="WhatsApp" data-preview="whatsapp">
            <i class="fab fa-whatsapp"></i> {{ $businessCard->whatsapp_number ?? 'WhatsApp' }}
        </a>
    </div>

    <!-- Liens sociaux -->
    <div class="social-links">
        <a href="#" aria-label="Facebook" data-preview="facebook-link">
            <i class="fab fa-facebook"></i>
        </a>
        <a href="#" aria-label="Instagram" data-preview="instagram-link">
            <i class="fab fa-instagram"></i>
        </a>
        <a href="#" aria-label="Twitter" data-preview="twitter-link">
            <i class="fab fa-twitter"></i>
        </a>
        <a href="#" aria-label="TikTok" data-preview="tiktok-link">
            <i class="fab fa-tiktok"></i>
        </a>
        <a href="#" aria-label="LinkedIn" data-preview="linkedin-link">
            <i class="fab fa-linkedin"></i>
        </a>
    </div>

    <!-- Pied de page -->
    <div class="footer">
        <span data-preview="footer-name">@ {{ $businessCard->name ?? 'Nom utilisateur' }}</span>
        <a href="#" aria-label="Site web" data-preview="website">{{ $businessCard->website ?? 'Site web' }}</a>
    </div>
</div>

