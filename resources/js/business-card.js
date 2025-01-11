document.addEventListener('DOMContentLoaded', () => {
    let currentStep = 1;
    let selectedFormType = null;

    // Afficher une étape spécifique
    function showStep(step) {
        document.querySelectorAll('.step-content').forEach(content => {
            content.classList.remove('active');
            if (parseInt(content.dataset.step) === step) {
                content.classList.add('active');
            }
        });

        document.querySelectorAll('.step .circle').forEach(circle => {
            circle.classList.remove('active');
            if (parseInt(circle.parentElement.dataset.step) === step) {
                circle.classList.add('active');
            }
        });

        currentStep = step;
    }

    // Aller à l'étape suivante
    window.goToNextStep = function () {
        if (currentStep < 3) {
            showStep(currentStep + 1);
        }
    };

    // Revenir à l'étape précédente
    window.goToPreviousStep = function () {
        if (currentStep > 1) {
            showStep(currentStep - 1);
        }
    };

    // Sélectionner le type de formulaire
    window.selectFormType = function (type) {
        selectedFormType = type;

        // Activer la bonne tab-pane
        document.getElementById('entreprise-form').classList.toggle('show', type === 'entreprise');
        document.getElementById('particulier-form').classList.toggle('show', type === 'particulier');

        // Ajouter une classe active au bouton sélectionné
        document.querySelectorAll('[data-form-type]').forEach(button => {
            button.classList.remove('btn-primary');
            button.classList.add('btn-outline-primary');
        });
        document.querySelector(`[data-form-type="${type}"]`).classList.add('btn-primary');
        document.querySelector(`[data-form-type="${type}"]`).classList.remove('btn-outline-primary');
    };

  




// Fonction pour charger et afficher le template
window.loadTemplate = function (templatePath) {
    const previewContainer = document.getElementById('template-preview');

    // Vérifier si le chemin du template est fourni
    if (!templatePath) {
        console.error('Chemin du template non spécifié.');
        if (previewContainer) {
            previewContainer.innerHTML = `<p class="text-center text-danger m-0">Aucun template sélectionné.</p>`;
        }
        return;
    }

    // Effectuer une requête pour récupérer le template
    fetch(`/preview-template/${encodeURIComponent(templatePath)}`)
        .then(response => {
            if (!response.ok) {
                throw new Error(`Template introuvable (status: ${response.status})`);
            }
            return response.text();
        })
        .then(data => {
            if (previewContainer) {
                previewContainer.innerHTML = data;
            } else {
                console.error('Conteneur de prévisualisation introuvable.');
            }
        })
        .catch(error => {
            console.error('Erreur lors du chargement du template :', error);

            // Afficher un message d'erreur dans le conteneur de prévisualisation
            if (previewContainer) {
                previewContainer.innerHTML = `
                    <p class="text-center text-danger m-0">
                        Une erreur s'est produite lors du chargement : ${error.message}
                    </p>`;
            }
        });
};

// Fonction pour mettre à jour les champs de prévisualisation
window.updatePreview = function (fieldKey, value) {
    const previewElement = document.querySelector(`#template-preview .${fieldKey}`);
    if (previewElement) {
        if (value instanceof File) {
            // Si c'est un fichier, afficher une image
            const reader = new FileReader();
            reader.onload = function (e) {
                previewElement.innerHTML = `<img src="${e.target.result}" alt="${fieldKey}" style="max-width: 100%; height: auto;">`;
            };
            reader.readAsDataURL(value);
        } else {
            // Sinon, mettre à jour le texte
            previewElement.textContent = value || '—';
        }
    } else {
        console.warn(`Aucun élément trouvé pour le champ de prévisualisation : ${fieldKey}`);
    }
};

// Gestion des couleurs pour la prévisualisation
window.updateColorPreview = function (fieldKey, colorValue) {
    const previewElement = document.querySelector(`[data-preview="${fieldKey}"]`);
    if (previewElement) {
        previewElement.style.backgroundColor = colorValue;
    } else {
        console.warn(`Aucun élément trouvé pour le champ de couleur : ${fieldKey}`);
    }
};







    showStep(1); // Initialisation : afficher la première étape
});
