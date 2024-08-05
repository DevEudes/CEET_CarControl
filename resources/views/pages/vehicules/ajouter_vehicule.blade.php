@extends('layouts.base')
@section('title')
<div class="col-12 col-xl-8 mb-4 mb-xl-0 mx-auto">
    <div class="d-flex align-items-center justify-content-center">
        <h2 class="header-text">
            <i class="mdi mdi-car" style="color: #6c7383"></i>
        </h2>
        <h2 class="header-text" style="font-size: 1.5rem; color: #ef1212">
            &nbsp;&nbsp; VEHICULES
        </h2>
    </div>
</div>
@endsection

@section('content')

<head>
    <!-- SweetAlert CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css" />
    <!-- SweetAlert JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Include Select2 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <!-- Include jQuery and Select2 JS -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
</head>

<main>
    <form id="vehicle-form" method="POST" action="{{ route('vehicules.store') }}" enctype="multipart/form-data" class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg border border-crimson focus:border-crimson focus:ring-crimson" style="
        background-color: #f9f7ed;
        box-shadow: 0px 10px 20px rgba(0, 0, 0, 0.2),
            0px 6px 6px rgba(0, 0, 0, 0.23);
        margin: 1em 350px 15px 190px;
        padding: 5px 50px 10px 50px;
        border-radius: 20px;
    ">
        @csrf
        <h2 class="header-text" style="font-size: 1.9rem; color: #ef1212; text-align:center;">
            Création d'un véhicule
        </h2>
        <div class="page" id="page1">
            <h3 style="text-align: center">Informations Générales</h3>
            <div class="mt-4">
                <x-input-label for="immatriculation" :value="__('Immatriculation')" />
                <x-text-input 
                    id="immatriculation" 
                    placeholder="Ex: 1234 AB" 
                    class="block mt-1 w-full bg-merino text-gray-900 border border-crimson rounded-md focus:border-crimson focus:ring-crimson" 
                    type="text" 
                    name="immatriculation" 
                    :value="old('immatriculation')" 
                    required 
                    autocomplete="immatriculation" 
                    minlength="7" 
                    maxlength="8" 
                    
                    onblur="formatImmatriculation(this)"
                />
                <x-input-error :messages="$errors->get('immatriculation')" class="mt-2" style="color: red" />
                <small id="immatriculationFeedback" class="text-crimson" style="display:none;">Le format est invalide. Ex: 1234 AB</small>
            </div>
            <div class="mt-4">
                <x-input-label for="id_marque" :value="__('Marque du véhicule')" /><br>
                <select id="id_marque" name="id_marque" class="block mt-1 w-full bg-merino text-gray-900 border border-crimson rounded-md focus:border-crimson focus:ring-crimson select2" required>
                    <option value="" class="bg-merino text-gray-500"></option>
                    @foreach ($marques as $marque)
                    <option value="{{ $marque->id }}" class="bg-merino text-gray-900">
                        {{ $marque->nom }}
                    </option>
                    @endforeach
                </select>
                <x-input-error :messages="$errors->get('id_marque')" class="mt-2" style="color: red"/>
            </div>
            <div class="mt-4">
                <x-input-label for="id_modele" :value="__('Modèle du véhicule')" /><br>
                <select id="id_modele" name="id_modele" class="block mt-1 w-full bg-merino text-gray-900 border border-crimson rounded-md focus:border-crimson focus:ring-crimson select2" required>
                    <option value="" class="bg-merino text-gray-500"></option>
                    @foreach ($modeles as $modele)
                    <option value="{{ $modele->id }}" class="bg-merino text-gray-900">
                        {{ $modele->nom }}
                    </option>
                    @endforeach
                </select>
                <x-input-error :messages="$errors->get('id_modele')" class="mt-2" style="color: red"/>
            </div>
            <div class="mt-4">
                <x-input-label for="id_genre_vehicule" :value="__('Genre de véhicule')" /><br>
                <select id="id_genre_vehicule" name="id_genre_vehicule" class="block mt-1 w-full bg-merino text-gray-900 border border-crimson rounded-md focus:border-crimson focus:ring-crimson select2" required>
                    <option value="" class="bg-merino text-gray-500"></option>
                    @foreach ($genres as $genre)
                    <option value="{{ $genre->id }}" class="bg-merino text-gray-900">
                        {{ $genre->nom }}
                    </option>
                    @endforeach
                </select>
                <x-input-error :messages="$errors->get('id_genre_vehicule')" class="mt-2" style="color: red"/>
            </div>
            <button type="button" class="next bg-crimson text-white rounded-md px-4 py-2 mt-4" style="
                    border-radius: 20px;
                    background-color: #5ac85a;
                    border-color: transparent;
                ">
                Suivant
                <img src="{{ url('images/chevron-droit.png/') }}" style="width: 20px" />
            </button>
        </div>
        <div class="page" id="page2">
            <h3 style="text-align: center">Informations Techniques</h3>
            <div class="mt-4">
                <x-input-label for="numero_moteur" :value="__('Numéro de moteur')" />
                <x-text-input id="numero_moteur" placeholder="numéro de moteur" class="block mt-1 w-full bg-merino text-gray-900 border border-crimson rounded-md focus:border-crimson focus:ring-crimson" type="text" name="numero_moteur" :value="old('numero_moteur')" required autocomplete="numero_moteur" />
                <x-input-error :messages="$errors->get('numero_moteur')" class="mt-2" style="color: red"/>
            </div>
            <div class="mt-4">
                <x-input-label for="numero_chassis" :value="__('Numéro de châssis')" />
                <x-text-input id="numero_chassis" placeholder="numéro de châssis" class="block mt-1 w-full bg-merino text-gray-900 border border-crimson rounded-md focus:border-crimson focus:ring-crimson" type="text" name="numero_chassis" :value="old('numero_chassis')" required autocomplete="numero_chassis" />
                <x-input-error :messages="$errors->get('numero_chassis')" class="mt-2"style="color: red" />
            </div>
            <div class="mt-4">
                <x-input-label for="kilometrage" :value="__('Kilométrage')" />
                <x-text-input id="kilometrage" placeholder="kilométrage" class="block mt-1 w-full bg-merino text-gray-900 border border-crimson rounded-md focus:border-crimson focus:ring-crimson" type="number" name="kilometrage" :value="old('kilometrage')" required autocomplete="kilometrage" />
                <x-input-error :messages="$errors->get('kilometrage')" class="mt-2" style="color: red"/>
            </div>
            <div class="mt-4">
                <x-input-label for="type_moteur" :value="__('Type de moteur du véhicule')" /><br>
                <select id="type_moteur" name="type_moteur" class="block mt-1 w-full bg-merino text-gray-900 border border-crimson rounded-md focus:border-crimson focus:ring-crimson select2" required>
                    <option value="" class="bg-merino text-gray-500">{{ __('Sélectionner le type de moteur') }}</option>
                    @foreach ($types_moteur as $value => $label)
                    <option value="{{ $value }}" class="bg-merino text-gray-900" {{ old('type_moteur') == $value ? 'selected' : '' }}>
                        {{ $label }}
                    </option>
                    @endforeach
                </select>
                <x-input-error :messages="$errors->get('type_moteur')" class="mt-2" style="color: red"/>
            </div>
            <button type="button" class="prev bg-gray-500 text-white rounded-md px-4 py-2 mt-4" style="
                    border-radius: 20px;
                    background-color: #479fcb;
                    border-color: transparent;
                ">
                <img src="{{ url('images/chevron-gauche.png/') }}" style="width: 20px" />
                Précédent</button>&nbsp;&nbsp;&nbsp;&nbsp;
            <button type="button" class="next bg-crimson text-white rounded-md px-4 py-2 mt-4" style="
                    border-radius: 20px;
                    background-color: #5ac85a;
                    border-color: transparent;
                ">
                Suivant
                <img src="{{ url('images/chevron-droit.png/') }}" style="width: 20px" />
            </button>
        </div>
        <div class="page" id="page3">
            <h3 style="text-align: center">Informations Techniques</h3>
            <div class="mt-4">
                <x-input-label for="date_achat" :value="__('Date d\'achat')" />
                <x-text-input 
                    id="date_achat" 
                    placeholder="date d'achat" 
                    class="block mt-1 w-full bg-merino text-gray-900 border border-crimson rounded-md focus:border-crimson focus:ring-crimson" 
                    type="date"
                    max="{{ date('Y-m-d') }}" 
                    name="date_achat" 
                    :value="old('date_achat')" 
                    required 
                    autocomplete="date_achat" 
                    oninput="validateDateAchat(this)"
                />
                <x-input-error :messages="$errors->get('date_achat')" class="mt-2" style="color: red"/>
            </div>
            <div class="mt-4">
                <x-input-label for="liste_outillage" :value="__('Liste d\'outillage')" />
                <textarea id="liste_outillage" placeholder="Liste d'outillage" 
                        class="block mt-1 w-full bg-merino text-gray-900 border border-crimson rounded-md focus:border-crimson focus:ring-crimson"
                        name="liste_outillage" required
                        style="height: 100px; padding: 15px; resize: vertical;">{{ old('liste_outillage') }}</textarea>
                <x-input-error :messages="$errors->get('liste_outillage')" class="mt-2" style="color: red"/>
            </div>
            <div class="mt-4">
                <x-input-label for="id_fournisseur" :value="__('Fournisseur')" />
                <select id="id_fournisseur" name="id_fournisseur" class="block mt-1 w-full bg-merino text-gray-900 border border-crimson rounded-md focus:border-crimson focus:ring-crimson select2" required>
                    <option value="" class="bg-merino text-gray-500"></option>
                    @foreach ($fournisseurs as $fournisseur)
                    <option value="{{ $fournisseur->id }}" class="bg-merino text-gray-900">
                        {{ $fournisseur->nom }}
                    </option>
                    @endforeach
                </select>
                <x-input-error :messages="$errors->get('id_fournisseur')" class="mt-2" style="color: red"/>
            </div>
            <button type="button" class="prev bg-gray-500 text-white rounded-md px-4 py-2 mt-4" style="
                    border-radius: 20px;
                    background-color: #479fcb;
                    border-color: transparent;
                ">
                <img src="{{ url('images/chevron-gauche.png/') }}" style="width: 20px" />
                Précédent</button>&nbsp;&nbsp;&nbsp;&nbsp;
            <button type="button" class="next bg-crimson text-white rounded-md px-4 py-2 mt-4" style="
                    border-radius: 20px;
                    background-color: #5ac85a;
                    border-color: transparent;
                ">
                Suivant
                <img src="{{ url('images/chevron-droit.png/') }}" style="width: 20px" />
            </button>
        </div>
        <div class="page" id="page4">
            <h3 style="text-align: center">Informations Complémentaires</h3>
            <div class="mt-4">
                <x-input-label for="numero_carte_grise" :value="__('Numéro de carte grise')" />
                <x-text-input id="numero_carte_grise" placeholder="numéro de carte grise" class="block mt-1 w-full bg-merino text-gray-900 border border-crimson rounded-md focus:border-crimson focus:ring-crimson" type="number" name="numero_carte_grise"  required autocomplete="numero_carte_grise" />
                <x-input-error :messages="$errors->get('numero_carte_grise')" class="mt-2" style="color: red"/>
            </div>
            <div class="mt-4">
                <x-input-label for="image_carte_grise" :value="__('Image de la carte grise')" />
                <x-text-input id="image_carte_grise" class="block mt-1 w-full bg-merino text-gray-900 border border-crimson rounded-md focus:border-crimson focus:ring-crimson" type="file" name="image_carte_grise" :value="old('image_carte_grise')" required autocomplete="image_carte_grise" />
                <x-input-error :messages="$errors->get('image_carte_grise')" class="mt-2" style="color: red"/>
            </div>
            <div class="mt-4">
                <x-input-label for="validite_garantie" :value="__('Validité de la garantie')" />
                <x-text-input 
                    id="validite_garantie" 
                    placeholder="validité de la garantie" 
                    class="block mt-1 w-full bg-merino text-gray-900 border border-crimson rounded-md focus:border-crimson focus:ring-crimson" 
                    type="date" 
                    name="validite_garantie" 
                    :value="old('validite_garantie')" 
                    required 
                    autocomplete="validite_garantie" 
                    oninput="validateValiditeGarantie(this)"
                />
                <x-input-error :messages="$errors->get('validite_garantie')" class="mt-2" style="color: red"/>
                <small id="validiteGarantieFeedback" class="text-crimson" style="display:none;">La validité de la garantie doit être après la date d'achat.</small>
            </div>
            <button type="button" class="prev bg-gray-500 text-white rounded-md px-4 py-2 mt-4" style="
                    border-radius: 20px;
                    background-color: #479fcb;
                    border-color: transparent;
                ">
                <img src="{{ url('images/chevron-gauche.png/') }}" style="width: 20px" />
                Précédent</button>&nbsp;&nbsp;&nbsp;&nbsp;
                <button type="submit" id="submit-button" class="bg-crimson text-white rounded-md px-4 py-2 mt-4" style="border-radius: 20px; border-color: transparent">
                    Terminer
                </button>
        </div>
    </form>
