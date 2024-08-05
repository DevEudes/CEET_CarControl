@extends('dashboard')
@section('dashboard_container')
<head>
    <!-- SweetAlert CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <!-- SweetAlert JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Include Select2 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <!-- Include jQuery and Select2 JS -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
</head>

<body>
    <main>
        <form id="edit-user-form" action="{{ route('utilisateurs.update', $user->id) }}" method="POST" class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg border border-crimson focus:border-crimson focus:ring-crimson" style="background-color: #f9f7ed; box-shadow: 0px 10px 20px rgba(0, 0, 0, 0.2), 0px 6px 6px rgba(0, 0, 0, 0.23); margin: 1em 350px 15px 190px; padding: 5px 50px 10px 50px; border-radius: 20px;">
            @csrf
            @method('PUT')
            <h2 class="header-text" style="font-size: 1.9rem; color: #ef1212; text-align:center;">
                Modifier Utilisateur
            </h2>
            <div class="page" id="page1">
                <h3 style="text-align:center;">Informations Utilisateur</h3>
                <div class="mt-4">
                    <x-input-label for="matricule" :value="__('Matricule')" />
                    <x-text-input id="matricule" placeholder="matricule" class="block mt-1 w-full bg-merino text-gray-900 border border-crimson rounded-md focus:border-crimson focus:ring-crimson" type="text" name="matricule" :value="old('matricule', $user->matricule)" required autocomplete="matricule" />
                    <x-input-error :messages="$errors->get('matricule')" class="mt-2" />
                </div>
                <div class="mt-4">
                    <x-input-label for="nom" :value="__('Nom')" />
                    <x-text-input id="nom" placeholder="nom" class="block mt-1 w-full bg-merino text-gray-900 border border-crimson rounded-md focus:border-crimson focus:ring-crimson" type="text" name="nom" :value="old('nom', $user->nom)" required autocomplete="nom" />
                    <x-input-error :messages="$errors->get('nom')" class="mt-2" />
                </div>
                <div class="mt-4">
                    <x-input-label for="prenom" :value="__('Prénom')" />
                    <x-text-input id="prenom" placeholder="prénom" class="block mt-1 w-full bg-merino text-gray-900 border border-crimson rounded-md focus:border-crimson focus:ring-crimson" type="text" name="prenom" :value="old('prenom', $user->prenom)" required autocomplete="prenom" />
                    <x-input-error :messages="$errors->get('prenom')" class="mt-2" />
                </div>
                <button type="button" class="next bg-crimson text-white rounded-md px-4 py-2 mt-4" style="border-radius: 20px; background-color: #5AC85A; border-color: transparent">Suivant <img src="{{ url('images/chevron-droit.png/') }}" style="width:20px;"/></button>
            </div>
            <div class="page" id="page2">
                <h3 style="text-align:center;">Contact et Département</h3>
                <div class="mt-4">
                    <x-input-label for="contact" :value="__('Contact')" />
                    <x-text-input id="contact" placeholder="contact" class="block mt-1 w-full bg-merino text-gray-900 border border-crimson rounded-md focus:border-crimson focus:ring-crimson" type="text" name="contact" :value="old('contact', $user->contact)" required autocomplete="contact" />
                    <x-input-error :messages="$errors->get('contact')" class="mt-2" />
                </div>
                <div class="mt-4">
                    <x-input-label for="email" :value="__('Email')" />
                    <x-text-input id="email" placeholder="email" class="block mt-1 w-full bg-merino text-gray-900 border border-crimson rounded-md focus:border-crimson focus:ring-crimson" type="email" name="email" :value="old('email', $user->email)" required autocomplete="email" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>
                <div class="mt-4">
                    <x-input-label for="id_departement" :value="__('Département')" />
                    <select id="id_departement" name="id_departement" class="select2 block mt-1 w-full bg-merino text-gray-900 border border-crimson rounded-md focus:border-crimson focus:ring-crimson" required>
                        @foreach($departements as $departement)
                        <option value="{{ $departement->id }}" {{ $user->id_departement == $departement->id ? 'selected' : '' }}>{{ $departement->nom }}</option>
                        @endforeach
                    </select>
                    <x-input-error :messages="$errors->get('id_departement')" class="mt-2" />
                </div>
                <button type="button" class="prev bg-gray-500 text-white rounded-md px-4 py-2 mt-4" style="border-radius: 20px; background-color: #479FCB; border-color: transparent"> <img src="{{ url('images/chevron-gauche.png/') }}" style="width:20px;"/> Précédent</button>&nbsp;&nbsp;&nbsp;&nbsp;
                <button type="button" class="next bg-crimson text-white rounded-md px-4 py-2 mt-4" style="border-radius: 20px; background-color: #5AC85A; border-color: transparent">Suivant <img src="{{ url('images/chevron-droit.png/') }}" style="width:20px;"/></button>
            </div>
            <div class="page" id="page3">
                <h3 style="text-align:center;">Rôle et Profil</h3>
                <div class="mt-4">
                    <x-input-label for="id_profil" :value="__('Profil')" />
                    <select id="id_profil" name="id_profil" class="select2 block mt-1 w-full bg-merino text-gray-900 border border-crimson rounded-md focus:border-crimson focus:ring-crimson" required>
                        @foreach($profils as $profil)
                        <option value="{{ $profil->id }}" {{ $user->id_profil == $profil->id ? 'selected' : '' }}>{{ $profil->nom }}</option>
                        @endforeach
                    </select>
                    <x-input-error :messages="$errors->get('id_profil')" class="mt-2" />
                </div>
                <div class="mt-4">
                    <x-input-label for="role" :value="__('Rôle')" />
                    <select id="role" name="role" class="select2 block mt-1 w-full bg-merino text-gray-900 border border-crimson rounded-md focus:border-crimson focus:ring-crimson" required>
                        @foreach($roles as $role)
                        <option value="{{ $role->name }}" {{ $user->roles->contains('name', $role->name) ? 'selected' : '' }}>{{ $role->name }}</option>
                        @endforeach
                    </select>
                    <x-input-error :messages="$errors->get('role')" class="mt-2" />
                </div>
                
                <button type="button" class="prev bg-gray-500 text-white rounded-md px-4 py-2 mt-4" style="border-radius: 20px; background-color: #479FCB; border-color: transparent">
                    <img src="{{ url('images/chevron-gauche.png/') }}" style="width:20px;"/> Précédent
                </button>
                &nbsp;&nbsp;&nbsp;&nbsp;
                <button type="submit" class="bg-crimson text-white rounded-md px-4 py-2 mt-4" style="border-radius: 20px; border-color: transparent;">Enregistrer les modifications</button>
            </div>
        </form>
    </main>

    <style>
        .bg-crimson {
            background-color: #ef1212;
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

        .select2-container--default .select2-selection--single {
            height: 38px;
            width: 100% !important;
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
    // Initialisation de la page après que tout le contenu est chargé
    document.addEventListener('DOMContentLoaded', function() {
        // Initialiser Select2 avec des options personnalisées
        $('#id_departement, #id_profil, #role').select2({
            placeholder: 'Sélectionner une option',
            allowClear: true,
            width: '100%' // Assurez-vous que les sélecteurs ont une largeur uniforme
        });

        // Récupération du formulaire d'édition de l'utilisateur
        const editUserForm = document.getElementById('edit-user-form');

        // Écouteur d'événement pour la soumission du formulaire
        editUserForm.addEventListener('submit', function(event) {
            let formValid = true;

            // Validation de chaque champ requis
            const requiredInputs = editUserForm.querySelectorAll('input[required], select[required]');
            requiredInputs.forEach(input => {
                if (!input.value.trim()) {
                    input.classList.add('border-crimson'); // Mettre en surbrillance les champs invalides
                    formValid = false;
                } else {
                    input.classList.remove('border-crimson'); // Retirer la surbrillance des champs valides
                }

                // Validation spécifique pour les emails
                if (input.type === 'email' && !validateEmail(input.value)) {
                    input.classList.add('border-crimson');
                    formValid = false;
                }
            });

            // Afficher un message d'erreur si la validation échoue
            if (!formValid) {
                event.preventDefault(); // Empêcher la soumission du formulaire si une validation échoue
                Swal.fire({
                    title: 'Erreur!',
                    text: 'Veuillez corriger les erreurs dans le formulaire.',
                    icon: 'error',
                    confirmButtonText: 'OK',
                    allowOutsideClick: false, // Empêcher la fermeture en cliquant à l'extérieur
                    allowEscapeKey: false, // Empêcher la fermeture avec la touche Échap
                    stopKeydownPropagation: false, // Empêcher la propagation de la touche qui pourrait fermer le pop-up
                    customClass: {
                        popup: 'custom-swal-popup',
                        title: 'custom-swal-title',
                        confirmButton: 'custom-swal-confirm'
                    }
                });
            } else {
                event.preventDefault(); // Empêcher la soumission immédiate pour afficher le pop-up
                Swal.fire({
                    title: 'Succès!',
                    text: 'Les modifications ont été enregistrées avec succès.',
                    icon: 'success',
                    confirmButtonText: 'OK',
                    allowOutsideClick: false, // Empêcher la fermeture en cliquant à l'extérieur
                    allowEscapeKey: false, // Empêcher la fermeture avec la touche Échap
                    stopKeydownPropagation: false, // Empêcher la propagation de la touche qui pourrait fermer le pop-up
                    customClass: {
                        popup: 'custom-swal-popup',
                        title: 'custom-swal-title',
                        confirmButton: 'custom-swal-confirm'
                    }
                }).then((result) => {
                    if (result.isConfirmed) {
                        editUserForm.submit(); // Soumettre le formulaire après confirmation
                    }
                });
            }
        });

        // Fonction de validation des emails
        function validateEmail(email) {
            const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            return re.test(email);
        }

        // Logic de pagination pour le formulaire
        const pages = document.querySelectorAll(".page");
        let pageActive = 1; // Index de la page active actuelle

        // Afficher la première page au chargement
        afficherPage(pageActive);

        // Initialiser l'affichage de la première page
        function afficherPage(pageNum) {
            pages.forEach((page, index) => {
                page.style.display = index === pageNum - 1 ? 'block' : 'none';
            });
        }

        /**
         * Fonction pour avancer d'une page dans le formulaire
         */
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

        /**
         * Fonction pour revenir à la page précédente dans le formulaire
         */
        function pagePrecedente() {
            if (pageActive > 1) {
                pageActive--;
                afficherPage(pageActive);
            }
        }

        // Ajout des événements aux boutons "Suivant" et "Précédent"
        document.querySelectorAll(".next").forEach(button => {
            button.addEventListener("click", function () {
                pageSuivante(button);
            });
        });

        document.querySelectorAll(".prev").forEach(button => {
            button.addEventListener("click", pagePrecedente);
        });
    });
</script>

</body>
</html>

@endsection
