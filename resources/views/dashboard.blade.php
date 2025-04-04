@extends('layouts.app')

@section('title', 'Dashboard')

@section('sidebar')
<div class="card shadow mb-4">
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
<div class="container-fluid">
    <div class="row">
        <!-- Sidebar verticale avec les boutons de navigation vers les CRUDs -->
        <div class="col-md-3">
            <div class="card shadow">
                <div class="card-header bg-info text-dark">
                    <h5>Navigation</h5>
                </div>
                <div class="list-group list-group-flush">
                    <a href="{{ route('users.index') }}" class="list-group-item list-group-item-action btn-primary text-dark">
                        Gérer les Utilisateurs
                    </a>
                    <a href="{{ route('templateCrud.index') }}" class="list-group-item list-group-item-action btn-success text-dark">
                        Ajouter les templates
                    </a>
                    <a href="" class="list-group-item list-group-item-action btn-warning text-dark">
                        Gérer les Commandes
                    </a>
                </div>
            </div>
        </div>

        <!-- Contenu principal du Dashboard -->
        <div class="col-md-9">
            <div class="card shadow mb-4">
                <div class="card-header bg-success text-white">
                    <h5>Bienvenue sur le Dashboard</h5>
                </div>
                <div class="card-body">
                    <p> Vous pouvez debutez la personnalisation de vos templates </p>

                    <form action="{{ route('business-cards.create') }}" method="get">
                        <button type="submit" class="btn btn-primary">Créer une carte de visite</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
