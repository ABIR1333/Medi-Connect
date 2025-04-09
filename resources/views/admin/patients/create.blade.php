@extends('admin.layout.app')
@section('mini title', 'Ajouter Un Patient')
@section('content')

    <form action="{{route('patients.store')}}" method="post">
        @csrf
        <div class="grid gap-6 mb-6 md:grid-cols-4">
            <div>
                <label for="cin" class="block mb-2 text-sm font-medium text-gray-900">CIN</label>
                <input type="text" id="cin" name="cin"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                    placeholder="Entrez votre cin" required />
            </div>
            <div>
                <label for="nom" class="block mb-2 text-sm font-medium text-gray-900">Nom</label>
                <input type="text" id="nom" name="nom"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                    placeholder="Entrez votre nom" required />
            </div>
            <div>
                <label for="prenom" class="block mb-2 text-sm font-medium text-gray-900">Prénom</label>
                <input type="text" id="prenom" name="prenom"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                    placeholder="Entrez votre prénom" required />
            </div>
            <div class="justify-center space-x-4">
                <label for="sexe" class="block mb-2 text-sm font-medium text-gray-900">Sexe</label>
                <label class="inline-flex items-center cursor-pointer pt-2">
                    <span class="ms-3 text-sm font-medium text-gray-900 mx-4 pb-1">Femme</span>
                    <input type="checkbox" name="sexe" class="sr-only peer">
                    <div
                        class="relative w-11 h-6 rounded-full peer bg-pink-600  peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all  peer-checked:bg-blue-600 ">
                    </div>
                    <span class="ms-3 text-sm font-medium text-gray-900 pb-1">Homme</span>
                </label>
            </div>
        </div>
        <div class="grid gap-6 mb-6 md:grid-cols-2">
            <div>
                <label for="telephone" class="block mb-2 text-sm font-medium text-gray-900">Téléphone</label>
                <input type="tel" id="telephone" name="telephone"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                    placeholder="Entrez votre numéro de téléphone" pattern="0[567][0-9]{8}" required />
            </div>
            <div>
                <label for="date_naissance" class="block mb-2 text-sm font-medium text-gray-900">date de naissance</label>
                <input type="date" id="date_naissance" name="date_naissance"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                    required />
            </div>
            <div>
                <label for="adresse" class="block mb-2 text-sm font-medium text-gray-900">adresse</label>
                <input type="text" id="adresse" name="adresse"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                    placeholder="Entrez votre numéro de téléphone" required />
            </div>
            <div>
                <label for="ville" class="block mb-2 text-sm font-medium text-gray-900">ville</label>
                <select id="ville" name="ville"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                    <option selected>Choisir la ville</option>
                    @foreach ($villes as $ville)
                        <option value="{{$ville}}">{{$ville}}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label for="coverture_sante_id" class="block mb-2 text-sm font-medium text-gray-900">Coverture sante</label>
                <select id="coverture_sante_id" name="coverture_sante_id"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                    <option selected>Choisir la Coverture</option>
                    @foreach (\App\Models\CovertureSante::all() as $coverture)
                        <option value="{{$coverture->id}}">{{$coverture->coverture}}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label for="identifiant" class="block mb-2 text-sm font-medium text-gray-900">identifiant</label>
                <input type="text" id="identifiant" name="identifiant"
                    class="disabled:bg-gray-200 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                    placeholder="Entrez l'identifiant " />
            </div>
        </div>
        <button type="submit"
            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Submit</button>
        <a href="{{route('patients.index')}}">
            <button type="button"
                class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Annuler</button>
        </a>
    </form>
    @push('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                const select = document.getElementById('coverture_sante_id');
                const identifiantInput = document.getElementById('identifiant');

                function toggleIdentifiant() {
                    const selectedText = select.options[select.selectedIndex].text.trim().toUpperCase();
                    identifiantInput.disabled = selectedText === 'PAYANT';
                }

                select.addEventListener('change', toggleIdentifiant);

                // Trigger on page load in case a value is preselected
                toggleIdentifiant();
            });
        </script>
    @endpush
@endsection