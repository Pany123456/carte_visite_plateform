<div class="card" style="
    --primary-color: {{ $colors->primary }};
    --secondary-color: {{ $colors->secondary }};
    --text-color: {{ $colors->text }};
">
    <div class="name" style="font-size: 24px; font-weight: bold;">{{ $businessCard->name }}</div>
    <div class="job_title" style="font-size: 18px; font-style: italic;">{{ $businessCard->job_title }}</div>
    <div class="company" style="font-size: 16px; font-weight: bold;">{{ $businessCard->company }}</div>
    <div class="details">
        <p class="email">{{ $businessCard->email }}</p>
        <p class="phone">{{ $businessCard->phone }}</p>
        <p class="website">{{ $businessCard->website }}</p>
        <p class="address">{{ $businessCard->address }}</p>
    </div>
</div>
