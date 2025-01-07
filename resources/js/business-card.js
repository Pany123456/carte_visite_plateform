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

    // Mise à jour de la prévisualisation en temps réel
        window.updatePreview = function (field, value) {
            const previewElement = document.querySelector(`#template-preview .${field}`);

            if (field === 'colors') {
                // Update colors in the preview
                const previewCard = document.querySelector('#template-preview .card');
                if (previewCard) {
                    previewCard.style.setProperty('--primary-color', value.primary || '#000000');
                    previewCard.style.setProperty('--secondary-color', value.secondary || '#ffffff');
                    previewCard.style.setProperty('--text-color', value.text || '#000000');
                }
                return;
            }

            if (previewElement) {
                previewElement.textContent = value || 'N/A'; // Default to "N/A" if empty
                console.log(`Updated preview: ${field} = ${value}`);
            } else {
                console.warn(`Preview element for field "${field}" not found.`);
            }
        };





   // Fonction pour charger et afficher le template
   window.loadTemplate = function(templatePath) {
    // Votre code pour charger le template
    if (!templatePath) {
        console.error('Chemin du template non spécifié.');
        const previewContainer = document.getElementById('template-preview');
        if (previewContainer) {
            previewContainer.innerHTML = `<p class="text-center text-danger m-0">Aucun template sélectionné.</p>`;
        }
        return;
    }

    fetch(`/preview-template/${encodeURIComponent(templatePath)}`)
        .then(response => {
            if (!response.ok) {
                throw new Error(`Template introuvable (status: ${response.status})`);
            }
            return response.text();
        })
        .then(data => {
            const previewContainer = document.getElementById('template-preview');
            if (previewContainer) {
                previewContainer.innerHTML = data;
            } else {
                console.error('Conteneur de prévisualisation introuvable.');
            }
        })
        .catch(error => {
            console.error('Erreur lors du chargement du template :', error);
            const previewContainer = document.getElementById('template-preview');
            if (previewContainer) {
                previewContainer.innerHTML = `<p class="text-center text-danger m-0">${error.message}</p>`;
            }
        });
};





    showStep(1); // Initialisation : afficher la première étape
});
