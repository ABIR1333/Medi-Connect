<div class="grid grid-cols-1 md:grid-cols-3 gap-6">
    <div class="bg-white overflow-hidden shadow-sm rounded-lg">
        <div class="p-6 bg-gradient-to-r from-teal-500 to-teal-600 text-white">
            <div class="flex items-center justify-between">
                <div>
                    <h3 class="text-lg font-semibold">Today's Appointments</h3>
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
                    <h3 class="text-lg font-semibold">This Week</h3>
                    <p class="text-3xl font-bold mt-2">
                        {{ \App\Models\Appointment::whereBetween('date_appointment', [today()->addDay(), today()->addDays(7)])->count() }}
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
                    <h3 class="text-lg font-semibold">Available Doctors</h3>
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
                <h3 class="text-lg font-semibold text-gray-800">Today's Appointments {{today()->format('d/m')}} </h3>
                <button type="button" data-modal-target="default-modal" data-modal-toggle="default-modal"
                    class="inline-flex items-center px-4 py-2 bg-teal-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-teal-700 focus:outline-none focus:ring-2 focus:ring-teal-500 focus:ring-offset-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                    </svg>
                    New Appointment
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
                        @forelse(\App\Models\Appointment::with(['patient', 'user'])->whereDate('date_appointment', '=', today())->get() as $appointment)
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
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full"
                                        style="background-color: {{$appointment->etat_appointment->couleur}}">
                                        {{ ucfirst($appointment->etat_appointment->etat) }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                    <a href="{{ route('appointments.show', $appointment) }}"
                                        class="text-blue-600 hover:text-blue-900">View</a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="px-6 py-4 text-center text-sm text-gray-500">
                                    No appointments scheduled for today.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="bg-white overflow-hidden shadow-sm rounded-lg">
        <div class="p-6">
            <h3 class="text-lg font-semibold text-gray-800 mb-3">Upcoming This Week {{today()->addDay()->format('d/m')}}
                - {{ today()->addDays(7)->format('d/m')}}</h3>
            <div class="space-y-3">
                @forelse(\App\Models\Appointment::with(['patient', 'user'])->whereBetween('date_appointment', [today()->addDay(), today()->addDays(7)])->orderBy('date_appointment')->get() as $appointment)
                    <div class="flex items-center p-3 bg-gray-50 rounded-lg">
                        <div
                            class="flex-shrink-0 w-12 h-12 flex items-center justify-center bg-teal-100 text-teal-600 rounded-lg">
                            <span class="text-lg font-bold">{{ $appointment->date_appointment->format('d') }}</span>
                        </div>
                        <div class="ml-4">
                            <div class="text-sm font-medium text-gray-900">{{ $appointment->patient->nom }}</div>
                            <div class="text-xs text-gray-500">{{ $appointment->date_appointment->format('l(d-m-y)') }}
                            </div>
                        </div>
                        <div class="ml-auto">
                            <div class="text-sm font-medium text-gray-900">Dr. {{ $appointment->user->nom }}</div>
                            <div class="text-xs text-gray-500">{{ $appointment->user->service->service ?? 'N/A' }}</div>
                        </div>
                    </div>
                @empty
                    <div class="text-center text-sm text-gray-500 py-4">
                        No upcoming appointments for the rest of the week.
                    </div>
                @endforelse
            </div>
        </div>
    </div>
</div>

@include('reception.create-modal')

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