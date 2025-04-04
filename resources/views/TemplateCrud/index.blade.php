@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1 class="mb-4 text-center">📌 Liste des Templates</h1>

    <!-- Bouton d'ajout -->
    <div class="d-flex justify-content-end mb-3">
        <a href="{{ route('templateCrud.create') }}" class="btn btn-success">
            ➕ Ajouter un Template
        </a>
    </div>

    <!-- Liste des templates -->
    <div class="row">
        @foreach ($templates as $template)
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm p-3">
                    <label for="template-{{ $template->id }}" class="d-block text-center">
                        <p class="text-center fw-bold">{{ $template->name }}</p>
                    </label>

                    <div class="d-flex justify-content-between">
                        <!-- Modifier -->
                        <a href="{{ route('templateCrud.edit', $template) }}" class="btn btn-primary btn-sm">
                            ✏️ Modifier
                        </a>

                        <!-- Supprimer -->
                        <form action="{{ route('templateCrud.destroy', $template) }}" method="POST" onsubmit="return confirm('Voulez-vous vraiment supprimer ce template ?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">🗑️ Supprimer</button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <!-- Message si aucun template -->
    @if($templates->isEmpty())
        <div class="alert alert-warning text-center mt-4">
            Aucun template trouvé. Ajoutez-en un dès maintenant ! 🚀
        </div>
    @endif

    <form action="{{ route('dashboard') }}" method="get">
        <button type="submit" class="btn btn-secondary">⬅ Retour au Dashboard</button>
    </form>
</div>
@endsection
