@extends('layouts.base') 
@section('title')
<div class="col-12 col-xl-8 mb-4 mb-xl-0 mx-auto">
    <div class="d-flex align-items-center justify-content-center">
        <h2 class="header-text">
            <i class="mdi mdi-share" style="color: #6C7383;"></i>
        </h2>
        <h2 class="header-text" style="font-size: 1.5rem; color: #ef1212;">
            &nbsp;&nbsp; AFFECTATIONS
        </h2>
    </div>
</div>
@endsection

@section('content')
<head>
    <!-- SweetAlert CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <!-- SweetAlert JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Inclure le CSS de Select2 -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <!-- Inclure jQuery et Select2 JS -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
</head>

<main>
    <form id="affectation-form" method="POST" action="{{ route('affectations.store') }}" class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg border border-crimson focus:border-crimson focus:ring-crimson" style="background-color: #f9f7ed; box-shadow: 0px 10px 20px rgba(0, 0, 0, 0.2), 0px 6px 6px rgba(0, 0, 0, 0.23); margin: 1em 350px 15px 190px; padding: 5px 50px 10px 50px; border-radius: 20px;">
        @csrf
        <h2 class="header-text" style="font-size: 1.9rem; color: #ef1212; text-align:center;">
            Création d'une fiche d'affectation
        </h2>
        <div class="page" id="page1">
            <h3 style="text-align:center;">Informations du Véhicule</h3>
            <div class="mt-4">
                <x-text-input id="numero_affectation" placeholder="Numéro d'affectation" type="text" name="numero_affectation" :value="old('numero_affectation', $numero_affectation ?? '')" readonly required autocomplete="numero_affectation" />
                <x-input-error :messages="$errors->get('numero_affectation')" class="mt-2" />
            </div>
            <div class="mt-4">
                <x-input-label for="immatriculation" :value="__('Immatriculation')" /><br>
                <select id="immatriculation" name="immatriculation" class="js-example-basic-single block mt-1 w-full bg-merino text-gray-900 border border-crimson rounded-md focus:border-crimson focus:ring-crimson select2" required>
                    <option value="">{{ __('Sélectionner une immatriculation')}}</option>
                    @foreach ($vehicules as $v)
                        <option value="{{ $v->immatriculation }}" 
                            {{ old('immatriculation') == $v->immatriculation || (isset($vehicule) && $vehicule->immatriculation == $v->immatriculation) ? 'selected' : '' }}>
                            {{ $v->immatriculation }}
                        </option>
                    @endforeach
                </select>
                <x-input-error :messages="$errors->get('immatriculation')" class="mt-2" />
            </div>
            <div class="mt-4">
                <x-input-label for="marque" :value="__('Marque')" />
                <x-text-input id="marque" class="block mt-1 w-full bg-merino text-gray-900 border border-crimson rounded-md focus:border-crimson focus:ring-crimson" type="text" name="marque" :value="old('marque', $vehicule->marque->nom ?? '')" readonly />
                <x-input-error :messages="$errors->get('marque')" class="mt-2" />
            </div>
            <div class="mt-4">
                <x-input-label for="modele" :value="__('Modèle')" />
                <x-text-input id="modele" class="block mt-1 w-full bg-merino text-gray-900 border border-crimson rounded-md focus:border-crimson focus:ring-crimson" type="text" name="modele" :value="old('modele', $vehicule->modele->nom ?? '')" readonly />
                <x-input-error :messages="$errors->get('modele')" class="mt-2" />
            </div>
            <button type="button" class="next bg-crimson text-white rounded-md px-4 py-2 mt-4" style="border-radius: 20px; background-color: #5AC85A; border-color: transparent">Suivant <img src="{{ url('images/chevron-droit.png/') }}" style="width:20px;"/></button>
        </div>
        <div class="page" id="page2">
            <h3 style="text-align:center;">Détails de l'Affectation</h3>
            <div class="mt-4">
                <x-input-label for="date_affectation" :value="__('Date d\'affectation')" />
                <x-text-input 
                    id="date_affectation" 
                    placeholder="Date d'affectation" 
                    class="block mt-1 w-full bg-merino text-gray-900 border border-crimson rounded-md focus:border-crimson focus:ring-crimson" 
                    type="date"
                    max="{{ date('Y-m-d') }}" 
                    name="date_affectation" 
                    :value="old('date_affectation')" 
                    required 
                    autocomplete="date_affectation"
                    oninput="validateDateAffectation(this)" 
                />
                <x-input-error :messages="$errors->get('date_affectation')" class="mt-2" style="color: red"/>
                <small id="dateAffectationFeedback" class="text-crimson" style="display:none;">La date est incorrect.</small>
            </div>
            <div class="mt-4">
                <x-input-label for="kilometrage" :value="__('Kilométrage')" />
                <x-text-input id="kilometrage" placeholder="kilométrage" class="block mt-1 w-full bg-merino text-gray-900 border border-crimson rounded-md focus:border-crimson focus:ring-crimson" type="number" name="kilometrage" :value="old('kilometrage', $vehicule->kilometrage ?? '')" required />
                <x-input-error :messages="$errors->get('kilometrage')" class="mt-2" />
            </div>
            <div class="mt-4">
                <x-input-label for="fonction" :value="__('Fonction')" />
                <x-text-input id="fonction" placeholder="fonction" class="block mt-1 w-full bg-merino text-gray-900 border border-crimson rounded-md focus:border-crimson focus:ring-crimson" type="text" name="fonction" :value="old('fonction')" required />
                <x-input-error :messages="$errors->get('fonction')" class="mt-2" />
            </div>
            <div class="mt-4">
                <x-input-label for="id_departement" :value="__('Département')" />
                <select id="id_departement" name="id_departement" class="block mt-1 w-full bg-merino text-gray-900 border border-crimson rounded-md focus:border-crimson focus:ring-crimson select2" required>
                    <option value="" class="bg-merino text-gray-500">{{ __('Sélectionner le département') }}</option>
                    @foreach ($departements as $departement)
                        <option value="{{ $departement->id }}" class="bg-merino text-gray-900">{{ $departement->nom }}</option>
                    @endforeach
                </select>
                <x-input-error :messages="$errors->get('id_departement')" class="mt-2" />
            </div>
            <button type="button" class="prev bg-gray-500 text-white rounded-md px-4 py-2 mt-4" style="border-radius: 20px; background-color: #479FCB; border-color: transparent"> <img src="{{ url('images/chevron-gauche.png/') }}" style="width:20px;"/> Précédent</button>&nbsp;&nbsp;&nbsp;&nbsp;
            <button type="submit" id="submit-affectation" class="bg-crimson text-white rounded-md px-4 py-2 mt-4" style="border-radius: 20px;">Terminer</button>            
        </div>
    </form>
