@extends('admin.layout.app')
@section('mini title', 'Modifier Un Medecin')
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
    <form action="{{route('medecins.update', $medecin->id)}}" method="post">
        @csrf
        @method('put')
        <div class="mb-6">
            <label for="code" class="block mb-2 text-sm font-medium text-gray-900">Code</label>
            <input type="text" id="code" name="code" value="{{$medecin->code}}"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                placeholder="Entrez le code du medecin" required />
        </div>
        <div class="grid gap-6 mb-6 md:grid-cols-2">
            <div>
                <label for="nom" class="block mb-2 text-sm font-medium text-gray-900">Nom</label>
                <input type="text" id="nom" name="nom" value="{{$medecin->nom}}"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                    placeholder="Entrez votre nom" required />
            </div>
            <div>
                <label for="prenom" class="block mb-2 text-sm font-medium text-gray-900">Prénom</label>
                <input type="text" id="prenom" name="prenom" value="{{$medecin->prenom}}"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                    placeholder="Entrez votre prénom" required />
            </div>

            <div>
                <label for="telephone" class="block mb-2 text-sm font-medium text-gray-900">Téléphone</label>
                <input type="tel" id="telephone" name="telephone" value="{{$medecin->telephone}}"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                    placeholder="Entrez votre numéro de téléphone" pattern="0[567][0-9]{8}" required />
            </div>
            <div>
                <label for="service" class="block mb-2 text-sm font-medium text-gray-900">service</label>
                <select id="service" name="service_id"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                    <option disabled selected>-- Sélectionnez un service --</option>
                    @foreach (\App\Models\Service::all() as $service)
                        <option value="{{$service->id}}" @if ($medecin->service->id == $service->id) selected @endif>
                            {{$service->service}}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="mb-6">
            <label for="jour" class="block mb-2 text-sm font-medium text-gray-900">Jours</label>
            <div class="grid grid-cols-6 border rounded-lg border-gray-300">
                <div class="flex items-center ps-4 rounded-sm ">
                    <input id="Lundi" type="checkbox" value="Lundi" name="jour[]" @if(in_array('Lundi', $medecin->jours->map(fn ($jour) => $jour->jour)->toArray())) checked @endif
                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500   focus:ring-2  ">
                    <label for="Lundi" class="w-full py-4 ms-2 text-sm font-medium text-gray-900 ">Lundi</label>
                </div>
                <div class="flex items-center ps-4 rounded-sm ">
                    <input id="Mardi" type="checkbox" value="Mardi" name="jour[]" @if(in_array('Mardi', $medecin->jours->map(fn ($jour) => $jour->jour)->toArray())) checked @endif
                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500   focus:ring-2  ">
                    <label for="Mardi" class="w-full py-4 ms-2 text-sm font-medium text-gray-900 ">Mardi</label>
                </div>
                <div class="flex items-center ps-4 rounded-sm ">
                    <input id="Mercredi" type="checkbox" value="Mercredi" name="jour[]" @if(in_array('Mercredi', $medecin->jours->map(fn ($jour) => $jour->jour)->toArray())) checked @endif
                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500   focus:ring-2  ">
                    <label for="Mercredi" class="w-full py-4 ms-2 text-sm font-medium text-gray-900 ">Mercredi</label>
                </div>
                <div class="flex items-center ps-4 rounded-sm ">
                    <input id="Jeudi" type="checkbox" value="Jeudi" name="jour[]" @if(in_array('Jeudi', $medecin->jours->map(fn ($jour) => $jour->jour)->toArray())) checked @endif
                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500   focus:ring-2  ">
                    <label for="Jeudi" class="w-full py-4 ms-2 text-sm font-medium text-gray-900 ">Jeudi</label>
                </div>
                <div class="flex items-center ps-4 rounded-sm ">
                    <input id="Vendredi" type="checkbox" value="Vendredi" name="jour[]" @if(in_array('Vendredi', $medecin->jours->map(fn ($jour) => $jour->jour)->toArray())) checked @endif
                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500   focus:ring-2  ">
                    <label for="Vendredi" class="w-full py-4 ms-2 text-sm font-medium text-gray-900 ">Vendredi</label>
                </div>
                <div class="flex items-center ps-4 rounded-sm ">
                    <input id="Samedi" type="checkbox" value="Samedi" name="jour[]" @if(in_array('Samedi', $medecin->jours->map(fn ($jour) => $jour->jour)->toArray())) checked @endif
                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500   focus:ring-2  ">
                    <label for="Samedi" class="w-full py-4 ms-2 text-sm font-medium text-gray-900 ">Samedi</label>
                </div>
            </div>
        </div>
        <div class="mb-6">
            <label for="email" class="block mb-2 text-sm font-medium text-gray-900">Email address</label>
            <input type="email" id="email" name="email" value="{{$medecin->email}}"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                placeholder="Entrez votre adresse e-mail" required />
        </div>
        <div class="mb-6">
            <div class="border border-gray-300 rounded-lg px-4 flex items-center">
                <input id="togglePasswordFields" type="checkbox" value="togglePasswordFields" 
                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 focus:ring-2  ">
                <label for="togglePasswordFields" class="w-full py-4 ms-2 text-sm font-medium text-gray-900 ">Modifier le mot de passe</label>
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
            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Submit</button>
        <a href="{{route('medecins.index')}}"
            class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center inline-block text-center">
            Annuler
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