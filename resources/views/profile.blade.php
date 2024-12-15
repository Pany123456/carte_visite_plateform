@extends('layouts.app')

@section('content')
<div class="container">
    <h2>User Profile</h2>
    <p><strong>Name:</strong> {{ $user->name }}</p>
    <p><strong>Email:</strong> {{ $user->email }}</p>
    <!-- Ajoutez d'autres informations sur l'utilisateur ici -->
</div>
@endsection
