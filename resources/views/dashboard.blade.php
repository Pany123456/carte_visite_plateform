@extends('layouts.app')

@section('title', 'Dashboard')

@section('sidebar')
<div class="card shadow">
    <div class="card-header bg-primary text-white">
        <h5>Liste des utilisateurs</h5>
    </div>
    <ul class="list-group list-group-flush">
        @foreach ($users as $user)
            <li class="list-group-item d-flex justify-content-between align-items-center">
                {{ $user->name }}
                <a href="#" class="btn btn-sm btn-outline-secondary">Voir</a>
            </li>
        @endforeach
    </ul>
</div>
@endsection

@section('content')
<div class="card shadow">
    <div class="card-header bg-success text-white">
        <h5>Bienvenue sur le Dashboard</h5>
    </div>
    <div class="card-body">
        <p>Ceci est votre tableau de bord. Ajoutez ici des graphiques, des statistiques, ou tout autre contenu pertinent.</p>
    </div>
</div>
@endsection
