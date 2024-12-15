@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Carte de Visite</h1>

    <div class="template-container">
        @include('templates.' . $templateName, [
            'businessCard' => $businessCard,
            'colors' => $colors
        ])
    </div>
</div>
@endsection
