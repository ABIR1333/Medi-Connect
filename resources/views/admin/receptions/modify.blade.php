@extends('admin.layout.app')
@section('mini title', ' Modifier la secrétaire médical(e)')
@section('content')
    @if ($errors->any())
        <div class="bg-red-200 p-4 rounded">
            <ul>
                @foreach ($errors->all() as $error)
                    <li class="text-red-800">{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{route('receptions.update', $reception->id)}}" method="post">
        @csrf
        @method('put')
        <div class="grid gap-6 mb-6 md:grid-cols-2">
            <div>
                <label for="nom" class="block mb-2 text-sm font-medium text-gray-900">Nom</label>
                <input type="text" id="nom" name="nom" value="{{$reception->nom}}"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                    placeholder="Entrez votre nom" required />
            </div>
            <div>
                <label for="prenom" class="block mb-2 text-sm font-medium text-gray-900">Prénom</label>
                <input type="text" id="prenom" name="prenom" value="{{$reception->prenom}}"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                    placeholder="Entrez votre prénom" required />
            </div>

            <div>
                <label for="telephone" class="block mb-2 text-sm font-medium text-gray-900">Téléphone</label>
                <input type="tel" id="telephone" name="telephone" value="{{$reception->telephone}}"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                    placeholder="Entrez votre numéro de téléphone" pattern="0[567][0-9]{8}" required />
            </div>
            <div>
                <label for="email" class="block mb-2 text-sm font-medium text-gray-900">Email address</label>
                <input type="email" id="email" name="email" value="{{$reception->email}}"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                    placeholder="Entrez votre adresse e-mail" required />
            </div>
        </div>
        <div class="mb-6">
            <div class="border border-gray-300 rounded-lg px-4 flex items-center">
                <input id="togglePasswordFields" type="checkbox" value="togglePasswordFields"
                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 focus:ring-2  ">
                <label for="togglePasswordFields" class="w-full py-4 ms-2 text-sm font-medium text-gray-900 ">Modifier le
                    mot de passe</label>
            </div>
        </div>
        <div class="mb-6">
            <label for="password" class="block mb-2 text-sm font-medium text-gray-900">Mot de passe</label>
            <input type="password" id="password" name="password" disabled
                class="disabled:bg-gray-200 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                placeholder="•••••••••" required />
        </div>
        <div class="mb-6">
            <label for="password_confirmation" class="block mb-2 text-sm font-medium text-gray-900">Confirmez votre mot de
                passe</label>
            <input type="password" id="password_confirmation" name="password_confirmation" disabled
                class="disabled:bg-gray-200 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                placeholder="•••••••••" required />
        </div>
        <button type="submit"
            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Enregistrer</button>
        <a href="{{route('receptions.index')}}">
            <button type="button"
                class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Annuler</button>
        </a>
    </form>
    @push('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                const togglePasswordFields = document.getElementById('togglePasswordFields');
                const passwordField = document.getElementById('password');
                const passwordConfirmationField = document.getElementById('password_confirmation');

                passwordField.disabled = true;
                passwordConfirmationField.disabled = true;

                togglePasswordFields.addEventListener('change', function () {
                    const isChecked = this.checked;
                    passwordField.disabled = !isChecked;
                    passwordConfirmationField.disabled = !isChecked;
                });
            });
        </script>
    @endpush
@endsection