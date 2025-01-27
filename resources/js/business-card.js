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

    // Valider les champs d'une étape
    function validateStep(step) {
        const stepContent = document.querySelector(`.step-content[data-step="${step}"]`);
        if (!stepContent) return true;

        const requiredFields = stepContent.querySelectorAll('[required]');
        let isValid = true;

        requiredFields.forEach(field => {
            if (!field.value.trim()) {
                isValid = false;
                field.classList.add('is-invalid'); // Ajouter une classe pour signaler l'erreur
            } else {
                field.classList.remove('is-invalid'); // Retirer l'erreur si corrigée
            }
        });

        return isValid;
    }

    // Aller à l'étape suivante
    window.goToNextStep = function () {
        if (currentStep < 3 && validateStep(currentStep)) {
            showStep(currentStep + 1);
        } else {
            alert('Veuillez remplir tous les champs obligatoires avant de continuer.');
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

        if (!templatePath) {
            console.error('Chemin du template non spécifié.');
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
                if (previewContainer) {
                    previewContainer.innerHTML = data;
                } else {
                    console.error('Conteneur de prévisualisation introuvable.');
                }
            })
            .catch(error => {
                console.error('Erreur lors du chargement du template :', error);
                if (previewContainer) {
                    previewContainer.innerHTML = `
                        <p class="text-center text-danger m-0">
                            Une erreur s'est produite lors du chargement : ${error.message}
                        </p>`;
                }
            });
    };

    // Variable globale pour stocker les couleurs
    let colors = {
        primary: '#000000',
        secondary: '#ffffff',
        text: '#000000',
    };

    // Mettre à jour les champs de prévisualisation
    window.updatePreview = function (fieldKey, value) {
        const previewElement = document.querySelector(`[data-preview="${fieldKey}"]`);
        if (previewElement) {
            if (value instanceof File) {
                const reader = new FileReader();
                reader.onload = function (e) {
                    if (previewElement.tagName === 'IMG') {
                        previewElement.src = e.target.result;
                    } else {
                        previewElement.innerHTML = `<img src="${e.target.result}" alt="${fieldKey}" style="max-width: 100%; height: auto;">`;
                    }
                };
                reader.readAsDataURL(value);
            } else if (fieldKey.includes('color')) {
                if (fieldKey.includes('text')) {
                    previewElement.style.color = value;
                } else {
                    previewElement.style.backgroundColor = value;
                }
            } else {
                previewElement.textContent = value || '—';
            }
        }

        if (fieldKey === 'colors') {
            colors = { ...colors, ...value };
            const previewCard = document.querySelector('.business-card');
            if (previewCard) {
                previewCard.style.setProperty('--primary-color', colors.primary || '#000000');
                previewCard.style.setProperty('--secondary-color', colors.secondary || '#ffffff');
                previewCard.style.setProperty('--text-color', colors.text || '#000000');
            }
        }
    };

    showStep(1); // Initialisation : afficher la première étape
});
