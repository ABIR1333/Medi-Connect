@extends('admin.layout.app')

@section('content')
    @foreach ($errors->all() as $err)
        <p class="text-red-500">{{ $err }}</p>
    @endforeach

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
        <!-- Section de mise à jour du profil -->
        <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
            <div class="max-w-xl">
                <section>
                    <header>
                        <h2 class="text-lg font-medium text-gray-900">
                            {{ __('Informations sur le profil') }}
                        </h2>

                        <p class="mt-1 text-sm text-gray-600">
                            {{ __("Mettez à jour les informations de votre compte et votre adresse e-mail.") }}
                        </p>
                    </header>

                    <form method="POST" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
                        @csrf
                        @method('PATCH')

                        <!-- Nom -->
                        <div>
                            <x-input-label for="nom" :value="__('Nom')" />
                            <x-input id="nom" name="nom" type="text" class="mt-1 block w-full" :value="old('nom', $user->nom)" required autofocus autocomplete="nom" />
                            <x-input-error class="mt-2" :messages="$errors->get('nom')" />
                        </div>

                        <!-- Prénom -->
                        <div>
                            <x-input-label for="prenom" :value="__('Prénom')" />
                            <x-input id="prenom" name="prenom" type="text" class="mt-1 block w-full" :value="old('prenom', $user->prenom)" required autocomplete="prenom" />
                            <x-input-error class="mt-2" :messages="$errors->get('prenom')" />
                        </div>

                        <!-- Email -->
                        <div>
                            <x-input-label for="email" :value="__('Email')" />
                            <x-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email', $user->email)" required autocomplete="username" />
                            <x-input-error class="mt-2" :messages="$errors->get('email')" />
                        </div>

                        <!-- Téléphone -->
                        <div>
                            <x-input-label for="telephone" :value="__('Téléphone')" />
                            <x-input id="telephone" name="telephone" type="text" class="mt-1 block w-full" :value="old('telephone', $user->telephone)" autocomplete="telephone" />
                            <x-input-error class="mt-2" :messages="$errors->get('telephone')" />
                        </div>

                        <!-- Bouton de sauvegarde -->
                        <div class="flex items-center gap-4">
                            <x-button>{{ __('Sauvegarder') }}</x-button>

                            @if (session('status') === 'profile-updated')
                                <p
                                    x-data="{ show: true }"
                                    x-show="show"
                                    x-transition
                                    x-init="setTimeout(() => show = false, 2000)"
                                    class="text-sm text-gray-600"
                                >
                                    {{ __('Enregistré.') }}
                                </p>
                            @endif
                        </div>
                    </form>
                </section>
            </div>
        </div>

        <!-- Section de mise à jour du mot de passe -->
        <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
            <div class="max-w-xl">
                <section>
                    <header>
                        <h2 class="text-lg font-medium text-gray-900">
                            {{ __('Mettre à jour le mot de passe') }}
                        </h2>

                        <p class="mt-1 text-sm text-gray-600">
                            {{ __('Assurez-vous que votre compte utilise un mot de passe long et aléatoire pour rester sécurisé.') }}
                        </p>
                    </header>

                    <form method="POST" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
                        @csrf
                        @method('PATCH')

                        <!-- Mot de passe actuel -->
                        <div>
                            <x-input-label for="current_password" :value="__('Mot de passe actuel')" />
                            <x-input id="current_password" name="current_password" type="password" class="mt-1 block w-full" autocomplete="current-password" />
                            <x-input-error class="mt-2" :messages="$errors->get('current_password')" />
                        </div>

                        <!-- Nouveau mot de passe -->
                        <div>
                            <x-input-label for="password" :value="__('Nouveau mot de passe')" />
                            <x-input id="password" name="password" type="password" class="mt-1 block w-full" autocomplete="new-password" />
                            <x-input-error class="mt-2" :messages="$errors->get('password')" />
                        </div>

                        <!-- Confirmation du mot de passe -->
                        <div>
                            <x-input-label for="password_confirmation" :value="__('Confirmer le mot de passe')" />
                            <x-input id="password_confirmation" name="password_confirmation" type="password" class="mt-1 block w-full" autocomplete="new-password" />
                            <x-input-error class="mt-2" :messages="$errors->get('password_confirmation')" />
                        </div>

                        <!-- Bouton de sauvegarde -->
                        <div class="flex items-center gap-4">
                            <x-button>{{ __('Sauvegarder') }}</x-button>

                            @if (session('status') === 'profile-updated')
                                <p
                                    x-data="{ show: true }"
                                    x-show="show"
                                    x-transition
                                    x-init="setTimeout(() => show = false, 2000)"
                                    class="text-sm text-gray-600"
                                >
                                    {{ __('Enregistré.') }}
                                </p>
                            @endif
                        </div>
                    </form>
                </section>
            </div>
        </div>
    </div>
@endsection
