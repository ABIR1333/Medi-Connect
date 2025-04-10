@extends('admin.layout.app')

@section('mini title')
    <h2 class="text-base font-semibold text-gray-800">
        <i class="fas fa-notes-medical text-blue-500 mr-2"></i>
        Liste des rendez-vous
    </h2>
@endsection

@section('content')
    <div x-data="{ showModal: false, modalContent: '' }">
        <div class="container mx-auto px-4 py-6">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <!-- Filters -->
                    <div class="mb-6">
                        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
                            <div class="flex flex-col sm:flex-row sm:items-center gap-4">
                                <div class="w-full sm:w-auto">
                                    <label for="etat-filter" class="block text-sm font-medium text-gray-700 mb-1">Etat</label>
                                    <select id="etat-filter" onchange="filterAppointments()"
                                        class="w-full border-gray-300 rounded-md shadow-sm focus:border-teal-500 focus:ring-teal-500">
                                        <option value="">Tous les états</option>
                                        @foreach (\App\Models\EtatAppointment::all() as $etat)
                                            <option value="{{$etat->id}}" {{ request('etat') == $etat->id ? 'selected' : '' }}>
                                                {{$etat->etat}}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="w-full md:w-auto">
                                <form action="{{ route('appointments.index') }}" method="GET" class="flex items-center">
                                    <div class="relative w-full">
                                        <input type="text" name="search" placeholder="Rechercher un patient..."
                                            value="{{ request('search') }}"
                                            class="w-full border-gray-300 rounded-md shadow-sm focus:border-teal-500 focus:ring-teal-500 pr-10">
                                        <button type="submit"
                                            class="absolute inset-y-0 right-0 flex items-center pr-3 text-gray-400 hover:text-gray-600">
                                            <i class="fas fa-search"></i>
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <!-- Table -->
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Date</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Patient</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Etat</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Notes</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @forelse($appointments as $appointment)
                                    <tr>
                                        <td class="px-6 py-4">
                                            <div class="text-sm font-medium text-gray-900">{{ $appointment->date_appointment->format('d/m/Y') }}</div>
                                            <div class="text-sm text-gray-500">{{ $appointment->date_appointment->format('H:i') }}</div>
                                        </td>
                                        <td class="px-6 py-4">
                                            <div class="text-sm font-medium text-gray-900">{{ $appointment->patient->nom }} {{ $appointment->patient->prenom }}</div>
                                            <div class="text-sm text-gray-500">{{ $appointment->patient->cin }}</div>
                                        </td>
                                        <td class="px-6 py-4">
                                            <span class="px-2 py-1 inline-flex text-xs font-semibold rounded-full"
                                                  style="background-color: {{$appointment->etat_appointment->couleur}}; color: {{$appointment->etat_appointment->text_color ?? '#fff'}}">
                                                {{ $appointment->etat_appointment->etat }}
                                            </span>
                                        </td>
                                        <td class="px-6 py-4 text-sm text-gray-500">
                                            {{ $appointment->notes ? Str::limit($appointment->notes, 50) : 'Aucune note' }}
                                        </td>
                                        <td class="px-6 py-4 text-sm font-medium">
                                            <div class="flex items-center space-x-2">
                                                <a href="{{ route('appointments.show', $appointment) }}"
                                                    class="text-blue-600 hover:text-blue-900" title="Voir les détails">
                                                    <i class="fas fa-eye"></i>
                                                </a>

                                                <button @click="modalContent = $refs['edit-appointment-{{ $appointment->id }}'].innerHTML; showModal = true"
                                                    class="text-teal-600 hover:text-teal-900" title="Modifier">
                                                    <i class="fas fa-edit"></i>
                                                </button>

                                                <form action="{{ route('appointments.destroy', $appointment) }}" method="POST" class="inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="text-red-600 hover:text-red-900"
                                                            onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce rendez-vous?')"
                                                            title="Supprimer">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </form>
                                            </div>

                                            <!-- Hidden Modal Content -->
                                            <div x-ref="edit-appointment-{{ $appointment->id }}" class="hidden">
                                                <div class="bg-white p-6 rounded-lg">
                                                    <h3 class="text-lg font-medium text-gray-900 mb-4">Modifier Rendez-vous</h3>
                                                    <form action="{{ route('appointments.update', $appointment) }}" method="POST">
                                                        @csrf
                                                        @method('PUT')

                                                        <div class="grid grid-cols-1 gap-4 mb-4">
                                                            <div>
                                                                <label class="block text-sm font-medium text-gray-700 mb-1">Date</label>
                                                                <input type="date" name="date_appointment"
                                                                    value="{{ $appointment->date_appointment->format('Y-m-d') }}"
                                                                    class="w-full border-gray-300 rounded-md shadow-sm focus:border-teal-500 focus:ring-teal-500">
                                                            </div>

                                                            <div>
                                                                <label class="block text-sm font-medium text-gray-700 mb-1">Etat</label>
                                                                <select name="etat_appointment_id"
                                                                    class="w-full border-gray-300 rounded-md shadow-sm focus:border-teal-500 focus:ring-teal-500">
                                                                    @foreach(\App\Models\EtatAppointment::all() as $etat)
                                                                        <option value="{{ $etat->id }}" {{ $appointment->etat_appointment_id == $etat->id ? 'selected' : '' }}>
                                                                            {{ $etat->etat }}
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                            </div>

                                                            <div>
                                                                <label class="block text-sm font-medium text-gray-700 mb-1">Notes</label>
                                                                <textarea name="observation" rows="3"
                                                                    class="w-full border-gray-300 rounded-md shadow-sm focus:border-teal-500 focus:ring-teal-500">{{ $appointment->notes }}</textarea>
                                                            </div>
                                                        </div>

                                                        <div class="flex justify-end space-x-3">
                                                            <button type="button" @click="showModal = false"
                                                                class="px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm text-gray-700 hover:bg-gray-50 focus:ring-teal-500">
                                                                Annuler
                                                            </button>
                                                            <button type="submit"
                                                                class="px-4 py-2 bg-teal-600 text-white rounded-md hover:bg-teal-700">
                                                                Enregistrer
                                                            </button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="px-6 py-4 text-center text-sm text-gray-500">Aucun rendez-vous trouvé.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <!-- Pagination -->
                    @if($appointments->hasPages())
                    <div class="mt-4">
                        {{ $appointments->withQueryString()->links() }}
                    </div>
                    @endif
                </div>
            </div>
        </div>

        <!-- Modal -->
        <div x-show="showModal" x-cloak
             class="fixed inset-0 z-50 flex items-center justify-center overflow-y-auto bg-gray-900 bg-opacity-50"
             @keydown.escape.window="showModal = false">
            <div class="bg-white rounded-lg shadow-lg w-full max-w-lg p-6"
                 x-transition
                 @click.away="showModal = false">
                <div x-html="modalContent"></div>
            </div>
        </div>
    </div>

    <script>
        function filterAppointments() {
            const etat = document.getElementById('etat-filter').value;
            const url = new URL('{{ route('appointments.index') }}');
            if (etat) url.searchParams.append('etat', etat);
            window.location.href = url.toString();
        }
    </script>
@endsection
