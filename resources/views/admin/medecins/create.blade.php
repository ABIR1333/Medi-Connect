@extends('admin.layout.app')
@section('mini title', 'Ajouter Un Medecin')
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

    <form action="{{route('medecins.store')}}" method="post">
        @csrf
        <div class="mb-6">
            <label for="code" class="block mb-2 text-sm font-medium text-gray-900">Code</label>
                <input type="text" id="code" name="code"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                    placeholder="Entrez le code du medecin" required />
        </div>
        <div class="grid gap-6 mb-6 md:grid-cols-2">
            <div>
                <label for="nom" class="block mb-2 text-sm font-medium text-gray-900">Nom</label>
                <input type="text" id="nom" name="nom"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                    placeholder="Entrez le nom du medecin" required />
            </div>
            <div>
                <label for="prenom" class="block mb-2 text-sm font-medium text-gray-900">Prénom</label>
                <input type="text" id="prenom" name="prenom"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                    placeholder="Entrez le prenom du medecin" required />
            </div>

            <div>
                <label for="telephone" class="block mb-2 text-sm font-medium text-gray-900">Téléphone</label>
                <input type="tel" id="telephone" name="telephone"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                    placeholder="Entrez le numéro de téléphone du medecin" pattern="0[567][0-9]{8}" required />
            </div>
            <div>
                <label for="service_id" class="block mb-2 text-sm font-medium text-gray-900">service</label>
                <select id="service_id" name="service_id"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                    <option selected>Entrez le service </option>
                    @foreach (\App\Models\Service::all() as $service)
                        <option value="{{$service->id}}">{{$service->service}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="mb-6">
            <label for="jour" class="block mb-2 text-sm font-medium text-gray-900">Jours</label>
            <div class="grid grid-cols-6 border rounded-lg border-gray-300">
                <div class="flex items-center ps-4 rounded-sm ">
                    <input id="Lundi" type="checkbox" value="Lundi" name="jours[]"
                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500   focus:ring-2  ">
                    <label for="Lundi"
                        class="w-full py-4 ms-2 text-sm font-medium text-gray-900 ">Lundi</label>
                </div>
                <div class="flex items-center ps-4 rounded-sm ">
                    <input id="Mardi" type="checkbox" value="Mardi" name="jours[]"
                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500   focus:ring-2  ">
                    <label for="Mardi"
                        class="w-full py-4 ms-2 text-sm font-medium text-gray-900 ">Mardi</label>
                </div>
                <div class="flex items-center ps-4 rounded-sm ">
                    <input id="Mercredi" type="checkbox" value="Mercredi" name="jours[]"
                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500   focus:ring-2  ">
                    <label for="Mercredi"
                        class="w-full py-4 ms-2 text-sm font-medium text-gray-900 ">Mercredi</label>
                </div>
                <div class="flex items-center ps-4 rounded-sm ">
                    <input id="Jeudi" type="checkbox" value="Jeudi" name="jours[]"
                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500   focus:ring-2  ">
                    <label for="Jeudi"
                        class="w-full py-4 ms-2 text-sm font-medium text-gray-900 ">Jeudi</label>
                </div>
                <div class="flex items-center ps-4 rounded-sm ">
                    <input id="Vendredi" type="checkbox" value="Vendredi" name="jours[]"
                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500   focus:ring-2  ">
                    <label for="Vendredi"
                        class="w-full py-4 ms-2 text-sm font-medium text-gray-900 ">Vendredi</label>
                </div>
                <div class="flex items-center ps-4 rounded-sm ">
                    <input id="Samedi" type="checkbox" value="Samedi" name="jours[]"
                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500   focus:ring-2  ">
                    <label for="Samedi"
                        class="w-full py-4 ms-2 text-sm font-medium text-gray-900 ">Samedi</label>
                </div>
            </div>
        </div>
        <div class="mb-6">
            <label for="email" class="block mb-2 text-sm font-medium text-gray-900">Email address</label>
            <input type="email" id="email" name="email"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                placeholder="Entrez votre adresse e-mail" required />
        </div>
        <div class="mb-6">
            <label for="password" class="block mb-2 text-sm font-medium text-gray-900">Mot de passe</label>
            <input type="password" id="password" name="password"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                placeholder="•••••••••" />
        </div>
        <div class="mb-6">
            <label for="password_confirmation" class="block mb-2 text-sm font-medium text-gray-900">Confirmez le mot de
                passe</label>
            <input type="password" id="password_confirmation" name="password_confirmation"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                placeholder="•••••••••" />
        </div>
        <button type="submit"
            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Submit</button>
        <a href="{{route('medecins.index')}}">
            <button type="button"
                class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Annuler</button>
        </a>
    </form>

@endsection