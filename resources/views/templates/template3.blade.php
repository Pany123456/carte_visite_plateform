<div class="card" style="
    width: 400px;
    border-radius: 8px;
    overflow: hidden;
    --primary-color: {{ $colors->primary }};
    --secondary-color: {{ $colors->secondary }};
    --text-color: {{ $colors->text }};
">
    <div class="header" style="
        background-color: var(--primary-color);
        color: var(--secondary-color);
        text-align: center;
        padding: 15px;
    ">
        <h2 class="name" style="font-size: 24px; font-weight: bold;">{{ $businessCard->name }}</h2>
        <p class="job_title" style="font-size: 16px; font-style: italic;">{{ $businessCard->job_title }}</p>
    </div>
    <div class="content" style="padding: 20px; color: var(--text-color);">
        <div class="details">
            <p class="company">{{ $businessCard->company }}</p>
            <p class="email">{{ $businessCard->email }}</p>
            <p class="phone">{{ $businessCard->phone }}</p>
            <p class="website">{{ $businessCard->website }}</p>
            <p class="address">{{ $businessCard->address }}</p>
        </div>
    </div>
    <div class="footer" style="
        background-color: var(--secondary-color);
        text-align: center;
        padding: 10px;
        font-size: 12px;
        color: #000;
    ">
        Contactez-moi pour plus d'informations.
    </div>
</div>