</main>

<style>
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

    input, select {
        display: block;
        width: 100%;
        margin-top: 5px;
        margin-bottom: 5px;
        border: 1px solid lightgrey;
        border-radius: 5px;
        padding: 10px;
        box-shadow: none;
        background-color: #fff;
    }

    input:focus, select:focus {
        border-color: #ef1212;
        outline: none;
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
        border: 1px #E19F2E;
        border-radius: 50%;
        width: 50px;
        height: 40px;
        text-align: center;
        padding: 10px;
    }

    .active {
        color: white;
        background-color: #E19F2E;
    }

    /* Styles personnalisés pour le menu déroulant Select2 */
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
        const affectationForm = document.getElementById('affectation-form');
        const submitButton = document.getElementById('submit-affectation');

        affectationForm.addEventListener('submit', function(event) {
            event.preventDefault(); // Empêcher la soumission immédiate du formulaire
            let formValid = true;

            // Valider chaque champ requis
            const requiredInputs = affectationForm.querySelectorAll('input[required], select[required]');
            requiredInputs.forEach(input => {
                if (!input.value.trim()) {
                    input.classList.add('border-crimson'); // Mettre en surbrillance les champs invalides
                    formValid = false;
                } else {
                    input.classList.remove('border-crimson'); // Retirer la surbrillance des champs valides
                }

            });

            if (!formValid) {
                // Afficher une alerte d'erreur si la validation échoue
                Swal.fire({
                    title: 'Erreur!',
                    text: 'Veuillez corriger les erreurs dans le formulaire.',
                    icon: 'error',
                    confirmButtonText: 'OK',
                    allowOutsideClick: false,
                    allowEscapeKey: false,
                    customClass: {
                        popup: 'custom-swal-popup',
                        title: 'custom-swal-title',
                        confirmButton: 'custom-swal-confirm'
                    }
                });
                return; // Arrêter l'exécution si le formulaire n'est pas valide
            }

            // Si le formulaire est valide, afficher un message de succès
            Swal.fire({
                title: 'Succès!',
                text: 'L\'affectation a été créée avec succès.',
                icon: 'success',
                confirmButtonText: 'OK',
                allowOutsideClick: false,
                allowEscapeKey: false,
                customClass: {
                    popup: 'custom-swal-popup',
                    title: 'custom-swal-title',
                    confirmButton: 'custom-swal-confirm'
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    affectationForm.submit(); // Soumettre le formulaire après confirmation
                }
            });
        });
    });

    // Initialiser Select2 avec des options personnalisées
    $('#immatriculation, #id_departement').select2({
        placeholder: 'Sélectionner une option',
        allowClear: true,
        width: 'resolve'
    });

    // Gérer la sélection d'un numéro d'immatriculation de véhicule
    $('#immatriculation').on('select2:select', function(e) {
        var immatriculation = e.params.data.id;
        if (immatriculation) {
            fetch(`/vehicules/get-info/${immatriculation}`)
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        $('#marque').val(data.vehicule.marque);
                        $('#modele').val(data.vehicule.modele);
                    } else {
                        $('#marque').val('');
                        $('#modele').val('');
                    }
                })
                .catch(error => console.error('Erreur lors de la récupération des informations du véhicule:', error));
        }
    });

    // Logique de pagination
    const pages = document.querySelectorAll(".page");
    const header = document.querySelector("header");
    const nbPages = pages.length; // Nombre de pages
    let pageActive = 1;

    function afficherPage(pageNum) {
        pages.forEach((page, index) => {
            page.style.display = index === pageNum - 1 ? 'block' : 'none';
        });
    }

    function pageSuivante(button) {
        const currentPage = button.closest('.page');
        const inputs = currentPage.querySelectorAll('input[required], select[required]');
        let allValid = true;

        inputs.forEach(input => {
            input.reportValidity();
            if (!input.checkValidity()) {
                allValid = false;
                input.classList.add('border-crimson');
            } else {
                input.classList.remove('border-crimson');
            }
        });

        if (allValid) {
            pageActive++;
            afficherPage(pageActive);
        } else {
            Swal.fire({
                title: 'Erreur!',
                text: 'Veuillez remplir tous les champs requis avant de passer à la page suivante.',
                icon: 'error',
                confirmButtonText: 'OK',
                allowOutsideClick: false,
                allowEscapeKey: false,
                customClass: {
                    popup: 'custom-swal-popup',
                    title: 'custom-swal-title',
                    confirmButton: 'custom-swal-confirm'
                }
            });
        }
    }

    function pagePrecedente() {
        if (pageActive > 1) {
            pageActive--;
            afficherPage(pageActive);
        }
    }

    afficherPage(pageActive);

    document.querySelectorAll(".next").forEach(button => {
        button.addEventListener("click", function () {
            pageSuivante(button);
        });
    });

    document.querySelectorAll(".prev").forEach(button => {
        button.addEventListener("click", pagePrecedente);
    });
</script>
@endsection
