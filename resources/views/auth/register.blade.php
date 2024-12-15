@extends('layouts.app')

@section('title', 'Créer un compte')

@section('content')
<div class="d-flex align-items-center justify-content-center" style="min-height: 100vh;">
    <div class="col-md-6">
        <div class="card shadow">
            <div class="card-header bg-primary text-white text-center">
                <h4>Créer un compte</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('register') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Nom complet</label>
                        <input type="text" id="name" name="name" class="form-control" placeholder="Votre nom" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Adresse email</label>
                        <input type="email" id="email" name="email" class="form-control" placeholder="Votre email" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Mot de passe</label>
                        <input type="password" id="password" name="password" class="form-control" placeholder="Votre mot de passe" required>
                    </div>
                    <div class="mb-3">
                        <label for="password_confirmation" class="form-label">Confirmez le mot de passe</label>
                        <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" placeholder="Confirmez le mot de passe" required>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">S'inscrire</button>
                </form>
            </div>
            <div class="card-footer text-center">
                <p>Vous avez déjà un compte ? <a href="{{ route('login') }}">Connectez-vous</a></p>
            </div>
        </div>
    </div>
</div>
@endsection
