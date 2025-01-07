@extends('layouts.app')

@section('title', 'Se connecter')

@section('content')
<div class="d-flex align-items-center justify-content-center" style="min-height: 100vh;">
    <div class="col-md-6">
        <div class="card shadow">
            <div class="card-header bg-success text-white text-center">
                <h4>Se connecter</h4>
            </div>
            <div class="card-body">
                <!-- Afficher les messages d'erreur -->
                @if(session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif
                <form action="{{ route('login') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="email" class="form-label">Adresse email</label>
                        <input type="email" id="email" name="email" class="form-control" placeholder="Votre email" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Mot de passe</label>
                        <input type="password" id="password" name="password" class="form-control" placeholder="Votre mot de passe" required>
                    </div>
                    <button type="submit" class="btn btn-success w-100">Se connecter</button>
                </form>
            </div>
            <div class="card-footer text-center">
                <p>Pas encore de compte ? <a href="{{ route('register') }}">Inscrivez-vous</a></p>
            </div>
        </div>
    </div>
</div>
@endsection
