@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Créer une Carte de Visite</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form id="business-card-form" method="POST" action="{{ route('business-cards.store') }}">
        @csrf
        <div class="row">
            <!-- Colonne pour le choix des templates -->
            <div class="col-md-4" style="max-height: 90vh; overflow-y: auto;">
                <h3>Choisir un Template</h3>
                <div class="template-selector d-flex flex-wrap">
                    @foreach($templates as $template)
                        <div class="template-option m-2" style="width: 100px; text-align: center;">
                            <input type="radio" name="template_id" value="{{ $template->id }}" id="template-{{ $template->id }}" onchange="loadTemplate('{{ $template->file_path }}')" required>
                            <label for="template-{{ $template->id }}" class="d-block">
                                <img src="{{ $template->thumbnail }}" alt="{{ $template->name }}" class="img-thumbnail mb-1" style="width: 100px; height: 100px; object-fit: cover;">
                                <p class="text-center small">{{ $template->name }}</p>
                            </label>
                        </div>
                    @endforeach
                </div>

                <!-- Section des couleurs -->
                <h3 class="mt-4">Couleurs</h3>
                <div class="mb-3">
                    <label for="primary_color" class="form-label">Couleur Principale</label>
                    <input type="color" class="form-control form-control-color" id="primary_color" name="colors[primary]" onchange="updateColor('primary', this.value)" value="#007bff">
                </div>
                <div class="mb-3">
                    <label for="secondary_color" class="form-label">Couleur Secondaire</label>
                    <input type="color" class="form-control form-control-color" id="secondary_color" name="colors[secondary]" onchange="updateColor('secondary', this.value)" value="#ffffff">
                </div>
                <div class="mb-3">
                    <label for="text_color" class="form-label">Couleur du Texte</label>
                    <input type="color" class="form-control form-control-color" id="text_color" name="colors[text]" onchange="updateColor('text', this.value)" value="#000000">
                </div>
            </div>

            <!-- Colonne pour le formulaire de personnalisation -->
            <div class="col-md-4">
                <h3>Informations</h3>
                <div class="sticky-top" style="top: 20px;">
                    <div class="mb-3">
                        <label for="name" class="form-label">Nom</label>
                        <input type="text" class="form-control" id="name" name="name" oninput="updatePreview('name', this.value)" required>
                    </div>
                    <div class="mb-3">
                        <label for="job_title" class="form-label">Poste</label>
                        <input type="text" class="form-control" id="job_title" name="job_title" oninput="updatePreview('job_title', this.value)">
                    </div>
                    <div class="mb-3">
                        <label for="company" class="form-label">Entreprise</label>
                        <input type="text" class="form-control" id="company" name="company" oninput="updatePreview('company', this.value)">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" oninput="updatePreview('email', this.value)" required>
                    </div>
                    <div class="mb-3">
                        <label for="phone" class="form-label">Téléphone</label>
                        <input type="text" class="form-control" id="phone" name="phone" oninput="updatePreview('phone', this.value)" required>
                    </div>
                    <div class="mb-3">
                        <label for="website" class="form-label">Site Web</label>
                        <input type="text" class="form-control" id="website" name="website" oninput="updatePreview('website', this.value)">
                    </div>
                    <div class="mb-3">
                        <label for="address" class="form-label">Adresse</label>
                        <input type="text" class="form-control" id="address" name="address" oninput="updatePreview('address', this.value)">
                    </div>
                    <div class="mb-3">
                        <label for="user_id" class="form-label">ID du Client</label>
                        <input type="number" class="form-control" id="user_id" name="user_id" required>
                    </div>
                </div>
            </div>

            <!-- Colonne pour l'aperçu -->
            <div class="col-md-4">
                <h3>Aperçu</h3>
                <div id="template-preview" class="template-preview border p-3" style="min-height: 400px; height: 100%; overflow-y: auto;">
                    <p class="text-center text-muted">Sélectionnez un template pour commencer.</p>
                </div>
            </div>
        </div>

        <button type="submit" class="btn btn-primary mt-4">Créer la Carte</button>
    </form>
</div>

<script>
    // Chargement dynamique du template
    function loadTemplate(templatePath) {
        fetch(templatePath)
            .then(response => response.text())
            .then(data => {
                // Injecte le contenu du template uniquement dans l'aperçu
                document.getElementById('template-preview').innerHTML = data;
            })
            .catch(error => console.error('Erreur lors du chargement du template :', error));
    }

    // Mise à jour des informations dynamiques dans l'aperçu
    function updatePreview(field, value) {
        const element = document.querySelector(`#template-preview .${field}`);
        if (element) {
            element.textContent = value;
        } else {
            console.warn(`Élément avec la classe "${field}" introuvable dans le template.`);
        }
    }

    // Mise à jour des couleurs dans l'aperçu
    function updateColor(type, value) {
        const preview = document.getElementById('template-preview');
        if (type === 'primary') preview.style.setProperty('--primary-color', value);
        if (type === 'secondary') preview.style.setProperty('--secondary-color', value);
        if (type === 'text') preview.style.setProperty('--text-color', value);
    }
</script>
@endsection