</main>

<style>
    textarea {
        height: 150px; 
        width: 435px; 
        padding: 15px; 
        resize: vertical; 
        border-radius: 8px; 
        border: 1px solid #ddd;
        box-shadow: none;
        background-color: #f5f5f5;
    }

    .bg-crimson {
        background-color: #ef1212;
        border-color: transparent;
    }

    .border-crimson {
        border-color: #ef1212;
    }

    .text-crimson {
        color: #ef1212;
    }

    .focus\:border-crimson:focus {
        border-color: #ef1212;
    }

    .focus\:ring-crimson:focus {
        --tw-ring-color: #ef1212;
    }

    .bg-merino {
        background-color: #f9f7ed;
    }

    .container {
        width: 60%;
        margin: 0 auto;
        border: 1px solid lightgrey;
        padding: 20px;
        border-radius: 5px;
        position: relative;
        top: 50%;
        transform: translateY(50%);
    }

    input,
    select {
        display: block;
        width: 100%;
        margin-top: 5px;
        margin-bottom: 5px;
        border: 1px solid lightgrey;
        border-radius: 5px;
        padding: 10px;
    }

    .page {
        display: none;
    }

    header {
        display: flex;
        justify-content: space-between;
        margin: 10px 600px 10px 400px;
    }

    .page-num {
        border: 1px #e19f2e;
        border-radius: 50%;
        width: 50px;
        height: 40px;
        text-align: center;
        padding: 10px;
    }

    .active {
        color: white;
        background-color: #e19f2e;
    }

    .border-crimson {
        border-color: #ef1212;
    }
    .border-green-500 {
        border-color: #38a169;
    }

    .select2-container--default .select2-selection--single {
        height: 38px;
        width: 600px !important;
        padding: 5px;
        border-color: #ddd;
        border-radius: 4px;
        background-color: #fff;
    }
    .select2-container--default .select2-selection--single .select2-selection__rendered {
        color: #555;
        line-height: 30px;
    }
    .select2-container--default .select2-selection--single .select2-selection__arrow {
        height: 100%;
    }

    .custom-swal-popup {
        background-color: #f9f7ed;
        border-radius: 15px;
        padding: 20px;
    }

    .custom-swal-title {
        font-size: 1.5em;
        color: #6c7383;
    }

    .custom-swal-confirm {
        background-color: #5ac85a !important;
        color: #fff;
        border-radius: 10px;
        padding: 10px 20px;
    }

    .custom-swal-cancel {
        background-color: #f44336 !important;
        color: #fff;
        border-radius: 10px;
        padding: 10px 20px;
    }

