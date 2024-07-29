<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="block mt-1 w-full bg-merino text-gray-900 border border-crimson rounded-md focus:border-crimson focus:ring-crimson" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" placeholder="Entrer votre email" class="block mt-1 w-full bg-merino text-gray-900 border border-crimson rounded-md focus:border-crimson focus:ring-crimson" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Mot de passe')" />
            <x-text-input id="password" placeholder="Entrer mot de passe" class="block mt-1 w-full bg-merino text-gray-900 border border-crimson rounded-md focus:border-crimson focus:ring-crimson" type="password" name="password" required autocomplete="current-password" />
        </div>

        <!-- Error Messages -->
        @if ($errors->has('authentication'))
            <div class="mt-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                <strong class="font-bold">Whoops!</strong>
                <span class="block sm:inline">{{ $errors->first('authentication') }}</span>
            </div>
        @endif

        <div class="flex items-center justify-end mt-4">
            <!-- @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-crimson" href="{{ route('password.request') }}">
                    {{ __('Mot de passe oublié ?') }}
                </a>
            @endif -->

            <button type="submit" class="ms-3 px-4 py-2 bg-crimson text-white rounded-md hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-crimson focus:ring-offset-2">
                {{ __('Connexion') }}
            </button>
        </div>
    </form>

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
