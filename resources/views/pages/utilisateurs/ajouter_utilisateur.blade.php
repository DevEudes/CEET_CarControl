@extends('dashboard')
@section('dashboard_container')
<head>
    <!-- SweetAlert CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <!-- SweetAlert JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
    <main>
        <form method="POST" action="{{ route('utilisateurs.store') }}" class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg border border-crimson focus:border-crimson focus:ring-crimson" style="background-color: #f9f7ed; box-shadow: 0px 10px 20px rgba(0, 0, 0, 0.2), 0px 6px 6px rgba(0, 0, 0, 0.23); margin: 1em 350px 15px 190px; padding: 5px 50px 10px 50px; border-radius: 20px;">
            <h2 style="text-align: center; padding-bottom:40px; text-decoration: underline crimson;">Création d'un utilisateur</h2>
            @csrf
            <div class="page" id="page1">
                <h3 style="text-align:center;">Informations Personnelle</h3>
                <div class="mt-4">
                    <x-input-label for="nom" :value="__('Nom')" />
                    <x-text-input id="nom" placeholder="nom" class="block mt-1 w-full bg-merino text-gray-900 border border-crimson rounded-md focus:border-crimson focus:ring-crimson" type="text" name="nom" :value="old('nom')" required autocomplete="nom" />
                    <x-input-error :messages="$errors->get('nom')" class="mt-2" />
                </div>
                <div class="mt-4">
                    <x-input-label for="prenom" :value="__('Prénom')" />
                    <x-text-input id="prenom" placeholder="prénom" class="block mt-1 w-full bg-merino text-gray-900 border border-crimson rounded-md focus:border-crimson focus:ring-crimson" type="text" name="prenom" :value="old('prenom')" required autocomplete="prenom" />
                    <x-input-error :messages="$errors->get('prénom')" class="mt-2" />
                </div>
                <div class="mt-4">
                    <x-input-label for="email" :value="__('Téléphone')" />
                    <x-text-input id="contact"  placeholder="téléphone" class="block mt-1 w-full bg-merino text-gray-900 border border-crimson rounded-md focus:border-crimson focus:ring-crimson" type="text" name="contact" :value="old('contact')" required autocomplete="contact" />
                    <x-input-error :messages="$errors->get('contact')" class="mt-2" />
                </div>
                <div class="mt-4">
                    <x-input-label for="email" :value="__('Email')" />
                    <x-text-input id="email" placeholder="email" class="block mt-1 w-full bg-merino text-gray-900 border border-crimson rounded-md focus:border-crimson focus:ring-crimson" type="email" name="email" :value="old('email')" required autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>
                <button class="next bg-crimson text-white rounded-md px-4 py-2 mt-4"style="border-radius: 20px; background-color: #E19F2E;">Suivant</button>
            </div>
            <div class="page" id="page2">
                <h3 style="text-align:center;">Sécurité</h3>
                <div class="mt-4">
                    <x-input-label for="matricule" :value="__('Matricule')" />
                    <x-text-input id="matricule" placeholder="matricule" class="block mt-1 w-full bg-merino text-gray-900 border border-crimson rounded-md focus:border-crimson focus:ring-crimson" type="text" name="matricule" :value="old('matricule')" required autofocus autocomplete="matricule" />
                    <x-input-error :messages="$errors->get('matricule')" class="mt-2" />
                </div>
                <div class="mt-4">
                    <x-input-label for="password" :value="__('Mot de passe')" />
                    <x-text-input id="password" placeholder="mot de passe" class="block mt-1 w-full bg-merino text-gray-900 border border-crimson rounded-md focus:border-crimson focus:ring-crimson" type="password" name="password" required autocomplete="new-password" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>
                <div class="mt-4">
                    <x-input-label for="password_confirmation" :value="__('Confirmer le mot de passe')" />
                    <x-text-input id="password_confirmation" placeholder="confirmation de mot de passe" class="block mt-1 w-full bg-merino text-gray-900 border border-crimson rounded-md focus:border-crimson focus:ring-crimson" type="password" name="password_confirmation" required autocomplete="new-password" />
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                </div>
                <button class="prev bg-gray-500 text-white rounded-md px-4 py-2 mt-4" style="border-radius: 20px; background-color: #E19F2E;">Précédent</button>&nbsp;&nbsp;&nbsp;&nbsp;
                <button class="next bg-crimson text-white rounded-md px-4 py-2 mt-4" style="border-radius: 20px; background-color: #E19F2E;">Suivant</button>
            </div>
            <div class="page" id="page3">
                <h3 style="text-align:center;">Rôle et Profil</h3>
                <div class="mt-4">
                    <x-input-label for="id_departement" :value="__('Département')" />
                    <select id="id_departement" name="id_departement" class="block mt-1 w-full bg-merino text-gray-900 border border-crimson rounded-md focus:border-crimson focus:ring-crimson" required>
                        <option value="" class="bg-merino text-gray-500">{{ __('Sélectionner le département de l\'utilisateur') }}</option>
                        @foreach ($departements as $departement)
                            <option value="{{ $departement->id }}" class="bg-merino text-gray-900">{{ $departement->nom }}</option>
                        @endforeach
                    </select>
                    <x-input-error :messages="$errors->get('id_departement')" class="mt-2" />
                </div>
                <div class="mt-4">
                    <x-input-label for="id_profil" :value="__('Profil')" />
                    <select id="id_profil" name="id_profil" class="block mt-1 w-full bg-merino text-gray-900 border border-crimson rounded-md focus:border-crimson focus:ring-crimson" required>
                        <option value="" class="bg-merino text-gray-500">{{ __('Sélectionner le profil de l\'utilisateur') }}</option>
                        @foreach ($profils as $profil)
                            <option value="{{ $profil->id }}" class="bg-merino text-gray-900">{{ $profil->nom}}</option>
                        @endforeach
                    </select>
                    <x-input-error :messages="$errors->get('id_profil')" class="mt-2" />
                </div>
                <div class="mt-4">
                    <x-input-label for="role" :value="__('Rôle')" />
                    <select id="role" name="role" class="block mt-1 w-full bg-merino text-gray-900 border border-crimson rounded-md focus:border-crimson focus:ring-crimson" required>
                        <option value="" class="bg-merino text-gray-500">{{ __('Sélectionner le rôle de l\'utilisateur') }}</option>
                        <option value="admin">{{ __('Admin') }}</option>
                        <option value="chef_service">{{ __('Chef Service') }}</option>
                        <option value="exploitant">{{ __('Exploitant') }}</option>
                        <option value="controleur">{{ __('Contrôleur') }}</option>
                        <option value="mecanicien">{{ __('Mécanicien') }}</option>
                        <option value="magasinier">{{ __('Magasinier') }}</option>
                        <option value="pompiste">{{ __('Pompiste') }}</option>
                    </select>
                    <x-input-error :messages="$errors->get('role')" class="mt-2" />
                </div>
                <button class="prev bg-gray-500 text-white rounded-md px-4 py-2 mt-4" style="border-radius: 20px; background-color: #E19F2E;">Précédent</button>&nbsp;&nbsp;&nbsp;&nbsp;
                <button type="submit" class="bg-crimson text-white rounded-md px-4 py-2 mt-4" style="border-radius: 20px;">Terminer</button>
            </div>
        </form>
        <header>
        </header>
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

        input, select {
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
            margin: 10px 600px 10px 400px ;
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
    </style>

    <script>
        // On va chercher les différents éléments de notre page
        const pages = document.querySelectorAll(".page")
        const header = document.querySelector("header")
        const nbPages = pages.length // Nombre de pages du formulaire
        let pageActive = 1

        // On attend le chargement de la page
        window.onload = () => {
            // On affiche la 1ère page du formulaire
            document.querySelector(".page").style.display = "initial"

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
        function pageSuivante() {
            // On masque toutes les pages
            pages.forEach(page => page.style.display = "none");

            // On affiche la page suivante
            this.parentElement.nextElementSibling.style.display = "initial";

            // On "désactive" la page active actuelle
            document.querySelector(".page-num.active").classList.remove("active");

            // On incrémente pageActive
            pageActive++;

            // On "active" le nouveau numéro
            document.querySelector("#num" + pageActive).classList.add("active");
        }

        function pagePrecedente() {
            // On masque toutes les pages
            pages.forEach(page => page.style.display = "none");

            // On affiche la page précédente
            this.parentElement.previousElementSibling.style.display = "initial";

            // On "désactive" la page active actuelle
            document.querySelector(".page-num.active").classList.remove("active");

            // On décrémente pageActive
            pageActive--;

            // On "active" le nouveau numéro
            document.querySelector("#num" + pageActive).classList.add("active");
        }
        // Ajout des événements aux boutons
        document.querySelectorAll(".next").forEach(button => {
            button.addEventListener("click", pageSuivante);
        });

        document.querySelectorAll(".prev").forEach(button => {
            button.addEventListener("click", pagePrecedente);
        });

         // SweetAlert pour la confirmation de la création de l'utilisateur
    @if(session('success'))
        Swal.fire({
            title: 'Succès!',
            text: '{{ session('success') }}',
            icon: 'success',
            confirmButtonText: 'OK'
        });
    @endif
    </script>
</body>
</html>

@endsection