<div id="default-modal" tabindex="-1" aria-hidden="true"
    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-2xl max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow-sm">
            <!-- Modal body -->
            <div class="p-4 md:p-5 space-y-4">
                <div class="p-6">
                    <h3 class="text-lg font-medium text-gray-900 mb-4">Planifier un nouveau rendez-vous</h3>
                    <form action="{{ route('reception-view.store') }}" method="POST">
                        @csrf
                        <div class="grid gap-6 mb-6 md:grid-cols-2">
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

                            <div>
                                <label for="telephone"
                                    class="block mb-2 text-sm font-medium text-gray-900">Téléphone</label>
                                <input type="tel" id="telephone" name="telephone"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                    placeholder="Entrez votre numéro de téléphone" pattern="0[567][0-9]{8}" required />
                            </div>
                            <div>
                                <label for="date_naissance" class="block mb-2 text-sm font-medium text-gray-900">date de
                                    naissance</label>
                                <input type="date" id="date_naissance" name="date_naissance"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                    required />
                            </div>
                            <div>
                                <label for="adresse"
                                    class="block mb-2 text-sm font-medium text-gray-900">adresse</label>
                                <input type="text" id="adresse" name="adresse"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                    placeholder="Entrez votre numéro de téléphone" required />
                            </div>
                            <div>
                                <label for="ville" class="block mb-2 text-sm font-medium text-gray-900">ville</label>
                                <select id="ville" name="ville"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                                    <option selected>Choisir la ville</option>
                                    @foreach (\App\Http\Controllers\PatientController::$villes as $ville)
                                        <option value="{{$ville}}">{{$ville}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div>
                                <label for="coverture_sante_id"
                                    class="block mb-2 text-sm font-medium text-gray-900">Couverture santé</label>
                                <select id="coverture_sante_id" name="coverture_sante_id"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                                    <option selected>Choisir la Coverture</option>
                                    @foreach (\App\Models\CovertureSante::all() as $coverture)
                                        <option value="{{$coverture->id}}">{{$coverture->coverture}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div>
                                <label for="identifiant"
                                    class="block mb-2 text-sm font-medium text-gray-900">identifiant</label>
                                <input type="text" id="identifiant" name="identifiant"
                                    class="disabled:bg-gray-200 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                    placeholder="Entrez l'identifiant " />
                            </div>
                        </div>
                        <div class="grid grid-cols-1 gap-4 mb-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Service</label>
                                <select id="service_id" name="service_id"
                                    class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-teal-500 focus:border-teal-500 sm:text-sm rounded-md">
                                    <option value="">Toutes les spécialités</option>
                                    @foreach(\App\Models\Service::orderBy('service')->get() as $service)
                                        <option value="{{ $service->id }}">{{ $service->service }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Docteur</label>
                                <select name="user_id" required
                                    class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-teal-500 focus:border-teal-500 sm:text-sm rounded-md">
                                    <option value="">Sélectionner un médecin</option>
                                    @foreach(\App\Models\User::where('role_id', '=', 3)->get() as $medecin)
                                        <option value="{{ $medecin->id }}" data-service="{{ $medecin->service_id }}">
                                            Dr.{{ $medecin->nom }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Date</label>
                                <input type="date" name="date_appointment" required min="{{ date('Y-m-d') }}"
                                    class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-teal-500 focus:border-teal-500 sm:text-sm rounded-md">
                            </div>
                            <div>
                                <input type="checkbox" name="controle"> suivi
                            </div>
                        </div>

                        <div class="flex justify-end">
                            <button type="button" data-modal-hide="default-modal"
                                class="bg-white py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-teal-500 mr-3">
                               Annuler
                            </button>
                            <button type="submit"
                                class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-teal-600 hover:bg-teal-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-teal-500">
                                Planifier un rendez-vous
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>