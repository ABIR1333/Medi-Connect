<div class="grid grid-cols-1 md:grid-cols-3 gap-6">
    <div class="bg-white overflow-hidden shadow-sm rounded-lg">
        <div class="p-6 bg-gradient-to-r from-teal-500 to-teal-600 text-white">
            <div class="flex items-center justify-between">
                <div>
                    <h3 class="text-lg font-semibold">Les rendez-vous d'aujourd'hui</h3>
                    <p class="text-3xl font-bold mt-2">
                        {{ \App\Models\Appointment::whereDate('date_appointment', '=', today())->count() }}
                    </p>
                </div>
                <div class="bg-white bg-opacity-30 p-3 rounded-full">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                </div>
            </div>
        </div>
    </div>

    <div class="bg-white overflow-hidden shadow-sm rounded-lg">
        <div class="p-6 bg-gradient-to-r from-blue-500 to-blue-600 text-white">
            <div class="flex items-center justify-between">
                <div>
                    <h3 class="text-lg font-semibold">Rendez-vous de cette semaine</h3>
                    <p class="text-3xl font-bold mt-2">
                        {{ \App\Models\Appointment::whereBetween('date_appointment', [now()->startOfWeek(), now()->endOfWeek()])->count() }}
                    </p>
                </div>
                <div class="bg-white bg-opacity-30 p-3 rounded-full">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                    </svg>
                </div>
            </div>
        </div>
    </div>

    <div class="bg-white overflow-hidden shadow-sm rounded-lg">
        <div class="p-6 bg-gradient-to-r from-purple-500 to-purple-600 text-white">
            <div class="flex items-center justify-between">
                <div>
                    <h3 class="text-lg font-semibold">Médecins disponibles</h3>
                    <p class="text-3xl font-bold mt-2">{{ \App\Models\User::where('role_id', 3)->count() }}</p>
                </div>
                <div class="bg-white bg-opacity-30 p-3 rounded-full">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                    </svg>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="mt-8 grid grid-cols-1 lg:grid-cols-2 gap-6">
    <div class="bg-white overflow-hidden shadow-sm rounded-lg">
        <div class="p-6">
            <div class="flex justify-between items-center mb-4">
                <h3 class="text-xl font-extrabold bg-gradient-to-r from-indigo-500 to-purple-600 bg-clip-text text-transparent">Liste des rendez-vous</h3>

                <button type="button" data-modal-target="default-modal" data-modal-toggle="default-modal"
                    class="inline-flex items-center px-4 py-2 bg-teal-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-teal-700 focus:outline-none focus:ring-2 focus:ring-teal-500 focus:ring-offset-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                    </svg>
                    Nouvelle rendez-vous
                </button>
            </div>

            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            {{-- <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Time</th> --}}
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Patient</th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Docteur</th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Status</th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach(\App\Models\Appointment::with(['patient', 'user'])->whereDate('date_appointment', '=', today())->get() as $appointment)
                            <tr>
                                {{-- <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm font-medium text-gray-900">{{ $appointment->appointment_time }}
                                    </div>
                                </td> --}}
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm font-medium text-gray-900">{{ $appointment->patient->nom }}
                                        {{ $appointment->patient->prenom }}
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">{{ $appointment->user->nom }}</div>
                                    <div class="text-sm text-gray-500">
                                        {{ $appointment->user->service->service ?? 'N/A' }}
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full" style="background-color: {{$appointment->etat_appointment->couleur}}">
                                        {{ ucfirst($appointment->etat_appointment->etat) }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                    <a href="{{ route('appointments.show', $appointment) }}"
                                        class="text-blue-600 hover:text-blue-900">View</a>
                                </td>
                            </tr>
                        @endforeach
                        @if(\App\Models\Appointment::whereDate('date_appointment', '=', today())->count() === 0)
                            <tr>
                                <td colspan="5" class="px-6 py-4 text-center text-sm text-gray-500">
                                    No appointments scheduled for today.
                                </td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="bg-white overflow-hidden shadow-sm rounded-lg">
        <div class="p-6">
            {{-- <h3 class="text-lg font-semibold text-gray-800 mb-4">Weekly Overview</h3>
            <div class="grid grid-cols-7 gap-2">
                @php
                    $startOfWeek = now()->startOfWeek();
                    $endOfWeek = now()->endOfWeek();
                    $currentDate = $startOfWeek->copy();
                @endphp

                @while($currentDate <= $endOfWeek)
                    @php
                        $isToday = $currentDate->isToday();
                        $count = \App\Models\Appointment::whereDate('date_appointment', '=', $currentDate)->count();
                    @endphp
                    <div class="p-3 rounded-lg {{ $isToday ? 'bg-teal-50 border border-teal-200' : 'bg-gray-50' }}">
                        <div class="text-xs font-medium text-gray-500 uppercase">{{ $currentDate->format('D') }}</div>
                        <div class="text-lg font-semibold {{ $isToday ? 'text-teal-600' : 'text-gray-800' }}">
                            {{ $currentDate->format('d') }}
                        </div>
                        <div class="mt-1 text-sm {{ $count > 0 ? 'text-teal-600 font-medium' : 'text-gray-500' }}">
                            {{ $count }} appt{{ $count !== 1 ? 's' : '' }}
                        </div>
                    </div>
                    @php
                        $currentDate->addDay();
                    @endphp
                @endwhile
            </div> --}}

            <div class="mt-6">
                <h5 class="text-xl font-extrabold bg-gradient-to-r from-indigo-500 to-purple-600 bg-clip-text text-transparent">À venir cette semaine</h5>
                <div class="space-y-3">

                    @foreach(\App\Models\Appointment::with(['patient', 'user']) ->whereBetween('date_appointment', [today()->addDay(), today()->addDays(7)])->orderBy('date_appointment')->get() as $appointment)
                        <div class="flex items-center p-3 bg-gray-50 rounded-lg">
                            <div
                                class="flex-shrink-0 w-12 h-12 flex items-center justify-center bg-teal-100 text-teal-600 rounded-lg">
                                <span class="text-lg font-bold">{{ $appointment->date_appointment->format('d') }}</span>
                            </div>
                            <div class="ml-4">
                                <div class="text-sm font-medium text-gray-900">{{ $appointment->patient->nom }}</div>
                                <div class="text-xs text-gray-500">{{ $appointment->date_appointment->format('l(d-m-y)') }}</div>
                            </div>
                            <div class="ml-auto">
                                <div class="text-sm font-medium text-gray-900">Dr. {{ $appointment->user->nom }}</div>
                                <div class="text-xs text-gray-500">{{ $appointment->user->service->service ?? 'N/A' }}</div>
                            </div>
                        </div>
                    @endforeach

                    @if(\App\Models\Appointment::whereBetween('date_appointment', [now()->startOfWeek(), now()->endOfWeek()])->whereDate('date_appointment', '>', today())->count() === 0)
                        <div class="text-center text-sm text-gray-500 py-4">
                            Aucun rendez-vous prévu pour le reste de la semaine.
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Main modal -->
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
                                    class="block mb-2 text-sm font-medium text-gray-900">Coverture sante</label>
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
                                    <option value="">All Specialties</option>
                                    @foreach(\App\Models\Service::orderBy('service')->get() as $service)
                                        <option value="{{ $service->id }}">{{ $service->service }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Doctor</label>
                                <select name="user_id" required
                                    class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-teal-500 focus:border-teal-500 sm:text-sm rounded-md">
                                    <option value="">Select Doctor</option>
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
                                Cancel
                            </button>
                            <button type="submit"
                                class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-teal-600 hover:bg-teal-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-teal-500">
                                Schedule Appointment
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const service_id = document.getElementById('service_id');
            const medecin_select = document.querySelector('select[name="medecin_id"]');

            if (service_id && medecin_select) {
                service_id.addEventListener('change', function () {
                    const selectedServiceId = this.value;

                    // Clear current options
                    medecin_select.innerHTML = '<option value="">Sélectionnez un médecin</option>';
                    console.log(selectedServiceId)
                    if (selectedServiceId) {
                        fetch(`/medecins-by-service/${selectedServiceId}`)
                            .then(response => response.json())
                            .then(data => {
                                data.forEach(medecin => {
                                    const option = document.createElement('option');
                                    option.value = medecin.id;
                                    option.textContent = `${medecin.nom} ${medecin.prenom}`;
                                    medecin_select.appendChild(option);
                                });
                            })
                            .catch(error => {
                                console.error('Erreur lors de la récupération des médecins :', error);
                            });
                    }
                });
            }

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