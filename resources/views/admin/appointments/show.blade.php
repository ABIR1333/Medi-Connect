@extends('admin.layout.app')

@section('mini title')
    <h2 class="text-base font-semibold text-gray-800">
        <i class="fas fa-notes-medical text-blue-500 mr-2"></i>
        Détails du Rendez-vous #{{ $appointment->id }}
    </h2>
@endsection

@section('content')
<div class="container mx-auto px-4 py-6">
    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white border-b border-gray-200">
            <!-- Back Button -->
            <div class="mb-6">
                <a href="{{ route('appointments.index') }}"
                   class="inline-flex items-center px-4 py-2 bg-gray-200 text-gray-700 rounded-md hover:bg-gray-300 transition">
                    <i class="fas fa-arrow-left mr-2"></i> Retour à la liste
                </a>
            </div>

            <!-- Appointment Details Card -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-8">
                <!-- Main Appointment Info -->
                <div class="lg:col-span-2 bg-gray-50 p-6 rounded-lg">
                    <h3 class="text-lg font-semibold text-gray-800 mb-4 border-b pb-2">
                        <i class="fas fa-calendar-alt text-teal-600 mr-2"></i>
                        Informations du Rendez-vous
                    </h3>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <p class="text-sm font-medium text-gray-500">Date</p>
                            <p class="text-lg font-semibold">
                                {{ $appointment->date_appointment->format('d/m/Y') }}
                            </p>
                            <p class="text-sm text-gray-500">
                                {{ $appointment->date_appointment->format('H:i') }}
                            </p>
                        </div>

                        <div>
                            <p class="text-sm font-medium text-gray-500">État</p>
                            <span class="px-3 py-1 inline-flex text-sm font-semibold rounded-full"
                                  style="background-color: {{ $appointment->etat_appointment->couleur }}; color: {{ $appointment->etat_appointment->text_color ?? '#fff' }}">
                                {{ $appointment->etat_appointment->etat }}
                            </span>
                        </div>

                        <div>
                            <p class="text-sm font-medium text-gray-500">Type</p>
                            <p class="text-lg">
                                @if($appointment->controle)
                                    <span class="text-blue-600"><i class="fas fa-redo mr-1"></i> Rendez-vous de contrôle</span>
                                @else
                                    <span class="text-gray-600"><i class="fas fa-calendar-plus mr-1"></i> Consultation normale</span>
                                @endif
                            </p>
                        </div>

                        <div>
                            <p class="text-sm font-medium text-gray-500">Créé le</p>
                            <p class="text-sm">
                                {{ $appointment->created_at->format('d/m/Y H:i') }}
                            </p>
                        </div>
                    </div>

                    <!-- Notes Section -->
                    <div class="mt-6">
                        <p class="text-sm font-medium text-gray-500">Notes</p>
                        <div class="mt-1 p-4 bg-white rounded-md border border-gray-200">
                            @if($appointment->notes)
                                {{ $appointment->notes }}
                            @else
                                <span class="text-gray-400">Aucune note enregistrée</span>
                            @endif
                        </div>
                    </div>
                </div>

                <!-- Patient Info -->
                <div class="bg-gray-50 p-6 rounded-lg">
                    <h3 class="text-lg font-semibold text-gray-800 mb-4 border-b pb-2">
                        <i class="fas fa-user-injured text-blue-600 mr-2"></i>
                        Informations Patient
                    </h3>

                    <div class="space-y-3">
                        <div>
                            <p class="text-sm font-medium text-gray-500">Nom complet</p>
                            <p class="text-lg font-semibold">
                                {{ $appointment->patient->nom }} {{ $appointment->patient->prenom }}
                            </p>
                        </div>

                        <div>
                            <p class="text-sm font-medium text-gray-500">CIN</p>
                            <p class="text-lg">{{ $appointment->patient->cin }}</p>
                        </div>

                        <div>
                            <p class="text-sm font-medium text-gray-500">Date de Naissance</p>
                            <p class="text-lg">
                                {{ \Carbon\Carbon::parse($appointment->patient->date_naissance)->format('d/m/Y') }}
                                ({{ \Carbon\Carbon::parse($appointment->patient->date_naissance)->age }} ans)
                            </p>
                        </div>

                        <div>
                            <p class="text-sm font-medium text-gray-500">Téléphone</p>
                            <p class="text-lg">{{ $appointment->patient->telephone }}</p>
                        </div>

                        <div>
                            <p class="text-sm font-medium text-gray-500">Couverture Santé</p>
                            <p class="text-lg">
                                {{ $appointment->patient->coverture_sante->coverture ?? 'Aucune' }}
                                @if($appointment->patient->identifiant)
                                    ({{ $appointment->patient->identifiant }})
                                @endif
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Doctor Info and Actions -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                <!-- Doctor Info -->
                <div class="bg-gray-50 p-6 rounded-lg">
                    <h3 class="text-lg font-semibold text-gray-800 mb-4 border-b pb-2">
                        <i class="fas fa-user-md text-purple-600 mr-2"></i>
                        Médecin Assigné
                    </h3>

                    <div class="space-y-3">
                        <div>
                            <p class="text-sm font-medium text-gray-500">Nom</p>
                            <p class="text-lg font-semibold">
                                Dr. {{ $appointment->user->nom }} {{ $appointment->user->prenom }}
                            </p>
                        </div>

                        <div>
                            <p class="text-sm font-medium text-gray-500">Spécialité</p>
                            <p class="text-lg">
                                {{ $appointment->user->service->service ?? 'Non spécifié' }}
                            </p>
                        </div>

                        <div>
                            <p class="text-sm font-medium text-gray-500">Contact</p>
                            <p class="text-lg">
                                <i class="fas fa-phone-alt mr-2 text-gray-500"></i>
                                {{ $appointment->user->telephone }}
                            </p>
                            <p class="text-lg mt-1">
                                <i class="fas fa-envelope mr-2 text-gray-500"></i>
                                {{ $appointment->user->email }}
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Actions Card -->
                <div class="lg:col-span-2 bg-gray-50 p-6 rounded-lg">
                    <h3 class="text-lg font-semibold text-gray-800 mb-4 border-b pb-2">
                        <i class="fas fa-cogs text-orange-600 mr-2"></i>
                        Actions
                    </h3>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <!-- Change Status -->
                        <div class="p-4 bg-white rounded-md border border-gray-200">
                            <h4 class="font-medium text-gray-700 mb-2">Changer l'état</h4>
                            <form action="{{ route('appointments.change-status', $appointment) }}" method="POST">
                                @csrf
                                @method('PATCH')
                                <div class="flex items-center gap-2">
                                    <select name="etat_appointment_id" class="flex-1 border-gray-300 rounded-md">
                                        @foreach(\App\Models\EtatAppointment::all() as $etat)
                                            <option value="{{ $etat->id }}" {{ $appointment->etat_appointment_id == $etat->id ? 'selected' : '' }}>
                                                {{ $etat->etat }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <button type="submit" class="px-3 py-1 bg-teal-600 text-white rounded-md hover:bg-teal-700">
                                        <i class="fas fa-save"></i>
                                    </button>
                                </div>
                            </form>
                        </div>

                        <!-- Reschedule -->
                        <div class="p-4 bg-white rounded-md border border-gray-200">
                            <h4 class="font-medium text-gray-700 mb-2">Reprogrammer</h4>
                            <form action="{{ route('appointments.reschedule', $appointment) }}" method="POST">
                                @csrf
                                @method('PATCH')
                                <div class="flex items-center gap-2">
                                    <input type="date" name="new_date"
                                           value="{{ $appointment->date_appointment->format('Y-m-d') }}"
                                           class="flex-1 border-gray-300 rounded-md">
                                    <button type="submit" class="px-3 py-1 bg-blue-600 text-white rounded-md hover:bg-blue-700">
                                        <i class="fas fa-calendar-check"></i>
                                    </button>
                                </div>
                            </form>
                        </div>

                        <!-- Add Note -->
                        <div class="p-4 bg-white rounded-md border border-gray-200 md:col-span-2">
                            <h4 class="font-medium text-gray-700 mb-2">Ajouter une note</h4>
                            <form action="{{ route('appointments.add-note', $appointment) }}" method="POST">
                                @csrf
                                @method('PATCH')
                                <textarea name="notes" rows="2" class="w-full border-gray-300 rounded-md mb-2"
                                          placeholder="Ajoutez des notes ici...">{{ $appointment->notes }}</textarea>
                                <button type="submit" class="px-4 py-2 bg-purple-600 text-white rounded-md hover:bg-purple-700">
                                    <i class="fas fa-edit mr-1"></i> Enregistrer
                                </button>
                            </form>
                        </div>
                    </div>

                    <!-- Danger Zone -->
                    <div class="mt-6 pt-6 border-t border-red-200">
                        <h4 class="font-medium text-red-700 mb-3">
                            <i class="fas fa-exclamation-triangle mr-1"></i>
                            Zone de danger
                        </h4>
                        <form action="{{ route('appointments.destroy', $appointment) }}" method="POST"
                              onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer définitivement ce rendez-vous?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="px-4 py-2 bg-red-600 text-white rounded-md hover:bg-red-700">
                                <i class="fas fa-trash-alt mr-1"></i> Supprimer ce rendez-vous
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection