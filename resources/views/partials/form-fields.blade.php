@if($type === 'entreprise')
<input type="hidden" id="form_type" name="form_type" value="entreprise">

<div class="mb-3">
    <label for="entreprise_name" class="form-label">Nom de l'Entreprise</label>
    <input type="text" class="form-control" id="entreprise_name" name="company_name" oninput="updatePreview('company_name', this.value)" required>
</div>
<div class="mb-3">
    <label for="entreprise_logo" class="form-label">Logo de l'Entreprise</label>
    <input type="file" class="form-control" id="entreprise_logo" name="logo" accept="image/*" onchange="updatePreview('logo', this.files[0])">
</div>
<div class="mb-3">
    <label for="entreprise_registration_number" class="form-label">Numéro d’Enregistrement</label>
    <input type="text" class="form-control" id="entreprise_registration_number" name="registration_number" oninput="updatePreview('registration_number', this.value)">
</div>
<div class="mb-3">
    <label for="entreprise_tax_id" class="form-label">Numéro Fiscal</label>
    <input type="text" class="form-control" id="entreprise_tax_id" name="tax_id" oninput="updatePreview('tax_id', this.value)">
</div>
<div class="mb-3">
    <label for="entreprise_industry" class="form-label">Secteur d’Activité</label>
    <input type="text" class="form-control" id="entreprise_industry" name="industry" oninput="updatePreview('industry', this.value)">
</div>
<div class="mb-3">
    <label for="entreprise_company_size" class="form-label">Taille de l’Entreprise</label>
    <input type="text" class="form-control" id="entreprise_company_size" name="company_size" oninput="updatePreview('company_size', this.value)">
</div>
<div class="mb-3">
    <label for="entreprise_contact_person" class="form-label">Contact au sein de l’Entreprise</label>
    <input type="text" class="form-control" id="entreprise_contact_person" name="contact_person" oninput="updatePreview('contact_person', this.value)">
</div>
<div class="mb-3">
    <label for="entreprise_position_contact_person" class="form-label">Poste du Contact</label>
    <input type="text" class="form-control" id="entreprise_position_contact_person" name="position_contact_person" oninput="updatePreview('position_contact_person', this.value)">
</div>
<div class="mb-3">
    <label for="entreprise_additional_services" class="form-label">Services/Produits Additionnels</label>
    <textarea class="form-control" id="entreprise_additional_services" name="additional_services" rows="3" oninput="updatePreview('additional_services', this.value)"></textarea>
</div>
<div class="mb-3">
    <label for="entreprise_whatsapp_number" class="form-label">Numéro WhatsApp</label>
    <input type="text" class="form-control" id="entreprise_whatsapp_number" name="whatsapp_number" oninput="updatePreview('whatsapp_number', this.value)">
</div>
@elseif($type === 'particulier')
<input type="hidden" id="form_type" name="form_type" value="particulier">

<div class="mb-3">
    <label for="particulier_full_name" class="form-label">Nom Complet</label>
    <input type="text" class="form-control" id="particulier_full_name" name="full_name" oninput="updatePreview('full_name', this.value)" required>
</div>
<div class="mb-3">
    <label for="particulier_date_of_birth" class="form-label">Date de Naissance</label>
    <input type="date" class="form-control" id="particulier_date_of_birth" name="date_of_birth" oninput="updatePreview('date_of_birth', this.value)">
</div>
<div class="mb-3">
    <label for="particulier_gender" class="form-label">Sexe</label>
    <select class="form-control" id="particulier_gender" name="gender" onchange="updatePreview('gender', this.value)">
        <option value="">-- Sélectionnez --</option>
        <option value="male">Masculin</option>
        <option value="female">Féminin</option>
        <option value="other">Autre</option>
    </select>
</div>
<div class="mb-3">
    <label for="particulier_whatsapp_number" class="form-label">Numéro WhatsApp</label>
    <input type="text" class="form-control" id="particulier_whatsapp_number" name="whatsapp_number" oninput="updatePreview('whatsapp_number', this.value)">
</div>
<div class="mb-3">
    <label for="particulier_personal_message" class="form-label">Message Personnalisé</label>
    <textarea class="form-control" id="particulier_personal_message" name="personal_message" rows="3" oninput="updatePreview('personal_message', this.value)"></textarea>
</div>
@endif

<!-- Champs communs -->
<div class="mb-3">
    <label for="social_links" class="form-label">Liens Réseaux Sociaux</label>
    <label for="facebook">Facebook</label>
<input type="url" name="social_links[facebook]" id="facebook">

<label for="instagram">Instagram</label>
<input type="url" name="social_links[instagram]" id="instagram">

<label for="twitter">Twitter</label>
<input type="url" name="social_links[twitter]" id="twitter">

<label for="tiktok">TikTok</label>
<input type="url" name="social_links[tiktok]" id="tiktok">

<label for="linkedin">LinkedIn</label>
<input type="url" name="social_links[linkedin]" id="linkedin">
    <input type="url" class="form-control mb-2" name="social_links[]" placeholder="LinkedIn" oninput="updatePreview('social_links', this.value)">
    <input type="url" class="form-control mb-2" name="social_links[]" placeholder="Twitter" oninput="updatePreview('social_links', this.value)">
    <button type="button" class="btn btn-sm btn-secondary mt-1" onclick="addSocialField()">Ajouter un autre réseau</button>
    <div id="social_links_fields"></div>
</div>
<div class="mb-3">
    <label for="qr_code_file" class="form-label">QR Code</label>
    <input type="file" class="form-control" id="qr_code_file" name="qr_code_file" accept="image/*" onchange="handleFileUpload('qr_code_file', this.files[0])">
</div>
<div class="mb-3">
    <label for="photo_file" class="form-label">Photo/Logo</label>
    <input type="file" class="form-control" id="photo_file" name="photo_file" accept="image/*" onchange="handleFileUpload('photo_file', this.files[0])">
</div>

<div class="mb-3">
    <label for="description" class="form-label">Description</label>
    <textarea class="form-control" id="description" name="description" rows="3" oninput="updatePreview('description', this.value)"></textarea>
</div>

<div class="mb-3">
    <label for="colors_primary" class="form-label">Couleur Principale</label>
    <input type="color" class="form-control form-control-color" id="colors_primary" name="colors[primary]" onchange="updatePreview('colors', { primary: this.value })" value="#000000">
</div>
<div class="mb-3">
    <label for="colors_secondary" class="form-label">Couleur Secondaire</label>
    <input type="color" class="form-control form-control-color" id="colors_secondary" name="colors[secondary]" onchange="updatePreview('colors', { secondary: this.value })" value="#ffffff">
</div>
<div class="mb-3">
    <label for="colors_text" class="form-label">Couleur du Texte</label>
    <input type="color" class="form-control form-control-color" id="colors_text" name="colors[text]" onchange="updatePreview('colors', { text: this.value })" value="#000000">
</div>
