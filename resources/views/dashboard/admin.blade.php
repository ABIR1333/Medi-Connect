<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
    <div class="bg-white overflow-hidden shadow-sm rounded-lg">
        <div class="p-6 bg-gradient-to-r from-teal-500 to-teal-600 text-white">
            <div class="flex items-center justify-between">
                <div>
                    <h3 class="text-lg font-semibold">Totale Receptions</h3>
                    <p class="text-3xl font-bold mt-2">{{ \App\Models\User::where('role_id','=',2)->count() }}</p>
                </div>
                <div class="bg-white bg-opacity-30 p-3 rounded-full">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                    </svg>
                </div>
            </div>
            <div class="mt-4">
                <a href="{{ route('receptions.index') }}" class="text-white hover:text-teal-100 text-sm font-medium flex items-center">
                    Voir toutes les réceptions
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </a>
            </div>
        </div>
    </div>

    <div class="bg-white overflow-hidden shadow-sm rounded-lg">
        <div class="p-6 bg-gradient-to-r from-blue-500 to-blue-600 text-white">
            <div class="flex items-center justify-between">
                <div>
                    <h3 class="text-lg font-semibold">Totale Docteurs</h3>
                    <p class="text-3xl font-bold mt-2">{{ \App\Models\User::where('role_id', '=',3)->count() }}</p>
                </div>
                <div class="bg-white bg-opacity-30 p-3 rounded-full">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                    </svg>
                </div>
            </div>
            <div class="mt-4">
                <a href="{{ route('medecins.index') }}" class="text-white hover:text-blue-100 text-sm font-medium flex items-center">
                    Voir tous les docteurs
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </a>
            </div>
        </div>
    </div>

    <div class="bg-white overflow-hidden shadow-sm rounded-lg">
        <div class="p-6 bg-gradient-to-r from-purple-500 to-purple-600 text-white">
            <div class="flex items-center justify-between">
                <div>
                    <h3 class="text-lg font-semibold">Totale Rendez-vous</h3>
                    <p class="text-3xl font-bold mt-2">{{ \App\Models\Appointment::count() }}</p>
                </div>
                <div class="bg-white bg-opacity-30 p-3 rounded-full">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                </div>
            </div>
            <div class="mt-4">
                <a href="{{ route('appointments.index') }}" class="text-white hover:text-purple-100 text-sm font-medium flex items-center">
                    Voir tous les rendez-vous
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </a>
            </div>
        </div>
    </div>
</div>

<div class="mt-8 grid grid-cols-1 lg:grid-cols-2 gap-6">
    <div class="bg-white overflow-hidden shadow-sm rounded-lg">
        <div class="p-6">
            <h3 class="text-lg font-semibold text-gray-800 mb-4">Recent Appointments</h3>
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Patient</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Docteur</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach(\App\Models\Appointment::with(['patient', 'medecin'])->latest()->take(5)->get() as $appointment)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm font-medium text-gray-900">{{ $appointment->patient->name }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">{{ $appointment->medecin->name }}</div>
                                    <div class="text-sm text-gray-500">{{ $appointment->medecin->specialite->name ?? 'N/A' }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">{{ $appointment->date_appointment->format('M d, Y') }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full 
                                        @if($appointment->etat_appointment->etat) bg-green-100 text-green-800 
                                        @else bg-red-100 text-red-800 @endif">
                                        {{ ucfirst($appointment->status) }}
                                    </span>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="bg-white overflow-hidden shadow-sm rounded-lg">
        <div class="p-6">
            <h3 class="text-lg font-semibold text-gray-800 mb-4">Specialties Overview</h3>
            <div class="space-y-4">
                @foreach(\App\Models\Service::all() as $service)
                    <div class="flex items-center">
                        <div class="w-full">
                            <div class="flex justify-between mb-1">
                                <span class="text-sm font-medium text-gray-700">{{ $service->service }}</span>
                                <span class="text-sm font-medium text-gray-700">{{ $service->users->where('role_id','=',3)->count() }} doctors</span>
                            </div>
                            <div class="w-full bg-gray-200 rounded-full h-2.5">
                                <div class="bg-teal-600 h-2.5 rounded-full" style="width: {{ min(100, $service->users->where('role_id','=',3)->count() * 10) }}%"></div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

