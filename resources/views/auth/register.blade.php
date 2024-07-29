<x-guest-layout>
    <div>
        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Matricule -->
            <div class="mt-4">
                <x-input-label for="matricule" :value="__('Matricule')" />
                <x-text-input id="matricule" class="block mt-1 w-full bg-merino text-gray-900 border border-crimson rounded-md focus:border-crimson focus:ring-crimson" type="text" name="matricule" :value="old('matricule')" required autofocus autocomplete="matricule" />
                <x-input-error :messages="$errors->get('matricule')" class="mt-2" />
            </div>

            <!-- Nom -->
            <div class="mt-4">
                <x-input-label for="nom" :value="__('Nom')" />
                <x-text-input id="nom" class="block mt-1 w-full bg-merino text-gray-900 border border-crimson rounded-md focus:border-crimson focus:ring-crimson" type="text" name="nom" :value="old('nom')" required autocomplete="nom" />
                <x-input-error :messages="$errors->get('nom')" class="mt-2" />
            </div>

            <!-- Prénom -->
            <div class="mt-4">
                <x-input-label for="prenom" :value="__('Prénom')" />
                <x-text-input id="prenom" class="block mt-1 w-full bg-merino text-gray-900 border border-crimson rounded-md focus:border-crimson focus:ring-crimson" type="text" name="prenom" :value="old('prenom')" required autocomplete="prenom" />
                <x-input-error :messages="$errors->get('prenom')" class="mt-2" />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" class="block mt-1 w-full bg-merino text-gray-900 border border-crimson rounded-md focus:border-crimson focus:ring-crimson" type="email" name="email" :value="old('email')" required autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-input-label for="password" :value="__('Mot de passe')" />
                <x-text-input id="password" class="block mt-1 w-full bg-merino text-gray-900 border border-crimson rounded-md focus:border-crimson focus:ring-crimson" type="password" name="password" required autocomplete="new-password" />
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-input-label for="password_confirmation" :value="__('Confirmer le mot de passe')" />
                <x-text-input id="password_confirmation" class="block mt-1 w-full bg-merino text-gray-900 border border-crimson rounded-md focus:border-crimson focus:ring-crimson" type="password" name="password_confirmation" required autocomplete="new-password" />
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>

            <!-- Profil -->
            <div class="mt-4">
                <x-input-label for="id_profil" :value="__('Profil')" />
                <select id="id_profil" name="id_profil" class="block mt-1 w-full bg-merino text-gray-900 border border-crimson rounded-md focus:border-crimson focus:ring-crimson" required>
                    <option value="" class="bg-merino text-gray-500">{{ __('Selectionnez votre profil') }}</option>
                    @foreach ($profils as $profil)
                        <option value="{{ $profil->id }}" class="bg-merino text-gray-900">{{ $profil->nom }}</option>
                    @endforeach
                </select>
                <x-input-error :messages="$errors->get('id_profil')" class="mt-2" />
            </div>

            <!-- Role -->
            <div class="mt-4">
                <x-input-label for="role" :value="__('Rôle')" />
                <select id="role" name="role" class="block mt-1 w-full bg-merino text-gray-900 border border-crimson rounded-md focus:border-crimson focus:ring-crimson" required>
                    <option value="" class="bg-merino text-gray-500">{{ __('Selectionnez votre rôle') }}</option>
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

            <div class="flex items-center justify-end mt-4">
                <x-primary-button class="ms-3 px-4 py-2 bg-crimson text-white rounded-md hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-crimson focus:ring-offset-2">
                    {{ __('Enregistrer') }}
                </x-primary-button>
            </div>
        </form>
    </div>
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
    </style>
</x-guest-layout>