</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const vehicleForm = document.getElementById('vehicle-form');
        const submitButton = document.getElementById('submit-button');

        vehicleForm.addEventListener('submit', function(event) {
            let formValid = true;

            // Valider chaque champ requis
            const requiredInputs = vehicleForm.querySelectorAll('input[required], select[required], textarea[required]');
            requiredInputs.forEach(input => {
                if (!input.value.trim()) {
                    input.classList.add('border-crimson'); // Ajouter une bordure rouge aux champs invalides
                    formValid = false;
                } else {
                    input.classList.remove('border-crimson'); // Enlever la bordure rouge des champs valides
                }

                if (input.type === 'date' && input.id === 'validite_garantie') {
                    if (!validateValiditeGarantie(input)) {
                        formValid = false;
                    }
                }
            });

            if (!formValid) {
                event.preventDefault(); // Empêche la soumission du formulaire si une validation échoue
                Swal.fire({
                    title: 'Erreur!',
                    text: 'Veuillez corriger les erreurs dans le formulaire.',
                    icon: 'error',
                    confirmButtonText: 'OK',
                    allowOutsideClick: false,  // Ne pas fermer en cliquant à l'extérieur
                    allowEscapeKey: false,     // Ne pas fermer avec la touche Échap
                    customClass: {
                        popup: 'custom-swal-popup',
                        title: 'custom-swal-title',
                        confirmButton: 'custom-swal-confirm'
                    }
                });
                return;
            }
        });

    });

    // Initialisation de Select2 avec des options personnalisées
    $('#id_marque, #id_modele, #id_fournisseur, #id_genre_vehicule, #type_moteur').select2({
        placeholder: 'Sélectionner une option',
        allowClear: true,
        width: 'resolve'
    });

    // Validation de l'immatriculation
    function validateImmatriculation(input) {
        const pattern = /^\d{4} ([A-Z]{2}|[A-Z]\/[A-Z])$/;
        const feedback = document.getElementById('immatriculationFeedback');

        if (pattern.test(input.value)) {
            input.classList.remove('border-crimson');
            input.classList.add('border-green-500');
            feedback.style.display = 'none';
        } else {
            input.classList.add('border-crimson');
            input.classList.remove('border-green-500');
            feedback.style.display = 'block';
        }
    }

    function validateImmatriculation(input) {
        // Nouveau pattern pour valider le format TG-xxxx-YY
        const pattern = /^TG-\d{4}-[A-Z]{2}$/;
        const feedback = document.getElementById('immatriculationFeedback');

        if (pattern.test(input.value)) {
            input.classList.remove('border-crimson');
            input.classList.add('border-green-500');
            feedback.style.display = 'none';
        } else {
            input.classList.add('border-crimson');
            input.classList.remove('border-green-500');
            feedback.style.display = 'block';
        }
    }

    function formatImmatriculation(input) {
        // Valider et formater si nécessaire
        const initialPattern = /^\d{4} ([A-Z]{2}|[A-Z]\/[A-Z])$/;
        if (initialPattern.test(input.value)) {
            // Appliquer le formatage
            const parts = input.value.split(' ');
            input.value = `TG-${parts[0]}-${parts[1]}`;
        }

        // Valider après formatage
        validateImmatriculation(input);
    }

    document.getElementById('immatriculation').addEventListener('input', function() {
        validateImmatriculation(this);
    });

    document.getElementById('immatriculation').addEventListener('blur', function() {
        formatImmatriculation(this);
    });


    // Validation de la validité de la garantie
    function validateValiditeGarantie(input) {
        const dateAchat = new Date(document.getElementById('date_achat').value);
        const dateValue = new Date(input.value);
        const feedbackElement = document.getElementById('validiteGarantieFeedback');

        // Vérifie si la validité de la garantie est après la date d'achat
        if (dateValue <= dateAchat) {
            input.classList.add('border-crimson');
            input.classList.remove('border-green-500');
            feedbackElement.style.display = 'block';
            return false;
        } else {
            input.classList.remove('border-crimson');
            input.classList.add('border-green-500');
            feedbackElement.style.display = 'none';
            return true;
        }
    }


    // On va chercher les différents éléments de notre page
    const pages = document.querySelectorAll(".page");
    const header = document.querySelector("header");
    const nbPages = pages.length; // Nombre de pages du formulaire
    let pageActive = 1;

    // On attend le chargement de la page
    window.onload = () => {
        // On affiche la 1ère page du formulaire
        document.querySelector(".page").style.display = "initial";

        // On crée les éléments "numéro de page"
        pages.forEach((page, index) => {
            // On crée l'élément "numéro de page"
            let element = document.createElement("div");
            element.classList.add("page-num");
            element.id = "num" + (index + 1);

            if (pageActive === index + 1) {
                element.classList.add("active");
            }

            element.innerHTML = index + 1;
            element.addEventListener('click', () => {
                // On masque toutes les pages
                pages.forEach(p => p.style.display = "none");

                // On affiche la page sélectionnée
                page.style.display = "initial";

                // On "désactive" la page active actuelle
                document.querySelector(".page-num.active").classList.remove("active");

                // On met à jour la page active
                pageActive = index + 1;

                // On "active" le nouveau numéro
                element.classList.add("active");
            });
            header.appendChild(element);
        });
    }

    /**
     * Cette fonction fait avancer le formulaire d'une page
     */
    function pageSuivante(button) {
        const currentPage = button.closest('.page');
        const nextPage = currentPage.nextElementSibling;

        // Check if current page inputs are valid
        const inputs = currentPage.querySelectorAll('input, select, textarea');
        let allValid = true;

        inputs.forEach(input => {
            input.reportValidity();
            if (!input.checkValidity()) {
                allValid = false;
            }
        });

        if (allValid) {
            // On masque toutes les pages
            pages.forEach(page => page.style.display = "none");

            // On affiche la page suivante
            nextPage.style.display = "initial";

            // On "désactive" la page active actuelle
            document.querySelector(".page-num.active").classList.remove("active");

            // On incrémente pageActive
            pageActive++;

            // On "active" le nouveau numéro
            document.querySelector("#num" + pageActive).classList.add("active");
        }
    }

    // Fonction pour aller à la page précédente
    function pagePrecedente(button) {
        const currentPage = button.closest('.page');
        const prevPage = currentPage.previousElementSibling;

        // On masque toutes les pages
        pages.forEach(page => page.style.display = "none");

        // On affiche la page précédente
        prevPage.style.display = "initial";

        // On "désactive" la page active actuelle
        document.querySelector(".page-num.active").classList.remove("active");

        // On décrémente pageActive
        pageActive--;

        // On "active" le nouveau numéro
        document.querySelector("#num" + pageActive).classList.add("active");
    }

    // Ajout des événements aux boutons
    document.querySelectorAll(".next").forEach(button => {
        button.addEventListener("click", function() {
            pageSuivante(button);
        });
    });

    document.querySelectorAll(".prev").forEach(button => {
        button.addEventListener("click", function() {
            pagePrecedente(button);
        });
    });

    // SweetAlert pour la confirmation de la création de l'utilisateur
    @if(session('success') && session('newVehiculeId'))
        Swal.fire({
            title: '<strong>Succès!</strong>',  // Utilisation de balises HTML pour styliser le titre
            html: `<p style="font-size: 1.2em; color: #333;">{{ session('success') }}</p>
                <p style="font-size: 1em;">Voulez-vous affecter ce véhicule à un département?</p>`,
            icon: 'success',
            showCancelButton: true,
            confirmButtonText: 'Oui',
            cancelButtonText: 'Non',
            allowOutsideClick: false,  // Ne pas fermer en cliquant à l'extérieur
            allowEscapeKey: false,     // Ne pas fermer avec la touche Échap
            customClass: {
                popup: 'custom-swal-popup',
                title: 'custom-swal-title',
                htmlContainer: 'custom-swal-html', // Assurez-vous que cette classe existe
                confirmButton: 'custom-swal-confirm',
                cancelButton: 'custom-swal-cancel'
            }
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = '{{ route("affectations.create", ["vehicule_id" => session("newVehiculeId")]) }}';
            }
        });
    @endif

    // SweetAlert pour l'erreur de duplication
    @if(session('error'))
        Swal.fire({
            title: 'Erreur!',
            text: '{{ session('error') }}',
            icon: 'error',
            confirmButtonText: 'OK',
            allowOutsideClick: false,
            allowEscapeKey: false,
            customClass: {
                popup: 'custom-swal-popup',
                title: 'custom-swal-title',
                confirmButton: 'custom-swal-confirm'
            }
        }).then(() => {
            window.location.reload(); // Recharge la page pour réinitialiser le formulaire
        });
    @endif

</script>
@endsection
