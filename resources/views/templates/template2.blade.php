<div class="card" style="
    display: flex;
    --primary-color: {{ $colors->primary }};
    --secondary-color: {{ $colors->secondary }};
    --text-color: {{ $colors->text }};
">
    <div class="sidebar" style="
        width: 100px;
        background-color: var(--primary-color);
        color: var(--text-color);
        text-align: center;
        padding: 20px;
        writing-mode: vertical-rl;
        font-size: 18px;
        font-weight: bold;
    ">
        {{ $businessCard->name }}
    </div>
    <div class="content" style="flex: 1; padding: 20px; color: var(--text-color);">
        <div class="name" style="font-size: 22px; font-weight: bold;">{{ $businessCard->name }}</div>
        <div class="job_title" style="font-size: 16px; font-style: italic;">{{ $businessCard->job_title }}</div>
        <div class="company" style="font-size: 16px; font-weight: bold;">{{ $businessCard->company }}</div>
        <div class="details">
            <p class="email">{{ $businessCard->email }}</p>
            <p class="phone">{{ $businessCard->phone }}</p>
            <p class="website">{{ $businessCard->website }}</p>
            <p class="address">{{ $businessCard->address }}</p>
        </div>
    </div>
</div>
