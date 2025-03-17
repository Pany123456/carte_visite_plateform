@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1 class="text-center mb-4">➕ Ajouter un Template</h1>

    <div class="card shadow-lg p-4">
        <form action="{{ route('templateCrud.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <!-- Nom du template -->
            <div class="mb-3">
                <label for="name" class="form-label fw-bold">Nom du template :</label>
                <input
                    type="text"
                    name="name"
                    id="name"
                    class="form-control"
                    placeholder="Entrez le nom du template"
                    required
                >
            </div>

            <!-- Miniature du template -->
            <div class="mb-3">
                <label for="thumbnail" class="form-label fw-bold">Image miniature :</label>
                <input
                    type="file"
                    name="thumbnail"
                    id="thumbnail"
                    class="form-control"
                    accept="image/*"
                    required
                >
            </div>


            <!-- Bouton de soumission -->
            <div class="text-center">
                <button type="submit" class="btn btn-success">
                    ✅ Ajouter le Template
                </button>
            </div>
        </form>
    </div>
</div>
@endsection

